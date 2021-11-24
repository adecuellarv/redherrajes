<?php
	include('func.php');
	/*
	$conn = mysqli_connect('localhost', 'adeev_admin', '-ade-cuellar-2017-', 'dyabsa_web');
	$tildes = $conn->query("SET NAMES 'utf8'");
	*/

	if(isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['tel'])){
		$name = $_POST['nombre'];
		$tel= $_POST['tel'];
		$email = $_POST['email'];
		$msg = $_POST['msg'];
		$send_adeev = getdatos($name,$email,$tel,$msg);
		if($email!=""){
			$send_user = thanksuser($name,$email);
		}
        
		$return = array(
            'email_send' => 'true',
        );
        $return = json_encode($return);

        echo $return; 
		
	}
?>