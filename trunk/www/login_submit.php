<?php

require 'initialize.inc.php';

if ( !$user->is_loaded() ) {
	if ( isset($_POST['uname']) && isset($_POST['pwd'])){
		if ( !$user->login($_POST['uname'],$_POST['pwd'],$_POST['remember'] )){
			echo 'Wrong username and/or password';
		}else{
			//user is now loaded
			//essa função seguinte faz a redireição
			header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
		}
	}
}

?>