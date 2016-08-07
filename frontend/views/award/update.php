<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Award */

$this->title = 'Update Award: ' . ' ' . $model->Award_Index;
$this->params['breadcrumbs'][] = ['label' => 'Awards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Award_Index, 'url' => ['view', 'id' => $model->Award_Index]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="award-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
