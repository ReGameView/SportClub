<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client_trener".
 *
 * @property int $id #
 * @property int|null $id_client #Клиент
 * @property int|null $id_trener #Тренер
 * @property float|null $price Цена
 * @property string|null $time Время
 * @property string|null $date Дата
 * @property string|null $comment Комментарий
 *
 * @property Trener $trener
 * @property Client $client
 */
class ClientTrener extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_trener';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_client', 'id_trener'], 'integer'],
            [['price'], 'number'],
            [['time'], 'safe'],
            [['comment'], 'string'],
            [['date'], 'string', 'max' => 50],
            [['id_trener'], 'exist', 'skipOnError' => true, 'targetClass' => Trener::className(), 'targetAttribute' => ['id_trener' => 'id']],
            [['id_client'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['id_client' => 'id']],
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
            'id_trener' => '#Тренер',
            'price' => 'Цена',
            'time' => 'Время',
            'date' => 'Дата',
            'comment' => 'Комментарий',
        ];
    }

    /**
     * Gets query for [[Trener]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrener()
    {
        return $this->hasOne(Trener::className(), ['id' => 'id_trener']);
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
}
