<?php 
Class GalleryController extends ResourceController{
	public static $table = "gallery";
	public static $primary_key = "id";
	public static $class = "GalleryItem";
	static function createGalleryItem(){
		$db = new DB();
		$path = 'img/';
		$title = $_POST['title'];
		$tmp_name = $_FILES['image']['tmp_name'];
		$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		$image = str_replace(' ', '_', $title . '.' . $ext);
		$new = move_uploaded_file($tmp_name, $path . $image);
		$item = [
			'title'=>$title,
			'image'=>$image,
		];

		
		
		$db->insert("gallery", $item);
		$item['id'] = $db->insert_id;
		return new GalleryItem($item);
	}
}