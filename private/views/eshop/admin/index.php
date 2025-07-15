<?php $this->view('admin/header',$data); ?>
      
  <?php $this->view('admin/sidebar',$data); ?>    
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i><?=$data['user_data']->name?></h3>
          	<div class="row mt">

          	</div>
			
		</section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->

      <?php $this->view('admin/footer',$data); ?>