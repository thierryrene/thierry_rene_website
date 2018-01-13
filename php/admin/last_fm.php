<?php

include_once('../c.php');

include_once('../functions.php');

checkLogin();

include_once('template/header.php');

$pageTitle = 'Last FM API';
$pageDesc = 'lastfm api widget configuration';

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
      
      <div class="row">
        <div class="col-md-2">
          
          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">Last FM Configuration</h3>
            </div>
            
            <div class="box-body">
              
            </div>
          
          </div>
        
        </div>
      </div>
      
      <!-- Default box -->
      <div class="box">
        
        <div class="box-header with-border">
          <h3 class="box-title">Last FM Status</h3>
        </div>
        
        <div class="box-body">
          <br>
<<<<<<< HEAD
          <a class="btn btn-app" id="click-lastfm-config">
                <span class="badge bg-red">OFF</span>
                  <i class="fa fa-power-off"></i>turn on
=======
          
          <a class="btn btn-app" id="click-lastfm-config" href="lastfm-config.php?status=<?php echo $lastFmStatus['status'] ?>">
                <span class="badge <?php echo $lastFmStatus['status'] != 1 ? 'bg-red' : 'bg-green'  ?>"> <?php echo $lastFmStatus['status'] != 1 ? 'OFF' : 'ON'  ?></span>
                  <i class="fa fa-power-off"></i>turn <?php echo $lastFmStatus['status'] != 1 ? 'on' : 'off'  ?>
>>>>>>> lastfm
                </a>
          <hr>  
          <!-- =============================================== -->
          
          <?php
          
            $songs = getLastFmSongs($_GET['limit'] ? $_GET['limit'] : 10);
            
            // r($songs);
            
          ?>
              <table id="last-fm-table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Album</th>
                  <th>Artist</th>
                  <th>Song</th>
                </tr>
                </thead>
                  <tbody>
                    <?php foreach ($songs as $song) : ?>
                      <tr>
                        <td><img src="<?php echo $song['image'][0]['#text']; ?>"></td>
                        <td><?php echo $song['artist']['#text']; ?></td>
                        <td><?php echo $song['name']; ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                <tfoot>
                <tr>
                  <th>Album</th>
                  <th>Artist</th>
                  <th>Song</th>
                </tr>
                </tfoot>
              </table>
          
          <!-- =============================================== -->
        </div>  
        <!-- /.box-body -->
        
        <div class="box-footer"></div>
        <!-- /.box-footer-->
        
      </div>
      <!-- /.box -->
      
        
    </section>
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->

<?php require_once 'template/footer.php'; ?>