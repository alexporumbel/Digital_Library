<div class="page-header theme-bg-dark py-5 text-center position-relative">
    <div class="theme-bg-shapes-right"></div>
    <div class="theme-bg-shapes-left"></div>
    <div class="container">
        <h1 class="page-heading single-col-max mx-auto">Documentation</h1>
        <div class="page-intro single-col-max mx-auto">Everything you need to get your software documentation online.</div>
        <div class="main-search-box pt-3 d-block mx-auto">
            <form class="search-form w-100">
                <input type="text" placeholder="Cauta publicatie..." name="search" class="form-control search-input">
                <button type="submit" class="btn search-btn" value="Search"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
</div><!--//page-header-->
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 offset-1 py-3">
                <div class="docs-overview py-5">
                    <h3 class="row-title-text mb-3">
                        <span class="card-title-text">Categoria <?=ucfirst($category);?></span>
                    </h3>
                    <div class="row">
                        <?php
                        foreach ($publications as $publication) {
                            $subjectz = explode(', ', $publication['subjects']);
                            $subjslugs = explode(', ', $publication['subjslugs']);
                            ?>
                            <div class="col-12 col-lg-4 py-3">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h6 class="card-title mb-3">
                                            <span class="card-title-text"><a href="<?= $publication['slug'] .'_pub'. $publication['id']; ?>"><?= ucfirst($publication['name']); ?></a></span>
                                        </h6>
                                        <div class="card-text">
                                           <a href="<?= $publication['slug'] .'_pub'. $publication['id']; ?>"><img src="<?= base_url('/assets/student/images/pdf.png'); ?>" class="center-pdf-img" /></a>
                                           <span class="card-list" style="margin-top:10px; margin-bottom:10px;"><center><b><a class="addtofav" data-id="<?=$publication['id'];?>" href="#"><i class="fas fa-heart"></i> Adauga la favorite</a></b></center>
                                            </span>  
                                           <span class="card-list"><b>Discipina:</b><a href="<?=base_url();?>disciplina/<?= $publication['discslug']; ?>"><?= $publication['discipline']; ?></a></span>
                                            <span class="card-list"><b>Categoria:</b><a href="<?=base_url();?>categorie/<?= $publication['catslug']; ?>"><?= $publication['category']; ?></a></span>
                                            <span class="card-list"><b>Subiecte:</b> 
                                                <?php
                                                for ($x = 0; $x < count($subjectz); $x++) {
                                                   echo "<a href='". base_url() ."subiect/". $subjslugs[$x] ."'>#". $subjectz[$x]."</a> ";
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        
                                    </div><!--//card-body-->
                                </div><!--//card-->
                            </div><!--//col-->
<?php } ?>

                    </div><!--//row-->
                </div><!--//container-->
            </div>
            <div class="col-lg-3" style="padding-top: 8rem !important;">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <ul class="section-items list-unstyled nav flex-column pb-3">
                            <li class="nav-item section-title"><a class="nav-link" href="<?=base_url();?>"><span class="theme-icon-holder mr-2"><i class="fas fa-home"></i></i></span>Acasa</a></li>
                            <li class="nav-item section-title"><a class="nav-link" href="<?=base_url('favorite');?>"><span class="theme-icon-holder mr-2"><i class="fas fa-heart"></i></span>Favorite(<?=$favcount;?>)</a></li>
                            <li class="nav-item section-title"><a class="nav-link" href="#"><span class="theme-icon-holder mr-2"><i class="fas fa-map-signs"></i></span>Categorii</a></li>
                            <?php
                            foreach ($categories as $category) {
                                echo '<li class="nav-item"><a class="nav-link" href="'. base_url() .'categorie/'. $category['slug'] .'">' . ucfirst($category['category']) . '(' . $category['catcount'] . ')</a></li>';
                            }
                            ?>
                            <li class="nav-item section-title mt-3"><a class="nav-link scrollto" href="#section-2"><span class="theme-icon-holder mr-2"><i class="fas fa-book-reader"></i></span>Discipline</a></li>
                            <?php
                            foreach ($disciplines as $discipline) {
                                echo '<li class="nav-item"><a class="nav-link" href="'. base_url() .'#'. $discipline['slug'] .'">' . ucfirst($discipline['discipline']) . '(' . $discipline['disccount'] . ')</a></li>';
                            }
                            ?>
                            <li class="nav-item section-title mt-3"><a class="nav-link scrollto" href="#"><span class="theme-icon-holder mr-2"><i class="fas fa-lightbulb"></i></span>Subiecte</a></li>
<?php
foreach ($subjects as $subject) {
    echo '<li class="nav-item"><a class="nav-link" href="'. base_url() .'subiect/'. $subject['slug'] .'">' . ucfirst($subject['subject']) . '(' . $subject['subjscount'] . ')</a></li>';
}
?>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!--//container-->
    </div><!--//container-->
</div><!--//page-content-->

<section class="cta-section text-center py-5 theme-bg-dark position-relative" style="margin-top: 50px;">
    <div class="theme-bg-shapes-right"></div>
    <div class="theme-bg-shapes-left"></div>
    <div class="container">
        <h3 class="mb-2 text-white mb-3">Launch Your Software Project Like A Pro</h3>
        <div class="section-intro text-white mb-3 single-col-max mx-auto">Want to launch your software project and start getting traction from your target users? Check out our premium <a class="text-white" href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/coderpro-bootstrap-4-startup-template-for-software-projects/">Bootstrap 4 startup template CoderPro</a>! It has everything you need to promote your product.</div>
        <div class="pt-3 text-center">
            <a class="btn btn-light" href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/coderpro-bootstrap-4-startup-template-for-software-projects/">Get CoderPro<i class="fas fa-arrow-alt-circle-right ml-2"></i></a>
        </div>
    </div>
</section><!--//cta-section-->

