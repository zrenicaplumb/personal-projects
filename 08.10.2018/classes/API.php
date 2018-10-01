<?php

	class API {
		public $request_method;
		public $method;
		public $params;
		public $files;
		public function __construct($request_method, $method, $params, $files=null){
			$this->request_method = $request_method;
			$this->method = $method;
			$this->params = $params;
			$this->files = $files;
			// error_object($files);
		}
		public function call(){
			if(method_exists($this, $this->method)){
				try{
					return $this->{$this->method}($this->params, $this->files);
				} catch(Exception $e){
					throw new Exception($e->getMessage());
				}
			}else{
				throw new Exception("Method ".$this->method."Doesn't exist");
			}
		}
		public function createStoreItem($params, $files){
			// error_object($files);
			return StoreItemController::create($params, $files);
		}
		
		public function getStoreItems(){
			return StoreItemController::findAll();
		}

		public function deleteStoreItem($params){
			$id = $params['id'];
			$fetchedStoreItem = StoreItemController::findById($id);
			return $fetchedStoreItem->delete();
		}
		
		public function updateStoreItem($params, $files){
			$id = $params['id'];
			$settings = $params['settings'];
			$storeItem = StoreItemController::findById($id);
			return $storeItem->update($settings);
		}

		public function createOverlayBox($params){
			return OverlayBoxController::uploadOverlayBox($params);
		}
		
		public function getOverlayBoxes(){
			return OverlayBoxController::findAll();
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
	}