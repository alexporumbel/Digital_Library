<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Staff</h1>
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
              <h3 class="card-title">Lista Conturi Staff</h3> <a href="<?= base_url('admin/adauga-staff'); ?>" class="btn btn-info float-right"><i class="fas fa-plus"></i> Adauga staff</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="studs" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nume</th>
                  <th>Email</th>
                  <th>Status Cont</th>
                  <th>Management</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($accounts as $account){
                    
                if($account['account_status'] > 0){
                    $status = 'checked';
                }else{
                    $status = '';
                }
                echo "<tr>";
                echo "<td>" . $account['name'] ."</td>";
                echo "<td>" . $account['email'] ."</td>";
                echo '<td><input type="checkbox" class="my-checkbox" '. $status .' data-bootstrap-switch data-id="' .$account['id']. '" data-off-color="danger" data-off-text="Inactiv" data-on-text="Activ" data-on-color="success"></td>';
                echo '<td><div class="tools">
                      <a title="Modifica profil" href="modifica-staff/' . $account['id'] .'"><i class="fas fa-edit"></i></a>
                    </div></td>';
                
                echo "</tr>";
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nume</th>
                  <th>Email</th>
                  <th>Status Cont</th>
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