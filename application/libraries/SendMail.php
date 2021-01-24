<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class SendMail {

    public $mail;
    protected $CI;
    protected $_from;
    protected $_from_email;

    public function __construct() {
        $this->CI = & get_instance();
         $this->CI->load->model('Admin_model');
    }
    
    public function register($email){
        $subject = "Inregistrare in platforma";
        $message = "Contul tau a fost inregistrat cu succes pe platforma " . $this->CI->Admin_model->getSettingsValues('library_name') ." si asteapta confirmarea unui administrator.<br><br> Vei primi un email imediat ce contul tau va fi aprobat!";
        $this->sendTo($email, $subject, $message);
    }
    
    public function confirm($id){
        $subject = "Cont confirmat";
        $message = "Contul tau de pe platforma " . $this->CI->Admin_model->getSettingsValues('library_name') ." a fost confirmat.<br><br> Poti intra in contul tau accesand ". base_url();
        $this->sendTo($this->CI->Admin_model->getstudentemail($id), $subject, $message);
    }
    
    public function forget($email, $token) {  
        $subject = "Resetare parola";
        $message = "Ai solicitat schimbarea parolei pe platforma " . $this->CI->Admin_model->getSettingsValues('library_name') ." .<br><br> Acceseaza linkul urmator si introdu noua ta parola ". base_url() ."?reset=$token";
        $this->sendTo($email, $subject, $message);
    }
    
    public function request_response($id) {
        $subject = "Raspuns solicitare suport";
        $request = $this->CI->Admin_model->getrequest($id);
        if(($request['response'] !=='') && ($request['original_file'] !=='')){
        $message = "Ai primit un raspuns la solicitarea ta<br> Subiect:<br> " . $request['subject'] ."<br> Mesaj:<br>". $request['message'] ."<br><br> <b>Raspuns:</b><br>" .$request['response'] ."<br> Poti accesa publicatia ceruta aici:" . base_url('/solicitari/') . $request['slug'];
        }else if(($request['response'] !=='') && ($request['original_file'] ==='')){
        $message = "Ai primit un raspuns la solicitarea ta<br> Subiect:<br>" . $request['subject'] ."<br> Mesaj:<br>". $request['message'] ."<br><br> <b>Raspuns:</b><br>" .$request['response'];
        }else if(($request['response'] ==='') && ($request['original_file'] !=='')){
        $message = "Ai primit un raspuns la solicitarea ta<br> Subiect:<br>" . $request['subject'] ."<br> Mesaj:<br>". $request['message'] ."<br><br> Poti accesa publicatia ceruta aici:" . base_url('/solicitari/') . $request['slug'];
        }
        $this->sendTo($this->CI->Admin_model->getstudentemail($request['sid']), $subject, $message);
    }
    
    public function sendTo($toEmail, $subject, $msg) {
        $this->mail = new PHPMailer\PHPMailer\PHPMailer();
        $this->mail->isSMTP();
        // $this->mail->SMTPDebug = 2; 
        $this->mail->Debugoutput = 'html';
        $this->mail->Host = $this->CI->Admin_model->getSettingsValues('mail_server');
        $this->mail->Port = $this->CI->Admin_model->getSettingsValues('mail_port');
        $this->mail->SMTPSecure = 'ssl';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $this->CI->Admin_model->getSettingsValues('mail_address');
        $this->mail->Password = $this->CI->Admin_model->getSettingsValues('mail_password');
        $this->mail->CharSet = 'UTF-8';
        $this->_from = $this->CI->Admin_model->getSettingsValues('mail_name');
        $this->_from_email = $this->CI->Admin_model->getSettingsValues('mail_address');
        $this->mail->setFrom($this->_from_email, $this->_from);
        $this->mail->addAddress($toEmail);
        $this->mail->isHTML(true); 
        $this->mail->Subject = $subject;
        $this->mail->Body = $msg;
        if (!$this->mail->send()) {
            log_message('error', 'Mailer Error: ' . $this->mail->ErrorInfo);
            return false;
        }
        return true;
    }
}
