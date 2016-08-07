<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\ArrayHelper;

$years = range('2552', '2560'); //range(date("Y"), date("Y", strtotime("now - 100 years")));
foreach ($years as $id => $year) {

    $list[] = ['id' => $year, 'value' => $year];
}
$dataList = ArrayHelper::map($list, 'id', 'value');
$awarditem = ArrayHelper::map(\app\models\Award::getAwardItem(), 'Award_Id', 'Award_Name')
?>
<div class="award-item-<?=$length ?>">
<div class="col-sm-6">
    <div class="my-inner">
        <div class="form-group field-award-award_id required">
            <select id="award-award_id" class="form-control" name="Award[Award_Id][]" rows="6" onchange="js:fncAwardOthor(this)">
                <option value=""> - </option>
                <?php
                foreach ($awarditem as $index => $val) {
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
        <div class="form-group field-award-award_year required">
            <select id="award-award_year" class="form-control" name="Award[Award_Year][]" rows="6">
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