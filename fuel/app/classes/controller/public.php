<?php
/**
 * Installation file of FuelPHPCMS.
 *
 * @package    FuelPHPCMS
 * @version    1.0
 * @author     Kamal Pandey (kml.pandey77@gmail.com)
 * 
 */

/**
 * The Public Controller.
 *
 */
class Controller_Public extends Controller_Base
{
	public function action_index()
	{
		$this->template->title = "Home";
		$this->template->content = View::forge('pages/home');
	}

	public function action_upload()
	{
		var_dump(Input::file('croppedImage'));exit;
	}

	public function action_view($slug)
	{
		Debug::dump(slug);exit;
		$this->template->title = "Home";
		$this->template->content = View::forge('pages/home');
	}

	public function action_404()
	{
		return Response::forge(Presenter::forge('welcome/404'), 404);
	}
}
