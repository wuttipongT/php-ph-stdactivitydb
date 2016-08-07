<?php

//use yii\helpers\Html;
use kartik\helpers\Html;
use yii\widgets\DetailView;
//use kartik\detail\DetailView;
/* @var $this yii\web\View */
/* @var $model backend\models\TblStudent */

$this->title = $model->Student_Index;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="tbl-student-view panel panel-info">
    <div class="panel-heading">นิสิต # <?=$model->Student_Id;?></div>
    
<!--
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
    </p>-->

    <?= DetailView::widget([
    'model'=>$model,
   /* 'condensed'=>true,
    'hover'=>true,
    'mode'=>DetailView::MODE_VIEW,
    'panel'=>[
        'heading'=>'นิสิต # ' . $model->Student_Id,
        'headingOptions'=>['template'=>'{title}'],
        'type'=>DetailView::TYPE_INFO,
    ],*/
    'template' => function($attribute,$index,$widget){
        for ($i=0; $i<=$index; $i++){
            if($index == 0)
            {
                return "<tr><td colspan=\"2\" align=\"center\"><img src=\"{$attribute['value']}\" alt=\"User Image\" class=\"user-image img-circle\"/></td></tr>";
            }
            
            return "<tr><th>{$attribute['label']}</th><td>{$attribute['value']}</td></tr>";
        }
        
    },
    'attributes' => [
        [
            'attribute' => 'Grabatar',
            'format' => ['image',['alt' => 'User Image','class'=>'user-image img-circle','style'=>'width: 150px;']],    
            'value' => '/'.$model->getPath()."/frontend/web/uploads/".$model->Image_Path,//'http://gravatar.com/avatar/'. $model->Grabatar .'s=230',
            
            
        ],
        'Student_Id',
        //'Gravatar_Id',
        'Prename',
        'Student_Name',
        'Student_LastName',
        'Nickname',
        'Address1',
        'Address2',
        'Phone1',
        'Phone2',
        'Email',
        'Facebook',
        [
            'attribute' => 'Name_Father',   
            'value' => $model->Name_Father ." (".$model->getLife($model->Life_Father).")",//'http://gravatar.com/avatar/'. $model->Grabatar .'s=230',
            
            
        ],
        [
            'attribute' => 'Name_Mother',   
            'value' => $model->Name_Mother ." (".$model->getLife($model->Life_Mother).")",//'http://gravatar.com/avatar/'. $model->Grabatar .'s=230',
            
            
        ],
        
        'Status',
        'Name_Parent',
        'Phone_Parent',
        'Work_Address_Parent',
        'Advisors_Name',
        'Congenital_Disease',
        'Be_Allergic',
        'Food_Allergy',
        'Buddy',
        'Buddy_Phone',
        'Hobby',
        'Ambition',
        [
            'attribute' => 'Sport',   
            'value' => $model->Sport . $model->getStr(),//'http://gravatar.com/avatar/'. $model->Grabatar .'s=230',
            
            
        ],
        'Genius',
        'ROTCSName',
        'MilitaryName',
        'Position_Name' ,
        'Description' ,
        'Club_Name',
        'Type_Name',
        'Scholarship' ,
        'Award' ,
    ],
        
    ]) ?>
</div>