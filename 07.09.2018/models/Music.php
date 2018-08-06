<?php

Class Music extends Resource{
	public $primary_key = "id";
	public $table = "music";
	public $class = "Music";
	public $requiredProperties = ['title', 'image'];
}
