<?php
/* ------------ user autentification --------------- */
$key = '1fc04891e4d617ea7291';
$secret = '021268711cd7dab15c38';
$app_id = '63282';
require_once('pusher.php');
$name = $_GET['name']; // chose the way to get this get,post session ...etc
$user_id = $_GET['user_id']; // chose the way to get this get,post session ...etc
$channel_name = $_POST['channel_name']; // never change 
$socket_id = $_POST['socket_id']; // never change 
$pusher = new Pusher($key, $secret, $app_id);
$presence_data = array('name' => $name);
echo $pusher->presence_auth($channel_name, $socket_id, $user_id, $presence_data);
?>