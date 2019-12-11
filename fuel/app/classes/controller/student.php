<?php

use Fuel\Core\Model;
use Fuel\Core\Input;

class Controller_Student extends Controller_Template
{

    public function action_index()
    {
        $data = $this->get_list_info();

        return View::forge('student/index', $data);
    }

    public function action_delete($id = null)
    {
        $result = DB::delete('students')->where('id', $id)->execute();

        $data = $this->get_list_info();

        if ($result) {
            $data['msg'] = "Xóa thành công";
        }
        Session::set_flash('msg', 'Xóa thành công');
        return Response::redirect('student/index');
    }

    public function action_add()
    {
        if (Input::post('gender') == 0) {
            $gender = 'Nam';
        } elseif (Input::post('gender') == 1) {
            $gender = 'Nữ';
        }

        $result = DB::insert('students')->set(
            array(
                'name' => Input::post('name'),
                'gender' => $gender,
                'birthday' => Input::post('birthday'),
                'phone' => Input::post('phone'),
                'address' => Input::post('address'),
                'faculty_id' => Input::post('faculty'),
                'major_id' => Input::post('major'),
            )
        )->execute();

        Session::set_flash('msg', 'Thêm thành công');
        return Response::redirect('student/index');
    }

    public function action_edit($id)
    {
        $student = \Fuel\Core\DB::select('students.*', array('faculties.name', 'fname'), array('majors.name', 'mname'))
            ->from('students')
            ->join('faculties')
            ->on('students.faculty_id', '=', 'faculties.id')
            ->join('majors')
            ->on('students.major_id', '=', 'majors.id')
            ->where('students.id', $id)
            ->execute();

        $data = [];
        foreach ($student as $key => $value) {
            $data[$key] = $value;
        }
        $result = json_encode($data);

        return $result;
    }

    public function action_update()
    {
        if (Input::post('gender') == 0) {
            $gender = 'Nam';
        } elseif (Input::post('gender') == 1) {
            $gender = 'Nữ';
        }

        $result = DB::update('students')->set(
            array(
                'name' => Input::post('name'),
                'gender' => $gender,
                'birthday' => Input::post('birthday'),
                'phone' => Input::post('phone'),
                'address' => Input::post('address'),
                'faculty_id' => Input::post('faculty'),
                'major_id' => Input::post('major'),
            )
        )->where('students.id', Input::post('id'))->execute();
//        Session::set('msg', 'Cập nhật thành công');
        Session::set_flash('msg', 'Cập nhật thành công');
        return Response::redirect('student/index');
    }

    public function action_deletemultiple($arr_id)
    {
        $arr_id = explode(',', $arr_id);
        foreach ($arr_id as $id) {
            DB::delete('students')->where('id', (int)$id)->execute();
        }
        Session::set_flash('msg', 'Xóa thành công');
        return Response::redirect('student/index');
    }


    public function get_list_info()
    {
        $data = array();

        $data['students'] = \Fuel\Core\DB::select('students.*', array('faculties.name', 'fname'), array('majors.name', 'mname'))
            ->from('students')
            ->join('faculties')
            ->on('students.faculty_id', '=', 'faculties.id')
            ->join('majors')
            ->on('students.major_id', '=', 'majors.id')
            ->order_by('id', 'desc')
            ->execute();

        $data['faculties'] = \Fuel\Core\DB::select()
            ->from('faculties')
            ->execute();

        $data['majors'] = \Fuel\Core\DB::select()
            ->from('majors')
            ->execute();

        return $data;
    }

}
