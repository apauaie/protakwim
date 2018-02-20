<?php
$host = 'localhost';
$username = 'root';
$pass = '';
$Dbname = 'test';
//connect with the database
$db = new mysqli($host,$username,$pass,$Dbname);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM autocomplete WHERE title LIKE '%".$searchTerm."%' ORDER BY id ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['title'];
}
//return json data
echo json_encode($data);
?>