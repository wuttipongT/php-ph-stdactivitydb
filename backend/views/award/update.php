<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MsAward */

$this->title = 'Update Award: ' . ' #' . $model->Award_Id;
$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลรางวัล', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Award_Id, 'url' => ['view', 'id' => $model->Award_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ms-award-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'title' => $this->title,
    ]) ?>

</div>
