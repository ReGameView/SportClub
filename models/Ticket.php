<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket".
 *
 * @property int $id #
 * @property int|null $id_client #Клиент
 * @property int|null $id_traffic #Тариф
 * @property float|null $price Цена
 * @property string $created_at Дата создания
 * @property string|null $expirated_at Дата истечения билета
 * @property string $updated_at Дата последнего обновления
 * @property string|null $deleted_at Дата удаления
 *
 * @property Client $client
 * @property Traffic $traffic
 */
class Ticket extends Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_client', 'id_traffic'], 'integer'],
            [['price'], 'number'],
            [['id_client', 'id_traffic'], 'required'],
            [['created_at', 'expirated_at', 'updated_at', 'deleted_at'], 'safe'],
            [['id_client'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['id_client' => 'id']],
            [['id_traffic'], 'exist', 'skipOnError' => true, 'targetClass' => Traffic::className(), 'targetAttribute' => ['id_traffic' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '#',
            'id_client' => '#Клиент',
            'id_traffic' => '#Тариф',
            'price' => 'Цена',
            'created_at' => 'Дата создания',
            'expirated_at' => 'Дата истечения билета',
            'updated_at' => 'Дата последнего обновления',
            'deleted_at' => 'Дата удаления',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'id_client']);
    }

    /**
     * Gets query for [[Traffic]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTraffic()
    {
        return $this->hasOne(Traffic::className(), ['id' => 'id_traffic']);
    }
}
