<?php

namespace frontend\controllers;

use common\models\LoginForm;
use Yii;

class TestController extends \yii\web\Controller
{

    public function actionIndex()
    {
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('index', [
                'model' => $model,
                'errors' => ''
            ]);
        }
    }

}
