<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 offset-1 py-3">
                <div class="docs-overview py-5">
                    
                    <div class="row ">
                       <embed src="<?=base_url('uploads/'. $publication['file']);?>" type="application/pdf" width="100%" height="100%" style="height:700px;">

                    </div><!--//row-->
                </div><!--//container-->
            </div>
            <div class="col-lg-3" style="padding-top: 4rem !important;">
                <div class="card shadow-sm">
                                    <div class="card-body">
                                       <h6 class="card-title mb-3">
                                            <span class="card-title-text"><a href="<?= $publication['slug'] .'_pub'. $publication['id']; ?>"><?= ucfirst($publication['name']); ?></a></span>
                                        </h6>
                                        <?php
                                        $subjectz = explode(', ', $publication['subjects']);
                            $subjslugs = explode(', ', $publication['subjslugs']);
                            ?>
                                        <div class="card-text">
                                          <img src="<?= base_url('/assets/student/images/pdf.png'); ?>" class="center-pdf-img" />
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
                                            
                                            <div style="margin-top:10px;">
                                             
                                            <?php if($publication['download_rights'] > 0){ echo '<a class="btn float-right btn-danger" href="' . base_url() .'download/'. $publication['id'] .'">Descarca</a>'; }?>
                                            <button onclick="window.history.go(-1); return false;" class="btn float-left btn-success">Inapoi</button>
                                        </div>
                                        </div>
                                        
                                    </div><!--//card-body-->
                                </div><!--//card-->
            </div>
        </div><!--//container-->
    </div><!--//container-->
</div><!--//page-content-->

