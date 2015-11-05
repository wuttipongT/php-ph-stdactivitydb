<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Info */

$this->title = $model->Student_Index;
$this->params['breadcrumbs'][] = ['label' => 'Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Student_Index], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Student_Index], [
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
            'Student_Index',
            'Student_Id',
            'Student_Name',
            'Student_LastName',
            'Image_Path:ntext',
            'Address1:ntext',
            'Address2:ntext',
            'Phone1',
            'Phone2',
            'Name_Father',
            'Name_Mother',
            'Name_Parent',
            'Phone_Parent',
            'Work_Address_Parent:ntext',
            'Advisors_Id',
            'Buddy_Phone',
            'Hobby',
            'Ambition:ntext',
            'Favorite_Sport',
            'Genius:ntext',
            'ROTCS',
            'Clement_Military',
            'Award:ntext',
        ],
    ]) ?>

</div>
