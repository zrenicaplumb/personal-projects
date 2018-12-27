<?php

	Class API {
		public $request_method;
		public $method;
		public $params;
		public $files;
		public $randomFunc = "sayHello";
		public function __construct($request_method, $method, $params, $files=null){
			$this->request_method = $request_method;
			$this->method = $method;
			$this->params = $params;
			$this->files = $files;
		}
		public function call(){
			if(method_exists($this, $this->method)){
				try {
					return $this->{$this->method}($this->params, $this->files);
				} catch(Exception $e){
					throw new Exception($e->getMessage());
				}
			} else {
				throw new Exception("Method ".$this->method." Doesn't exist");
			}
		}
		public function output($data){
			echo json_encode([
				'status'=>'success',
				'data'=>$data,
			]);
			exit;
		}
		public function redirectSuccess($url, $data){
			$output = http_build_query([
				'api_result'=>[
					'status'=>'success',
					'data'=>$data,
				],
			]);
			if(strpos($url, "?") === FALSE){
				$url.="?";
			}
			$url .= $output;

			header("location: ".$url);
		}
		public function redirectFail($url, $message){
			$output = http_build_query([
				'api_result'=>[
					'status'=>'failed',
					'message'=>$message,
				],
			]);
			if(strpos($url, "?") === FALSE){
				$url.="?";
			}
			$url .= $output;
			header("location: ".$url);
		}
		
		public function userSignup($data){
			$user = UserController::create($data);
			if($user){
				$_SESSION['email'] = $data['email'];
				$_SESSION['password'] = $data['password'];

			}
			
			return $user;
		}
		public function createUserEvent($data, $files){
			return UserEventController::create($data, $files);
		}
		public function getPublicUserEvents(){
			return UserEventController::findAll();
			
		}
		public function deleteUserEvent(){
			return UserEventController::delete();
			
		}
	}