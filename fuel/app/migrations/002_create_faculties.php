<?php

namespace Fuel\Migrations;

class Create_faculties
{
	public function up()
	{
		\DBUtil::create_table('faculties', array(
            'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
            'name' => array('type' => 'text'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('faculties');
	}
}