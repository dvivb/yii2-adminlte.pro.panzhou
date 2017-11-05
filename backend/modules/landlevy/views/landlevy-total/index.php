<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LandlevyTotalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = '土地征补项目花名册汇总';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landlevy-total-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
//                return '<a href="/landlevy/landlevy-list?LandlevyListSearch[landlevy_total_id]='.$dataProvider->id.'">'.$dataProvider->periods.'</a>';
                return  Html::a('第（'. $dataProvider->periods .'）期',"landlevy-list?LandlevyListSearch[landlevy_total_id]={$dataProvider->id}", ['target'=> 'self']);
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

            ['class' => 'yii\grid\ActionColumn'],
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