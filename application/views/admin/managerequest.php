<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Solicitare publicatie</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10 offset-1">
            <div class="card">
              <div class="card-header p-2">
                  <h3 class="card-title">Solicitare #<?=$request['id'];?></h3> <a href="#" onclick="window.history.go(-1); return false;" class="btn btn-info float-right"> Inapoi</a>
                
              </div><!-- /.card-header -->
              <div class="card-body">
                  <center><font color="red"><b><?=@$formerror;?></b></font></center>
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?= base_url('assets/admin/dist/img/user1-128x128.jpg'); ?>" alt="user image">
                        <span class="username">
                          <a href="#"><?= $request['name'] .' '. $request['fathers_initial'] .'. '. $request['lname']; ?> - <?= $request['faculty'] .' Anul'. $request['year']; ?></a>
                        </span>
                        <span class="description"><?=$request['subject'];?> - Trimis la <?=date('d-m-Y h:i', $request['timestamp']);?></span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        <?=$request['message'];?>
                      </p>
                    </div>
                    <?php if($request['respid']=== NULL){ ?>
                    <!-- /.post -->
                    <h5> Trimite raspuns</h5>
                    <!-- Post -->
                    <div class="post clearfix">
                      <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?= site_url("admin/managerequest/". $request['id']);?>">
                          <div class="custom-file-inputr">
                          <input type="file" id="respfile" name="respfile" class="custom-file-inputr" id="pubFile"> 
                          </div>
                        <div class="input-group input-group-sm mb-0">
                            <textarea class="form-control" name="mesaj" id="message-text" placeholder="Poti scrie un raspuns studentului aici."></textarea>
                             
                          <div class="input-group-append">
                            <button class="btn btn-success upload-respfile">Incarca fisier</button>
                            <button type="submit" class="btn btn-danger">Raspunde</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <?php }else{ ?>
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?= base_url('assets/admin/dist/img/user1-128x128.jpg'); ?>" alt="User Image">
                        <span class="username">
                          <a href="#"><?= $request['adminname']; ?> - Administrator</a>
                        </span>
                        <span class="description">Trimis la <?=date('d-m-Y h:i', $request['timestampresponse']);?></span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        <?= $request['response']; ?>
                      </p>
                      <?php if(@$request['original_file'] !==''){ ?>
                      <p>
                      <h5>Fisier atasat </h5> <b><?= @$request['original_file']; ?></b>
                      </p>
                      <?php } ?>
                    </div>
                    <!-- /.post -->
                    <?php } ?>
                    <!-- /.post -->
                
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>