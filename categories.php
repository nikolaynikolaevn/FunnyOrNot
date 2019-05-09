<?php
$link = basename($_SERVER['PHP_SELF']);
if(isset($_GET['c_id'])) $c_id = $_GET['c_id']; else $c_id = "";
$active = ' class="active" ';
?>
<div class="box">
<div class="box-title box-title-black">Filter by category</div>
<div class="vertical-menu">
<ul>
<li><a <?php if(!$c_id) echo $active ?> href="<?php echo $link ?>" onclick="return loadPage(this.getAttribute('href'));">All categories</a></li>
	<?php
	foreach($pdo->query("SELECT id, name FROM categories") as $row){
		?>
	<li><a href="<?php echo $link ?>?c_id=<?php echo $row['id'] ?>" <?php if ($c_id == $row['id']) echo $active ?>onclick="return loadPage(this.getAttribute('href'));"><?php echo $row['name'] ?></a></li>
	<?php
	}
	?>
</ul>
</div>
</div>