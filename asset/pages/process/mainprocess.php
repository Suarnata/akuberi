<?php
	
	class akuberi{

		private $base_url = "http://localhost/akuberi/";

		function __construct(){
			ob_start();
		}

		public function base_url(){
			return $this->base_url;
		}

	}

?>