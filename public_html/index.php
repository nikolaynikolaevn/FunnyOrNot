<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Funny or not - You decide!</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
include "header.php";
include "mainmenu.php";
?>

<div id="mainContent" class="row">
</div>
<?php include "footer.php"; ?>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/functions.js"></script>
  <script>
$('body').on('click','#id1',function(){
    $(this).find("span").fadeOut(500, function() {
	$(this).text(parseInt($(this).text(), 10)+1).fadeIn(500);
	$(this).css("color", "#00679c");
    });
	$(this).find("i").css("color", "#00679c");

});
</script>

</body>
</html>
