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
class Controller_Welcome extends Controller_Base
{
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		return Response::forge(View::forge('welcome/index'));
	}

	/**
	 * A typical "Hello, Bob!" type example.  This uses a Presenter to
	 * show how to use them.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_hello()
	{
		return Response::forge(Presenter::forge('welcome/hello'));
	}

	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(Presenter::forge('welcome/404'), 404);
	}
}
