<?php

include_once('../c.php');

checkLogin();

require_once '../../php/libs/TwitterAPIExchange.php';

$pageTitle = 'Twitter API';
$pageDesc = 'Twitter API Twitter API Twitter API Twitter API Twitter API';

include_once('template/header.php');

$pageDefaultInfo = getTableContents('seo_content', 'where id = 1');

$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '';
$requestMethod = 'GET';

$twitterData = json_decode(getTwitterApiData($url, $getfield, $requestMethod), true);

?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      
    <?php if (isset($pageTitle)) include 'template/pageHeader.php'; ?>

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
          
          
          <table id="twitter-api-table" class="table table-bordered text-center table-hover">
                <thead>
                <tr>
                  <th>image</th>
                  <th>id</th>
                  <th>twitte</th>
                </tr>
                </thead>
                  <tbody>
                      <?php foreach ($twitterData as $data) : ?>
                        <tr>
                          <td><a href="<?php echo $data['user']['url']; ?>">
                            <img src="<?php echo $data['user']['profile_image_url']; ?>">
                            </a>
                          </td>
                          <td><?php echo $data['id']; ?></td>
                          <td><?php echo $data['text']; ?></td>
                        </tr>
                      <?php endforeach; ?>  
                  </tbody>
                <tfoot>
                <tr>
                  <th>image</th>
                  <th>id</th>
                  <th>twitte</th>
                </tr>
                </tfoot>
              </table>
          
          
          
          
          
          
          
          
          
          
          
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