<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\HouselevyDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '房屋征补项目花名册详情';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="houselevy-detail-index">
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
//            'houselevy_list_id',
//            'dictionaries_id',
//            'subject',
            'subject'=>['attribute'=>'subject','value'=>function($dataProvider){
                $var = '';
                switch($dataProvider->subject){
                    case 'house_structure':
                        $var ='房屋结构';
                        break;
                    case 'annexe_structure':
                        $var ='附房结构';
                        break;
                    case 'attach':
                        $var ='地上附着物';
                        break;
                    case 'structure':
                        $var ='构筑物';
                        break;
                    case 'equipment':
                        $var ='配套设备';
                        break;
                    case 'land_status':
                        $var ='土地类别';
                        break;
                    case 'young_crop':
                        $var ='青苗';
                        break;
                }
                return $var;
            }],
//            'parent_id',
             'name',
             'unit',
             'price',
             'levy_value',
             'compensation_price',
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