<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LandlevyTotal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="landlevy-total-form form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_id')->textInput() ?>

    <?= $form->field($model, 'periods')->textInput() ?>

    <?= $form->field($model, 'total_households')->textInput() ?>

    <?= $form->field($model, 'total_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'operator')->textInput(['maxlength' => true]) ?>

    <?// $form->field($model, 'approval')->textInput(['maxlength' => true]) ?>
<?php if($model['created_at'] == null){
        echo  $form->field($model, 'created_at')->textInput(['readonly'=>true,'value'=>date('Y-m-d H:i:s',time())]);
      }else{
        echo  $form->field($model, 'created_at')->textInput(['readonly'=>true,]);
      }
?>
<?php if($model['updated_at'] == null){
        echo  $form->field($model, 'updated_at')->textInput(['readonly'=>true,'value'=>date('Y-m-d H:i:s',time())]);
      }else{
        echo  $form->field($model, 'updated_at')->textInput(['readonly'=>true,]);
      }
?>
    <?// $form->field($model, 'created_at')->textInput(['readonly'=>true]) ?>

    <?// $form->field($model, 'updated_at')->textInput(['readonly'=>true]) ?>

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