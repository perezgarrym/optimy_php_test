<?php

require_once(PROJECT_ROOT_PATH . '/core/Main_model.php');

class Comment_model extends Main_model
{

	public static function getInstance()
	{
		if (null === self::$instance) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}
	


	/**
	 * [getComments description]
	 * @param  [type] $payload [additional parameters]
	 * @return [array]          [list of news]
	 */
	public function getComments($payload)
	{
		$where = '';

		if (isset($param['news_id']) && $param['news_id'] != '') {
			$where = "news_id = ".$param['news_id'];
		}

		return $this->db->select("SELECT * FROM comment {$where}");
	}
}