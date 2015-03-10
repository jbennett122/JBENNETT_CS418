<?php
  //This logic would be in another file, included here for demo
  if($_GET){
    if($_GET['action'] == "showSrc"){
      show_source(__FILE__);
      die();
    }

    //simulates writing to database store
    $fileName = "db.txt";
    $currentValue = intval(file_get_contents($fileName),10);

    if($_GET['action'] == "increment"){
      $currentValue++;
    }elseif($_GET['action'] == "decrement") {
      $currentValue--;
    }elseif($_GET['action'] == "get"){

    }
    file_put_contents($fileName, $currentValue);
    echo $currentValue;
    die();
  }

?>
<!DOCTYPE html>
<html>
<head>
  <script src="jquery-1.11.2.min.js"></script>
  <style type="text/css">
    iframe {display: block; clear: both; width: 100%; border: 0; height: 5000px;}
  </style>
<script>

/*global $:false */
function asynchronouslyUpdate(change){
  $.ajax({
      url: "changeThatValue.php",
      data: {action: change},
      success: function(response){
        $("#myText").html(response);
      },
      error: function(err) {
        console.log("Error");
        console.log(err);
      }
  });
}

function showSource(){
    $("#source").show();
}

$(document).ready(function(){
  $("#id").ready(function(){asynchronouslyUpdate("get");});
  $("#source").hide();
  $("#showSource").click(showSource);
});

</script>
</head>
<body>
<p id="myText">Still working</p>
<button onclick="asynchronouslyUpdate('increment');">+</button>
<button onclick="asynchronouslyUpdate('decrement');">-</button>
<br />
<button id="showSource">Show Source</button>
<a href="db.txt" target="_blank">See "database" file</a>
<iframe id="source" src="changeThatValue.php?action=showSrc"></iframe>
</body>
</html>