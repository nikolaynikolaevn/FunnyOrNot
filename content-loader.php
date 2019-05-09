<?php
require_once 'php/db_config.php';
require_once 'php/class/class.contentLoader.php';
$loader = new contentLoader($pdo);
if(isset($_GET['c_id'])){
	$category = $_GET['c_id'];
}
else {
	$category = "";
}
if(basename($_SERVER['PHP_SELF']) != "view.php"){
$result = $loader->loadContentFromCategory($category, $order);
foreach($result as $row){
?>
<article>
<div class="content">
<a href="view.php?id=<?php echo $row['id'] ?>" onclick="return loadPage(this.getAttribute('href'));">
<?php echo $row['content'] ?>
</a>
</div>
<div class="rating">
<a href="#" id="id1"><i class="fa fa-thumbs-o-up fa_custom fa-2x" title="Funny"></i><span class="vote-count"><?php echo $row['yes'] ?></span></a>
<a href="#"><i class="fa fa-thumbs-o-down fa_custom fa-2x" title="Not funny"></i><span class="vote-count"><?php echo $row['no'] ?></span></a>
</div>
</article>
<?php
}
}
else {
	$row = $loader->getPost($_GET['id']);
?>
<article>
<div class="content">
<a href="view.php?id=<?php echo $row['id'] ?>" onclick="return loadPage(this.getAttribute('href'));">
<?php echo $row['content'] ?>
</a>
</div>
<div class="rating">
<a href="#" id="id1"><i class="fa fa-thumbs-o-up fa_custom fa-2x" title="Funny"></i><span class="vote-count"><?php echo $row['yes'] ?></span></a>
<a href="#"><i class="fa fa-thumbs-o-down fa_custom fa-2x" title="Not funny"></i><span class="vote-count"><?php echo $row['no'] ?></span></a>
</div>
</article>
<?php } ?>