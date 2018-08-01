<?php

Class Movie extends Resource{
	public $primary_key = "id";
	public $table = "movies";
	public $class = "Movie";
	public $requiredProperties = ['title', 'image'];
		
	public function render(){

	return '<div class="col-xs-12 col-sm-4 col-md-3">
				<a href="details.php?id='.$this->id.'">
					<img class="gallery-img" src=img/'.$this->image.'>
					<a class="view-details" href="details.php?id='.$this->id.'">View Details</a>
				</a>
			</div>';
	}
}