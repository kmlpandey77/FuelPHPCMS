<?php

class Controller_Page extends Controller_Base
{

	public function action_index($page)
	{
		Debug::dump($page);exit;
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Page &raquo; Index';
		$this->template->content = View::forge('page/index', $data);
	}

}
