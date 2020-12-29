<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Management Publicatii</h1>
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
              <h3 class="card-title">Lista Publicatii</h3> <a href="<?= base_url('admin/adauga-publicatie'); ?>" class="btn btn-info float-right"><i class="fas fa-plus"></i> Adauga publicatie</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="studs" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Titlu</th>
                  <th>Categorie</th>
                  <th>Disciplina</th>
                  <th>Subiecte</th>
                  <th>Management</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($publications as $publication){
                echo "<tr>";
                echo "<td>" . $publication['name'] . "</td>";
                echo "<td>" . $publication['category'] . "</td>";
                echo "<td>" . $publication['discipline'] . "</td>";
                echo "<td>" . $publication['subjects'] . "</td>";
                echo '<td><div class="tools">
                      <a title="Modifica publicatie" href="modifica-publicatie/' . $publication['id'] .'"><i class="fas fa-edit"></i></a>
                      <a title="Sterge publicatie" href="sterge-publicatie/' . $publication['id'] .'"><i class="fas fa-trash-alt"></i></a>
                    </div></td>';
                
                echo "</tr>";
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Titlu</th>
                  <th>Categorie</th>
                  <th>Disciplina</th>
                  <th>Subiecte</th>
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