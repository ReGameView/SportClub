<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "traffic_type".
 *
 * @property int $id #
 * @property string|null $name Тип
 *
 * @property TrafficRender[] $trafficRenders
 */
class TrafficType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'traffic_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '#',
            'name' => 'Тип',
        ];
    }

    /**
     * Gets query for [[TrafficRenders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrafficRenders()
    {
        return $this->hasMany(TrafficRender::className(), ['id_type' => 'id']);
    }
}
