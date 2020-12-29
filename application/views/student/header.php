<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Digital Library</title>
    
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
    <div class="page-header theme-bg-dark py-5 text-center position-relative">
    <div class="theme-bg-shapes-right"></div>
    <div class="theme-bg-shapes-left"></div>
    <div class="container">
        <h1 class="page-heading single-col-max mx-auto">Documentation</h1>
        <div class="page-intro single-col-max mx-auto">Everything you need.</div>
        <div class="main-search-box pt-3 d-block mx-auto">
            <form class="search-form w-100 form-inline" method="POST" action="<?=site_url('cauta');?>">
                <select name="category" class="form-control custom-select">
                  <option value="0" selected>Toate categoriile</option>
                  <?php foreach ($categories as $category) {
                      echo "<option value=". $category['id'] .">". ucfirst($category['category']) ."</option>";
                           } ?>
                </select>
                <select name="discipline" class="form-control custom-select">
                  <option value="0" selected>Toate disciplinele</option>
                  <?php foreach ($disciplines as $discipline) {
                      echo "<option value=". $discipline['id'] .">". ucfirst($discipline['discipline']) ."</option>";
                           } ?>
                </select>
                 <select name="year" class="form-control custom-select">
                  <option selected value="">Toti anii</option>
                  <option value="I">Anul I</option>
                  <option value="II">Anul II</option>
                  <option value="III">Anul III</option>
                  <option value="IV">Anul IV</option>
                  <option value="V">Anul V</option>
                  <option value="VI">Anul VI</option>
                   
                </select>
                <input type="text" placeholder="Cauta publicatie..." name="search" class="form-control search-input">
                <button type="submit" class="btn search-btn" value="Search"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
</div><!--//page-header-->