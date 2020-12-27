 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Adauga Publicatie</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
                <form class="form" method="POST" enctype="multipart/form-data" action="<?= @$id ? site_url("admin/managepublication/$id") : site_url('admin/managepublication');?>">
              <div class="form-group">
                <label for="inputName">Nume Publicatie</label>
                <input name="publication" type="text" id="publication" value="<?= @$pubdata ? $pubdata['name'] : '';?>" class="form-control">
              </div>
              <div class="form-group">
                  <label>Subiecte</label>
                  <select name="subjects[]" class="select2 subjects" multiple="multiple" data-placeholder="Adauga subiecte" style="width: 100%;">
                  <?php $subjects = explode(',', $pubdata['subjects']);
                  foreach($subjects as $subject){
                      echo "<option value='$subject' selected>$subject</option>";
                  }?>
                  </select>
                </div>
              <div class="form-group">
                <label for="inputStatus">Categorie Publicatie</label>
                <select name="category" class="form-control custom-select">
                  <option selected disabled>Selecteaza</option>
                  <?php foreach($categories as $category){
                      if($category['id']===$pubdata['catid']){
                  echo "<option selected value=". $category['id'] .">". $category['category'] ."</option>";
                      }else{
                  echo "<option value=". $category['id'] .">". $category['category'] ."</option>";        
                      }
                  }?>
                </select>
              </div>
                <div class="form-group">
                <label for="inputStatus">Disciplina Publicatie</label>
                <select name="discipline" class="form-control custom-select">
                  <option selected disabled>Selecteaza</option>
                   <?php foreach($disciplines as $discipline){
                       if($discipline['id']===$pubdata['discid']){
                  echo "<option selected value=". $discipline['id'] .">". $discipline['discipline'] ."</option>";
                      }else{
                  echo "<option value=". $discipline['id'] .">". $discipline['discipline'] ."</option>";        
                      }
                  
                  }?>
                </select>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Fisier</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                    <label for="exampleInputFile">Incarca Publicatia</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="userfile" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Alege fisier</label>
                      </div>
                    </div>
                  </div>
                <div class="form-check">
                    <input type="checkbox" name="downloadrights" class="form-check-input" id="downloadrights">
                    <label class="form-check-label" for="exampleCheck1">Permite descarcarea publicatiei</label>
                  </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" value="Creeaza" class="btn btn-success float-right">
        </div>
      </div>
        </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->