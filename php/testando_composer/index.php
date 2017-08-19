<?php 

require_once ('vendor/autoload.php');

    // create a new instance of the class
    $image = new Zebra_Image();
    
    $brands = array(
      "ASOS",
      "OQvestir",
      "amaro",
      "khelf",
      "schutz"
    );
    
    $imagem = 'https://www.taquilla.com.br/media/catalog/product/cache/1/image/c6bd10b0c7246086968f45a2a4eedff0/t/a/taquilla-sandalia--69.jpg';
    
    $dimensions = getimagesize($imagem);
    
    $w = $dimensions[0];
    $h = $dimensions[1];
    
    $ratios = [
      'small' => 500/$w,
    //   'large' => 1000/$w
    ];
    
    $resource = imagecreatefromstring( file_get_contents( $imagem ) );
    
    foreach ( $ratios as $name => $ratio ) {
    
      $w2 = $w * $ratio;
      $h2 = round($h * $ratio);
    
      $output = imagecreatetruecolor($w2, $h2);
    
      if ( ! file_exists( "img/{$brands[1]}" ) ) {
        mkdir( "img/{$brands[1]}", 0777, true );
      }
      
      $img = "img/{$brands[1]}/{$brands[0]}_steal_the_look_pictures_{$name}.jpg";
      
      imagecopyresampled($output, $resource, 0, 0, 0, 0, $w2, $h2, $w, $h);
						
	  imagejpeg($output, $img, 100);
	  
	  imagedestroy($output);
	  
	  $image->source_path = $img;
      
      $image->target_path = $img;
      
      $image->jpeg_quality = 100;
      
      $image->preserve_aspect_ratio = true;
      $image->enlarge_smaller_images = true;
      $image->preserve_time = true;
      $image->apply_filter('smooth', 30);
      $image->sharpen_images = true;
      
      $image->resize(200, 200, ZEBRA_IMAGE_BOXED, '#FFF');
      
      echo "<img src='{$imagem}'>";
      echo "<img src='img/{$brands[1]}/{$brands[0]}_steal_the_look_pictures_{$name}.jpg'>";
	  
    }
    
      

        
        
        
        // // indicate a source image (a GIF, PNG or JPEG file)
        // $image->source_path = $resource;
        
        // // var_dump($image);
    
        // // indicate a target image
        // // note that there's no extra property to set in order to specify the target 
        // // image's type -simply by writing '.jpg' as extension will instruct the script 
        // // to create a 'jpg' file
        // $image->target_path = 'img/img_link.jpg';
        
        // // var_dump($image);
    
        // // since in this example we're going to have a jpeg file, let's set the output 
        // // image's quality
        // $image->jpeg_quality = 100;
    
        // // some additional properties that can be set
        // // read about them in the documentation
        // $image->preserve_aspect_ratio = true;
        // $image->enlarge_smaller_images = true;
        // $image->preserve_time = true;
    
        // // resize the image to exactly 100x100 pixels by using the "crop from center" method
        // // (read more in the overview section or in the documentation)
        // //  and if there is an error, check what the error is about
        // if (!$image->resize(200, 200, ZEBRA_IMAGE_BOXED, '#FFF')) {
    
        //     // if there was an error, let's see what the error is about
        //     switch ($image->error) {
    
        //         case 1:
        //             echo 'Source file could not be found!';
        //             break;
        //         case 2:
        //             echo 'Source file is not readable!';
        //             break;
        //         case 3:
        //             echo 'Could not write target file!';
        //             break;
        //         case 4:
        //             echo 'Unsupported source file format!';
        //             break;
        //         case 5:
        //             echo 'Unsupported target file format!';
        //             break;
        //         case 6:
        //             echo 'GD library version does not support target file format!';
        //             break;
        //         case 7:
        //             echo 'GD library is not installed!';
        //             break;
    
        //     }
    
        // // if no errors
        // } else {
    
        //     echo 'Success!';
    
        // }
    
// echo "<img src='{$imagem}'>";