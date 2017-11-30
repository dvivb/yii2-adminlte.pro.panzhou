<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\InterimListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
backend\assets\JConfirmAsset::register($this);
$this->title = '过渡费项目列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interim-list-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "<p style='float: right;margin-top: 10px;'>显示 {begin} - {end} 共 {totalCount} 条</p>",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'project_id',
//            'project_name',
            'project_name'=>['attribute'=>'project_name','value'=>function($dataProvider){
                return '<a href="/interim/interim-detail/index/?InterimDetailSearch[project_id]='.$dataProvider->project_id.'">'.$dataProvider->project_name.'</a>';
            }, 'format' => 'raw',],
            'total_area',
            'total_amount',
             'remarks',
             'operator',
             'approval'=>['attribute'=>'approval','value'=>function($dataProvider){
                 $var = '';
                 switch($dataProvider->approval){
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
             }],
             'grant_time',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn','buttons' => ['view'=>function ($url,$dataProvider){
                if($dataProvider->approval ==0)
                    return '<button class="btn btn-info commit-btn-flow-start"  data-type="2" data='.$dataProvider->id.'>申请拨款</button>';
                else
                    return '<a href="/landlevy/landlevy-total/view?id='.$dataProvider->id.'" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>';
            }]],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

<style>
    .grid-view{
        margin-top: 10px;
        padding: 10px;
        background: #fcfcfd;
    }

    .btn-success {
        float: left;
        margin: 16px;
    }
</style>