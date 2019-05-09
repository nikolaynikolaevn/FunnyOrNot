<?php
class contentLoader {
	/* Properties */
    private $conn;

    /* Get database access */
    public function __construct(\PDO $pdo) {
        $this->conn = $pdo;
    }
	
	function loadContentFromCategory($category, $order){
		$category_str = "";
		$order_str = "";
		if($category != ""){
			$category_str = " WHERE c_id = :category_id";
		}
		if($order != null){
			if($order == "newest"){
				$order_str = " ORDER BY date DESC";
				$order_title = "Newest";
			}
			elseif($order == "popular"){
				$order_str = " ORDER BY views DESC";
				$order_title = "Most popular";
			}
			elseif($order == "liked"){
				$order_str = " ORDER BY (yes - no) DESC";
				$order_title = "Most liked";
			}
			elseif($order == "random"){
				$order_str = " ORDER BY RAND()";
				$order_title = "Random";
			}
		}
		$sql = "SELECT * FROM jokes".$category_str.$order_str;
		try {
        if($stmt = $this->conn->prepare($sql)){
		$stmt->bindParam(':category_id', $category, PDO::PARAM_STR);
		}
		if($stmt->execute()){
			if($stmt->rowCount() < 1){
				if($category != ""){
				if($this->getCategoryName($category) == null){
					die("The category does not exist.");
				}
				echo "The category is empty.";
				}
            }
			$result = $stmt->fetchAll();
        }
		} catch(PDOException $e){
		die("ERROR: " . $e->getMessage());
		}
        unset($stmt);
		return $result;
	}
	function getCategoryName($category_id){
		$sql = "SELECT name FROM categories WHERE id = :category_id";
		try {
        if($stmt = $this->conn->prepare($sql)){
		$stmt->bindParam(':category_id', $category_id, PDO::PARAM_STR);
		}
		if($stmt->execute()){
			if($stmt->rowCount() != 1){
				die("Invalid category id.");
            }
			$result = $stmt->fetch();
        }
		} catch(PDOException $e){
		die("ERROR: " . $e->getMessage());
		}
        unset($stmt);
		return $result;
	}
	function getPost($post_id){
		$sql = "SELECT * FROM jokes WHERE id = :post_id";
		if($post_id == 'featured'){
			$sql = "SELECT * FROM jokes WHERE featured = '1'";
		}
		try {
        if($stmt = $this->conn->prepare($sql)){
		$stmt->bindParam(':post_id', $post_id, PDO::PARAM_STR);
		}
		if($stmt->execute()){
			if($stmt->rowCount() != 1){
				die("Invalid id.");
            }
			$result = $stmt->fetch();
        }
		} catch(PDOException $e){
		die("ERROR: " . $e->getMessage());
		}
        unset($stmt);
		return $result;
	}
}
?>