<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tablou de bord</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Studenti inscrisi</span>
                <span class="info-box-number">
                  <?=$totalstudents;?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Studenti neaprobati</span>
                <span class="info-box-number"><?=$unconfirmedstudents;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Solicitari publicatii</span>
                <span class="info-box-number"><?=$newrequests;?></span> 
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Accesari zilnice</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-6">
                <!-- USERS LIST -->
                 <div class="card">
              <div class="card-header">
                <h3 class="card-title">Solicitari fara raspuns</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                    <?php foreach ($requests as $request) { ?>
                  <li class="item">
                    <div class="product-img">
                      <img src="<?= base_url('assets/admin/dist/img/default-150x150.png'); ?>" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="solicitare/<?=$request['id'];?>" class="product-title"><?= $request['subject'];?></a>
                      <span class="product-description">
                        <?= $request['message'];?>
                      </span>
                    </div>
                  </li>
                    <?php } ?>
                  
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="<?= base_url('admin/solicitari-publicatii'); ?>" class="uppercase">Vezi solicitarile</a>
              </div>
              <!-- /.card-footer -->
            </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
              
                          <div class="col-md-6">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Studenti neaprobati</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger"><?=$unconfirmedstudents;?> Studenti noi</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                         <?php foreach ($students as $student) { ?>
                      <li>
                        <img src="<?= base_url('assets/admin/dist/img/avatar5.png'); ?>" style="max-width: 50%;" alt="User Image">
                        <a class="users-list-name" href="<?= base_url('admin/studenti-neconfirmati'); ?>"><?=$student['name'] .' '. $student['fathers_initial'] .'. ' . $student['lname'];?></a>
                        <span class="users-list-date"><?=date('d-m-Y h:i', $student['created_at']);?></span>
                      </li>
                         <?php } ?>
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="<?= base_url('admin/management-studenti'); ?>">Vezi studentii</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

       