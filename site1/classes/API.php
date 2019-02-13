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
				$_SESSION['username'] = $data['username'];
				$_SESSION['password'] = $data['password'];
				

			}
			
			return $user;
		}
		public function deleteUser(){
			$userEmail = $_SESSION['email'];
			
			return UserController::delete($userEmail);
			
		}
		public function createUserEvent($data){
			if(!$data['invite_list']){
				$data['invite_list'] = null;
			}
			$invite_list = explode(',', $data['invite_list']);
			return UserEventController::create($data);
		}
		public function addFriend($data){

			$result = UserController::findByEmail($data['email']);
			
			if($result){
				$newFriend = UserController::addFriend($data);
			}
			
		}
		public function getPublicEvents(){
			return UserEventController::getPublicEvents();
			
		}
		public function getHomepageEvents(){
			$email = $_SESSION['email'];
			return UserEventController::getHomepageEvents($email);
			
		}
		public function deleteUserEvent($data){
			return UserEventController::deleteUserEvent($data);
			
		}
		
		public function userLogin($data){
			// error_object($data);
			$loggedIn = UserController::login($data['email'], $data['password']);
			if($loggedIn){
				$_SESSION['username'] = $loggedIn['username'];
				$_SESSION['email'] = $loggedIn['email'];
				$_SESSION['password'] = $loggedIn['password'];

			}
			else{
				return null;
			}
			return $loggedIn;
			
		}	
		public function getUserEvents(){
			$userEmail = $_SESSION['email'];
			
			return UserEventController::getUserEvents($userEmail);
			
		}
	}