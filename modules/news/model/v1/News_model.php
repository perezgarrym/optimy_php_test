<?php

require_once(PROJECT_ROOT_PATH . '/core/Main_model.php');

class News_model extends Main_model
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
	 * [getNews get all news]
	 * @param  boolean $withComments [indicates if need comments]
	 * @return [array]               [list of news]
	 */
	public function getNews($withComments = false)
	{
		$news = $this->db->select('SELECT * FROM news');

		foreach($news as $key => $row) {
			if($withComments) {
				$news[$key]['comments'] = $this->getComments((int)$row['id']);
			}
		}

		return $news;
	}



	/**
	 * [getComments get comments of news]
	 * @param  [int] $newsID [news id of comments]
	 * @return [array]        [list of comments under news id]
	 */
	private function getComments(int $newsID)
	{
		return $this->db->select("SELECT * FROM comment WHERE news_id = {$newsID}");
	}



	/**
	 * [deleteNews delete news]
	 * @param  [type] $newsID [description]
	 * @return [type]         [description]
	 */
	public function deleteNews($newsID)
	{
		# delete comments first
		$this->deleteComments($newsID);

		#delete head 
		$sql = "DELETE FROM `news` WHERE `id`= {$newsID}";
		
		if($this->db->exec($sql)) {
			return ['message' => 'deleted'];
		} else {
			return ['message' => 'nothing to delete'];
		}
	}



	private function deleteComments($newsID)
	{
		$sql = "DELETE FROM `comment` WHERE `news_id`= {$newsID}";
		return $this->db->exec($sql);
	}



	public function addNews($title, $body)
	{
		$sql = "INSERT INTO `news` (`title`, `body`, `created_at`) VALUES('". $title . "','" . $body . "','" . date('Y-m-d') . "')";

		if($this->db->exec($sql)) {
			return ['message' => 'news added'];
		} else {
			return ['message' => 'fail to add'];
		}
	}
}