<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MsScholarship */

$this->title = $model->Scholarship_Id;
$this->params['breadcrumbs'][] = ['label' => 'Ms Scholarships', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-scholarship-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Scholarship_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Scholarship_Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Scholarship_Id',
            'Scholarship_Name',
            'Status',
        ],
    ]) ?>

</div>
