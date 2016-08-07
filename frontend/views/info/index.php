<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Infos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <div class="row">
        <div class="col-sm-2">
            <ul class="nav nav-pills nav-stacked">
    <li role="presentation" class="active"><a href="#">รายการ</a></li>
    <li><a href="#" >ข้อมูลส่วนตัว</a></li>
    <li><a href="#">ข้อมูลเข้าสู่ระบบ</a></li>
</ul>
            
        </div>
        <div class="col-sm-10">
            <h2 class="text-center">ยินดีต้อนรับ <?php echo 'วุฒิพงษ์ ทองมนต์' ?></h2>
            <?php// echo common\models\User::getName()[0];?>
         <!--    <p>
        <?= Html::a('Create Info', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->
<?php /* ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Student_Index',
            'Student_Id',
            'Student_Name',
            'Student_LastName',
            'Image_Path:ntext',
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
            // 'Buddy_Phone',
            // 'Hobby',
            // 'Ambition:ntext',
            // 'Favorite_Sport',
            // 'Genius:ntext',
            // 'ROTCS',
            // 'Clement_Military',
            // 'Award:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>
        </div>
    </div>

    

   

</div>
