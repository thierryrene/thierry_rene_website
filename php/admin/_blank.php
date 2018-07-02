<?php

include_once('../c.php');

checkLogin();

include_once('template/header.php');

$pageTitle = 'Twitter API';
$pageDesc = 'Twitter API Twitter API Twitter API Twitter API Twitter API';

?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      
    <?php
    
      if (isset($pageTitle)) {
        include 'template/pageHeader.php';
      }
      
    ?>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            
          <!-- =============================================== -->
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          <!-- =============================================== -->
          
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
        
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->

<?php require_once 'template/footer.php'; ?>
