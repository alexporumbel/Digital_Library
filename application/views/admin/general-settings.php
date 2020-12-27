<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Setari</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6 offset-3">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">General</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form" method="POST" action="<?php echo site_url('admin/generalsettings');?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nume">Nume Site</label>
                    <input type="text" class="form-control" id="numesite" name='library_name' value="<?= @$value['library_name']; ?>" placeholder="Biblioteca Electronica">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" name="submit" class="btn btn-primary" value="Modifica" />
                </div>
              </form>
            </div>
            <!-- /.card -->

           

          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->