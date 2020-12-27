<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Adauga Categorie</h1>
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
                <h3 class="card-title">Categorie</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form" method="POST" action="<?= @$id ? site_url("admin/managecategory/$id") : site_url('admin/managecategory');?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="categorie">Categorie</label>
                    <input type="text" class="form-control" id="categorie" name='categorie' value="<?= @$categorydata ? $categorydata['category'] : '';?>" placeholder="Categorie">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Adauga</button>
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