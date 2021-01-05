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
                    <label for="library_name">Nume Site</label>
                    <input type="text" class="form-control" id="library_name" name='library_name' value="<?= @$value['library_name']; ?>" placeholder="Biblioteca Electronica">
                  </div>
                    <div class="form-group">
                    <label for="mail_server">Server Mail</label>
                    <input type="text" class="form-control" id="mail_server" name='mail_server' value="<?= @$value['mail_server']; ?>" placeholder="">
                  </div>
                    <div class="form-group">
                    <label for="mail_port">Port Server Mail</label>
                    <input type="text" class="form-control" id="mail_port" name='mail_port' value="<?= @$value['mail_port']; ?>" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="mail_address">Adresa Email</label>
                    <input type="text" class="form-control" id="mail_address" name='mail_address' value="<?= @$value['mail_address']; ?>" placeholder="">
                  </div>
                    <div class="form-group">
                    <label for="mail_password">Parola email</label>
                    <input type="password" class="form-control" id="mail_password" name='mail_password' value="<?= @$value['mail_password']; ?>" placeholder="">
                  </div>
                    <div class="form-group">
                    <label for="mail_name">Nume Expeditor</label>
                    <input type="text" class="form-control" id="mail_name" name='mail_name' value="<?= @$value['mail_name']; ?>" placeholder="">
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