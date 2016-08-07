<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblStudent */

$this->title = 'Update Tbl Student: ' . ' ' . $model->Student_Index;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Student_Index, 'url' => ['view', 'id' => $model->Student_Index]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-student-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
