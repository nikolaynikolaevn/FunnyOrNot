<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	session_start();
	require_once 'db_config.php';
    
    //Retrieve the field values from our login form.
    $usernameOrEmail = !empty($_POST['usernameOrEmail']) ? trim($_POST['usernameOrEmail']) : null;
    $password = !empty($_POST['psw']) ? trim($_POST['psw']) : null;
	
    $sql = "SELECT id, password FROM users WHERE username = :usernameOrEmail OR email = :usernameOrEmail";
	try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':usernameOrEmail', $usernameOrEmail);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($user === false){
        die('incorrect_combination');
    } else{
		
        //Compare the passwords.
        $validPassword = password_verify($password, $user['password']);
        if($validPassword){
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = time();
			die("success");
            
        } else{
            die('incorrect_combination');
        }
    }
		} catch(PDOException $e){
		die("ERROR: " . $e->getMessage());
		}
        // Close statement
	 unset($stmt);
	 unset($pdo);
	
}
?>