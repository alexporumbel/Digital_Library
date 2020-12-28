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
						<input type="text" class="form-control" placeholder="email">
						
					</div>
					<div class="form-group">
                                            <button class="btn float-right forget_btn">Recupereaza</button>
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
                  <option selected disabled>Selecteaza</option>
                  <option value="Facultate X">Facultate X</option>
                  <option value="Facultate Y">Facultate Y</option>
                  <option value="Facultate Z">Facultate Z</option>
                                    </select>
					</div>
                                <div class="input-group form-group">
						<select name="an" class="form-control custom-select">
                  <option selected disabled>Selecteaza</option>
                  <option value="1">Anul 1</option>
                  <option value="2">Anul 2</option>
                  <option value="3">Anul 3</option>
                                    </select>
					</div>
                                <div class="input-group form-group">
						<input type="text" name="email" class="form-control" placeholder="Email">
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