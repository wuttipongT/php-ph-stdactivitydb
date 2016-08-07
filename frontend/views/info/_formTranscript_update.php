<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Info;
use kartik\date\DatePicker;
?>

<?php 
$form = ActiveForm::begin(
                [
                    //'action' => $model->isNewRecord ? 2 : 4Yii::$app->urlManager->createUrl(['/info/save1']),
                    
                    'options' => [
                      //  'enctype'=>'multipart/form-data',
                        'class' => 'form-horizontal',
                        'id' => 'w03'
                    ]
                ]
);
?>
<div class="row" style="margin-left: 0 !important; margin-right: 0 !important;">
    <div class="col-sm-12">
        <?php
        $acadYear = [];
        $year = (date('Y')+543);
        $acadYear[] = ['id'=>'1/'.$year,'value'=>'1/'.$year];
        $acadYear[] = ['id'=>'2/'.$year,'value'=>'2/'.$year];
        $acadYear[] = ['id'=>'3/'.$year,'value'=>'3/'.$year];
        for($i=1; $i<=5; $i++){
            for($j=1;$j<=3;$j++){
                 
                   $year = (date('Y')+543)+$i;
                   $acadYear[] = ['id'=>$j.'/'.$year,'value'=>$j.'/'.$year];
                
            }
        }
        /*$acadyear = [
    ['id' => '1/2559', 'value' => 'ชมรม'],
    ['id' => 'ชั้นปี', 'value' => 'ชั้นปี'],
    ['id' => 'คณะ', 'value' => 'คณะ'],
    ['id' => 'มหาวิทยาลัย', 'value' => 'มหาวิทยาลัย'],
    ['id' => 'จังหวัด', 'value' => 'จังหวัด'],
    ['id' => 'ประเทศ', 'value' => 'ประเทศ'],
];*/
$acadyearItem = ArrayHelper::map($acadYear, 'id', 'value');
        ?>
 
        
        <?=
            $form->field($model, 'Transcript_Index', [
                'template' => "{input}\n{hint}\n{error}"
            ])->hiddenInput()->label(FALSE)
            ?>
    <?=
    $form->field($model, 'Academic_Year', [
        'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
    ])->dropDownList($acadyearItem, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' -- ปีการศึกษา --','style' => 'width:90%; margin-left: 10.5%;'])->label('ปีการศึกษา', ['class' => 'col-sm-2 control-label'])
    ?>
    <?=
    $form->field($model, 'GPA', [
        'template' => "{label}\n<div class='col-sm-10'>\n{input}\n</div>\n{hint}\n{error}"
    ])->textInput(['maxlength' => true, 'class' => 'form-control','style' => 'width:90%; margin-left: 10.5%;'])->label('เกรด', ['class' => 'col-sm-2 control-label'])
    ?>
    </div>
</div>
<div class="row" style="margin-left: 0 !important; margin-right: 0 !important;">
    <div class="col-sm-9 col-sm-offset-1">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'บันทึกข้อมูล' : 'ปรับปรุงข้อมูล', ['class' => $model->isNewRecord ? 'btn btn-block btn-success' : 'btn btn-block btn-primary','name'=>'create-std','data-action'=>Yii::$app->urlManager->createUrl(['/info/update']),'data-record'=>  strval($model->isNewRecord), 'data-isAjax'=>'6']) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>