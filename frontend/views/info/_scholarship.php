
<?php

use yii\helpers\ArrayHelper;

$years = range('2552', '2560'); //range(date("Y"), date("Y", strtotime("now - 100 years")));
foreach ($years as $id => $year) {

    $list[] = ['id' => $year, 'value' => $year];
}
$dataList = ArrayHelper::map($list, 'id', 'value');
$ScholarshipList = ArrayHelper::map(app\models\Scholarship::getScholarshipItem(), 'Scholarship_Id', 'Scholarship_Name');
?>
<div class="scholarship-item-<?=$length ?>">
<div class="col-sm-6">
    <div class="my-inner">
        <div class="form-group field-scholarship-scholarship_desc required">
            <select id="scholarship-scholarship_desc" class="form-control" name="Scholarship[Scholarship_DESC][]" rows="6">
                <option value=""> - </option>
                <?php
                foreach ($ScholarshipList as $index => $val) {
                    print '<option value="' . $index . '">' . $val . '</option>';
                }
                ?>
            </select>

            <div class="help-block"></div>
        </div>                
    </div>
</div>
<div class="col-sm-6">
    <div class="my-inner">
        <div class="form-group field-scholarship-scholarship_year required">
            <select id="scholarship-scholarship_year" class="form-control" name="Scholarship[Scholarship_Year][]" rows="6">
                <option value=""> - </option>
                <?php
                foreach ($dataList as $index => $val) {
                    print '<option value="' . $index . '">' . $val . '</option>';
                }
                ?>
            </select>

            <div class="help-block"></div>
        </div>                
    </div>
</div>
</div>