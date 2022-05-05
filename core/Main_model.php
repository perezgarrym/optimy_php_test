<?php

class Main_model
{
	public static $instance = null;

	public function __construct()
	{
		require_once(PROJECT_ROOT_PATH . '/config/DB.php');

		$this->db = DB::getInstance();
	}
}