<?php

class Main_controller
{
	public static $instance = null;

	public function __construct()
	{
		require_once(PROJECT_ROOT_PATH . '/modules/news/model/v1/News_model.php');
	}
    
    /**
     * Send API output.
     *
     * @param mixed  $data
     * @param string $httpHeader
     */
    protected function sendOutput($data, $httpHeaders=array())
    {
        header_remove('Set-Cookie');
 
        if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }
 
        echo $data;
        exit;
    }
}