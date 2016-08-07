<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
?>
<?php
$form = ActiveForm::begin(
                [
                    //'action' => Yii::$app->urlManager->createUrl(['/info/secondc']),
                    'options' => [
                        'id' => 'w02',
                        'class' => 'form-horizontal'
                    ]
                ]
);
$years = range('2552', '2560'); //range(date("Y"), date("Y", strtotime("now - 100 years")));
foreach ($years as $id => $year) {

    $list[] = ['id' => $year, 'value' => $year];
}
$dataList = ArrayHelper::map($list, 'id', 'value');
?>

<div class="my-container" style="padding-left: 10px;">

    <?php if ($isUpdate->isNewRecord) : ?>
        <div class="row">
            <div class="scholarship">
                <div class="scholarship-head">
                    <div class="col-sm-6" style="text-align: center;">
                        ทุนการศึกษาที่เคยได้รับ
                    </div>
                    <div class="col-sm-6" style="text-align: center;">
                        ปีการศึกษาที่ได้รับ (หากเคยได้รับทุน)
                    </div>
                </div>
                <div class="scholarship-item">
                    <div class="scholarship-item-0">
                        <div class="col-sm-6">
                            <div class="my-inner">
                                <?php $ScholarshipList = ArrayHelper::map(app\models\Scholarship::getScholarshipItem(), 'Scholarship_Id', 'Scholarship_Name'); ?>
                                <?=
                                $form->field($tb_scholarship, 'Scholarship_DESC', [
                                    'template' => "{input}\n{hint}\n{error}"
                                ])->dropDownList($ScholarshipList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name' => 'Scholarship[Scholarship_DESC][]'])->label(FALSE)
                                ?>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="my-inner">
                                <?=
                                $form->field($tb_scholarship, 'Scholarship_Year', [
                                    'template' => "{input}\n{hint}\n{error}"
                                ])->dropDownList($dataList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name' => 'Scholarship[Scholarship_Year][]'])->label(FALSE)
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button id="btnAdd-scholarship" type="button" class="btn btn-primary btn-sm">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่ม
            </button>
            <button id="btnRem-scholarship" type="button" class="btn btn-danger btn-sm">
                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> ลบ
            </button>
        </div>
    <hr/>
        <div class="row">
            <div class="award">
                <div class="award-head">
                    <div class="col-sm-6" style="text-align: center;">
                        รางวัลที่เคยได้รับ
                    </div>
                    <div class="col-sm-6" style="text-align: center;">
                        ปีการศึกษาที่ได้รับ (หากเคยได้รับรางวัล)
                    </div>
                </div>
                <div class="award-item">
                    <div class="award-item-0">
                        <div class="col-sm-6">
                            <div class="my-inner">
                                <?php
                                $awarditem = ArrayHelper::map(\app\models\Award::getAwardItem(), 'Award_Id', 'Award_Name')
                                ?>
                                <?=
                                $form->field($tb_award, 'Award_Id', [
                                    'template' => "{input}\n{hint}\n{error}"
                                ])->dropDownList($awarditem, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'onchange' => 'js:fncAwardOthor(this)', 'name' => 'Award[Award_Id][]'])->label(FALSE)
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="my-inner">
                                <?php $dataList = ArrayHelper::map($list, 'id', 'value'); ?>
                                <?=
                                $form->field($tb_award, 'Award_Year', [
                                    'template' => "{input}\n{hint}\n{error}"
                                ])->dropDownList($dataList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name' => 'Award[Award_Year][]'])->label(FALSE)
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button id="btnAdd-award" type="button" class="btn btn-primary btn-sm">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่ม
            </button>
            <button id="btnRem-award" type="button" class="btn btn-danger btn-sm">
                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> ลบ
            </button>
        </div>
            
        <hr/>
        <div class="activity-item">
        <div class="activity-item-0">
    <div class="row">

        <div class="col-sm-3" style="text-align: center;">กิจกรรม  </div>
        <div class="col-sm-3">ประเภทของกิจกรรม</div>
        <div class="col-sm-3">ตำแหน่งที่เข้าร่วม</div>
        <div class="col-sm-3">ชื่อตำแหน่ง (กรณีเป็นผู้จัดงาน)</div>
        
       
    </div>
    <div class="row">



        <div class="col-sm-3">
            <div class="my-inner">
<?=
$form->field($tb_activity, 'Activity_Name', [
    'template' => "{input}\n{hint}\n{error}"
])->textarea(['class' => 'form-control','name' => 'Activity[Activity_Name][]'])->label(FALSE)
?></div>
        </div>

        <div class="col-sm-3">
            <div class="my-inner">
<?php
$typeItem = ArrayHelper::map(\app\models\Activity::getType(), 'Type_Id', 'Type_Name')
?>
                <?=
                $form->field($tb_activity, 'Type_Id', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($typeItem, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ','name' => 'Activity[Type_Id][]'])->label(FALSE)
                ?>
            </div> 
        </div>

        <div class="col-sm-3">
            <div class="my-inner">
<?php
$posiInto = [
    ['id' => 'ทีมจัดงาน', 'value' => 'ทีมจัดงาน'],
    ['id' => 'ผู้เข้าร่วม', 'value' => 'ผู้เข้าร่วม'],
];
$posiIntoItem = ArrayHelper::map($posiInto, 'id', 'value')
?>
                <?=
                $form->field($tb_activity, 'str1', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($posiIntoItem, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ','name' => 'Activity[str1][]'])->label(FALSE)
                ?></div>

        </div>

        <div class="col-sm-3">
            <div class="my-inner">
<?=
$form->field($tb_activity, 'str2', [
    'template' => "{input}\n{hint}\n{error}"
])->textInput(['class' => 'form-control', 'prompt' => ' - ','name' => 'Activity[str2][]'])->label(FALSE)
?></div> 
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
                <?=
                $form->field($tb_activity, 'str3', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->textarea(['class' => 'form-control', 'prompt' => ' - ','name' => 'Activity[str3][]'])->label(FALSE)
                ?></div>
        </div>
        
        <div class="col-sm-3">
            <div class="my-inner">
                <?php
                $typeItem = ArrayHelper::map(\app\models\Activity::getType(), 'Type_Id', 'Type_Name');
                ?>
<?=
$form->field($tb_activity, 'str4', [
    'template' => "{input}\n{hint}\n{error}"
])->textarea(['class' => 'form-control', 'prompt' => ' - ','name' => 'Activity[str4][]'])->label(FALSE)
?>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="my-inner">
<?php
$charac = [
    ['id' => 'ชมรม', 'value' => 'ชมรม'],
    ['id' => 'ชั้นปี', 'value' => 'ชั้นปี'],
    ['id' => 'คณะ', 'value' => 'คณะ'],
    ['id' => 'มหาวิทยาลัย', 'value' => 'มหาวิทยาลัย'],
    ['id' => 'จังหวัด', 'value' => 'จังหวัด'],
    ['id' => 'ประเทศ', 'value' => 'ประเทศ'],
];
$characItem = ArrayHelper::map($charac, 'id', 'value');
?>
                <?=
                $form->field($tb_activity, 'str5', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($characItem, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ','name' => 'Activity[str5][]'])->label(FALSE)
                ?></div>
        </div>

        <div class="col-sm-2">
            <div class="my-inner">
                <?=
                $form->field($tb_activity, 'Activity_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ','name' => 'Activity[Activity_Year][]'])->label(FALSE)
                ?></div>
        </div>

        <div class="col-sm-2">
                <?php
                $time = [
                    ['id' => 1, 'value' => '1'],
                    ['id' => 2, 'value' => '2'],
                    ['id' => 3, 'value' => '3'],
                    ['id' => 4, 'value' => '4'],
                    ['id' => 5, 'value' => '5'],
                    ['id' => 6, 'value' => '6'],
                    ['id' => 7, 'value' => '7'],
                    ['id' => 8, 'value' => '8'],
                    ['id' => 9, 'value' => '9'],
                    ['id' => 10, 'value' => '10'],
                    ['id' => 11, 'value' => '11'],
                    ['id' => 12, 'value' => '12'],
                    ['id' => 13, 'value' => '13'],
                    ['id' => 14, 'value' => '14'],
                    ['id' => 15, 'value' => '15'],
                    ['id' => 16, 'value' => '16'],
                    ['id' => 17, 'value' => '17'],
                    ['id' => 18, 'value' => '18'],
                    ['id' => 19, 'value' => '19'],
                    ['id' => 20, 'value' => '20'],
                    ['id' => 21 - 30, 'value' => '21-30'],
                    ['id' => 31 - 40, 'value' => '31-40'],
                ];
                $timeList = ArrayHelper::map($time, 'id', 'value');
                ?>
            <div class="my-inner">
            <?=
            $form->field($tb_activity, 'Activity_Time', [
                'template' => "{input}\n{hint}\n{error}"
            ])->dropDownList($timeList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ','name' => 'Activity[Activity_Time][]'])->label(FALSE)
            ?></div>
        </div>
        
    </div>
            </div>
        </div>
                <button id="btnAdd-Activ" type="button" class="btn btn-primary btn-sm">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่ม
            </button>
            <button id="btnRem-Activ" type="button" class="btn btn-danger btn-sm">
              <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> ลบ
            </button>
            
        
        <hr/>
        <div class="position-items">
            <div class="position-items-0">
    <div class="row">
        <div class="col-sm-4" style="text-align: center;">ตำแหน่ง</div>
        <div class="col-sm-3" style="text-align: center;">ระดับของกิจกรรมนิสิต</div>
        <div class="col-sm-3" style="text-align: center;">ระบุรายละเอียด ถ้ามี </div>
        <div class="col-sm-2"> ปีการศึกษา </div>

        <div class="col-sm-4">
            <div class="my-inner">
<?php
//$ms_scholarship::find()->where(['Status' => '0'])->all()
$clubItem = ArrayHelper::map(\app\models\Position::getClup(), 'Club_Id', 'Club_Name');
?>
<?=
$form->field($tb_position, 'Club_Id', [
    'template' => "{input}\n{hint}\n{error}"
])->dropDownList($clubItem, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ','name' => 'Position[Club_Id][]'])->label(FALSE)
?>
            </div>
        </div>
        <div class="col-sm-3">
                <?php
                $timeList = ArrayHelper::map($charac, 'id', 'value');
                ?>
            <div class="my-inner">
<?=
$form->field($tb_position, 'str1', [
    'template' => "{input}\n{hint}\n{error}"
])->dropDownList($timeList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ','name' => 'Position[str1][]'])->label(FALSE)
?></div>
        </div>
        <div class="col-sm-3">
            <div class="my-inner">
                <?=
                $form->field($tb_position, 'Description', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->textInput(['maxlength' => true, 'class' => 'form-control', 'name' => 'Position[Description][]'])->label(FALSE)
                ?>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="my-inner">
                <?=
                $form->field($tb_position, 'Position_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ','name' => 'Position[Position_Year][]'])->label(FALSE)
                ?></div>
        </div>

    </div>
                </div></div>
        <button id="btnAdd-posi" type="button" class="btn btn-primary btn-sm">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่ม
            </button>
            <button id="btnRem-posi" type="button" class="btn btn-danger btn-sm">
              <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> ลบ
            </button>
 
        <!-------------------////////////////////-----------------------------////////////////////-------------------------/////////////////------->
    <?php else : ?>
     
        <div class="row">
            <div class="scholarship">
                <div class="scholarship-head">
                    <div class="col-sm-6" style="text-align: center;">
                        ทุนการศึกษาที่เคยได้รับ
                    </div>
                    <div class="col-sm-6" style="text-align: center;">
                        ปีการศึกษาที่ได้รับ (หากเคยได้รับทุน)
                    </div>
                </div>
                <div class="scholarship-item">
                    <?php
                    foreach ($tb_scholarship as $i => $val) {
                        ?>
                        <div class="scholarship-item-<?= $i ?>">
                            <div class="col-sm-6">
                                <div class="my-inner">
                                    <?php $ScholarshipList = ArrayHelper::map(app\models\Scholarship::getScholarshipItem(), 'Scholarship_Id', 'Scholarship_Name'); ?>
                                    <?=
                                    $form->field($tb_scholarship[$i], 'Scholarship_DESC', [
                                        'template' => "{input}\n{hint}\n{error}"
                                    ])->dropDownList($ScholarshipList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name' => 'Scholarship[Scholarship_DESC][]'])->label(FALSE)
                                    ?>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="my-inner">
                                    <?=
                                    $form->field($tb_scholarship[$i], 'Scholarship_Year', [
                                        'template' => "{input}\n{hint}\n{error}"
                                    ])->dropDownList($dataList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name' => 'Scholarship[Scholarship_Year][]'])->label(FALSE)
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!--<button id="btnAdd-scholarship" type="button" class="btn btn-primary btn-sm">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่ม
            </button>
            <button id="btnRem-scholarship" type="button" class="btn btn-danger btn-sm">
              <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> ลบ
            </button>-->
        </div>
        <hr/>
        <div class="row">
            <div class="award">
                <div class="award-head">
                    <div class="col-sm-6" style="text-align: center;">
                        รางวัลที่เคยได้รับ
                    </div>
                    <div class="col-sm-6" style="text-align: center;">
                        ปีการศึกษาที่ได้รับ (หากเคยได้รับรางวัล)
                    </div>
                </div>
                <div class="award-item">
                    <?php
                    foreach ($tb_award as $i => $val) {
                        ?>
                        <div class="award-item-<?= $i ?>">
                            <div class="col-sm-6">
                                <div class="my-inner">
        <?php
        $awarditem = ArrayHelper::map(\app\models\Award::getAwardItem(), 'Award_Id', 'Award_Name')
        ?>
                                    <?=
                                    $form->field($tb_award[$i], 'Award_Id', [
                                        'template' => "{input}\n{hint}\n{error}"
                                    ])->dropDownList($awarditem, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'onchange' => 'js:fncAwardOthor(this)', 'name' => 'Award[Award_Id][]'])->label(FALSE)
                                    ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="my-inner">
        <?php $dataList = ArrayHelper::map($list, 'id', 'value'); ?>
                                    <?=
                                    $form->field($tb_award[$i], 'Award_Year', [
                                        'template' => "{input}\n{hint}\n{error}"
                                    ])->dropDownList($dataList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name' => 'Award[Award_Year][]'])->label(FALSE)
                                    ?>
                                </div>
                            </div>
                        </div>
    <?php } ?>
                </div>
            </div>
            <!--<button id="btnAdd-award" type="button" class="btn btn-primary btn-sm">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่ม
            </button>
            <button id="btnRem-award" type="button" class="btn btn-danger btn-sm">
              <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> ลบ
            </button>-->
        </div>
        <!--activity-->
 <hr/>
        <div class="activity-item">
             <?php
                    foreach ($tb_activity as $i => $val) {
                        ?>
        <div class="activity-item-<?=$i?>" <?php if($i != 0) :?>style="border-top: 1px dashed red;padding-top: 10px;" <?php endif;?>>
    <div class="row">

        <div class="col-sm-3" style="text-align: center;">กิจกรรม  </div>
        <div class="col-sm-3">ประเภทของกิจกรรม</div>
        <div class="col-sm-3">ตำแหน่งที่เข้าร่วม</div>
        <div class="col-sm-3">ชื่อตำแหน่ง (กรณีเป็นผู้จัดงาน)</div>
        
       
    </div>
    <div class="row">



        <div class="col-sm-3">
            <div class="my-inner">
<?=
$form->field($tb_activity[$i], 'Activity_Name', [
    'template' => "{input}\n{hint}\n{error}"
])->textarea(['class' => 'form-control','name' => 'Activity[Activity_Name][]'])->label(FALSE)
?></div>
        </div>

        <div class="col-sm-3">
            <div class="my-inner">
<?php
$typeItem = ArrayHelper::map(\app\models\Activity::getType(), 'Type_Id', 'Type_Name')
?>
                <?=
                $form->field($tb_activity[$i], 'Type_Id', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($typeItem, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ','name' => 'Activity[Type_Id][]'])->label(FALSE)
                ?>
            </div> 
        </div>

        <div class="col-sm-3">
            <div class="my-inner">
<?php
$posiInto = [
    ['id' => 'ทีมจัดงาน', 'value' => 'ทีมจัดงาน'],
    ['id' => 'ผู้เข้าร่วม', 'value' => 'ผู้เข้าร่วม'],
];
$posiIntoItem = ArrayHelper::map($posiInto, 'id', 'value')
?>
                <?=
                $form->field($tb_activity[$i], 'str1', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($posiIntoItem, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ','name' => 'Activity[str1][]'])->label(FALSE)
                ?></div>

        </div>

        <div class="col-sm-3">
            <div class="my-inner">
<?=
$form->field($tb_activity[$i], 'str2', [
    'template' => "{input}\n{hint}\n{error}"
])->textInput(['class' => 'form-control', 'prompt' => ' - ','name' => 'Activity[str2][]'])->label(FALSE)
?></div> 
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
                <?=
                $form->field($tb_activity[$i], 'str3', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->textarea(['class' => 'form-control', 'prompt' => ' - ','name' => 'Activity[str3][]'])->label(FALSE)
                ?></div>
        </div>
        
        <div class="col-sm-3">
            <div class="my-inner">
                <?php
                $typeItem = ArrayHelper::map(\app\models\Activity::getType(), 'Type_Id', 'Type_Name');
                ?>
<?=
$form->field($tb_activity[$i], 'str4', [
    'template' => "{input}\n{hint}\n{error}"
])->textarea(['class' => 'form-control', 'prompt' => ' - ','name' => 'Activity[str4][]'])->label(FALSE)
?>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="my-inner">
<?php
$charac = [
    ['id' => 'ชมรม', 'value' => 'ชมรม'],
    ['id' => 'ชั้นปี', 'value' => 'ชั้นปี'],
    ['id' => 'คณะ', 'value' => 'คณะ'],
    ['id' => 'มหาวิทยาลัย', 'value' => 'มหาวิทยาลัย'],
    ['id' => 'จังหวัด', 'value' => 'จังหวัด'],
    ['id' => 'ประเทศ', 'value' => 'ประเทศ'],
];
$characItem = ArrayHelper::map($charac, 'id', 'value');
?>
                <?=
                $form->field($tb_activity[$i], 'str5', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($characItem, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ','name' => 'Activity[str5][]'])->label(FALSE)
                ?></div>
        </div>

        <div class="col-sm-2">
            <div class="my-inner">
                <?=
                $form->field($tb_activity[$i], 'Activity_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ','name' => 'Activity[Activity_Year][]'])->label(FALSE)
                ?></div>
        </div>

        <div class="col-sm-2">
                <?php
                $time = [
                    ['id' => 1, 'value' => '1'],
                    ['id' => 2, 'value' => '2'],
                    ['id' => 3, 'value' => '3'],
                    ['id' => 4, 'value' => '4'],
                    ['id' => 5, 'value' => '5'],
                    ['id' => 6, 'value' => '6'],
                    ['id' => 7, 'value' => '7'],
                    ['id' => 8, 'value' => '8'],
                    ['id' => 9, 'value' => '9'],
                    ['id' => 10, 'value' => '10'],
                    ['id' => 11, 'value' => '11'],
                    ['id' => 12, 'value' => '12'],
                    ['id' => 13, 'value' => '13'],
                    ['id' => 14, 'value' => '14'],
                    ['id' => 15, 'value' => '15'],
                    ['id' => 16, 'value' => '16'],
                    ['id' => 17, 'value' => '17'],
                    ['id' => 18, 'value' => '18'],
                    ['id' => 19, 'value' => '19'],
                    ['id' => 20, 'value' => '20'],
                    ['id' => 21 - 30, 'value' => '21-30'],
                    ['id' => 31 - 40, 'value' => '31-40'],
                ];
                $timeList = ArrayHelper::map($time, 'id', 'value');
                ?>
            <div class="my-inner">
            <?=
            $form->field($tb_activity[$i], 'Activity_Time', [
                'template' => "{input}\n{hint}\n{error}"
            ])->dropDownList($timeList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ','name' => 'Activity[Activity_Time][]'])->label(FALSE)
            ?></div>
        </div>
        
    </div>
            </div>
            <?php } ?>
        </div>
<!--end activity-->
        <hr/>
        <div class="position-items">
            <div class="position-items-0">
    <div class="row">
        <div class="col-sm-4" style="text-align: center;">ตำแหน่ง</div>
        <div class="col-sm-3" style="text-align: center;">ระดับของกิจกรรมนิสิต</div>
        <div class="col-sm-3" style="text-align: center;">ระบุรายละเอียด ถ้ามี </div>
        <div class="col-sm-2"> ปีการศึกษา </div>
 <?php
                    foreach ($tb_position as $i => $val) {
                        ?>
        <div class="col-sm-4">
            <div class="my-inner">
<?php
//$ms_scholarship::find()->where(['Status' => '0'])->all()
$clubItem = ArrayHelper::map(\app\models\Position::getClup(), 'Club_Id', 'Club_Name');
?>
<?=
$form->field($tb_position[$i], 'Club_Id', [
    'template' => "{input}\n{hint}\n{error}"
])->dropDownList($clubItem, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ','name' => 'Position[Club_Id][]'])->label(FALSE)
?>
            </div>
        </div>
        <div class="col-sm-3">
                <?php
                $timeList = ArrayHelper::map($charac, 'id', 'value');
                ?>
            <div class="my-inner">
<?=
$form->field($tb_position[$i], 'str1', [
    'template' => "{input}\n{hint}\n{error}"
])->dropDownList($timeList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ','name' => 'Position[str1][]'])->label(FALSE)
?></div>
        </div>
        <div class="col-sm-3">
            <div class="my-inner">
                <?=
                $form->field($tb_position[$i], 'Description', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->textInput(['maxlength' => true, 'class' => 'form-control', 'name' => 'Position[Description][]'])->label(FALSE)
                ?>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="my-inner">
                <?=
                $form->field($tb_position[$i], 'Position_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ','name' => 'Position[Position_Year][]'])->label(FALSE)
                ?></div>
        </div>
                    <?php }?>
    </div>
                </div></div>
<?php endif; ?>

    <div class="row">
        <div class="col-sm-9 col-sm-offset-2">
            <div class="form-group">
                <?= Html::submitButton($isUpdate->isNewRecord ? 'บันทึกข้อมูล' : 'ปรับปรุงข้อมูล', ['class' => $isUpdate->isNewRecord ? 'btn btn-block btn-success' : 'btn btn-block btn-primary', 'data-action' => Yii::$app->urlManager->createUrl(['/info/update']), 'data-record' => strval($isUpdate->isNewRecord)]) ?>
            </div>
        </div>
    </div>
                
</div>
<?php ActiveForm::end(); ?>