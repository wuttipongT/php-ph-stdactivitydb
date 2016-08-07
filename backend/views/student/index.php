<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblStudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-student-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Student', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Student_Index',
            'User_Index',
            'Student_Id',
            'Student_Name',
            'Student_LastName',
            // 'Image_Path:ntext',
            // 'Address1:ntext',
            // 'Address2:ntext',
            // 'Phone1',
            // 'Phone2',
            // 'Name_Father',
            // 'Name_Mother',
            // 'Name_Parent',
            // 'Phone_Parent',
            // 'Work_Address_Parent:ntext',
            // 'Advisors_Id',
            // 'Congenital_Disease',
            // 'Be_Allergic',
            // 'Food_Allergy',
            // 'Buddy',
            // 'Buddy_Phone',
            // 'Hobby',
            // 'Ambition:ntext',
            // 'Sport',
            // 'Genius',
            // 'ROTCS',
            // 'Clement_Military',
            // 'str',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
