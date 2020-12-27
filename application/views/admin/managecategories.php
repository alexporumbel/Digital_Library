<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Management Categorii</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Lista Categorii</h3> <a href="<?= base_url('admin/adauga-categorie'); ?>" class="btn btn-info float-right"><i class="fas fa-plus"></i> Adauga categorie</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="studs" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Categorie</th>
                  <th>Total publicatii</th>
                  <th>Management</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($categories as $category){
                echo "<tr>";
                echo "<td>" . $category['category'] . "</td>";
                echo "<td>0</td>";
                echo '<td><div class="tools">
                      <a title="Modificare categorie" href="modifica-categorie/' . $category['id'] .'"><i class="fas fa-edit"></i></a>
                    </div></td>';
                
                echo "</tr>";
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Categorie</th>
                  <th>Total publicatii</th>
                  <th>Management</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->