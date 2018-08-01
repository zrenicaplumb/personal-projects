<?php
	require_once('config.php');
	require_once('classes/API.php');

	$request_method = $_SERVER['REQUEST_METHOD'];
	$params = $_REQUEST;
	$function = isset($params['method']) ? $params['method'] : null;
	$redirect = isset($params['redirect']) ? $params['redirect'] : null;

	unset($params['method']);
	unset($params['redirect']);
	
	$API = new API($request_method, $function, $params, $_FILES);
		// print_r($API, true);
	try {
		$result = $API->call();
		if($redirect){
			$API->redirectSuccess($redirect, $result);
		} else {
			$API->output($result);
		}
	} catch(Exception $e){
		if($redirect){
			$API->redirectFail($redirect, $e->getMessage());
		} else {
			echo json_encode(['status'=>'failed', 'message'=>$e->getMessage()]);
		}
		
		exit;
	}