<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Scholarship */

$this->title = 'Update Scholarship: ' . ' ' . $model->Scholarship_Id;
$this->params['breadcrumbs'][] = ['label' => 'Scholarships', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Scholarship_Id, 'url' => ['view', 'id' => $model->Scholarship_Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="scholarship-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
