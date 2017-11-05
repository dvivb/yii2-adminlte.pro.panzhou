<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\HouselevyListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '房屋征补项目花名册汇总列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="houselevy-list-index">
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
//            'houselevy_total_id',
//            'name',
            'name'=>['attribute'=>'name','value'=>function($dataProvider){
//                return '<a href="/houselevy/houselevy-detail?HouselevyDetailSearch[houselevy_list_id]='.$dataProvider->id.'">'.$dataProvider->name.'</a>';
                return  Html::a($dataProvider->name,"houselevy-detail?HouselevyDetailSearch[houselevy_list_id]={$dataProvider->id}", ['target'=> '_blank']);
            }, 'format' => 'raw',],
            'identification',
            'phone',
//            'gender',
            'gender'=>['attribute'=>'gender','value'=>function($dataProvider){
                $var = '';
                switch($dataProvider->gender){
                    case 1:
                        $var ='男';
                        break;
                    case 2:
                        $var ='女';
                        break;
                    default:
                        $var = null;
                        break;
                }
                return $var;
            }],
             'towns',
//             'address',
            // 'bank_card',
            // 'bank_name',
            // 'upload_file',
            // 'created_at',
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
