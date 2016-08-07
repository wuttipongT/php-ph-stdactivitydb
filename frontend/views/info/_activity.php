<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="activity-item-<?= $length ?>" style="border-top: 1px dashed red;padding-top: 10px;">

    <div class="row">

        <div class="col-sm-3" style="text-align: center;">กิจกรรม  </div>
        <div class="col-sm-3">ประเภทของกิจกรรม</div>
        <div class="col-sm-3">ตำแหน่งที่เข้าร่วม</div>
        <div class="col-sm-3">ชื่อตำแหน่ง (กรณีเป็นผู้จัดงาน)</div>


    </div>
    <div class="row">



        <div class="col-sm-3">
            <div class="my-inner">
                <div class="form-group field-activity-activity_name required">
                    <textarea id="activity-activity_name" class="form-control" name="Activity[Activity_Name][]"></textarea>

                    <div class="help-block"></div>
                </div></div>
        </div>

        <div class="col-sm-3">
            <div class="my-inner">
                <div class="form-group field-activity-type_id required">
                    <select id="activity-type_id" class="form-control" name="Activity[Type_Id][]" rows="6">
                        <option value=""> - </option>
                        <option value="1">วิชาการ</option>
                        <option value="2">วิชาชีพ</option>
                        <option value="3">บำเพ็ญประโยชน์</option>
                        <option value="4">ทำนุบำรุงศิลปวัฒนธรรม</option>
                        <option value="5">กีฬา</option>
                    </select>

                    <div class="help-block"></div>
                </div>            </div> 
        </div>

        <div class="col-sm-3">
            <div class="my-inner">
                <div class="form-group field-activity-str1">
                    <select id="activity-str1" class="form-control" name="Activity[str1][]" rows="6">
                        <option value=""> - </option>
                        <option value="ทีมจัดงาน">ทีมจัดงาน</option>
                        <option value="ผู้เข้าร่วม">ผู้เข้าร่วม</option>
                    </select>

                    <div class="help-block"></div>
                </div></div>

        </div>

        <div class="col-sm-3">
            <div class="my-inner">
                <div class="form-group field-activity-str2">
                    <input id="activity-str2" class="form-control" name="Activity[str2][]" prompt=" - " type="text">

                    <div class="help-block"></div>
                </div></div> 
        </div>

    </div>
    <div class="row">
        <div class="col-sm-3">บทบาท</div>
        <div class="col-sm-3">องค์กรที่จัด</div>
        <div class="col-sm-2">ระดับงาน</div>
        <div class="col-sm-2">ปีการศึกษา</div>
        <div class="col-sm-2">จำนวน ชม.</div>
    </div>

    <div class="row">

        <div class="col-sm-3">
            <div class="my-inner">
                <div class="form-group field-activity-str3">
                    <textarea id="activity-str3" class="form-control" name="Activity[str3][]" prompt=" - "></textarea>

                    <div class="help-block"></div>
                </div></div>
        </div>

        <div class="col-sm-3">
            <div class="my-inner">
                <div class="form-group field-activity-str4">
                    <textarea id="activity-str4" class="form-control" name="Activity[str4][]" prompt=" - "></textarea>

                    <div class="help-block"></div>
                </div>            </div>
        </div>

        <div class="col-sm-2">
            <div class="my-inner">
                <div class="form-group field-activity-str5">
                    <select id="activity-str5" class="form-control" name="Activity[str5][]" rows="6">
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

        <div class="col-sm-2">
            <div class="my-inner">
                <div class="form-group field-activity-activity_year required">
                    <select id="activity-activity_year" class="form-control" name="Activity[Activity_Year][]" rows="6">
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

        <div class="col-sm-2">
            <div class="my-inner">
                <div class="form-group field-activity-activity_time required">
                    <select id="activity-activity_time" class="form-control" name="Activity[Activity_Time][]" rows="6">
                        <option value=""> - </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="-9">31-40</option>
                    </select>

                    <div class="help-block"></div>
                </div></div>
        </div>

    </div>

</div>


