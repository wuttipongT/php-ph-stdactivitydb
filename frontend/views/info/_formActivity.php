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
                    //'action' => '/login',
                    'options' => [
                        'class' => 'form-horizontal'
                    ]
                ]
);
?>
<div class="my-container">
    <div class="row">
        <div class="col-sm-6" style="text-align: center;">
            ทุนการศึกษาที่เคยได้รับ
        </div>
        <div class="col-sm-6" style="text-align: center;">
            ปีการศึกษาที่ได้รับ (หากเคยได้รับทุน)
        </div>
        <div class="col-sm-6">
            <div class="my-inner">
                <?php $ScholarshipList = ArrayHelper::map($scholarship::find()->where(['Status' => '0'])->all(), 'Scholarship_Id', 'Scholarship_Name'); ?>
                <?=
                $form->field($tb_Scholarship, 'Scholarship_DESC', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($ScholarshipList, ['rows' => 6, 'id' => 'cboScholarship-Id', 'class' => 'form-control'])->label(FALSE)
                ?>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="my-inner">
                <?php
                $years = range('2552', '2560'); //range(date("Y"), date("Y", strtotime("now - 100 years")));

                foreach ($years as $id => $year) {

                    $list[] = ['id' => $id, 'value' => $year];
                }
                ?>
                <?php $dataList = ArrayHelper::map($list, 'id', 'value'); ?>
                <?=
                $form->field($tb_Scholarship, 'Scholarship_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'id' => 'cboScholarship-Year', 'class' => 'form-control'])->label(FALSE)
                ?>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($tb_Scholarship, 'Scholarship_DESC', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($ScholarshipList, ['rows' => 6, 'id' => 'txtAdvisors-Id', 'class' => 'form-control'])->label(FALSE)
                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($tb_Scholarship, 'Scholarship_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'id' => 'txtAdvisors-Id', 'class' => 'form-control'])->label(FALSE)
                ?>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($tb_Scholarship, 'Scholarship_DESC', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($ScholarshipList, ['rows' => 6, 'id' => 'txtAdvisors-Id', 'class' => 'form-control'])->label(FALSE)
                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($tb_Scholarship, 'Scholarship_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'id' => 'txtAdvisors-Id', 'class' => 'form-control'])->label(FALSE)
                ?>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($tb_Scholarship, 'Scholarship_DESC', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($ScholarshipList, ['rows' => 6, 'id' => 'txtAdvisors-Id', 'class' => 'form-control'])->label(FALSE)
                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($tb_Scholarship, 'Scholarship_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'id' => 'txtAdvisors-Id', 'class' => 'form-control'])->label(FALSE)
                ?>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($tb_Scholarship, 'Scholarship_DESC', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($ScholarshipList, ['rows' => 6, 'id' => 'txtAdvisors-Id', 'class' => 'form-control'])->label(FALSE)
                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($tb_Scholarship, 'Scholarship_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'id' => 'txtAdvisors-Id', 'class' => 'form-control'])->label(FALSE)
                ?>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($tb_Scholarship, 'Scholarship_DESC', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($ScholarshipList, ['rows' => 6, 'id' => 'txtAdvisors-Id', 'class' => 'form-control'])->label(FALSE)
                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($tb_Scholarship, 'Scholarship_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'id' => 'txtAdvisors-Id', 'class' => 'form-control'])->label(FALSE)
                ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6" style="text-align: center;">
            รางวัลที่เคยได้รับ
        </div>
        <div class="col-sm-6" style="text-align: center;">
            ปีการศึกษาที่ได้รับ (หากเคยได้รับรางวัล)
        </div>


        <div class="col-sm-6">
            <div class="my-inner">
                <?php
                $awords = [
                    ['id' => 0, 'value' => 'เรียนดีระดับมหาวิทยาลัย'],
                    ['id' => 1, 'value' => 'เรียนดีระดับคณะเภสัชศาสตร์'],
                    ['id' => 2, 'value' => 'ผู้มีจิตอาสาประจำชั้นปี'],
                    ['id' => 3, 'value' => 'อื่นๆ (โปรดระบุ)'],
                ];
                ?>
                <?php $awardsList = ArrayHelper::map($awords, 'id', 'value'); ?>
                <?=
                $form->field($award, 'Award_Id', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($awardsList, ['rows' => 6, 'id' => 'txtAdvisors-Id', 'class' => 'form-control','onchange' => 'js:fncAwardOthor(this)'])->label(FALSE)
                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="my-inner">
                <?php $dataList = ArrayHelper::map($list, 'id', 'value'); ?>
                <?=
                $form->field($award, 'Award_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'id' => 'txtAdvisors-Id', 'class' => 'form-control'])->label(FALSE)
                ?>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($award, 'Award_Id', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($awardsList, ['rows' => 6, 'id' => 'txtAdvisors-Id', 'class' => 'form-control','onchange' => 'js:fncAwardOthor(this)'])->label(FALSE)
                ?> 
            </div>
        </div>
        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($award, 'Award_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'id' => 'txtAdvisors-Id', 'class' => 'form-control'])->label(FALSE)
                ?>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($award, 'Award_Id', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($awardsList, ['rows' => 6, 'id' => 'txtAdvisors-Id', 'class' => 'form-control','onchange' => 'js:fncAwardOthor(this)'])->label(FALSE)
                ?>  
            </div>
        </div>
        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($award, 'Award_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'id' => 'txtAdvisors-Id', 'class' => 'form-control'])->label(FALSE)
                ?>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($award, 'Award_Id', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($awardsList, ['rows' => 6, 'id' => 'txtAdvisors-Id', 'class' => 'form-control','onchange' => 'js:fncAwardOthor(this)'])->label(FALSE)
                ?>  
            </div>
        </div>
        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($award, 'Award_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'id' => 'txtAdvisors-Idrew2rw', 'class' => 'form-control'])->label(FALSE)
                ?>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-12" style="text-align: right;">
            <div class="form-group">
                <?= Html::submitButton($award->isNewRecord ? 'Create' : 'Update', ['class' => $award->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>