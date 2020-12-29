<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Management Discipline</h1>
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
              <h3 class="card-title">Lista Discipline</h3> <a href="<?= base_url('admin/adauga-disciplina'); ?>" class="btn btn-info float-right"><i class="fas fa-plus"></i> Adauga disciplina</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="studs" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Disciplina</th>
                  <th>Total publicatii</th>
                  <th>Management</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($disciplines as $discipline){
                echo "<tr>";
                echo "<td>" . $discipline['discipline'] . "</td>";
                echo "<td>" . $discipline['disccount'] . "</td>";
                echo '<td><div class="tools">
                      <a title="Modifica disciplina" href="modifica-disciplina/' . $discipline['id'] .'"><i class="fas fa-edit"></i></a>
                    </div></td>';
                
                echo "</tr>";
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Disciplina</th>
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