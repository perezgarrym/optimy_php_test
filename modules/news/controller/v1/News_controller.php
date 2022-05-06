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




	/**
	 * [delete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete($id) 
	{
		$requestMethod = $_SERVER["REQUEST_METHOD"];

		if ($requestMethod == 'DELETE') {
			$data = $this->db->deleteNews($id);

			return $this->sendOutput(json_encode($data), array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
			
		} 

        return $this->sendOutput(json_encode(array('error' => 'Method not supported')), 
                array('Content-Type: application/json', 'HTTP/1.1 422 Unprocessable Entity')
            );
	}



	public function upsertNews()
	{
		$requestMethod = $_SERVER["REQUEST_METHOD"];

		if ($requestMethod == 'POST') {
			$payload = json_decode(file_get_contents('php://input'), true);

			if(!isset($payload['title']) || !isset($payload['body'])) {
				return $this->sendOutput(json_encode(array('error' => 'Missing Param')), 
	                array('Content-Type: application/json', 'HTTP/1.1 422 Unprocessable Entity')
	            );
			}

			$data = $this->db->addNews($payload['title'], $payload['body']);

			return $this->sendOutput(json_encode($data), array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
			
		} elseif ($requestMethod == 'PATCH') {

		}

        return $this->sendOutput(json_encode(array('error' => 'Method not supported')), 
                array('Content-Type: application/json', 'HTTP/1.1 422 Unprocessable Entity')
            );
	}
}