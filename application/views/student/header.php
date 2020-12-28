<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>CoderDocs - Bootstrap 4 Documentation Template For Software Projects</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootstrap Documentation Template For Software Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome JS-->
    <script defer src="<?= base_url('assets/student/fontawesome/js/all.min.js'); ?>"></script>

    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?= base_url('assets/student/css/theme.css'); ?>">

</head> 

<body>    
    <header class="header fixed-top">	    
        <div class="branding docs-branding">
            <div class="container-fluid position-relative py-2">
                <div class="docs-logo-wrapper">
	                <div class="site-logo"><a class="navbar-brand" href="<?= base_url(); ?>"><img class="logo-icon mr-2" src="<?= base_url('assets/student/images/logo.png'); ?>" alt="logo"></a></div>    
                </div><!--//docs-logo-wrapper-->
	            <div class="docs-top-utilities d-flex justify-content-end align-items-center">
	
					<ul class="navbar-nav ml-auto">
     
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown ml-auto">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user-alt"></i> <?=$this->session->userdata('name');?></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="<?= base_url('logout'); ?>" class="dropdown-item">
            Iesi din cont
          </a>
            </div>
        </li>
        
      
    </ul>
		            
	            </div><!--//docs-top-utilities-->
            </div><!--//container-->
        </div><!--//branding-->
    </header><!--//header-->
    