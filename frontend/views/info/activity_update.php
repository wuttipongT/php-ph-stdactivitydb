<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

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
        <div class="activity-item">
             <?php
                    foreach ($tb_activity as $i => $val) {
                        ?>
            
             <?=
                $form->field($tb_activity[$i], 'Activity_Id', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->hiddenInput(['name' => 'Activity[Activity_Id][]'])->label(FALSE)
                ?>
        <div class="activity-item-<?=$i?>" <?php if($i != 0) :?>style="border-top: 1px dashed red;padding-top: 10px;" <?php endif;?>>
    <div class="row" style="margin-left: 0 !important; margin-right: 0 !important;">

        <div class="col-sm-3" style="text-align: center;">กิจกรรม  </div>
        <div class="col-sm-3">ประเภทของกิจกรรม</div>
        <div class="col-sm-3">ตำแหน่งที่เข้าร่วม</div>
        <div class="col-sm-3">ชื่อตำแหน่ง (กรณีเป็นผู้จัดงาน)</div>
        
       
    </div>
    <div class="row" style="margin-left: 0 !important; margin-right: 0 !important;">



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
    <div class="row" style="margin-left: 0 !important; margin-right: 0 !important;">
        <div class="col-sm-3">บทบาท</div>
        <div class="col-sm-3">องค์กรที่จัด</div>
        <div class="col-sm-2">ระดับงาน</div>
        <div class="col-sm-2">ปีการศึกษา</div>
        <div class="col-sm-2">จำนวน ชม.</div>
    </div>
    
    <div class="row" style="margin-left: 0 !important; margin-right: 0 !important;">
        
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
  <hr/>
        <div class="col-sm-9 col-sm-offset-2">
            <div class="form-group">
                <?= Html::submitButton('ปรับปรุงข้อมูล', ['class' => 'btn btn-block btn-primary', 'data-action' => Yii::$app->urlManager->createUrl(['/info/update']), 'data-record' => 1,'data-seq'=>'3']) ?>
            </div>
        </div>

<?php ActiveForm::end(); ?>