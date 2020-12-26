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
				<form class="login">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="email">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="parola">
					</div>
					
					<div class="form-group">
                                            <button class="btn float-left register_btn">Inregistrare</button>
                                            <button class="btn float-right login_btn">Login</button>
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
					</div>
				</form>
                            
                            <form class="register">
					<div class="input-group form-group">
						<input type="text" class="form-control" placeholder="Nume">
						
					</div>
					<div class="input-group form-group">
						<input type="text" class="form-control" placeholder="Initiala Tatalui">
					</div>
                                <div class="input-group form-group">
						<input type="text" class="form-control" placeholder="Prenume">
					</div>
                                <div class="input-group form-group">
						<input type="text" class="form-control" placeholder="Facultate">
					</div>
                                <div class="input-group form-group">
						<input type="text" class="form-control" placeholder="An">
					</div>
					
					<div class="form-group">
                                            <button class="btn float-right register_btn">Inregistrare</button>
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