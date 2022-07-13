<?php

namespace app\models;

use app\queries\PostQuery;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $username
 * @property string $content
 */
class Post extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'post';
    }

    public static function find(): PostQuery
    {
        return new PostQuery(get_called_class());
    }

    public function rules(): array
    {
        return [
            [['username', 'content'], 'required'],
            [['username'], 'string', 'max' => 255],
            [['content'], 'string', 'max' => 512],
        ];
    }


    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'content' => Yii::t('app', 'Content'),
        ];
    }
}
