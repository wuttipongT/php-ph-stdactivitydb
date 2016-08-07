<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MsAdvisors */

$this->title = $model->Advisors_Id;
$this->params['breadcrumbs'][] = ['label' => 'Ms Advisors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-advisors-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Advisors_Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Advisors_Id], [
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
            'Advisors_Id',
            'Advisors_Name',
            'Status',
        ],
    ]) ?>

</div>
