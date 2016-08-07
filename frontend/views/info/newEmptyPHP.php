    <div class="row">
        <div class="col-sm-6" style="text-align: center;">
            ทุนการศึกษาที่เคยได้รับ
        </div>
        <div class="col-sm-6" style="text-align: center;">
            ปีการศึกษาที่ได้รับ (หากเคยได้รับทุน)
        </div>
        <div class="col-sm-6">
            <div class="my-inner">
				<?php
				if(!$tb_scholarship[0]->isNewRecord) echo Html::hiddenInput('Scholarship[Scholarship_Id][]', $tb_scholarship[0]->Scholarship_Id);//echo $form->field($tb_scholarship[0], 'Scholarship_Id',['template' => ""])->hiddenInput()->label(false);
				?>
                <?php $ScholarshipList = ArrayHelper::map(app\models\Scholarship::getScholarshipItem(), 'Scholarship_Id', 'Scholarship_Name'); ?>
                <?=
                $form->field($tb_scholarship[0], 'Scholarship_DESC', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($ScholarshipList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name'=>'Scholarship[Scholarship_DESC][]'])->label(FALSE)
                ?>
                  
                 
            </div>
        </div>

        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($tb_scholarship[0], 'Scholarship_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name'=>'Scholarship[Scholarship_Year][]'])->label(FALSE)
                ?>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="my-inner">
				<?php
				if(!$tb_scholarship[1]->isNewRecord) echo Html::hiddenInput('Scholarship[Scholarship_Id][]', $tb_scholarship[1]->Scholarship_Id);
				?>
                <?=
                $form->field($tb_scholarship[1], 'Scholarship_DESC', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($ScholarshipList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name'=>'Scholarship[Scholarship_DESC][]'])->label(FALSE)
                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($tb_scholarship[1], 'Scholarship_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name'=>'Scholarship[Scholarship_Year][]'])->label(FALSE)
                ?>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="my-inner">
				<?php
				if(!$tb_scholarship[2]->isNewRecord) echo Html::hiddenInput('Scholarship[Scholarship_Id][]', $tb_scholarship[2]->Scholarship_Id);
				?>
                <?=
                $form->field($tb_scholarship[2], 'Scholarship_DESC', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($ScholarshipList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name'=>'Scholarship[Scholarship_DESC][]'])->label(FALSE)
                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($tb_scholarship[2], 'Scholarship_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name'=>'Scholarship[Scholarship_Year][]'])->label(FALSE)
                ?>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="my-inner">
				<?php
				if(!$tb_scholarship[3]->isNewRecord) echo Html::hiddenInput('Scholarship[Scholarship_Id][]', $tb_scholarship[3]->Scholarship_Id);
				?>
                <?=
                $form->field($tb_scholarship[3], 'Scholarship_DESC', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($ScholarshipList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name'=>'Scholarship[Scholarship_DESC][]'])->label(FALSE)
                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($tb_scholarship[3], 'Scholarship_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name'=>'Scholarship[Scholarship_Year][]'])->label(FALSE)
                ?>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="my-inner">
				<?php
				if(!$tb_scholarship[4]->isNewRecord) echo Html::hiddenInput('Scholarship[Scholarship_Id][]', $tb_scholarship[4]->Scholarship_Id);
				?>
                <?=
                $form->field($tb_scholarship[4], 'Scholarship_DESC', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($ScholarshipList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name'=>'Scholarship[Scholarship_DESC][]'])->label(FALSE)
                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($tb_scholarship[4], 'Scholarship_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name'=>'Scholarship[Scholarship_Year][]'])->label(FALSE)
                ?>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="my-inner">
				<?php
				if(!$tb_scholarship[5]->isNewRecord) echo Html::hiddenInput('Scholarship[Scholarship_Id][]', $tb_scholarship[5]->Scholarship_Id);
				?>
                <?=
                $form->field($tb_scholarship[5], 'Scholarship_DESC', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($ScholarshipList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name'=>'Scholarship[Scholarship_DESC][]'])->label(FALSE)
                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($tb_scholarship[5], 'Scholarship_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name'=>'Scholarship[Scholarship_Year][]'])->label(FALSE)
                ?>
            </div>
        </div>
    </div>
	 <div class="row">
        <div class="col-sm-6" style="text-align: center;">
            รางวัลที่เคยได้รับ
        </div>
        <div class="col-sm-6" style="text-align: center;">
            ปีการศึกษาที่ได้รับ (หากเคยได้รับรางวัล)
        </div>


        <div class="col-sm-6">
            <div class="my-inner">
                <?php
                $awarditem = ArrayHelper::map(\app\models\Award::getAwardItem(), 'Award_Id', 'Award_Name')
                ?>
                <?php
				if(!$tb_award[0]->isNewRecord) echo Html::hiddenInput('Award[Award_Index][]', $tb_award[0]->Award_Index);
				?>
                <?=
                $form->field($tb_award[0], 'Award_Id', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($awarditem, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'onchange' => 'js:fncAwardOthor(this)', 'name'=>'Award[Award_Id][]'])->label(FALSE)
                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="my-inner">
                <?php $dataList = ArrayHelper::map($list, 'id', 'value'); ?>
                <?=
                $form->field($tb_award[0], 'Award_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name'=>'Award[Award_Year][]'])->label(FALSE)
                ?>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="my-inner">
				<?php
				if(!$tb_award[1]->isNewRecord) echo Html::hiddenInput('Award[Award_Index][]', $tb_award[1]->Award_Index);
				?>
                <?=
                $form->field($tb_award[1], 'Award_Id', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($awarditem, ['rows' => 6, 'class' => 'form-control' ,'prompt' => ' - ', 'onchange' => 'js:fncAwardOthor(this)', 'name'=>'Award[Award_Id][]'])->label(FALSE)
                ?> 
            </div>
        </div>
        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($tb_award[1], 'Award_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name'=>'Award[Award_Year][]'])->label(FALSE)
                ?>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="my-inner">
				<?php
				if(!$tb_award[2]->isNewRecord) echo Html::hiddenInput('Award[Award_Index][]', $tb_award[2]->Award_Index);
				?>
                <?=
                $form->field($tb_award[2], 'Award_Id', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($awarditem, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'onchange' => 'js:fncAwardOthor(this)', 'name'=>'Award[Award_Id][]'])->label(FALSE)
                ?>  
            </div>
        </div>
        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($tb_award[2], 'Award_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name'=>'Award[Award_Year][]'])->label(FALSE)
                ?>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="my-inner">
				<?php
				if(!$tb_award[3]->isNewRecord) echo Html::hiddenInput('Award[Award_Index][]', $tb_award[3]->Award_Index);
				?>
                <?=
                $form->field($tb_award[3], 'Award_Id', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($awarditem, ['rows' => 6, 'class' => 'form-control' ,'prompt' => ' - ' , 'onchange' => 'js:fncAwardOthor(this)', 'name'=>'Award[Award_Id][]'])->label(FALSE)
                ?>  
            </div>
        </div>
        <div class="col-sm-6">
            <div class="my-inner">
                <?=
                $form->field($tb_award[3], 'Award_Year', [
                    'template' => "{input}\n{hint}\n{error}"
                ])->dropDownList($dataList, ['rows' => 6, 'class' => 'form-control', 'prompt' => ' - ', 'name'=>'Award[Award_Year][]'])->label(FALSE)
                ?>
            </div>
        </div>

    </div>
   



