<div class="leftcolumn">
<main>
<section>
<h1>Newest</h1>
<?php
$order = "newest";
include "content-loader.php";
?>
</section>
</main>
</div>
  <div class="rightcolumn">
<aside>
<div class="box">
<div class="box-title">Joke of the Day</div>
<div class="box-content">
<?php
	$row = $loader->getPost('featured');
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
</div>
</div>
<br><br>
<?php include "categories.php"; ?>
</aside>
  </div>