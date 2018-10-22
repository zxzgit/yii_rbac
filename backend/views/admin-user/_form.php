<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\custom\AdminUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-user-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'password_hash')->label('密码')->passwordInput() ?>
    <?= $form->field($model, 'email')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList([0 => '禁用', 1 => '启用']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
