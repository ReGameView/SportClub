<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group_job".
 *
 * @property int $id #
 * @property string $name Название
 * @property string $description Описание
 * @property string $time Время
 * @property string $date Дата
 * @property float $price Цена
 * @property int|null $id_trener #Тренер
 * @property int|null $id_hall #Зал
 * @property string $created_at Дата создания
 * @property string $updated_at Дата последнего обновления
 * @property string|null $deleted_at Дата удаления
 *
 * @property Hall $hall
 * @property Trener $trener
 * @property GroupJobClient[] $groupJobClients
 */
class GroupJob extends Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_job';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'time', 'date', 'price'], 'required'],
            [['description'], 'string'],
            [['time', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['price'], 'number'],
            [['id_trener', 'id_hall'], 'integer'],
            [['name', 'date'], 'string', 'max' => 50],
            [['id_hall'], 'exist', 'skipOnError' => true, 'targetClass' => Hall::className(), 'targetAttribute' => ['id_hall' => 'id']],
            [['id_trener'], 'exist', 'skipOnError' => true, 'targetClass' => Trener::className(), 'targetAttribute' => ['id_trener' => 'id']],
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
            'description' => 'Описание',
            'time' => 'Время',
            'date' => 'Дата',
            'price' => 'Цена',
            'id_trener' => '#Тренер',
            'id_hall' => '#Зал',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата последнего обновления',
            'deleted_at' => 'Дата удаления',
        ];
    }

    /**
     * Gets query for [[Hall]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHall()
    {
        return $this->hasOne(Hall::className(), ['id' => 'id_hall']);
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
     * Gets query for [[GroupJobClients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroupJobClients()
    {
        return $this->hasMany(GroupJobClient::className(), ['id_group_job' => 'id']);
    }
}
