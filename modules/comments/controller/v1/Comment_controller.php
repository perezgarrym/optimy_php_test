<?php

require_once(PROJECT_ROOT_PATH . '/core/Main_controller.php');

class Comment_controller extends Main_controller
{

 	private $db;

    public function __construct()
    {
        parent::__construct();

        $this->db = News_model::getInstance();
    }

	public static function getInstance()
	{
		if (null === self::$instance) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}

	public function list()
	{
		$param = $_GET;
        $data = $this->db->getComments($param);
        
		return $data;
	}
}