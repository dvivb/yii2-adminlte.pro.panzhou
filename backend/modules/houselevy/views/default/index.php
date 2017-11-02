<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\grid\GridView;
backend\assets\JConfirmAsset::register($this);
$this->registerJsFile(
    Yii::$app->request->baseUrl."/js/sms_template.js",
    [
        "depends"=>['backend\assets\AppAsset'],
        "position"=> $this::POS_END
    ]
);
$this->params['breadcrumbs'][] = ['label' => '房屋征补', ];
$this->params['breadcrumbs'][] = ['label' => '房屋征补信息管理', 'url' => ['/houselevy/default/index']];
/* @var $this yii\web\View */
?>
<style>
    .panel {margin:0px 10px 40px 10px; box-shadow:0 3px 3px rgba(0,0,0,.05);}
    .panel .col-lg-1, .panel .col-lg-2, .panel .col-lg-3, .panel .col-lg-4, .panel .col-lg-5 {padding:2px;}
    .table {margin-bottom:0px;}
</style>
<?php echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="row">
    <div class=".col-lg-12">
        <?php
        ?>
    </div>
</div>
<div style='clear:both'></div>
<div class="row">
    <div class=".col-lg-12">
        <div class="order-search">

            <?
            //                 $this->render('_smsListForm', [
            //                 'model' => $model,
            // ])
            ?>
        </div>
    </div>
</div>
<div style='clear:both'></div>
<div class='text-center'>
    <div class='col-lg-12'>
        <div class='box box-primary'>
            <div class="box-header with-border">
                <h5 class="box-title">项目列表</h5>
            </div>
            <div style='clear:both'></div>
            <?php
            echo GridView::widget([
                'dataProvider' => $data,
                'filterModel' => $searchModel,
                'columns' => [

                    // 通过 $dataProvider 包括的数据定义了一个简单列
                    // 模型列1 的数据将被使用
                    'id',
//                    'name',
                    'name'=>['attribute'=>'name','value'=>function($data){
                        return '<a href="/houselevy/houselevy-total?HouselevyTotalSearch[project_id]=' . $data->id .'">'.$data->name.'</a>';
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
                            $buttonStr .=  Html::a('详情', ['/houselevy/houselevy-total?HouselevyTotalSearch[project_id]='.$data->id],['class'=>'btn btn-primary edit-sms-template']).'&nbsp;&nbsp;&nbsp;';
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
    </div>
</div>
<div style='clear:both'></div>
<style>
    .grid-view {margin:20px}
    .pageNum{float:right;}
    .field-goodslistform-goodsupc div {padding:0px;}
    .box-primary .with-border{float:left}
    .summary{float:right}
    .box-title{padding-top:15px}
    .pull-right{float:right}
    .pagination{display:block;width:50%;margin:0 auto}
    th{text-align:center}
    .fr{float:right}
    .fn {float:none}
    .rn{resize: none}
    .dl{display:inline-block}
    .jconfirm-box-container{width:70%;margin-left:10%}
    .min,.max{width:20%;text-align:center}
</style>
<?php $this->beginBlock('smsList');  ?>


<?php $this->endBlock(); ?>
<?php $this->registerJs($this->blocks['smsList'], \yii\web\View::POS_END);  ?>
