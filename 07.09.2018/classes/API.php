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
			error_log($this->method);
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
		public function calculate($params){
			$Calculator = new Calculator();
			$result = $Calculator->calculate($params['num1'], $params['num2'], $params['operation']);
			return $result;
		}

		/* GET REQUESTS **/

		public function getMusic($params, $files){
			$musics =  MusicController::findAll();
			$output = array_map(function($music){
				return $music->model();
			}, $musics);
			return $output;
		}


		/* Update Requests **/
		public function updateMusic($params, $files){
			$id = $params['id'];
			$settings = $params['settings'];
			$music = MusicController::findById($id);
			return $music->update($settings);
		}

		/* DELETE REQUESTS */
		public function deleteMusic($params){
			$id = $params['id'];
			$music = MusicController::findById($id);
			return $music->delete();

		}

		

		/* CREATE REQUESTS */

		public function createGalleryItem($params, $files){
			return GalleryController::create($params, $files);
		}
		public function createMusicItem($params, $files){
			return MusicController::create($params, $files);
		}
		public function createBookItem($params, $files){
			return BookController::create($params, $files);
		}
		public function createMovieItem($params, $files){
			return MovieController::create($params, $files);
		}
		public function createStoreItem($params, $files){
			return StoreItemController::create($params, $files);
		}
		public function deleteCartItem($params, $files){
			return CartItemController::delete($params['id']);
		}
		public function addCartItem($params, $files){
			return CartItemController::addCartItem($params);
		}






	}