<?php
class User {
	/* Properties */
    private $conn;
	public $username = "";
	public $email = "";
	public $birthdate = "";

    /* Get database access */
    public function __construct(\PDO $pdo) {
        $this->conn = $pdo;
		//Set the username property
		$this->username = $this->getUsername();
		$this->email = $this->getEmail();
		$this->birthdate = $this->getBirthdate();
    }
	public function getUsername(){
		$sql = "SELECT username FROM users WHERE id = :id";
		try {
        if($stmt = $this->conn->prepare($sql)){
		$stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_STR);
		}
		if($stmt->execute()){
			$result = $stmt->fetch()[0];
        }
		} catch(PDOException $e){
		die("ERROR: " . $e->getMessage());
		}
        unset($stmt);
		return $result;
	}
		public function getEmail(){
		$sql = "SELECT email FROM users WHERE id = :id";
		try {
        if($stmt = $this->conn->prepare($sql)){
		$stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_STR);
		}
		if($stmt->execute()){
			$result = $stmt->fetch()[0];
        }
		} catch(PDOException $e){
		die("ERROR: " . $e->getMessage());
		}
        unset($stmt);
		return $result;
	}
		public function getBirthdate(){
		$sql = "SELECT birthdate FROM users WHERE id = :id";
		try {
        if($stmt = $this->conn->prepare($sql)){
		$stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_STR);
		}
		if($stmt->execute()){
			$result = $stmt->fetch()[0];
        }
		} catch(PDOException $e){
		die("ERROR: " . $e->getMessage());
		}
        unset($stmt);
		return $result;
	}
}
?>