<?php
class Controller_Admin_Pages extends Controller_Admin
{

	public function action_index()
	{
		$data['pages'] = Model_Page::find('all');
		$this->template->title = "Pages";
		$this->template->content = View::forge('admin/pages/index', $data);

	}

	public function action_view($id = null)
	{
		$data['page'] = Model_Page::find($id);

		$this->template->title = "Page";
		$this->template->content = View::forge('admin/pages/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Page::validate('create');

			if ($val->run())
			{
				$page = Model_Page::forge(array(
					'title' => Input::post('title'),
					'overview' => Input::post('overview'),
					'details' => Input::post('details'),
					'position' => Input::post('position'),					
				));

				if ($page and $page->save())
				{
					Session::set_flash('success', e('Added page #'.$page->id.'.'));

					Response::redirect('admin/pages');
				}

				else
				{
					Session::set_flash('error', e('Could not save page.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Pages";
		$this->template->content = View::forge('admin/pages/create');

	}

	public function action_edit($id = null)
	{
		$page = Model_Page::find($id);
		$val = Model_Page::validate('edit');

		if ($val->run())
		{
			$page->title = Input::post('title');
			$page->slug = Input::post('slug');
			$page->image = Input::post('image');
			$page->overview = Input::post('overview');
			$page->details = Input::post('details');
			$page->position = Input::post('position');
			$page->order_by = Input::post('order_by');
			$page->deleted_at = Input::post('deleted_at');

			if ($page->save())
			{
				Session::set_flash('success', e('Updated page #' . $id));

				Response::redirect('admin/pages');
			}

			else
			{
				Session::set_flash('error', e('Could not update page #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$page->title = $val->validated('title');
				$page->slug = $val->validated('slug');
				$page->image = $val->validated('image');
				$page->overview = $val->validated('overview');
				$page->details = $val->validated('details');
				$page->position = $val->validated('position');
				$page->order_by = $val->validated('order_by');
				$page->deleted_at = $val->validated('deleted_at');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('page', $page, false);
		}

		$this->template->title = "Pages";
		$this->template->content = View::forge('admin/pages/edit');

	}

	public function action_delete($id = null)
	{
		if ($page = Model_Page::find($id))
		{
			$page->delete();

			Session::set_flash('success', e('Deleted page #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete page #'.$id));
		}

		Response::redirect('admin/pages');

	}

}
