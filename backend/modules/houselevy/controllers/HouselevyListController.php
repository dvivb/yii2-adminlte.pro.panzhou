<?php

namespace backend\modules\houselevy\controllers;

use app\models\HouselevyDetail;
use app\models\UploadForm;
use Yii;
use app\models\HouselevyList;
use app\models\HouselevyListSearch;
use backend\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * HouselevyListController implements the CRUD actions for HouselevyList model.
 */
class HouselevyListController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all HouselevyList models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HouselevyListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HouselevyList model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

//    /**
//     * Creates a new HouselevyList model.
//     * If creation is successful, the browser will be redirected to the 'view' page.
//     * @return mixed
//     */
//    public function actionCreate()
//    {
//        $model = new HouselevyList();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
//    }

//    /**
//     * Updates an existing HouselevyList model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param string $id
//     * @return mixed
//     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
//    }


    public function actionCreate()
    {

        $list = new HouselevyList();

        $detail = new HouselevyDetail();

        if ($list->load(Yii::$app->request->post()) && $detail->load(Yii::$app->request->post())) {
            $isValid = $list->validate();
            $isValid = $detail->validate() && $isValid;
            if ($isValid) {
                $list->save(false);

                $detail->houselevy_list_id = $list->id;
                $detail->save(false);
                return $this->redirect(['view', 'id' => $list->id]);
            }
        }

        return $this->render('create', [
            'list' => $list,
            'detail' => $detail,
        ]);
    }

    public function actionUpdate($id)
    {
        $list = HouselevyList::findOne($id);
        if (!$list) {
            throw new NotFoundHttpException("没有找到被征户主基本信息");
        }

        $detail = HouselevyDetail::findOne(["houselevy_list_id" => $list->id]);

        if (!$detail) {
            throw new NotFoundHttpException("没有找到土地信息录入信息");
        }


        if ($list->load(Yii::$app->request->post()) && $detail->load(Yii::$app->request->post())) {

            $db = Yii::$app->db->beginTransaction();
            try{
                $upload_files = UploadedFile::getInstances($list, 'upload_file');
                $save_path = self::upload($upload_files);
                $list->upload_file  = json_encode($save_path, true);

                $isValid = $list->validate();
                $isValid = $detail->validate() && $isValid;
                if ($isValid) {
                    $list->save(false);
                    $detail->save(false);
                    return $this->redirect(['view', 'id' => $id]);
                }
                $db->commit();
            } catch (Exception $e) {
                $db->rollBack();
                echo '失败';
            }

        }

        return $this->render('update', [
            'list' => $list,
            'detail' => $detail,
        ]);
    }



    /**
     * Deletes an existing HouselevyList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the HouselevyList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return HouselevyList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HouselevyList::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
