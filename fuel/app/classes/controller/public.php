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
		$path  = DOCROOT . 'assets/uploads/';
		$img = Input::post('cropedimage');

		list($type, $data) = explode(';', $img);
		list(, $data)      = explode(',', $data);
		$data = base64_decode($data);

		// file_put_contents('/tmp/image.png', $data);
		
		file_put_contents($path.'test.jpg', $data);

		exit(var_dump($file));
		
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
