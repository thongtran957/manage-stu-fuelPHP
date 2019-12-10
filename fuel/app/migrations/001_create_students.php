<?php

namespace Fuel\Migrations;

class Create_students
{
    public function up()
    {
        \DBUtil::create_table('students', array(
            'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
            'name' => array('type' => 'text'),
            'gender' => array('type' => 'text'),
            'birthday' => array('type' => 'date'),
            'phone' => array('type' => 'text'),
            'address' => array('type' => 'text'),
            'faculty_id' => array('type' => 'int'),
            'major_id' => array('type' => 'int'),
        ), array('id'));
    }

    public function down()
    {
        \DBUtil::drop_table('students');
    }
}