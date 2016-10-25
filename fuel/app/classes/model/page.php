<?php
class Model_Page extends \Orm\Model_Soft
{
	protected static $_properties = array(
		'id',
		'title',
		'slug',
		'image',
		'overview',
		'details',
		'position',
		'order_by',
		'deleted_at'=>array('default'=>null),
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
		'Orm\\Observer_Slug',
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('title', 'Title', 'required|max_length[255]');
		return $val;
	}

	public static function getMenu($value = 'main_menu')
	{
		$pages = Model_Page::query()->select('id', 'slug', 'title')->where('position','IN', array(1))->get();

		$menus = array();

		foreach ($pages as $page) {
			if($page->slug == 'home')
				$link = Uri::create('/');
			else
				$link = Uri::create($page->slug.'.html');

			$menus[$link] = $page->title;
		}

		return $menus;

	}

	public static function getRoute()
	{
		$pages = Model_Page::query()->select('id', 'slug', 'title')->where('position','IN', array(1))->get();

		$routes = array();

		foreach ($pages as $page) {
			$routes[$page->slug] = 'public/view/'.$page->slug;
		}

		Debug::dump($routes);exit;

		return $routes;

	}

}
