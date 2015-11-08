<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Info */
/* @var $form yii\widgets\ActiveForm */
?>




<!--
    <?php /*?>
    <?= $form->field($model, 'Image_Path')->textarea(['rows' => 6]) ?>

  <?php $dataList=ArrayHelper::map(Category::find()->withoutSubs()->asArray()->all(), 'id', 'name'); ?>
<?= $form->field($model, 'category_id')->dropDownList($dataList); ?> 



    <?= $form->field($model, 'ROTCS')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, '')->textInput() ?>

    <?= $form->field($model, 'Award')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    