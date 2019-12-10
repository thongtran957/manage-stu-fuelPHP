<?php

namespace Fuel\Migrations;

class Create_majors
{
	public function up()
	{
		\DBUtil::create_table('majors', array(
            'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
            'name' => array('type' => 'text'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('majors');
	}
}