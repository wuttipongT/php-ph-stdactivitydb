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
                    
                        <?=$form->field($tb_scholarship[$i], 'Scholarship_Id', [
                                'template' => "{input}\n{hint}\n{error}"
                            ])->hiddenInput(['name' => 'Scholarship[Scholarship_Id][]'])->label(FALSE)
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
   <hr/>
        <div class="col-sm-9 col-sm-offset-2">
            <div class="form-group">
                <?= Html::submitButton('ปรับปรุงข้อมูล', ['class' => 'btn btn-block btn-primary', 'data-action' => Yii::$app->urlManager->createUrl(['/info/update']), 'data-record' => 1,'data-seq'=>'1']) ?>
            </div>
        </div>

               
<?php ActiveForm::end(); ?>