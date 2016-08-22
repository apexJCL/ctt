<?php

namespace backend\models;

class AuthItemChild extends AuthItem
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_item_child';
    }


}