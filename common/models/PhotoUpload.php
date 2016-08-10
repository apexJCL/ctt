<?php

namespace common\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class PhotoUpload extends Model
{
    /**
     * @var UploadedFile
     */
    public $uploadedFile;

    public function rules()
    {
        return [
            [['uploadedFile'], 'image', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, jpeg']
        ];
    }

    /**
     * Uploads the user picture to the server in a specific subfolder
     *
     * @param $username
     * @return bool
     */
    public function upload($username){
        if ($this->validate()){
            return $this->uploadedFile->saveAs('@common/users/' . $username . '.' . $this->uploadedFile->extension);
        }
        return false;
    }


}