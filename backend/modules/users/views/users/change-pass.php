<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => '用户', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
//             'auth_key',
//             'oldPass'=>
//             'password_reset_token',
            'email:email',
//             'role',
            'userRole.role_name',
//             'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>


<div class="user-form form">

    <form id="w1" action="/users/users/change-pass" method="post">
        <input type="hidden" name="_csrf" value="eUtDQjVqeW0fPDk2RB8sCREPBCpaCTQrODspBwwDPAVOIRAXGDogLg==">
            <div class="form-group field-user-username required">
            <label class="control-label" for="user-username">旧密码</label>
            <input type="text" id="user-oldPass" class="form-control" name="oldPass" value="" maxlength="255">
            <div class="help-block"></div>
        </div>
        <input type="hidden" name="_csrf" value="eUtDQjVqeW0fPDk2RB8sCREPBCpaCTQrODspBwwDPAVOIRAXGDogLg==">
        <div class="form-group field-user-username required">
            <label class="control-label" for="user-username">新密码</label>
            <input type="text" id="user-oldPass" class="form-control" name="newPass" value="" maxlength="255">
            <div class="help-block"></div>
        </div>
        <div class="form-group submit-button">
            <button type="submit" class="btn btn-primary">更新</button>
        </div>
    </form>
</div>
</div>
<style>
    .view{
        padding: 10px;
        background: #fcfcfd;
    }

    p {
        float: right;
        margin: 16px;
    }
</style>
