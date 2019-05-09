<div class="leftcolumn">
<main>
<section>
<form name="registerForm" id="registerForm" onsubmit="return validate(this)" style="border:1px solid #ccc;margin-top: 20px;">
  <div class="logincontainer">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
	
	<label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="username">

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter email" name="email">

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter password" name="psw">

    <label for="psw-confirm"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm password" name="psw-confirm">
	
	<label for="birthdate"><b>Birthdate</b></label><br>
	<input type="date" placeholder="Enter birthdate" name="birthdate"><br>
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <a href="/"><button type="button" class="cancelbtn">Cancel</button></a>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>
</section>
</main>
</div>