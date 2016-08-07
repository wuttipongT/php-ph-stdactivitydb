<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MsAdvisors */

$this->title = 'Update Advisors: ' . ' #' . $model->Advisors_Id;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลอาจารย์ที่ปรึกษา', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Advisors_Id, 'url' => ['view', 'id' => $model->Advisors_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ms-advisors-update">

    <?= $this->render('_form', [
        'model' => $model,
        'title' => $this->title,
    ]) ?>

</div>
