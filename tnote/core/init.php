<?php 
require_once (dirname(__FILE__). '/../classes/db.php');
require_once (dirname(__FILE__). '/../classes/session.php');

$db = new DB();
$db->connect();

$session= new Session();
$session->startSession();

$user =$session->getSession();

date_default_timezone_get('Asia/Ho_Chi_Minh');
$date_current='';
$date_current = date("Y-m-d H:i:sa");

if ($user) {
	$sql =	"SELECT * FROM users WHERE username = '$user'";
	$data_user = $db->fetch_data($sql,'PDO::FETCH_ASSOC');
}