<?php

use Fuel\Core\Input;
use Fuel\Core\Form;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Add data.json -->
    <script type="application/json" src="data.json"></script>
    <!--validate-->
    <script type="text/javascript"
            src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
</head>
<body>
<div id="container">
    <h1>Danh sách sinh viên</h1>
    <button type="button" class="btn btn-primary" data-target="#modalAdd" data-toggle="modal" id="0">Tạo mới</button>
    <div id="msg"><?php
        $msg = Session::get_flash('msg');

        echo $msg;
        ?></div>
    <table id="dtBasicExample" class="table table-bordered table-striped" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>
                <input class="custom-control custom-checkbox" type="checkbox" id="select-all">
            </th>
            <th>Mã SV</th>
            <th>Họ Tên</th>
            <th>Ngày Sinh</th>
            <th>Giới Tính</th>
            <th>Số điện thoại</th>
            <th>Khoa</th>
            <th>Chuyên Ngành</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        </thead>
        <tbody id="content">
        <?php foreach ($students as $student) { ?>
            <tr>
                <th>
                    <input class="custom-control custom-checkbox" type="checkbox" value="<?php echo $student['id']; ?>">
                </th>
                <th><?php echo $student['id'] ?></th>
                <th><?php echo $student['name'] ?></th>
                <th><?php echo $student['birthday'] ?></th>
                <th><?php echo $student['gender'] ?></th>
                <th><?php echo $student['phone'] ?></th>
                <th><?php echo $student['fname'] ?></th>
                <th><?php echo $student['mname'] ?></th>
                <th><a class="btn" data-target="#modalAdd" data-toggle="modal" id="<?php echo $student['id']; ?>"><i
                                class="fa fa-pencil"></i></a></th>
                <th><a class="btn btn-delete" onlick="return confirm('Are you sure you want to delete this item?');" href="/student/delete/<?php echo $student['id']; ?>"><i
                                class="fa fa-trash"></i></a></th>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php include('modal.php'); ?>
</div>
<a type="button" class="btn btn-primary" id="btn-del-multiple">Xóa</a>
</body>
<script>
    //show modal
    $('#modalAdd').on('show.bs.modal', function (e) {
        id = e.relatedTarget.id
        if (id == 0) {
            $("#id").prop("readonly", false);
            $('#formAdd').attr('action', '/student/add');
            $('#id').val('')
            $('#name').val('')
            $('#address').val('')
            $('#phone').val('')
            $('#birthday').val('2019-06-10')
            $('#faculty').val('')
            $('#major').val('')
        } else {
            $("#btn-save").html("Cập nhật")
            $("#btn-save").attr("data-id", 2)
            $('#formAdd').attr('action', '/student/update');
            $("#id").prop("readonly", true);

            $.ajax({
                url: '/student/edit/' + id,
                type: 'get',
                success: function (data) {
                    var obj_student = jQuery.parseJSON(data)[0];
                    $('#id').val(obj_student.id)
                    $('#name').val(obj_student.name)
                    if (obj_student.gender == 'Nam') {
                        $('#gender').val(0)
                    } else {
                        $('#gender').val(1)
                    }
                    $('#address').val(obj_student.address)
                    $('#phone').val(obj_student.phone)
                    $('#birthday').val(obj_student.birthday)
                    $('#faculty').val(obj_student.faculty_id)
                    $('#major').val(obj_student.major_id)
                },
                error: function () {

                }
            });
        }
    })

    // validate
    var validate = $("#formAdd").validate({
        rules: {
            id: {
                required: true,
                number: true,
                min: 1,
            },
            name: "required",
            phone_number: {
                required: true,
                digits: true
            },
        }
    });

    delete multiple
    $('#select-all').click(function (e) {
        $(this).closest('table').find('th input:checkbox').prop('checked', this.checked);
    });

    $('#btn-del-multiple').click(function (e) {
        check = false
        arr_id = []
        $('input:checked').each(function () {
            arr_id.push($(this).val())
            check = true
        });
        if (check == true) {
            if (confirm("Are you sure delete its ?")) {
                location.href = "/student/deletemultiple/" + arr_id
            }
        } else {
            $("#msg").html('<label>Vui lòng chọn sinh viên để xóa</label>')
        }
    });
</script>
</html>