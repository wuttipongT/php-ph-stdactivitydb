<?php
namespace backend\models;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use dektrium\user\models\User as BaseUser;
use Yii;
class User extends BaseUser
{
    public static function tableName()
    {
        return '{{%admin}}';
    }
    public static function isAdmin(){
        $user = Yii::$app->user->identity;
        return in_array($user->username, Yii::$app->getModule('user')->admins);
    }
}