<?php

use common\models\User;
use yii\db\Migration;

class m160928_010829_grant_privileges_to_root extends Migration
{
    public function up()
    {
        $rootRole = Yii::$app->authManager->getRole('root');
        $user = User::findBySql("SELECT id FROM user WHERE username='root_admin'")->asArray()->one();
        Yii::$app->authManager->assign($rootRole, $user['id']);
        echo 'Granted';
    }

    public function down()
    {
        $rootRole = Yii::$app->authManager->getRole('root');
        /**
         * @var User $user
         */
        $user = User::find()->where(['username' => 'root_admin'])->one();
        Yii::$app->authManager->revoke($rootRole, $user->id);
        echo 'Revoked';
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
