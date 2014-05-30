
<?php
include 'config.php';
// loc lay cac bang con o day

// $sql = "select e.id, e.firstName, e.lastName, e.title, count(r.id) reportCount " . 
// 		"from employee e left join employee r on r.managerId = e.id " .
// 		"where e.managerId=:id group by e.id order by e.lastName, e.firstName";

// $sql = "select e.id, e.firstName, e.lastName, e.title, count(r.id) reportCount " .
// 		"from employee e left join employee r on r.managerId = e.id " .
// 		"where e.managerId=:id group by e.id order by e.id DESC ";

// $sql ="select e.id, e.name, e.brief, e.description, count(r.id) reportCount ".
// 		"from news e left  join news r on r.category_id = e.id ".
// 		"where e.category_id=:id group by e.id order by e.id DESC";

$sql = " select e.id, e.name, e.brief, count(r.id) reportCount ".
		"from news e left  join news r on r.category_id = e.id ".
		"where e.category_id=:id group by e.id order by e.id DESC";
//var_dump($sql);
//die;

try {
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->prepare($sql);  
	$stmt->bindParam("id", $_GET['id']);
	$stmt->execute();
	$employees = $stmt->fetchAll(PDO::FETCH_OBJ);
	$dbh = null;
	echo '{"items":'. json_encode($employees) .'}'; 
} catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}

?>