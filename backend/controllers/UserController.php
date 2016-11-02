<?php

namespace backend\controllers;

use common\models\User;
use common\models\UserSearch;
use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
                        'roles' => ['root', 'viewUser']
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@']
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

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $roleProvider = new ArrayDataProvider([
            'allModels' => $model->getChildren()
        ]);
        return $this->render('view', [
            'model' => $model,
            'roleProvider' => $roleProvider
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        if ($model->load(Yii::$app->request->post())) {
            $model->profilePicture = UploadedFile::getInstance($model, 'profilePicture');
            if ($user = $model->signUp())
                return $this->redirect(['view', 'id' => $user->id]);
            else
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
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->updateData()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else return $this->render('create', ['model' => $model]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $user = $this->findModel($id);
        $user->deleteProfile();
        return $this->redirect(['index']);
    }

    public function actionRoles()
    {
        $model = User::getUserRoles(Yii::$app->request->getQueryParam('id'));

        if ($model && $model->load(Yii::$app->request->post()) && $model->manageRoles(array_values(Yii::$app->request->post()['User']['roles'])))
            return $this->redirect(['view', 'id' => $model->id]);
        else
            return $this->render('roles', [
                'model' => $model,
            ]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDetails()
    {
        $user = User::find()->where(['id' => Yii::$app->request->post("expandRowKey")])->one();
        $roleProvider = new ArrayDataProvider([
            'allModels' => $user->getChildren()
        ]);
        return $this->renderPartial('_details', [
            'model' => $user,
            'roleProvider' => $roleProvider
        ]);
    }
}
