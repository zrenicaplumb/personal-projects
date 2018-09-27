<?php
	require_once('config.php');


	$request_method = $_SERVER['REQUEST_METHOD'];
	
	$params = $request_method  == "GET" ? $_GET : $_POST;
	// error_object($params);
	$function = isset($params['method']) ? $params['method'] : null;
	error_object($function);
	$redirect = isset($params['redirect']) ? $params['redirect'] : null;
	// error_object($redirect);
	unset($params['method']);
	unset($params['redirect']);
	
	$API = new API($request_method, $function, $params, $_FILES);
	error_log(print_r($_FILES, true));
	try {
		$result = $API->call();
		// error_object($result);
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