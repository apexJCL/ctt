<?php

namespace frontend\controllers;

use common\helpers\RBACHelper;
use common\helpers\UserHelper;
use frontend\models\Brand;
use frontend\models\BrandSearch;
use frontend\models\Category;
use frontend\models\Item;
use frontend\models\ItemDescription;
use frontend\models\ItemDescriptionSearch;
use frontend\models\ItemSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * ItemController implements the CRUD actions for Item model.
 */
class ItemController extends Controller
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
                    'brand-autocomplete' => ['GET']
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['brand-autocomplete']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['list'],
                        'roles' => ['@'],
                        'verbs' => ['GET']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'update', 'view', 'delete'],
                        'roles' => ['@'], // Any logged in user can go in, only if they have the permission assigned
                        'matchCallback' => function ($rule, $action) {
                            return RBACHelper::hasAccess($action);
                        }
                    ]
                ]
            ],
        ];
    }

    public function actionList($q = null, $id = null)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return Item::ajaxSearch($q, $id);
    }

    /**
     * Lists all Item models.
     * @return mixed
     */
    public
    function actionIndex()
    {
        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'permissions' => UserHelper::getPermissions($this->id)
        ]);
    }

    /**
     * Displays a single Item model.
     * @param integer $id
     * @return mixed
     */
    public
    function actionView($id)
    {
        $existence = ItemDescription::find()->where(['item_id' => $id])->asArray()->all();
        $itemDescriptionSearch = ItemDescriptionSearch::newFor($id);
        $itemDescriptionProvider = $itemDescriptionSearch->search(Yii::$app->request->queryParams);
        $itemDescriptionProvider->pagination->pageSize = 10;
        return $this->render('view', [
            'model' => $this->findModel($id),
            'existence' => $existence,
            'itemDescriptionProvider' => $itemDescriptionProvider,
            'itemDescriptionSearch' => $itemDescriptionSearch,
            'permissions' => UserHelper::getPermissions($this->id, true)
        ]);
    }

    /**
     * Creates a new Item model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public
    function actionCreate()
    {
        $model = new Item();
        $categories = Category::getCategoriesDropdown();
        $brands = Brand::getBrandsDropdown();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash("info", Yii::t('app', 'Item created successfully'));
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'categories' => $categories,
                'brands' => $brands
            ]);
        }
    }

// TODO: Finish item implementation, add itemDescriptions to items, categories, etc.

    /**
     * Updates an existing Item model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public
    function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $categories = Category::getCategoriesDropdown();
        $brands = Brand::getBrandsDropdown();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash("info", Yii::t('app', 'Item updated successfully'));
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'categories' => $categories,
                'brands' => $brands
            ]);
        }
    }

    /**
     * Deletes an existing Item model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public
    function actionDelete($id)
    {
        if ($this->findModel($id)->delete() > 0)
            Yii::$app->session->addFlash("info", Yii::t('app', 'Item deleted successfully'));
        return $this->redirect(['index']);
    }

    /**
     * Returns a JSON of brands
     * brand {
     *  id:,
     *  name:
     * }
     *
     * @return array|\yii\db\ActiveRecord[]|Response
     */
    public
    function actionBrandAutocomplete()
    {
        if (!Yii::$app->request->isGet)
            return $this->redirect(['site/error']);
        Yii::$app->response->format = Response::FORMAT_JSON;
        $searchString = Yii::$app->request->getQueryParam('brand');
        $result = BrandSearch::find()->select(['id', 'name'])->filterWhere(['like', 'name', $searchString])->asArray()->all();
        return $result;
    } // TODO: Implement JS and Dropdown with search for interface, also, move this to BrandController

    /**
     * Finds the Item model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Item the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected
    function findModel($id)
    {
        if (($model = Item::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
