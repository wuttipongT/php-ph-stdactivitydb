<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<div class="position-items-<?= $length ?>">

    <div class="row">
        <div class="col-sm-4" style="text-align: center;">ตำแหน่ง</div>
        <div class="col-sm-3" style="text-align: center;">ระดับของกิจกรรมนิสิต</div>
        <div class="col-sm-3" style="text-align: center;">ระบุรายละเอียด ถ้ามี </div>
        <div class="col-sm-2"> ปีการศึกษา </div>

        <div class="col-sm-4">
            <div class="my-inner">
                <div class="form-group field-position-club_id required">
                    <select id="position-club_id" class="form-control" name="Position[Club_Id][]" rows="6">
                        <option value=""> - </option>
                        <option value="1">นายกสโมสรนิสิต</option>
                        <option value="2">อุปนายกสโมสรนิสิต (ระบุฝ่าย)</option>
                        <option value="3">เหรัญญิกสโมสรนิสิต</option>
                        <option value="4">เลขานุการสโมสรนิสิต</option>
                        <option value="5">วิชาการ</option>
                        <option value="6">วิชาชีพ</option>
                        <option value="7">สันทนาการ</option>
                        <option value="8">ประเมินผล</option>
                        <option value="9">กีฬา</option>
                    </select>

                    <div class="help-block"></div>
                </div>            </div>
        </div>
        <div class="col-sm-3">
            <div class="my-inner">
                <div class="form-group field-position-str1">
                    <select id="position-str1" class="form-control" name="Position[str1][]" rows="6">
                        <option value=""> - </option>
                        <option value="ชมรม">ชมรม</option>
                        <option value="ชั้นปี">ชั้นปี</option>
                        <option value="คณะ">คณะ</option>
                        <option value="มหาวิทยาลัย">มหาวิทยาลัย</option>
                        <option value="จังหวัด">จังหวัด</option>
                        <option value="ประเทศ">ประเทศ</option>
                    </select>

                    <div class="help-block"></div>
                </div></div>
        </div>
        <div class="col-sm-3">
            <div class="my-inner">
                <div class="form-group field-position-description required">
                    <input id="position-description" class="form-control" name="Position[Description][]" type="text">

                    <div class="help-block"></div>
                </div>            </div>
        </div>
        <div class="col-sm-2">
            <div class="my-inner">
                <div class="form-group field-position-position_year required">
                    <select id="position-position_year" class="form-control" name="Position[Position_Year][]" rows="6">
                        <option value=""> - </option>
                        <option value="2552">2552</option>
                        <option value="2553">2553</option>
                        <option value="2554">2554</option>
                        <option value="2555">2555</option>
                        <option value="2556">2556</option>
                        <option value="2557">2557</option>
                        <option value="2558">2558</option>
                        <option value="2559">2559</option>
                        <option value="2560">2560</option>
                    </select>

                    <div class="help-block"></div>
                </div></div>
        </div>

    </div>

</div>
