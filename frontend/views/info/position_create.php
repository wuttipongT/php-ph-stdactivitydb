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

$charac = [
    ['id' => 'ชมรม', 'value' => 'ชมรม'],
    ['id' => 'ชั้นปี', 'value' => 'ชั้นปี'],
    ['id' => 'คณะ', 'value' => 'คณะ'],
    ['id' => 'มหาวิทยาลัย', 'value' => 'มหาวิทยาลัย'],
    ['id' => 'จังหวัด', 'value' => 'จังหวัด'],
    ['id' => 'ประเทศ', 'value' => 'ประเทศ'],
];
?>

<div class="position-items">
            <div class="position-items-0">
    <div class="row" style="margin-left: 0 !important; margin-right: 0 !important;">
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
 <hr/>
        <div class="col-sm-9 col-sm-offset-2">
            <div class="form-group">
                <?= Html::submitButton('บันทึกข้อมูล', ['class' => 'btn btn-block btn-success' , 'data-action' => Yii::$app->urlManager->createUrl(['/info/create']), 'data-record' => 1,'data-seq'=>'4']) ?>
            </div>
        </div>  
 
 <?php ActiveForm::end(); ?>