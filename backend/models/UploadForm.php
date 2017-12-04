<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $upload_file;

    public function rules()
    {
        return [
            [['upload_file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    public function upload()
    {
//        if ($this->validate()) {
        if (true) {
            foreach ($this->upload_file as $file) {
//                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
                $file->saveAs('C:\D\I\Clown\pro\php\yii2-adminlte.pro.panzhou\backend\web\upload\file\\' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}
