<?php 
Class GalleryItem extends Resource{
	public $primary_key = "id";
	public $table = "gallery";
	public $class = "GalleryItem";
	public $requiredProperties = ['title', 'image'];

	public function render(){
		$path = 'img/';
		echo "<div class='img-wrap'>
				<img src=".$path.$this->image." id=".$this->id." value=".$this->id." class='gal-img' >
				<p class='gallery-text'>".$this->title."</p>
				<button class='delete-btn'>Delete</button>
			</div>";
	}

}