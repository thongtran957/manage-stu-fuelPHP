<div class="row d-flex justify-content-center modalWrapper">
    <div class="modal fade addNewInputs" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold ml-5">Tạo mới sinh viên</h4>
                    <button type="button" class="close text-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <?php echo Form::open(array('action' => '/student/add', 'method' => 'post', 'id' => 'formAdd')); ?>
                    <div class="form-group">
                        <?php echo Form::label('Mã sinh viên *', 'none', array('class' => 'col-sm-3 col-form-label')); ?>
                        <?php echo Form::input('id', '', array('class' => 'form-control', 'id' => 'id')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo Form::label('Họ tên *', '', array('class' => 'col-sm-3 col-form-label')); ?>
                        <?php echo Form::input('name', '', array('class' => 'form-control', 'id' => 'name')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo Form::label('Giới tính *', '', array('class' => 'col-sm-3 col-form-label')); ?>
                        <?php echo Form::select('gender', '', array(
                            '0' => 'Nam',
                            '1' => 'Nữ',
                        ), array(
                            'class' => 'form-control', 'id' => 'gender'
                        )); ?>
                    </div>
                    <div class="form-group">
                        <?php echo Form::label('Ngày sinh *', '', array('class' => 'col-sm-3 col-form-label')); ?>
                        <?php echo Form::input('birthday', '2019-06-10', array('class' => 'form-control', 'type' => 'date', 'id' => 'birthday')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo Form::label('Số điện thoại *', '', array('class' => 'col-sm-3 col-form-label')); ?>
                        <?php echo Form::input('phone', '', array('class' => 'form-control', 'id' => 'phone')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo Form::label('Địa chỉ  *', '', array('class' => 'col-sm-3 col-form-label')); ?>
                        <?php echo Form::input('address', '', array('class' => 'form-control', 'id' => 'address')); ?>
                    </div>
                    <?php
                    $arr_faculty = array();

                    foreach ($faculties as $key => $faculty) {
                        $arr_faculty[$faculty['id']] = $faculty['name'];
                    }
                    ?>
                    <div class="form-group">
                        <?php echo Form::label('Khoa *', '', array('class' => 'col-sm-3 col-form-label')); ?>
                        <?php echo Form::select('faculty', '', $arr_faculty
                            , array(
                                'class' => 'form-control',
                                'id' => 'faculty'
                            )); ?>
                    </div>

                    <?php
                    $arr_major = array();

                    foreach ($majors as $key => $major) {
                        $arr_major[$major['id']] = $major['name'];
                    }
                    ?>
                    <div class="form-group">
                        <?php echo Form::label('Chuyên Ngành *', '', array('class' => 'col-sm-3 col-form-label')); ?>
                        <?php echo Form::select('major', '', $arr_major
                            , array(
                                'class' => 'form-control',
                                'id' => 'major'
                            )); ?>
                    </div>
                    <div class="modal-footer">
                        <?php echo Form::button('btn-save', 'Submit', array(
                            'class' => 'btn btn-primary',
                            'id' => 'btn-save'));
                        ?>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                    </div>
                    <?php echo Form::close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

