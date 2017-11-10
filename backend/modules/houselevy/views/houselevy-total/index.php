<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\HouselevyTotalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '房屋征补项目花名册汇总';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="houselevy-total-index">

    <?php  echo $this->render('_search', ['model' => $searchModel,]); ?>

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
//            'periods',
            'periods'=>['attribute'=>'periods','value'=>function($dataProvider){
//                return '<a href="/houselevy/houselevy-list?HouselevyListSearch[houselevy_total_id]='.$dataProvider->id.'">'.$dataProvider->periods.'</a>';
                return  Html::a('第（'. $dataProvider->periods .'）期',"houselevy-list?HouselevyListSearch[houselevy_total_id]={$dataProvider->id}", ['target'=> 'self']);
            }, 'format' => 'raw',],
            'total_households',
            'total_area',
             'total_amount',
             'operator',
//             'approval',
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
                }
                return $var;
            }],
             'created_at',
             'updated_at',

            ['class' => 'yii\grid\ActionColumn',
                //'template'=>'{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}',
                'buttons' => ['view'=>function ($url,$dataProvider){
                    if($dataProvider->approval ==0)
                        return '<button class="btn btn-info commit-btn" data='.$dataProvider->id.'>申请拨款</button>';
                    else
                        return '<a href="/houselevy/houselevy-total/view?id='.$dataProvider->id.'" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>';
                }]
            ],
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
<?php $this->beginBlock('houseTotalindex') ?>
      $(function(){
    	  $('.commit-btn').click(function(){
    	        var id = $(this).attr('data');
    			var ifTrue = confirm("确认提交申请拨款?");
                if(ifTrue){
                    $.get('/houselevy/houselevy-total/applys/'+id,function(res){
                        if(res.code == 1){
                            alert("申请拨款成功");
                            location.href = location.href;
                        }else{
                           alert("申请拨款失败");
                        }
                        
                    },'json')
                }else{
                    return false
                }
              })
          })
     
<?php $this->endBlock() ?>
<?php $this->registerJs($this->blocks['houseTotalindex'], \yii\web\View::POS_END); ?>
      

