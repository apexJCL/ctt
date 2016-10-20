<?php

namespace frontend\controllers;

use common\helpers\RBACHelper;
use common\models\Bitacora;
use common\models\Client;
use common\models\ClientSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ClientController implements the CRUD actions for Client model.
 */
class ClientController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['details'],
                        'verbs' => ['POST'],
                        'roles' => ['root', 'viewClient']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'update', 'delete', 'create', 'view'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return RBACHelper::hasAccess($action);
                        }
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionDetails()
    {
        $client = Client::find()->where(['id' => Yii::$app->request->post("expandRowKey")])->one();
        return $this->renderPartial('_details', [
            'model' => $client
        ]);
    }

    /**
     * Lists all Client models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Client model.
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
     * Creates a new Client model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Client();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->create()) {
                Yii::$app->session->addFlash("info", Yii::t('app', 'User created successfully'), true);
                return $this->redirect(['index']);
            } else
                return $this->render('create', [
                    'model' => $model,
                ]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Client model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->create()) {
            Bitacora::register(Client::tableName());
            Yii::$app->session->addFlash("info", Yii::t('app', 'User updated successfully'), true);
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Client model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (Bitacora::register(Client::tableName())) {
            $this->findModel($id)->delete();
            Yii::$app->session->addFlash("info", Yii::t('app', 'User deleted successfully'), true);
        } else
            Yii::$app->session->addFlash("info", Yii::t('app', 'An error has ocurred'), true);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Client model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Client the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Client::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
