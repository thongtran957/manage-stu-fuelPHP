<?php

class Model_Student extends \Orm\Model
{
    protected static $_properties = array(
        'id',
        'name',
        'gender',
        'birthday',
        'phone',
        'address',
        'faculty_id',
        'major_id',
    );
}
