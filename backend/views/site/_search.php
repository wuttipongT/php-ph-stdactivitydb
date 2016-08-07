<?php
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

      
        $form = ActiveForm::begin(
                        [
                            'action' => ['index'],
                            'method' => 'get',
                            'options' => [
                                'class' => 'form-inline',
                                'data-pjax' => true
                            ]
                        ]
        );
        $years = range('2552', '2560'); //range(date("Y"), date("Y", strtotime("now - 100 years")));
        foreach ($years as $id => $year) {

            $list[] = ['id' => $year, 'value' => $year];
        }
        $dataList = ArrayHelper::map($list, 'id', 'value');
        
        $class = substr(date('Y')+543,2,2);
        $classItem = array();
        $bool = true;
         array_push($classItem, ['id' => $class, 'name' => 'ชั้นปีที่ 1']);
        for ($i=1;$i<=5;$i++){
            array_push($classItem, ['id' => $class+$i, 'name' => 'ชั้นปีที่ '.($i+1)]);
        }
        
        //print_r($classItem);

        $nameItem = [
            ['id' => '0', 'name' => 'รหัสนิสิต'],
            ['id' => '1', 'name' => 'ชื่อ'],
            ['id' => '2', 'name' => 'สกุล'],
        ];

        $dataClassItem = ArrayHelper::map($classItem, 'id', 'name');
        $dataNameItem = ArrayHelper::map($nameItem, 'id', 'name');


                ?>
 
        
           <div class="panel panel-default" style="margin-bottom: 5px;">
                      <div class="accordion" id="accordion2">
            <div class="accordion-group">
                <div class="accordion-heading" style="padding: 10px;">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        &nbsp;&nbsp;Search Option
                    </a>
                </div>
                <div id="collapseOne" class="accordion-body collapse in">
                    <div class="accordion-inner">
                     <div class="row" style="padding:5px;">
                                <div class="col-sm-12">
                                    <?= Html::radio('ViewStudentSearch[rdoClass]', TRUE,['id'=>'rdoClass','value'=>'0']); ?>&nbsp;&nbsp;&nbsp;&nbsp<?= Html::label('ชั้นปี', 'rdoClass', ['class' => 'control-label']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::dropDownList('ViewStudentSearch[ddlClass]', '', $dataClassItem, ['class' => 'form-control']) ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp<?= Html::radio('ViewStudentSearch[rdoClass]','',['id'=>'rdoClass2','value'=>'1']); ?>&nbsp;&nbsp;&nbsp;&nbsp<?= Html::label('ศิษเก่า', 'rdoClass2', ['class' => 'control-label']); ?>&nbsp;&nbsp;&nbsp;&nbsp<?= Html::input('text', 'ViewStudentSearch[txtClass]', '', ['class' => 'form-control']) ?>
                                </div>
                            </div>
                            <!--<div class="row" style="padding:5px;">
                                <hr style="margin: 0 0 8px 0;"/>
                                <div class="col-sm-12">
                                    <?= Html::checkbox('chkbName'); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::dropDownList('ddlt', '', $dataNameItem, ['class' => 'form-control']) ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::input('text', '', '', ['class' => 'form-control']) ?>
                                </div>
                            </div>-->
                            <div class="row" style="padding:5px;">
                                 <hr style="margin: 0 0 8px 0;"/>
                                <div class="col-sm-12">
                                    <?= Html::checkbox('ViewStudentSearch[chkScholarship]','',['id'=>'chkScholarship']); ?>&nbsp;&nbsp;&nbsp;&nbsp<?= Html::label('ทุนที่เคยได้รับ', 'chkScholarship', ['class' => 'control-label']); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::dropDownList('ViewStudentSearch[ddlScholarship]', '', $ScholarshipItem, ['class' => 'form-control']) ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp<?= Html::checkbox('ViewStudentSearch[chkbAwardItem]','',['id'=>'chkbAwardItem']); ?>&nbsp;&nbsp;&nbsp;&nbsp<?= Html::label('รางวัลที่เคยได้รับ', 'chkbAwardItem', ['class' => 'control-label']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::dropDownList('ViewStudentSearch[ddlAwardItem]', '', $AwardItem, ['class' => 'form-control']) ?>
                                </div>

                            </div>
                            <div class="row" style="padding:5px;">
                                <div class="col-sm-12">
                                   <?= Html::checkbox('ViewStudentSearch[chkbPositionItem]','',['id'=>'chkbPositionItem']); ?>&nbsp;&nbsp;&nbsp;&nbsp<?= Html::label('ตำแหน่งที่เข้าร่วม', 'chkbPositionItem', ['class' => 'control-label']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::dropDownList('ViewStudentSearch[ddlPositionItem]', '', $category, ['class' => 'form-control']) ?>
                                </div>

                            </div>
                            <div class="row" style="padding:5px">
                                <hr style="margin: 0 0 8px 0;"/>
                                <div class="col-sm-12">
                                    <?= Html::checkbox('ViewStudentSearch[chkSport]','',['id'=>'chkSport']); ?>&nbsp;&nbsp;&nbsp;&nbsp<?= Html::label('กีฬาที่ชอบ', 'chkSport', ['class' => 'control-label']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::dropDownList('ViewStudentSearch[ddlSport]', '', $Sport, ['class' => 'form-control']) ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp<?= Html::checkbox('ViewStudentSearch[chkbGenius]','',['id'=>'chkbGenius']); ?>&nbsp;&nbsp;&nbsp;&nbsp<?= Html::label('ความสามารถ', 'chkbGenius', ['class' => 'control-label']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::dropDownList('ViewStudentSearch[ddlGenius]', '', $Genius, ['class' => 'form-control']) ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp<?= Html::checkbox('ViewStudentSearch[chkbROTCS]','',['id'=>'chkbROTCS']); ?>&nbsp;&nbsp;&nbsp;&nbsp<?= Html::label('รด.', 'chkbROTCS', ['class' => 'control-label']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::dropDownList('ViewStudentSearch[ddlROTCS]', '', $ROTCS, ['class' => 'form-control']) ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp<?= Html::checkbox('ViewStudentSearch[chkbMilitary]','',['id'=>'chkbMilitary']); ?>&nbsp;&nbsp;&nbsp;&nbsp<?= Html::label('ผ่อนผันทหาร', 'chkbMilitary', ['class' => 'control-label']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::dropDownList('ViewStudentSearch[ddlMilitary]', '', $military, ['class' => 'form-control']) ?>
                                    </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
                            
                                    <div class="row " style="padding:5px">
                                <hr style="margin: 0 0 8px 0;"/>
                                <div class="col-sm-12">
                                    <?= Html::input('text', '', '', ['class' => 'form-control form-inline-block','style'=>'width:90%;','placeholder'=>'Keyword...(รหัสนิสิต, ชื่อ, นามสกุล)']) ?>
                                     <button class="btn btn-default" style="float:right;margin-right: 5px;" type="submit"><i class="glyphicon glyphicon-search"></i> ค้นหา</button>
                                   
                                </div>
                            </div> 
                        </div>
<?php ActiveForm::end(); ?>
 