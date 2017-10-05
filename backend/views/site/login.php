<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>盘州市房屋征收补偿管理系统</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">登录系统</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('登录', ['class' => 'btn btn-success btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>

        <!-- div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in
                using Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign
                in using Google+</a>
        </div -->
        <!-- /.social-auth-links -->

        <!-- a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a -->

    </div>
    <!-- /.login-box-body -->

</div><!-- /.login-box -->
<div class="page-footer">
    <p>2017 Copyright © 盘州市房屋征收补偿管理系统 . All rights reserved.</p>
    <p>Support 贵阳金利远科技有限公司.</p>

</div>


<style>
    .login-box, .register-box {
        width: 460px;
        margin: 7% auto;
    }
    .login-logo a, .register-logo a {
        color: #fff;
    }
    .login-page, .register-page {
        background: #2f485c;
    }
    .login-box-body, .register-box-body {
        background: none;
        padding: 80px;
        border-top: 0;
        color: #fefefe;
        border-bottom-right-radius: inherit;
    }
    .page-footer{
        margin-top: ;100px;
        color: #fefefe;
    }
    .page-footer p{
        margin: 0;
        text-align: center;
        padding: 0 20px 20px 20px;
    }
</style>
