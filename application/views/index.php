<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url('assets/firstpage/css/style.css'); ?>" >

</head>
<body>
<div class="container">
    
	<div class="d-flex justify-content-center h-100">
              
		<div class="card">
			<div class="card-header">
				<h3>
                        	   <b>Digital Library</b><br>
                        	   <small>Electronic library</small>
                        	</h3>
			</div>
			<div class="card-body">
                            <center><font color="red"><b><?=$this->session->flashdata('err_login');?></b></font></center>
                            <span class="error-message"><center><font color="red"><b>Datele de logare nu sunt valide</b></font></center></span>
                            <div class="register-msg"><span>Contul tau a fost inregistrat si asteapta aprobarea unui administrator. Vei primi un email cand contul va fi aprobat!</span></div>	
                            <div class="forgot-msg"><span>Ti-am trimis un email cu instructiuni pentru resetarea parolei!</span></div>	
                            <div class="rst-message"><span>Parola ta a fost resetata, acum te poti loga!</span></div>	
                            <div class="rst-error"><span><center><font color="red"><b>Parolele introduse sunt diferite!</b></font></center></span></div>	
                            <form class="login" action="" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="email" class="form-control" placeholder="email">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="parola">
					</div>
					
					<div class="form-group">
                                            <input type="submit" class="btn float-right login_btn" value="Login">
                                            <button class="btn float-left register_btn">Inregistrare</button>
                                            
					</div>
				</form>
                            
                            <form class="forget">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="emailf" class="form-control" placeholder="adresa email">
						
					</div>
					<div class="form-group">
                                            <button class="btn float-right forget_btn">Recupereaza</button>
                                            <button class="btn float-left back_btn">Inapoi</button>
                                            
					</div>
				</form>
                            
                            <form class="change-password">
                                <label style="color: #fff;">Introdu noua parola</label>
					<div class="input-group form-group">
                                            
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="passf"  class="form-control">
						
					</div>
                                <label style="color: #fff;">Confirma noua parola</label>
                                <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="passl"  class="form-control">
						 
					</div>
					<div class="form-group">
                                            <button class="btn float-right changepass-btn">Schimba parola</button>
                                            <button class="btn float-left back_btn">Inapoi</button>
                                            
					</div>
				</form>
                            
                            <form class="register">
					<div class="input-group form-group">
						<input type="text" name="nume" class="form-control" placeholder="Nume">
						
					</div>
					<div class="input-group form-group">
						<input type="text" name="initiala" class="form-control" placeholder="Initiala Tatalui">
					</div>
                                <div class="input-group form-group">
						<input type="text" name="prenume" class="form-control" placeholder="Prenume">
					</div>
                                <div class="input-group form-group">
                                    <select name="facultate" class="form-control custom-select">
                  <option selected value="" disabled>Selecteaza</option>
                  <option value="Facultate X">Facultate X</option>
                  <option value="Facultate Y">Facultate Y</option>
                  <option value="Facultate Z">Facultate Z</option>
                                    </select>
					</div>
                                <div class="input-group form-group">
						<select name="an" class="form-control custom-select">
                  <option selected value="" disabled>Selecteaza</option>
                  <option value="I">Anul I</option>
                  <option value="II">Anul II</option>
                  <option value="III">Anul III</option>
                  <option value="IV">Anul IV</option>
                  <option value="V">Anul V</option>
                  <option value="VI">Anul VI</option>
                                    </select>
					</div>
                                <div class="input-group form-group">
						<input type="text" name="emailr" class="form-control" placeholder="Email">
					</div>
                                <div class="input-group form-group">
						<input type="password" name="parola" class="form-control" placeholder="Parola">
					</div>
					
					<div class="form-group">
                                            <button class="btn float-right registers_btn">Inregistrare</button>
                                            <button class="btn float-left back_btn">Inapoi</button>
                                            
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center">
					<a class="forgot" href="">Ai uitat parola?</a>
				</div>
			</div>
		</div>
	</div>
</div>
    <script src="<?= base_url('assets/firstpage/js/custom.js'); ?>"></script>
</body>
</html>