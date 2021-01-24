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
              <center><font color="red"><b><?=@$formerror;?></b></font></center>
                    <div class="form-group">
                <label for="inputName">Nume Publicatie</label>
                <input name="publication" type="text" id="publication" value="<?= @$pubdata ? $pubdata['name'] : '';?>" class="form-control">
              </div>
              <div class="form-group">
                  <label>Subiecte</label>
                  <select name="subjects[]" class="select2 subjects" multiple="multiple" data-placeholder="Adauga subiecte" style="width: 100%;">
                  <?php
                  if(count($subjects) > 0){
                  foreach($subjects as $subject){
                      echo "<option value='" . $subject['subject'] ."' selected>" . $subject['subject'] ."</option>";
                  } }
                  if(count($allsubjects) > 0){
                  foreach($allsubjects as $subjectz){
                      echo "<option value='" . $subjectz['subject'] ."' >" . $subjectz['subject'] ."</option>";
                  } }
                  ?>
                      
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
                    <div class="form-group">
                <label for="inputStatus">An (optional)</label>
                <select name="year" class="form-control custom-select">
                  <option selected value="">Nespecificat</option>
                  <option <?= @$pubdata && $pubdata['year'] === 'I' ? 'selected' : '';?>  value="I">Anul I</option>
                  <option <?= @$pubdata && $pubdata['year'] === 'II' ? 'selected' : '';?> value="II">Anul II</option>
                  <option <?= @$pubdata && $pubdata['year'] === 'III' ? 'selected' : '';?> value="III">Anul III</option>
                  <option <?= @$pubdata && $pubdata['year'] === 'IV' ? 'selected' : '';?> value="IV">Anul IV</option>
                  <option <?= @$pubdata && $pubdata['year'] === 'V' ? 'selected' : '';?> value="V">Anul V</option>
                  <option <?= @$pubdata && $pubdata['year'] === 'VI' ? 'selected' : '';?> value="VI">Anul VI</option>
                   
                </select>
              </div>
              <div class="form-group"> 
                <label for="inputName">Autor publicatie</label>
                <input name="author" type="text" id="author" value="<?= @$pubdata ? $pubdata['author'] : '';?>" class="form-control">
              </div>
               <div class="form-group">
                <label for="inputName">Loc de publicare</label>
                <input name="pubplace" type="text" id="pubplace" value="<?= @$pubdata ? $pubdata['pubplace'] : '';?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Editura</label>
                <input name="publisher" type="text" id="publisher" value="<?= @$pubdata ? $pubdata['publisher'] : '';?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">An publicatie</label>
                <input name="pubyear" type="text" id="pubyear" value="<?= @$pubdata ? $pubdata['pubyear'] : '';?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Cota</label>
                <input name="cota" type="text" id="cota" value="<?= @$pubdata ? $pubdata['cota'] : '';?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Domeniu</label>
                <input name="domain" type="text" id="domain" value="<?= @$pubdata ? $pubdata['domain'] : '';?>" class="form-control">
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
                        <input type="file" name="userfile" class="custom-file-input" id="pubFile">
                        <label class="custom-file-label" for="exampleInputFile"><?= @$pubdata['original_file'] ? $pubdata['original_file'] : 'Alege fisier';?></label>
                      </div>
                    </div>
                  </div>
                <div class="form-check">
                    <input type="hidden" name="downloadrights" value="0">
                    <input type="checkbox" <?= @$pubdata && $pubdata['download_rights'] > 0 ? 'checked' : '';?> name="downloadrights" value="1" class="form-check-input" id="downloadrights">
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
          <input type="submit" value="Salveaza" class="btn btn-success float-right">
        </div>
      </div>
        </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->