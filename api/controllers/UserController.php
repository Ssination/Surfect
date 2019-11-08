<?php

namespace app\controllers;

use yii\db\ActiveRecord;

class UserController extends ActiveRecord
{
    public $modelClass = 'app\models\users';

}
