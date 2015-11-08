<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author T.wuttipong
 */
namespace app\models;

use yii\db\ActiveQuery;
class InfoQuery extends ActiveQuery{
    //put your code here
    public function getAdvisors() {
        $this->where(['Status'=>'0']);
        return $this;
    }

}
