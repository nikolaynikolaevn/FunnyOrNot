<?php
session_start();
if(!isset($_SESSION['user_id'])){
	die("<br>You have to login.");
}
require_once 'php/db_config.php';
?>
<div class="leftcolumn">
<main>
<section>
<form name="submitPost" id="submitPost" onsubmit="return submitForm(this)" style="border:1px solid #ccc;margin-top: 30px;">
  <div class="logincontainer">
    <h1>Post a joke</h1>
    <hr>

	<label for="content"><b>Content</b></label>
	<textarea name="content" rows="5" cols="50" placeholder="Enter content" required></textarea>
	<label for="category"><b>Category</b></label>
	<div id="categories" style="margin-top: 10px;">
	<select name="category">
	<?php
	foreach($pdo->query("SELECT id, name FROM categories") as $row){
		?>
	<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
	<?php
	}
	?>
	</select>
	</div>
    <div class="clearfix">
      <button type="submit" name="submit" class="signupbtn" style="width:100%">Submit</button>
    </div>
  </div>
</form>
</section>
</main>
</div>