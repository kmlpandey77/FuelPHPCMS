<?php

namespace Fuel\Migrations;

class Create_users
{
	public function up()
	{
		\DBUtil::create_table('users', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'username' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'password' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'email' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'group' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'profile_fields' => array('type' => 'text', 'null' => true),
			'last_login' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'login_hash' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'reset_hash' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'deleted_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('users');
	}
}