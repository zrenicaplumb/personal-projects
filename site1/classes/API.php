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
			error_object($data);
			return UserController::userSignup($data);
		}
		public function deleteUser(){
			return UserController::delete();
		}
		public function createUserEvent($data){
			return UserEventController::create($data);
		}
		public function addFriend($data){
			return FriendController::addFriend($data);
		}
		public function getPublicEvents($data){
			return UserEventController::getUserEvents($data);
		}
		public function getHomepageEvents(){
			return UserEventController::getHomepageEvents();
		}
		public function deleteUserEvent($data){
			return UserEventController::deleteUserEvent($data);
		}	
		public function userLogin($data){
			return UserController::login($data);
		}	
		public function getUserEvents($data){
			return UserEventController::getUserEvents($data);
		}
		public function getUserNotifications(){
			$friendRequests = FriendController::getFriendRequests();
			return $friendRequests;
		}
		public function getUserFriends(){
			return FriendController::getFriendsList();
		}
	}