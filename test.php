<?php

// $data_hoje = date('d-m-Y');

// $data_inicio = '22/02/2018';

// $data_fim = '28/08/2018';

// if ( ($data_inicio <= $data_hoje) && ($data_hoje <= $data_fim) ) {
//   echo "ta dentro do tempo";
// } else {
//   echo "fora do range";
// }

// die();

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
</head>
<body>
  
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script>
  
  // https://api.instagram.com/v1/users/self/media/recent/?access_token=30604045.bf289e2.1ea23109549e464d83d4c41eef6df6c1


  
 $(function() {
   
  // var $photos = $('#photos');
   
  // $.ajax({
  //   type: 'GET',
  //   url: 'https://api.instagram.com/v1/users/self/media/recent/?access_token=30604045.bf289e2.1ea23109549e464d83d4c41eef6df6c1',
  //   success: function(items) {
  //     var data = items.data;
  //     console.log(data);
  //     $.each(data, function(i, item) {
  //         $photos.append('<img src="' + item.images.standard_resolution.url + '"/>'); 
  //     });
  //   },
  //   error: function(err) {
  //     console.log(err + 'erro');
  //   }
  // });
  
  // this is the id of the form
  $("#email-form").submit(function(e) {
  
      var url = "/php/mailchimp_post.php"; // the script where you handle the form input.
      
      var email = $("input#email").val();
      var fname = $("input#fname").val();
      
      console.log(email + ' - ' + fname);
      
      $.ajax({
            type: "POST",
            url: url,
            data: {
               'email': email,
               'fname': fname
             },
             dataType: 'jsonp',
              contentType: 'application/json; charset=utf-8',
              error: function(res, text){
                  console.log('Err', res);
                  $('#email-container').append('<p>' + res.responseText + '</p>');
              },
              success: function(res){
                  console.log('Success', res);
                  $('#email-container').append('<p>foi porra</p>');
              }
            
           });
  
      e.preventDefault(); // avoid to execute the actual submit of the form.
  });
   
 });

</script> 


<hr>

<div id="email-container">
  
  <form id="email-form"> 
    <input type="text" placeholder="fname" id="fname" value="" name="fname"/>
    <input type="text" placeholder="email" id="email" value="" name="email" />
    <button type="submit">vai</button>
  </form>
    
  
</div>



</body>

</html>