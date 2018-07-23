<?php

Class Book extends Resource{
	public $primary_key = "id";
	public $table = "books";
	public $class = "Book";
		
	public function render(){
		return '<div class="col-xs-12 col-sm-4 col-md-3">
					<a href="details.php?id=">
						<img class="gallery-img" src=img/'.$this->image.'>
						<a class="view-details" href="details.php">View Details</a>
					</a>
				</div>';

	}
}