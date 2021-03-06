<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = '土地征补信息管理';
$this->params['breadcrumbs'][] = ['label' => '土地征补', ];
$this->params['breadcrumbs'][] = ['label' => '土地征补信息管理', 'url' => ['/landlevy/default/index']];
/* @var $this yii\web\View */
?>
<div class="project-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建', ['/project/project/add'], ['class' => 'btn btn-success']) ?>
    </p>

            <?php
            echo GridView::widget([
                'dataProvider' => $data,
                'filterModel' => $searchModel,
                'summary' => "<p style='float: right;margin-top: 10px;'>显示 {begin} - {end} 共 {totalCount} 条</p>",
                'columns' => [
                    'index'=>[
                        'label'=>'#',
                        'value'=>function($data,$id,$index){
                            return $index+1;
                        }],
                    // 通过 $dataProvider 包括的数据定义了一个简单列
                    // 模型列1 的数据将被使用
                    'id',
//                    'name',
                    'name'=>['attribute'=>'name','value'=>function($data){
//                        return '<a href="/landlevy/landlevy-total?LandlevyTotalSearch[project_id]=' . $data->id .'">'.$data->name.'</a>';
                        return  Html::a($data->name,"/landlevy/landlevy-total?LandlevyTotalSearch[project_id]={$data->id}", ['target'=> 'self']);
                    }, 'format' => 'raw',],
                    'total_household',
                    'total_areas',
                    'amount',
                    'created_at',
                    'updated_at',
                    'do_action' =>[
                        'label'=>'操作',
                        'value' => function ($data) {
                            $buttonStr = '';
                            $buttonStr .=  Html::a('详情', ['/landlevy/landlevy-total?LandlevyTotalSearch[project_id]='.$data->id],['class'=>'btn btn-primary edit-sms-template']).'&nbsp;&nbsp;&nbsp;';
                            $buttonStr .=  Html::a('编辑',['/project/project/edit/'.$data->id], ['class'=>'btn btn-primary edit-sms-template']).'&nbsp;&nbsp;&nbsp;';
                            $buttonStr.=Html::a('删除',['/project/project/del/'.$data->id],  ['class'=>'btn update-sms-template-del btn-primary']).'&nbsp;&nbsp;&nbsp;';

                            return $buttonStr;
                        },
                        'format' => 'raw',
                    ]
                ],
                'pager'=>[
                    'nextPageLabel' => '下一页',
                    'prevPageLabel' => '上一页',
                    'firstPageLabel' => '首页',
                    'lastPageLabel' => '尾页',
                ]
            ]);

            ?>
</div>

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
