<?php 
use kartik\date\DatePicker;
//frontend\assets\AppAsset::register($this);
use frontend\models\Info;
$model = new Info();
?>
<div id="xx" class="form-group field-info-Clement-Military required">
    <label class="col-sm-2 control-label">เมื่อวันที่</label><div class="col-sm-10">
<?php
 echo DatePicker::widget([
    'name' => 'Info[txtClement_Military]',
     'id'=>'w0d',
    'type' => DatePicker::TYPE_INPUT,
    'value' => $value,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd-M-yyyy'
    ]
          ]);
?>
</div></div>
