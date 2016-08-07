<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MsAdvisors */

$this->title = 'Create Advisor';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลอาจารย์ที่ปรึกษา', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-advisors-create">

    <?= $this->render('_form', [
        'model' => $model,
        'title' => $this->title,
    ]) ?>

</div>
