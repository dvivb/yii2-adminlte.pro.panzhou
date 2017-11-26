<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Flow */
/* @var $form yii\widgets\ActiveForm */
backend\assets\JConfirmAsset::register($this);
?>

<div class="flow-form form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(['1'=>'房屋征补流程','2'=>'征收补偿款流程','3'=>'土地征补流程','4'=>'安置流程']) ?>
    <?php
        if($model->create_time==null){
            echo $form->field($model, 'create_time')->textInput(['disabled'=>true,'value'=>date('Y-m-d H:i:s')]);
        }else{
            echo $form->field($model, 'create_time')->textInput(['disabled'=>true]);
        }

    ?>
    <?php
    if($model->update_time==null){
        echo $form->field($model, 'update_time')->textInput(['disabled'=>true,'value'=>date('Y-m-d H:i:s')]);
    }else{
        echo $form->field($model, 'update_time')->textInput(['disabled'=>true]);
    }

    ?>

    <div style="clear: both">
        <div><h5>审批流程</h5></div>
        <div class="detail">
            <div class="flowDetail">流程发起
            <?php
            if(!empty($userDetails)){

                foreach ($userDetails as $key => $v){
                    echo '<div class="orderList">第'.($key+1).'步，审批人'.$v['username'].'</div>';
                }
            }
            ?>
            </div><br>
            <p class="btn btn-info commit-btn" data=''>选择用户</p> &nbsp;&nbsp;&nbsp;&nbsp;<p class="btn btn-info commit-del" data=''>删除用户</p>
            <div>流程结束</div><br>
        </div>
    </div>
    <div>
        <?php if($userIds == null){
          echo '<input type="hidden" value="" name="userIds" class="userIdsInput"> </div>';
        }else{
            echo '<input type="hidden" value='.'\''.$userIds.'\''.' name="userIds" class="userIdsInput"> </div>';
        } ?>

    <div class="form-group submit-button">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<style>
    .form{
        height: 400px;
        padding: 10px;
        background: #fcfcfd;
    }
    .form-group {
        margin-bottom: 15px;
        width: 20%;
        float: left;
        margin: 1px 2%;
    }
    .form-group-title{
        margin: 10px 0;
    }
    .control-label{
        font-weight: normal;
    }
    .submit-button{
        float: right;
        display: block;
        margin: 100px -8% 0 0;
    }
</style>
<?php $this->beginBlock('houseTotalindex') ?>
    $(function(){
    var userIdsStr = $('.userIdsInput').val();
    if(userIdsStr == ''){
        var userIds = [];
    }else{
        var userIds = JSON.parse( userIdsStr );
    }
console.log(userIdsStr)
    <!--     	  $('.commit-btn').click(function(){ -->
    <!--     	        var id = $(this).attr('data'); -->
    <!--     			var ifTrue = confirm("确认提交申请拨款?"); -->
    <!--                 if(ifTrue){ -->
    <!--                     $.get('/houselevy/houselevy-total/applys/'+id,function(res){ -->
    <!--                         if(res.code == 1){ -->
    <!--                             alert("申请拨款成功"); -->
    <!--                             location.href = location.href; -->
    <!--                         }else{ -->
    <!--                            alert("申请拨款失败"); -->
    <!--                         } -->

    <!--                     },'json') -->
    <!--                 }else{ -->
    <!--                     return false -->
    <!--                 } -->
    <!--               }) -->
    $('.commit-del').click(function(){
    $(".orderList:last").remove();
    userIds.pop();
        $(".userIdsInput").val(JSON.stringify(userIds));

    })
    $('.commit-btn').click(function(){
    var id = $(this).attr('data');
    $.confirm({
    title: '发起审批',
    content: function () {
    var self = this;
    return $.ajax({
    url: '/users/users/get-user-group',
    dataType: 'json',
    method: 'get'
    }).done(function (response) {
        var content = '<select class="user_role col-lg-12"> <option>请选择用户分组</option>';
                for(var i in response) {
                content += '<option value="'+response[i].id+'">'+response[i].role_name+'</option>';
                }
        content += '</select><br><br><select class="user_id col-lg-12"><option>请选择用户</option></select><br><br>';
        content +='<div style="clear: both"></div>';
        self.setContent(content);return false;
        }).fail(function(){
            self.setContent('Something went wrong.');
        });
    },
    buttons: {
    formSubmit: {
    text: '提交',
    btnClass: 'btn-blue',
    action: function () {
     var userid = $('.user_id').val();
     var name = $('.user_id').text();
     var n = $(".orderList").length;
     if(userid!="请选择用户") {
         $('.flowDetail').append('<div class="orderList">第'+ (n+1) +'步，审批人'+name+'</div>');
            userIds.push(userid);
            $(".userIdsInput").val(JSON.stringify(userIds));
         }
        }
    },
    cancel: {
    text: '关闭',
    action: function () {
    }
    },
    },
    onContentReady: function () {
    var self = this;
    },
    columnClass: 'small'
    })
    })


    $(document).on('change','.user_role',function(){
    var role_id = $(this).val();
    if(role_id >0 ){
    $.get("/users/users/get-users?role_id="+role_id,function(res){
    $str = '';
    for(var i in res){
    $str += '<option value="'+res[i].id+'">'+res[i].username+'</option>';
    }
    if($str == ''){
    $str = '<option>该分组无用户</option>';
    }
    $('.user_id').html($str)
    },'json')
    }else{
    $str = '<option>改分组无用户</option>';
    $('.user_id').html($str)
    }

    })
    })

<?php $this->endBlock() ?>
<?php $this->registerJs($this->blocks['houseTotalindex'], \yii\web\View::POS_END); ?>