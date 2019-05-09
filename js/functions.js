websiteTitle = "Funny or not - You decide!";
function responsiveMenu() {
    var x = document.getElementById("menu");
    if (x.className === "menu") {
        x.className += " responsive";
    } else {
        x.className = "menu";
    }
}
function validate(F) {
		if(F.name == "registerForm" || F.name == "FPForm" || F.name == "loginForm"){
			if(F.name == "loginForm" || F.name == "registerForm"){
				if(F.name == "loginForm"){
					var usernameOrEmail = F["usernameOrEmail"];
					if (usernameOrEmail.value == "") {
					alert("You must enter a username or email.");
					usernameOrEmail.focus();
					return false;
					}
				}
				var password = F["psw"];
				if (password.value == "") {
					alert("You must enter a password.");
					password.focus();
					return false;
				}
				else if (password.value.length < 6) {
					alert("Your password must be at least 6 symbols long.");
					password.focus();
					return false;
				}
				submitForm(F);
				return false;
				}
			if(F.name == "registerForm" || F.name == "FPForm"){
				var username = F["username"];
				var email = F["email"];
				if (username.value == "") {
					alert("You must enter a username.");
					username.focus();
					return false;
				}
				if (email.value == "") {
					alert("You must enter a email.");
					email.focus();
					return false;
				}
				atpos = email.value.indexOf("@");
				dotpos = email.value.lastIndexOf(".");
					 
				if (atpos < 1 || ( dotpos - atpos < 2 ))
				{
				   alert("Please enter a correct email.")
				   email.focus();
				   return false;
				}
				
				if(F.name == "registerForm"){
					var confirmpsw = F["psw-confirm"];
					var birthdate = F["birthdate"];
					if (confirmpsw.value == "") {
						alert("You must confirm your password.");
						confirmpsw.focus();
						return false;
					}
					if (password.value != confirmpsw.value) {
						alert("The passwords do not match.");
						confirmpsw.focus();
						return false;
					}
					if (birthdate.value == "") {
						alert("You must enter your birthdate.");
						birthdate.focus();
						return false;
					}
					submitForm(F);
					return false;
				}
		}
		}
					if(F.name == "searchForm"){
					var q = F["q"];
					if (q.value == "") {
						alert("You must enter a text to search.");
						q.focus();
						return false;
					}
					else {
						loadPage(F.getAttribute('action'), '?q=' + document.getElementsByName('q')[0].value);
						return false;
					}
			}
}
function submitForm(F){
	var file = window.location.hash.replace("#", "").split("?")[0] + ".php";
		$.ajax({
		type: 'post',
		url: '../php/' + file,
		data: $(F).serialize(),
		success: function(data) {
			if(F.name == 'loginForm'){
				if (data == "success")
					return loadPage('home.php');
				else if (data == "incorrect_combination")
					alert("The combination of username/email and password is invalid.");
				else
					alert("An error occurred while logging in.");
				}

			if(F.name == 'registerForm'){
				if (data == "success")
					return loadPage('login.php');
				else if (data == "taken")
					alert("This username or email is already taken.");
				else if (data == "email_incorrect_format")
					alert("Email is in incorrect format.");
				else
					alert("Unsuccessful registration");
			}
			
			if(F.name == 'submitPost'){
				if (data == "success")
					return loadPage('home.php');
				else
					alert("There is a problem with posting. Please try again later.");
			}
		}
		});
}
function getAjaxReponse(queryUrl){
		$.ajax({
		type: 'get',
		url: queryUrl,
		success: function(data) {
		return data;
		}
		});
}
function loadPage(url){
	var fileName = url.split("?")[0];
	var query = "?" + url.split("?")[1];
	if (query == '?undefined') query = '';
	var activePage = document.getElementById("menu").getElementsByClassName("active")[0];
	if(typeof activePage !== 'undefined'){
	activePage.className = '';
	}
	if(fileName == "home.php"){
		document.title = websiteTitle;
		document.getElementById("menu").getElementsByTagName('a')[0].className = 'active';
	}
	else if (fileName == "popular.php"){
		document.title = "Most Popular - " + websiteTitle;
		document.getElementById("menu").getElementsByTagName('a')[1].className = 'active';
	}
	else if (fileName == "liked.php"){
		document.title = "Most Liked - " + websiteTitle;
		document.getElementById("menu").getElementsByTagName('a')[2].className = 'active';
	}
	else if (fileName == "recent.php"){
		document.title = "Most Recent - " + websiteTitle;
		document.getElementById("menu").getElementsByTagName('a')[3].className = 'active';
	}
	else if (fileName == "random.php"){
		document.title = "Most Random - " + websiteTitle;
		document.getElementById("menu").getElementsByTagName('a')[4].className = 'active';
	}
	else if (fileName == "login.php"){
		document.title = "Login - " + websiteTitle;
	}
	else if (fileName == "register.php"){
		document.title = "Register - " + websiteTitle;
	}
	else if (fileName == "forgotten-password.php"){
		document.title = "Forgotten password - " + websiteTitle;
	}
	else if (fileName == "about.php"){
		document.title = "About Us - " + websiteTitle;
	}
	else if (fileName == "contact.php"){
		document.title = "Contact Us - " + websiteTitle;
	}
	else if (fileName == "category.php"){
		document.title = "Category name - " + websiteTitle;
	}
	else if (fileName == "search.php"){
		document.title = "Search - " + websiteTitle;
	}
	else if (fileName == "view.php"){
		document.title = "View joke - " + websiteTitle;
	}
	else if (fileName == "post.php"){
		document.title = "Post a joke - " + websiteTitle;
	}
	else if (fileName == "myprofile.php"){
		document.title = "My profile - " + websiteTitle;
	}
	else if (fileName == "logout.php"){
		document.title = "Logging out - " + websiteTitle;
	}
	else{
		return;
	}
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			document.getElementById("mainContent").innerHTML = this.responseText;
			$.ajax({
			type: 'post',
			url: '../php/accountOptions.php',
			success: function(response) {
			document.getElementById("accountOptions").innerHTML = response;
			}});
		}
	};
	xhttp.open("GET", url, true);
	xhttp.send();
	window.history.pushState('','','/index.php#' + fileName.replace(".php", "") + query);
	return false;
}
function getUrl(){
	var url = window.location.hash.replace("#", "").split("?")[0];
	var query = "?" + window.location.hash.split("?")[1];
	if (query == '?undefined') query = '';
	if (url == "")
		url = "home.php";
	else
		url = url + ".php" + query;
	return url;
}
$(window).on('hashchange', function() {
  loadPage(getUrl());
});

(function() {
	var url = getUrl();
	this.loadPage(url);
	if(url == "")
		window.history.pushState('','','/index.php#home');
})();