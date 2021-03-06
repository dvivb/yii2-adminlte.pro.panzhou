<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\InterimList */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '过渡费项目列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interim-list-view view">

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'project_id',
            'project_name',
            'total_area',
            'total_amount',
            'remarks',
            'operator',
            'approval'=>[
                'attribute'=>'approval',
                'value'=>status($model)],
            'grant_time',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
<?php

function status($model){
    $var = '';
    switch($model->approval){ //2初审通过 3 业务主管审批通过 4 分管领导审批通过 主要领导审批通过
        case 0;
            $var ='未提交';
            break;
        case 1:
            $var ='提交拨款';
            break;
        case 2:
            $var ='初审通过';
            break;
        case 3:
            $var ='业务主管审批通过';
            break;
        case 4:
            $var ='分管领导审批通过';
            break;
        case 5:
            $var ='主要领导审批通过';
            break;
        case -1:
            $var ='流程审批成功';
            break;
        case -2:
            $var ='流程审批拒绝';
            break;
        default:
            $var ='流程结束';
            break;
    }
    return $var;
}?>

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