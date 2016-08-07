<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MsScholarship */

$this->title = 'Create Scholarship';
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลทุนการศึกษา', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-scholarship-create">

    <?= $this->render('_form', [
        'model' => $model,
        'title' => $this->title,
    ]) ?>

</div>
