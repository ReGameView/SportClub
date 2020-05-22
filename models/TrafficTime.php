<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "traffic_time".
 *
 * @property int $id #
 * @property string|null $name Время
 *
 * @property TrafficRender[] $trafficRenders
 */
class TrafficTime extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'traffic_time';
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
            'name' => 'Время',
        ];
    }

    /**
     * Gets query for [[TrafficRenders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrafficRenders()
    {
        return $this->hasMany(TrafficRender::className(), ['id_time' => 'id']);
    }
}
