<?php
session_start();
if(isset($_SESSION['user_id'])){
	die("<br>You have already logged in.");
}
?>
<div class="leftcolumn">
<main>
<section>
<form name="loginForm" id="loginForm" onsubmit="return validate(this)" style="border:1px solid #ccc;margin-top: 30px;">
  <div class="logincontainer">
    <h1>Login</h1>
    <hr>

    <label for="usernameOrEmail"><b>Username / Email</b></label>
    <input type="text" placeholder="Enter username or email" name="usernameOrEmail">

    <label for="psw"><b>Password</b></label>
	<a href="/index.php#forgotten-password" onclick="loadPage('forgotten-password.php')" style="float:right;">Forgotten password?</a>
    <input type="password" placeholder="Enter Password" name="psw">
    
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>

    <div class="clearfix">
      <button type="submit" name="login" class="signupbtn" style="width:100%">Login</button>
    </div>
  </div>
</form>
</section>
</main>
</div>