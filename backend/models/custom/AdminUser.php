<?php
/**
 * Created by zxzTool.
 * User: zxz
 * Datetime: 2018/10/19 15:52
 */

namespace backend\models\custom;


use common\models\User;

class AdminUser extends User {
    public function rules() {
        return array_merge(parent::rules(),[
            [['username','email'],'safe']
        ]);
    }
}