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
    <div id="msg"></div>
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
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>
        <?php foreach ($students as $student) { ?>
            <tr>
                <th>
                    <input class="custom-control custom-checkbox" type="checkbox" id="select-all">
                </th>
                <th><?php echo $student['id'] ?></th>
                <th><?php echo $student['name'] ?></th>
                <th><?php echo $student['birthday'] ?></th>
                <th><?php echo $student['gender'] ?></th>
                <th><?php echo $student['phone'] ?></th>
                <th><?php echo $student['fname'] ?></th>
                <th><?php echo $student['mname'] ?></th>
                <th><a class="btn" data-target="#modalAdd" data-toggle="modal" id="' + obj.id + '"><i
                                class="fa fa-pencil"></i></a></th>
                <th><a class="btn btn-delete" href="/student/delete/<?php echo $student['id']; ?>"><i
                                class="fa fa-trash"></i></a></th>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<button type="button" class="btn btn-primary" id="btn-del-multiple">Xóa</button>

</body>
</html>