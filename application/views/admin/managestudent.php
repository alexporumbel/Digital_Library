<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Adauga Student</h1>
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
                <h3 class="card-title">Completeaza Profilul</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form" method="POST" action="<?= @$id ? site_url("admin/managestudent/$id") : site_url('admin/managestudent');?>">
                <div class="card-body">
                    <center><font color="red"><b><?=@$formerror;?></b></font></center>
                  <div class="form-group">
                    <label for="nume">Nume</label>
                    <input type="text" class="form-control" id="nume" name='nume' value="<?= @$studentdata ? $studentdata['name'] : '';?>" placeholder="Popescu">
                  </div>
                   <div class="form-group">
                    <label for="initiala">Intiala Tatalui</label>
                    <input type="text" class="form-control" id="initiala" name='initiala' value="<?= @$studentdata ? $studentdata['fathers_initial'] : '';?>" placeholder="C">
                  </div>
                    <div class="form-group">
                    <label for="prenume">Prenume</label>
                    <input type="text" class="form-control" id="prenume" name='prenume' value="<?= @$studentdata ? $studentdata['lname'] : '';?>" placeholder="Ionel">
                  </div>
                  <div class="form-group">
                        <label for="facultate">Facultate</label>
                        <select name="facultate" class="custom-select facultate">
                          <option value='x' <?= @$studentdata['faculty']==='x' ? 'selected' : '';?>>Facultate x</option>
                          <option value='y' <?= @$studentdata['faculty']==='y' ? 'selected' : '';?>>Facultate y</option>
                          <option value='z' <?= @$studentdata['faculty']==='z' ? 'selected' : '';?>>Facultate z</option>
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="an">An</label>
                        <select name="an" class="custom-select an">
                          <option value='1' <?= @$studentdata['year']==='1' ? 'selected' : '';?>>Anul 1</option>
                          <option value='2' <?= @$studentdata['year']==='2' ? 'selected' : '';?>>Anul 2</option>
                          <option value='3' <?= @$studentdata['year']==='3' ? 'selected' : '';?>>Anul 3</option>
                        </select>
                      </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= @$studentdata ? $studentdata['email'] : '';?>" placeholder="popescu.ionel@yahoo.com">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Parola</label>
                    <input type="password" class="form-control" id="parola" name="parola" placeholder="Parola">
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Trimite email cu datele contului!</label>
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