<?php

class Controller_Base extends Controller_Template
{
	public function before()
	{
		parent::before();

		if(!File::exists(APPPATH . 'INSTALLATION_DISABLED')){
			Response::redirect('install');
		}

		$this->current_user = null;

		foreach (\Auth::verified() as $driver)
		{
			if (($id = $driver->get_user_id()) !== false)
			{
				$this->current_user = Model\Auth_User::find($id[1]);
			}
			break;
		}

		// Set a global variable so views can use it
		View::set_global('current_user', $this->current_user);


		/* main menu */
		View::set_global('main_menu', Model_Page::getMenu('main_menu'));

	}

}
