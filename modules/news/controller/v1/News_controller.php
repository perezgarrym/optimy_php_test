<?php

require_once(PROJECT_ROOT_PATH . '/core/Main_controller.php');

class News_controller extends Main_controller
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

	public function getNews()
	{
		$requestMethod = $_SERVER["REQUEST_METHOD"];

		if ($requestMethod == 'GET') {
			$data = $this->db->getNews(true);

			return $this->sendOutput(json_encode($data), array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
		} 

        return $this->sendOutput(json_encode(array('error' => 'Method not supported')), 
                array('Content-Type: application/json', 'HTTP/1.1 422 Unprocessable Entity')
            );
	}
}