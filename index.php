<?php
	session_start();

	require_once("config.php");

	spl_autoload_register(function($class){
		if(strpos($class, "Controller") && file_exists('controllers/'.$class.'.php')){
			require_once('controllers/'.$class.'.php');
		}else if(file_exists('models/'.$class.'.php')){
			require_once('models/'.$class.'.php');
		}else if(file_exists('system/'.$class.'.php')){
			require_once('system/'.$class.'.php');
		}
	});

	$s = new System();
	$s->run();
?>