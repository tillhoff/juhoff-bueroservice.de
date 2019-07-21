<?php 
function sendMail($from,$fromname,$toadress,$subject,$body)
	{
	require_once('class/class.phpmailer.php');
	$mail = new PHPMailer();
	$mail->Mailer 	= "mail"; //Versand über SMTP festlegen
	$mail->Host 	= "localhost"; //SMTP-Server setzen
	$mail->From 	= $from;
	$mail->FromName = $fromname;
	$mail->AddAddress($toadress);
	$mail->Subject 	= $subject;
	$mail->Body = $body;
	if(!$mail->Send())
 		{
 	 	$mail->ErrorInfo;
		}
	}
if(isset($_POST))
	{
	error_reporting(255);
	$mailfrom = ''; $mailto = ''; $response = ''; $subject = ''; $mailcontent = ''; $content = array(); $reject = 0;
	$error = 1;
	foreach($_POST as $key => $val)
		{
		if($key == 'email' && $val!='') 	 {$mailfrom 	= $val; $error = 0;}
        if($key == 'FBLOCATION' && $val!='') {$response 	= $val; $error = 0;}
        if($key == 'FBSUBJECT' && $val!='')	 {$subject 		= $val; $error = 0;}
		//if($key == 'FBREJECT')				 {$reject		= 1;}
		//if($key == 'Nachricht')				 {$val			= "\n\n".$val."\n\n";}
		if($key == 'mailto:_' && $val!='')   {$mailto		= $val; $error = 0;}
		if($key ==)
		/*if($key != 'FBMAIL' && $key != 'FBLOCATION' && $key != 'FBSUBJECT' && $key != 'FBREJECT')
			{
			$content[] = $key.': '.$val;
			}
		}*/
	//$mailcontent = implode("\n",$content);
	if($error == 0)
		{
		$mailfrom1 = $mailfrom;
		$mailfrom2 = $mailfrom;
		if($reject == 1) $mailfrom1 = $mailto;
		//sendMail($mailto,$mailfrom1,$mailfrom2,$subject,$mailcontent);
		sendMail($content[1],$content[0],"info@juhoff-bueroservice.de",$content[2],$content[3]);
		echo $content[1]."<br/>";echo $content[0]."<br/>";echo $content[2]."<br/>";echo "just to be secure:".$content[3];
		//header("Location:".$response);
		}
	}
?>