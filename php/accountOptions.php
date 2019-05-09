<?php
session_start();
require_once 'db_config.php';
include "class/class.user.php";
$User = new User($pdo);
?>
<?php
if(!isset($_SESSION['user_id'])){ ?>
<a href="login.php" onclick="return loadPage(this.getAttribute('href'));" class="button button-blue">Login</a>
<a href="register.php" onclick="return loadPage(this.getAttribute('href'));" class="button button-black">Register</a>
<?php } else { ?>
<a href="myprofile.php" onclick="return loadPage(this.getAttribute('href'));" class="button button-blue">My profile (<?php echo $User->username ?>)</a>
<a href="post.php" onclick="return loadPage(this.getAttribute('href'));" class="button button-green">Post</a>
<a href="logout.php" onclick="return loadPage(this.getAttribute('href'));" class="button button-black">Logout</a>
<?php } ?>