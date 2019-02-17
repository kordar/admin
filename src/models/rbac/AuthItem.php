<?php

namespace kordar\yak\models\rbac;

use kordar\yak\models\Yak;
use Yii;

/**
 * This is the model class for table "{{%auth_item}}".
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $rule_name
 * @property resource $data
 * @property integer $created_at
 * @property integer $updated_at
 */
class AuthItem extends Yak
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_item}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['type'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64],
            ['type', 'default', 'value'=>0],
            ['rule_name', 'default', 'value'=>null],
            ['data', 'default', 'value'=>null],
            [['rule_name'], 'exist', 'skipOnError' => true, 'targetClass' => AuthRule::className(), 'targetAttribute' => ['rule_name' => 'name']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('yak', 'Item Name'),
            'type' => Yii::t('yak', 'Item Type'),
            'description' => Yii::t('yak', 'Item Description'),
            'rule_name' => Yii::t('yak', 'Item Rule Name'),
            'data' => Yii::t('yak', 'Item Data'),
            'created_at' => Yii::t('yak', 'Created At'),
            'updated_at' => Yii::t('yak', 'Updated At'),
        ];
    }

}
