<?php

namespace backend\rbac;

use yii\rbac\Rule;

class AuthorRule extends Rule {
    public $name = 'isAuthor';
    
    /**
     * @param string|integer $user 用户 ID.
     * @param Item           $item 该规则相关的角色或者权限信息
     * @param array          $params 传给 ManagerInterface::checkAccess() 的参数
     * @return boolean 代表该规则相关的角色或者权限是否被允许
     */
    public function execute($user, $item, $params) {
        return isset($params['can']) ? $params['can'] : false;//#这里的can参数是我随意设置的
    }
}