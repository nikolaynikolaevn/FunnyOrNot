<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	session_start();
require_once 'db_config.php';
try {
        // Prepare an insert statement
        $sql = "INSERT INTO jokes (content, c_id, uid, date) VALUES (:content, :c_id, :uid, :date)";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':content', $_POST['content'], PDO::PARAM_STR);
            $stmt->bindParam(':c_id', $_POST['category'], PDO::PARAM_STR);
			$stmt->bindParam(':uid', $_SESSION['user_id'], PDO::PARAM_STR);
			$stmt->bindParam(':date', time(), PDO::PARAM_STR);
            if($stmt->execute()){
                // Redirect to login page
                echo "Successfully posted!";
            } else{
                die("Something went wrong. Please try again later.");
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