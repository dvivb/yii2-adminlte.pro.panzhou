<?php

namespace backend\controllers;

use common\models\Information;
use yii\data\ActiveDataProvider;
use yii\db\Query;

class InformationController extends \yii\web\Controller
{
    public function actionIndex()
    {

//
//        // 根据配置的分页以及排序属性来创建一个数据提供者
//        $provider = new Information([
//            'pagination' => [
//                'pageSize' => 10,
//            ],
//            'sort' => [
//                'defaultOrder' => [
//                    'created_at' => SORT_DESC,
//                    'id' => SORT_ASC,
//                ]
//            ],
//        ]);

//        // 获取分页和排序数据
//        $models = $provider->getModels();
//
//        // 在当前页获取数据项的数目
//        $count = $provider->getCount();

        // 获取所有页面的数据项的总数
//        $totalCount = $provider->getTotalCount();

//        echo yii\grid\GridView::widget([
//            'dataProvider' => $provider,
//        ]);
//        die;
//        $this->render('index',array(
//            'models'=>1,
//            'dataProvider'=>$posts,
//        ));


        $query = Information::find()->where(['id' => 1]);

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                    'id' => SORT_ASC,
                ]
            ],
        ]);

        // 获取分页和排序数据
        $models = $provider->getModels();

        // 在当前页获取数据项的数目
        $count = $provider->getCount();

        //  获取所有页面的数据项的总数
        $totalCount = $provider->getTotalCount();
//        var_dump($models);die;

//        return $this->render('index');
      return  $this->render('index',array(
//            'count'=>$count,
//            'module'=>$query,
            'dataProvider'=>$models,
        ));
    }
    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

}
