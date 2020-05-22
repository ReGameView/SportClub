<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "traffic".
 *
 * @property int $id #
 * @property string $name Название тарифа
 * @property int|null $id_render Список рендеров
 * @property int|null $discount Наличие скидки
 * @property string|null $discDescription Описание скидки
 * @property string|null $discExpiration Дата окончания скидки
 * @property float|null $discPrice Стоимость при скидке
 * @property int|null $is_archived Архивирован ли тариф
 * @property string $created_at Дата создания
 * @property string $updated_at Дата последнего обновления
 * @property string|null $deleted_at Дата удаления
 *
 * @property Ticket[] $tickets
 * @property TrafficRender $render
 */
class Traffic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'traffic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['id_render', 'discount', 'is_archived'], 'integer'],
            [['discExpiration', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['discPrice'], 'number'],
            [['name'], 'string', 'max' => 50],
            [['discDescription'], 'string', 'max' => 255],
            [['id_render'], 'exist', 'skipOnError' => true, 'targetClass' => TrafficRender::className(), 'targetAttribute' => ['id_render' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '#',
            'name' => 'Название тарифа',
            'id_render' => 'Список рендеров',
            'discount' => 'Наличие скидки',
            'discDescription' => 'Описание скидки',
            'discExpiration' => 'Дата окончания скидки',
            'discPrice' => 'Стоимость при скидке',
            'is_archived' => 'Архивирован ли тариф',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата последнего обновления',
            'deleted_at' => 'Дата удаления',
        ];
    }

    /**
     * Gets query for [[Tickets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['id_traffic' => 'id']);
    }

    /**
     * Gets query for [[Render]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRender()
    {
        return $this->hasOne(TrafficRender::className(), ['id' => 'id_render']);
    }
}
