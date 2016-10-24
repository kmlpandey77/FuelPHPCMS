<?php

namespace Fuel\Migrations;

class Create_pages
{
	public function up()
	{
		\DBUtil::create_table('pages', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'title' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'slug' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'image' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'overview' => array('type' => 'text', 'null' => true),
			'details' => array('type' => 'text', 'null' => true),
			'position' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'order_by' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'deleted_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));

		\DB::insert('pages')->set(array(
			'title'=>'Home',
			'slug'=>'home',
			'overview'=>'Lorem ipsum Voluptate commodo occaecat non irure nostrud ut veniam voluptate proident qui.',
			'details'=>'Lorem ipsum Ut proident est eu Ut irure nisi Ut aliqua aliquip id reprehenderit sit deserunt ut laboris adipisicing dolore ad id est ad eu nostrud Duis enim nostrud exercitation aute dolore in adipisicing veniam velit veniam voluptate culpa elit adipisicing in enim consectetur adipisicing id proident culpa in eu cupidatat enim voluptate ut quis deserunt reprehenderit ad cupidatat tempor irure sunt enim pariatur labore in consequat qui velit in occaecat quis consectetur velit mollit do est id ad incididunt Ut velit pariatur ea dolor laborum ea id enim id veniam non Excepteur velit in cillum Excepteur ex consequat anim Duis et occaecat reprehenderit reprehenderit nulla nostrud eiusmod irure labore amet nostrud reprehenderit ut Duis veniam ut anim enim ullamco in do do voluptate labore labore voluptate deserunt nisi in Excepteur enim elit dolor ad exercitation consectetur reprehenderit sunt esse ut id dolore deserunt enim sit quis adipisicing officia nostrud ad consectetur aute sint ut qui elit Ut ex elit laborum aliqua ut cupidatat incididunt Duis irure et sint aliqua laboris consectetur eiusmod eiusmod cupidatat officia cillum labore quis deserunt cupidatat cillum non pariatur sed elit anim minim dolor cupidatat magna nulla dolor veniam aliquip eu velit amet ea magna.',
			'order_by'=>'1',
			'created_at'=>time(),
			'updated_at'=>time(),
		))->execute();

		\DB::insert('pages')->set(array(
			'title'=>'About us',
			'slug'=>'about-us',
			'overview'=>'Lorem ipsum Voluptate commodo occaecat non irure nostrud ut veniam voluptate proident qui.',
			'details'=>'Lorem ipsum Ut proident est eu Ut irure nisi Ut aliqua aliquip id reprehenderit sit deserunt ut laboris adipisicing dolore ad id est ad eu nostrud Duis enim nostrud exercitation aute dolore in adipisicing veniam velit veniam voluptate culpa elit adipisicing in enim consectetur adipisicing id proident culpa in eu cupidatat enim voluptate ut quis deserunt reprehenderit ad cupidatat tempor irure sunt enim pariatur labore in consequat qui velit in occaecat quis consectetur velit mollit do est id ad incididunt Ut velit pariatur ea dolor laborum ea id enim id veniam non Excepteur velit in cillum Excepteur ex consequat anim Duis et occaecat reprehenderit reprehenderit nulla nostrud eiusmod irure labore amet nostrud reprehenderit ut Duis veniam ut anim enim ullamco in do do voluptate labore labore voluptate deserunt nisi in Excepteur enim elit dolor ad exercitation consectetur reprehenderit sunt esse ut id dolore deserunt enim sit quis adipisicing officia nostrud ad consectetur aute sint ut qui elit Ut ex elit laborum aliqua ut cupidatat incididunt Duis irure et sint aliqua laboris consectetur eiusmod eiusmod cupidatat officia cillum labore quis deserunt cupidatat cillum non pariatur sed elit anim minim dolor cupidatat magna nulla dolor veniam aliquip eu velit amet ea magna.',
			'order_by'=>'2',
			'created_at'=>time(),
			'updated_at'=>time(),
		))->execute();
		
	}

	public function down()
	{
		\DBUtil::drop_table('pages');
	}
}