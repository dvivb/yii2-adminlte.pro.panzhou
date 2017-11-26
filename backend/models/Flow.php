<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flow".
 *
 * @property string $id
 * @property string $name
 * @property integer $type
 * @property string $create_time
 * @property string $update_time
 */
class Flow extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flow';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '流程名称',
            'type' => '流程分类',//'1房屋征补2过渡费流程，3土地征补流程，4安置流程',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return FlowQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FlowQuery(get_called_class());
    }

    public static function getFlowByType($type){
        return self::find()->where(['type'=>$type])->asArray()->one();
    }
    /*
     *
     *  case 1:
                            return Html::encode("房屋征补流程");
                            break;
                        case 2:
                            return Html::encode("征收补偿款流程");
                            break;
                        case 3:
                            return Html::encode("土地征补流程");
                            break;
                        case 4:
                            return Html::encode("安置流程");
                            break;
     */
    public static function getFlowBySource($source){//'houselevy','landlevy','interm'
        switch ($source){
            case 'houselevy':
                $type = 1;
                break;
            case 'landlevy':
                $type=3;
                break;
            case 'interm':
                $type=2;
                break;
            default:
                $type = null;
                break;
        }
        if(is_null($type)){
            return false;
        }
        return self::getFlowByType($type);

    }

}
