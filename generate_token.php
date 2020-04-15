<?php
require_once('jwt.php');

$userId = 'USER123456';
$_waktu = strtotime(date('Y-m-d H:i'));
// $nbf = $_waktu;
$exp = $_waktu + 60;	//expired 60 detik

// Get our server-side secret key from a secure location.
$serverKey = '5f2b5cdbe5194f10b3241568fe4e2b24';

$payloadArray = array();
$payloadArray['userId'] = $userId;
if (isset($nbf)) {$payloadArray['nbf'] = $nbf;}
if (isset($exp)) {$payloadArray['exp'] = $exp;}
$token = JWT::encode($payloadArray, $serverKey);

// return to caller
$returnArray = array('token' => $token, 'exp'=>$exp, 
	'exp1'=>date('Y-m-d H:i:s',$exp));
$jsonEncodedReturnArray = json_encode($returnArray, JSON_PRETTY_PRINT);
echo $jsonEncodedReturnArray;

?>

