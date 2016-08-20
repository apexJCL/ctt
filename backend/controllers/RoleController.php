<?php

namespace backend\controllers;

use backend\models\AuthItem;
use backend\models\AuthItemSearch;
use common\models\AuthItemForm;
use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class RoleController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['root']
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
     * @param $name
     * @return \yii\web\Response
     */
    public function actionDelete($name)
    {
        if (AuthItem::deleteRole($name))
            return $this->redirect(['role/index']);
        else
            return $this->redirect(['role/error']);
    }

    public function actionIndex()
    {
        $sm = AuthItemSearch::newRoleSearch();
        $dp = $sm->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dp,
            'searchModel' => $sm
        ]);
    }

    public function actionCreate()
    {
        $form = new AuthItemForm();
        if ($form->load(Yii::$app->request->post()) && $form->saveRole()) {
            return $this->redirect(['view', 'name' => $form->name]);
        }
        return $this->render('create', [
            'model' => $form
        ]);
    }

    public function actionUpdate()
    {
        $form = AuthItemForm::getRoleForm(Yii::$app->getRequest()->getQueryParam('name'));
        if ($form->load(Yii::$app->request->post()) && $form->saveRole()) {
            return $this->redirect(['view', 'name' => $form->name]);
        }
        return $this->render('update', [
            'model' => $form
        ]);
    }

    public function actionChildren()
    {
        $form = AuthItemForm::getRoleChildrenForm(Yii::$app->getRequest()->getQueryParam('name'));
        if ($form->load(Yii::$app->request->post()) && $form->saveChildren())
            return $this->redirect(['view', 'name' => $form->name]);
        return $this->render('children',[
            'model' => $form
        ]);
    }

    public function actionPermissions()
    {
        $form = AuthItemForm::getRolePermissionsForm(Yii::$app->getRequest()->getQueryParam('name'));
        if ($form->load(Yii::$app->request->post()) && $form->savePermissions())
            return $this->redirect(['view', 'name' => $form->name]);
        return $this->render('permissions',[
            'model' => $form
        ]);
    }

    /**
     * @return string
     */
    public function actionView()
    {
        /**
         * @var $model AuthItem
         */
        $model = AuthItem::getRole(Yii::$app->getRequest()->getQueryParam('name'));
        $permissionProvider = new ArrayDataProvider([
            'allModels' => $model->getChildren()->where(['type' => AuthItem::PERMISSION])->all()
        ]);
        $chilrenRolesProvider = new ArrayDataProvider([
            'allModels' => $model->getChildren()->where(['type' => AuthItem::ROLE])->all()
        ]);
        return $this->render('view', [
            'model' => $model,
            'permissionProvider' => $permissionProvider,
            'rolesProvider' => $chilrenRolesProvider
        ]);
    }

}
