<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "traffic_render".
 *
 * @property int $id #
 * @property string|null $name
 * @property int|null $id_type Тип
 * @property int|null $id_time Время
 * @property float $price Стоимость
 * @property string $created_at Дата создания
 * @property string $updated_at Дата последнего обновления
 * @property string|null $deleted_at Дата удаления
 *
 * @property Traffic[] $traffics
 * @property TrafficTime $time
 * @property TrafficType $type
 */
class TrafficRender extends Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'traffic_render';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_type', 'id_time'], 'integer'],
            [['name', 'price'], 'required'],
            [['price'], 'number'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['id_time'], 'exist', 'skipOnError' => true, 'targetClass' => TrafficTime::className(), 'targetAttribute' => ['id_time' => 'id']],
            [['id_type'], 'exist', 'skipOnError' => true, 'targetClass' => TrafficType::className(), 'targetAttribute' => ['id_type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '#',
            'name' => 'Название',
            'id_type' => '#Тип',
            'id_time' => '#Время',
            'price' => 'Стоимость',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата последнего обновления',
            'deleted_at' => 'Дата удаления',
        ];
    }

    /**
     * Gets query for [[Traffics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTraffics()
    {
        return $this->hasMany(Traffic::className(), ['id_render' => 'id']);
    }

    /**
     * Gets query for [[Time]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTime()
    {
        return $this->hasOne(TrafficTime::className(), ['id' => 'id_time']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(TrafficType::className(), ['id' => 'id_type']);
    }
}
