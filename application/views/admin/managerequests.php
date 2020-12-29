<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Solicitari Publicatii</h1>
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
              <h3 class="card-title">Lista Solicitari</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="studs" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Student</th>
                  <th>Subiect</th>
                  <th>Mesaj</th>
                  <th>Stare solicitare</th>
                  <th>Management</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($requests as $request){ 
                echo "<tr>";
                echo "<td>" . $request['name'] .' ' . $request['fathers_initial'] . '. ' . $request['lname']. "</td>";
                echo "<td>" . $request['subject'] . "</td>";
                echo "<td>" . $request['message'] . "</td>";
                echo "<td>" . $request['message'] . "</td>";
                echo '<td><div class="tools">
                      <a title="Vezi solicitare" href="solicitare/' . $request['id'] .'"><i class="fas fa-eye"></i></a>
                    </div></td>';
                
                echo "</tr>";
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                   <th>Student</th>
                  <th>Subiect</th>
                  <th>Mesaj</th>
                  <th>Stare solicitare</th>
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