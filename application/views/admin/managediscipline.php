<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Adauga Disciplina</h1>
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
                <h3 class="card-title">Disciplina</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form" method="POST" action="<?= @$id ? site_url("admin/managediscipline/$id") : site_url('admin/managediscipline');?>">
                <div class="card-body">
                    <center><font color="red"><b><?=@$formerror;?></b></font></center>
                  <div class="form-group">
                    <label for="disciplina">Disciplina</label>
                    <input type="text" class="form-control" id="disciplina" name='disciplina' value="<?= @$disciplinedata ? $disciplinedata['discipline'] : '';?>" placeholder="Disciplina">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Salveaza</button>
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