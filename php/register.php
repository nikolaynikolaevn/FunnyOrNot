<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
require_once 'db_config.php';
    if(empty(trim($_POST["username"]))){
        die("Please enter a username.");
    }
	elseif(empty(trim($_POST["email"]))){
        die("Please enter an email.");
    }
	else{
		try {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = :username OR email = :email";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
			$stmt->bindParam(':email', $param_email, PDO::PARAM_STR);
            // Set parameters
            $param_username = trim($_POST["username"]);
			$param_email = trim($_POST["email"]);
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    die("taken");
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
               die("Oops! Something went wrong. Please try again later.");
            }
        }
		} catch(PDOException $e){
		die("ERROR: " . $e->getMessage());
		}
        unset($stmt);
    }
    // Validate password
    if(empty(trim($_POST['psw']))){
        die("Please enter a password.");
    } elseif(strlen(trim($_POST['psw'])) < 6){
        die("Password must have at least 6 characters.");
    } else{
        $password = trim($_POST['psw']);
    }
    // Validate password confirmation
    if(empty(trim($_POST["psw-confirm"]))){
        die("Please confirm password.");
    } else {
        $confirm_password = trim($_POST['psw-confirm']);
        if($password != $confirm_password){
            die("Password did not match.");
        }
    }
	// Validate email
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		die("email_incorrect_format");
	}
	else {
		$email = trim($_POST['email']);
	}
	// Validate birthdate
	if(empty(trim($_POST['birthdate']))){
		die("Please enter a birthdate.");
	}
	else {
		$birthdate = trim($_POST['birthdate']);
	}
    // Check input errors before inserting in database
		try {
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, email, birthdate) VALUES (:username, :password, :email, :birthdate)";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $param_password, PDO::PARAM_STR);
			$stmt->bindParam(':email', $param_email, PDO::PARAM_STR);
			$stmt->bindParam(':birthdate', $param_birthdate, PDO::PARAM_STR);
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
			$param_email = $email;
			$param_birthdate = $birthdate;
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                die("success");
            } else{
                die("Something went wrong. Please try again later.");
            }
        }
		} catch(PDOException $e){
		die("ERROR: " . $e->getMessage());
		}
        // Close statement
        unset($stmt);
    // Close connection
    unset($pdo);
}
?>