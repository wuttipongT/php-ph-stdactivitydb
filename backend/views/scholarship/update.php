<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MsScholarship */

$this->title = 'Update Scholarship: ' . ' #' . $model->Scholarship_Id;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลทูนการศึกษา', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Scholarship_Id, 'url' => ['view', 'id' => $model->Scholarship_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ms-scholarship-update">


    <?= $this->render('_form', [
        'model' => $model,
        'title' => $this->title
    ]) ?>

</div>
