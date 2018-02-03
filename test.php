<?php

require_once 'php/c.php';
require_once 'php/functions.php';

function getJson() {

            global $pdo;

            $status = $pdo->prepare("SELECT * FROM access_log limit 10");

            if ($status->execute()) {
                $result = $status->fetchAll(PDO::FETCH_ASSOC);
                // json_encode($result);
                return $result;
            } else {
                return "erro";
            }
    }

$a = getJson();

echo "<pre>";
var_dump(json_encode($a, JSON_FORCE_OBJECT));

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery.getJSON demo</title>
  <style>
  img {
    height: 100px;
    float: left;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>

<div id="text" ></div>

<script>
(function() {
  var flickerAPI = "<?php echo json_encode($a); ?>";
  $.getJSON( flickerAPI, {
    tags: "id",
    format: "json"
  })
    .done(function( data ) {
      $.each( data.items, function( i, item ) {
        $( "<p>" ).appendTo( "#text" );
      });
    });
})();
</script>

</body>
</html>