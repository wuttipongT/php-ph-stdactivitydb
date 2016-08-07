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
                     <?=
                        $form->field($tb_award[$i], 'Award_Index', [
                            'template' => "{input}\n{hint}\n{error}"
                        ])->hiddenInput(['name' => 'Award[Award_Index][]'])->label(FALSE)
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
 <hr/>
        <div class="col-sm-9 col-sm-offset-2">
            <div class="form-group">
                <?= Html::submitButton('ปรับปรุงข้อมูล', ['class' => 'btn btn-block btn-primary', 'data-action' => Yii::$app->urlManager->createUrl(['/info/update']), 'data-record' => 1,'data-seq'=>'2']) ?>
            </div>
        </div>
<?php ActiveForm::end(); ?>