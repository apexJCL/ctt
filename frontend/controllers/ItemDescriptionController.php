<?php

namespace frontend\controllers;

use common\helpers\RBACHelper;
use frontend\models\Item;
use frontend\models\ItemDescription;
use frontend\models\ItemDescriptionSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ItemDescriptionController implements the CRUD actions for ItemDescription model.
 */
class ItemDescriptionController extends Controller
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
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['details'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['list'],
                        'roles' => ['@', 'root', 'indexItemDescription', 'viewItemDescription']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'update', 'view', 'delete'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return RBACHelper::hasAccess($action);
                        }
                    ]
                ]
            ],
        ];
    }

    public function actionDetails()
    {
        return $this->renderPartial('_details', [
            'model' => ItemDescription::findById(Yii::$app->request->post("expandRowKey"))
        ]);
    }


    public function actionList($q = null, $id = null)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ItemDescription::ajaxSearch($q, $id);
    }

    /**
     * Lists all ItemDescription models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ItemDescriptionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ItemDescription model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ItemDescription model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ItemDescription();
        $id = Yii::$app->request->getQueryParam('item_id');
        $model->item_id = $id;
        $dropdown = Item::dropdown();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash("info", Yii::t('app', 'Item created successfully'));
            return $this->redirect(['item/view', 'id' => $model->item_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'item_id' => $id,
                'dropdown' => $dropdown
            ]);
        }
    }

    /**
     * Updates an existing ItemDescription model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash("info", Yii::t('app', 'Item updated successfully'));
            return $this->redirect(['item/view', 'id' => $model->item_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ItemDescription model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $item_id = $this->findModel($id)->item_id;
        if ($this->findModel($id)->delete() > 0)
            Yii::$app->session->addFlash("info", Yii::t('app', 'Item deleted successfully'));
        return $this->redirect(['item/view', 'id' => $item_id]);
    }

    /**
     * Finds the ItemDescription model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ItemDescription the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ItemDescription::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
