<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id #
 * @property string $fullName ФИО
 * @property string $first_name Имя
 * @property string $double_name Фамилия
 * @property string|null $patronymic Отчество
 * @property string $sex Пол
 * @property string|null $avatar Фотография
 * @property string|null $phone_number Номер телефона
 * @property string|null $email E-mail
 * @property string $created_at Дата создания
 * @property string $updated_at Дата последнего обновления
 * @property string|null $deleted_at Дата удаления
 *
 * @property ClientTrener[] $clientTreners
 * @property GroupJobClient[] $groupJobClients
 * @property Ticket[] $tickets
 */
class Client extends Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'double_name'], 'required'],
            [['created_at', 'updated_at', 'deleted_at', 'fullName'], 'safe'],
            [['first_name', 'double_name', 'patronymic'], 'string', 'max' => 50],
            [['sex'], 'string', 'max' => 1],
            [['avatar', 'email'], 'string', 'max' => 255],
            [['phone_number'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '#',
            'fullName' => 'ФИО',
            'first_name' => 'Имя',
            'double_name' => 'Фамилия',
            'patronymic' => 'Отчество',
            'sex' => 'Пол',
            'avatar' => 'Фотография',
            'phone_number' => 'Номер телефона',
            'email' => 'E-mail',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата последнего обновления',
            'deleted_at' => 'Дата удаления',
        ];
    }

    /**
     * Gets query for [[ClientTreners]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientTreners()
    {
        return $this->hasMany(ClientTrener::className(), ['id_client' => 'id']);
    }

    /**
     * Gets query for [[GroupJobClients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroupJobClients()
    {
        return $this->hasMany(GroupJobClient::className(), ['id_client' => 'id']);
    }

    /**
     * Gets query for [[Tickets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['id_client' => 'id']);
    }

    public function getFullName()
    {
        return $this->double_name . ' ' . $this->first_name . ' ' . $this->patronymic;
    }
}
