<?php
    
	function getdatos($name,$email,$asunto,$description){
        $email_contact = 'ade.cuellar91@gmail.com';
		if($email!=""){
			$emailR = $email;
		}else{
			$emailR = $email_contact;
		}
        
		ini_set("SMTP","smtp.gmail.com");  
		ini_set("smtp_port","465");  
		ini_set("sendmail_from",$emailR);
        $para = $email_contact;
		$subject = 'Nuevo prospecto '.$asunto;
		$message = '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=gb18030">
			
				<meta name="viewport" content="width=device-width, initial-scale=1" />
				<title>Registro nuevo</title>
			
			</head>
			
			<body offset="0" class="body" style="padding:0; margin:0; display:block; background:#eeebeb; -webkit-text-size-adjust:none"
			bgcolor="#eeebeb">
				<table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%">
					<tr>
						<td align="center" valign="top" style="background-color:#eeebeb" width="100%">
							<center>
								<table cellspacing="0" cellpadding="0" width="600" class="w320">
									<tr>
										<td align="center" valign="top">
											<table cellspacing="0" cellpadding="0" width="100%" style="background-color:#eeeeee;">
												<tr>
													<td style="background-color:#eeeeee;">
			
			
														<table cellspacing="0" cellpadding="0" width="100%">
															<tr>
																<td>
																	<strong>Nombre: </strong> <span>'.$name.'</span><br>
																	<strong>Correo: </strong> <span>'.$email.'</span><br>
																	<strong>Teléfono: </strong> <span>'.$asunto.'</span><br>
																	<strong>Descripcion: </strong> <span>'.$description.'</span><br>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
			
										</td>
									</tr>
								</table>
							</center>
						</td>
					</tr>
				</table>
			</body>
			
			</html>
		';

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers .= "To: ".$para . "\r\n";
		$headers .= "From: ".$emailR. "\r\n";
		$mail_sent = @mail($para, $subject, $message, $headers );
	}
	function thanksuser($name,$email){
        $email_contact = 'ade.cuellar91@gmail.com';
		ini_set("SMTP","smtp.gmail.com");  
		ini_set("smtp_port","465");  
		ini_set("sendmail_from", $email_contact);
		$para = $email;
		$subject = 'Recibimos tu información';
		$message = '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=gb18030">
			
				<meta name="viewport" content="width=device-width, initial-scale=1" />
				<title>Registro nuevo</title>
			
			</head>
			
			<body offset="0" class="body" style="padding:0; margin:0; display:block; background:#eeebeb; -webkit-text-size-adjust:none"
			bgcolor="#eeebeb">
				<table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%">
					<tr>
						<td align="center" valign="top" style="background-color:#eeebeb" width="100%">
							<center>
								<table cellspacing="0" cellpadding="0" width="600" class="w320">
									<tr>
										<td align="center" valign="top">
											<table cellspacing="0" cellpadding="0" width="100%" style="background-color:#eeeeee;">
												<tr>
													<td style="background-color:#eeeeee;">
			
			
														<table cellspacing="0" cellpadding="0" width="100%">
															<tr>
																<td>
																	Gracias '.$name.' recibimos tu información
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
			
										</td>
									</tr>
								</table>
							</center>
						</td>
					</tr>
				</table>
			</body>
			
			</html>
				';
				
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers .= "To: ".$para . "\r\n";
		$headers .= "From: ".$email_contact . "\r\n";
		$mail_sent = @mail($para, $subject, $message, $headers );
		echo "envio agredecimiento";
		//print_r($mail_sent);
	}
