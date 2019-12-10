<?php

class Controller_Student extends Controller_Template
{

    public function action_index()
    {
        $data = array();

        $data['students'] = $this->get_list_students();

        $data['faculties'] = \Fuel\Core\DB::select()
            ->from('faculties')
            ->execute();

        $data['majors'] = \Fuel\Core\DB::select()
            ->from('majors')
            ->execute();

        return View::forge('student/index', $data);
    }

    public function action_delete($id = null)
    {
        $result = DB::delete('students')->where('id', $id)->execute();

        if ($result) {
            $data['msg'] = "Xóa thành công";
        }

        $data['students'] = $this->get_list_students();

        return View::forge('student/index', $data);
    }

    public function get_list_students()
    {
        return $students = \Fuel\Core\DB::select('students.*', array('faculties.name', 'fname'), array('majors.name', 'mname'))
            ->from('students')
            ->join('faculties')
            ->on('students.faculty_id', '=', 'faculties.id')
            ->join('majors')
            ->on('students.major_id', '=', 'majors.id')
            ->execute();
    }

}
