<?php
	/**
	 * 
	 */
	class Calculator extends Resource
	{

		function __construct()
		{
			
		
		}
		public function calculate($num1, $num2, $operation ){
			if(!is_numeric($num1)){
				throw new Exception ("Number 1 must be numeric");
			}
			if(!is_numeric($num2)){
				throw new Exception ("Number 2 must be numeric");
			}

			switch ($operation) {
				case 'add':
					return $num1 + $num2;
					break;

				case 'subtract':
					return  $num1 - $num2;
					break;
				
				case 'multiply':
					return $num1 * $num2;
					break;

				case 'divide':
					return $num1 / $num2;
					break;

				default:
					throw new Exception("invalid operation");
					break;
			}
		}
	}