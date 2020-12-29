
<section class="cta-section text-center py-5 theme-bg-dark position-relative" style="margin-top: 50px;">
    <div class="theme-bg-shapes-right"></div>
    <div class="theme-bg-shapes-left"></div>
    <div class="container">
        <h3 class="mb-2 text-white mb-3">Solicita asistenta</h3>
        <div class="section-intro text-white mb-3 single-col-max mx-auto">Ai nevoie de o publicatie care nu se regaseste in depozitul digital?</br> Trimite o solicitare de suport catre biblioteca, te ajutam in cel mai scurt timp!</div>
        <div class="pt-3 text-center">
            <a class="btn btn-light" data-toggle="modal" data-target="#exampleModal">Trimite Solicitare<i class="fas fa-arrow-alt-circle-right ml-2"></i></a>
        </div>
    </div>
</section><!--//cta-section-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Solicita suport</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Subiect:</label>
            <input type="text" name="subiect" class="form-control" id="subiect">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Mesaj:</label>
            <textarea class="form-control" name="mesaj" id="message-text" placeholder="Te rugam specifica numarul paginilor pe care le doresti scanate."></textarea>
          <span class="form-text text-muted">Te putem ajuta cu scanarea a maxim 10 pagini pe solicitare!</span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary sendquery">Trimite solicitare</button>
      </div>
    </div>
  </div>
</div> 
<footer class="footer">

	    <div class="footer-bottom text-center py-5">
		    
		    
	        <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                <small class="copyright">Powered by <a href="https://github.com/MartMbithi/Digital_Library" target="_blank">Digital Library Open Source</a> Designed by <a class="theme-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> </small>
            
	        
	    </div>
	    
    </footer>
       
    <!-- Javascript -->          
    <script src="<?= base_url('assets/student/plugins/jquery-3.4.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/student/plugins/popper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/student/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> 
    <script src="<?= base_url('assets/student/js/custom.js'); ?>"></script>  

</body>
</html> 