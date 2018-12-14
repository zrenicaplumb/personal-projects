<?php
	require_once('config.php');
	

	$request_method = $_SERVER['REQUEST_METHOD'];
	$params = $request_method  == "GET" ? $_GET : $_POST;
	$function = isset($params['method']) ? $params['method'] : null;
	$redirect = isset($params['redirect']) ? $params['redirect'] : null;
	
	unset($params['method']);
	unset($params['redirect']);
	
	$API = new API($request_method, $function, $params, $_FILES);
		
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