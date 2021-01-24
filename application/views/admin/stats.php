<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Statistici saptamana curenta</h1> 
          </div><!-- /.col -->
          <div class="col-sm-6">
            <div class="breadcrumb float-sm-right">
             <button type="button" class="btn btn-default float-right" id="daterange-btn">
                      <i class="far fa-calendar-alt"></i> Selecteaza interval
                      <i class="fas fa-caret-down"></i>
                    </button>
            </div>
          </div>
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
                <span class="info-box-text">Accesari</span>
                <span class="info-box-number">2</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-8 offset-2">
                <!-- USERS LIST -->
                 <div class="card">
              <div class="card-header">
                <h3 class="card-title">Top Vizualizari</h3>

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
                <table id="topviews" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Publicatie</th>
                  <th>Total vizualizari</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($topviews as $view){
                echo "<tr>";
                echo "<td>" . $view['name'] . "</td>";
                echo "<td>" . $view['total'] . "</td>";
                
                echo "</tr>";
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Publicatie</th>
                  <th>Total vizualizari</th>
                </tr>
                </tfoot>
              </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="<?= base_url('admin/descarca'); ?>">Exporta</a>
              </div>
              <!-- /.card-footer -->
            </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
              
                          <div class="col-md-8 offset-2">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Top favorite</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table id="topfavs" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Publicatie</th>
                  <th>Total favorite</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($favorites as $view){
                echo "<tr>";
                echo "<td>" . $view['name'] . "</td>";
                echo "<td>" . $view['total'] . "</td>";
                
                echo "</tr>";
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Publicatie</th>
                  <th>Total favorite</th>
                </tr>
                </tfoot>
              </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="<?= base_url('admin/descarca'); ?>">Exporta</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
              
              <div class="col-md-8 offset-2">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Top descarcari</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table id="topdownloads" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Publicatie</th>
                  <th>Total descarcari</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($topdownloads as $view){
                echo "<tr>";
                echo "<td>" . $view['name'] . "</td>";
                echo "<td>" . $view['total'] . "</td>";
                
                echo "</tr>";
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Publicatie</th>
                  <th>Total descarcari</th>
                </tr>
                </tfoot>
              </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="<?= base_url('admin/descarca'); ?>">Exporta</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
              
              <div class="col-md-8 offset-2">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Top timp petrecut</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table id="toptime" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Student</th>
                  <th>Total petrecut</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($spenttime as $view){
                echo "<tr>";
                echo "<td>" . $view['name'] .' '. $view['fathers_initial']. '. '.$view['lname'] ."</td>";
                echo "<td>" . $view['total'] . "</td>";
                
                echo "</tr>";
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Student</th>
                  <th>Total petrecut</th>
                </tr>
                </tfoot>
              </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="<?= base_url('admin/descarca'); ?>">Exporta</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
              
            </div>
            <!-- /.row -->

       