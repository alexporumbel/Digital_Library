<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 offset-1 py-3">
                <div class="docs-overview py-5">
                    
                    <div class="row ">
                       <embed src="<?=base_url('uploads/'. $reqpublication['file']);?>" type="application/pdf" width="100%" height="100%" style="height:700px;">

                    </div><!--//row-->
                </div><!--//container-->
            </div>
            <div class="col-lg-3" style="padding-top: 4rem !important;">
                <div class="card shadow-sm">
                                    <div class="card-body"> 
                                       <h6 class="card-title mb-3">
                                            <span class="card-title-text">Solicitare: </span><?= ucfirst($reqpublication['subject']); ?>
                                        </h6>
                                       
                                        <div class="card-text">
                                          <img src="<?= base_url('/assets/student/images/pdf.png'); ?>" class="center-pdf-img" />
                                          
                                           <?php if($reqpublication['response'] !==''){ echo '<span class="card-list"><b>Raspuns solicitare:</b>' . $reqpublication['response'] .'</span>' ; } ?>
                                           
                                            
                                            <div style="margin-top:10px;">
                                             
                                        </div>
                                        </div>
                                        
                                    </div><!--//card-body-->
                                </div><!--//card-->
            </div>
        </div><!--//container-->
    </div><!--//container-->
</div><!--//page-content-->

