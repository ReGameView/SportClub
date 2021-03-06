<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trener".
 *
 * @property int $id #
 * @property string $first_name Имя
 * @property string $double_name Фамилия
 * @property string|null $patronymic Отчество
 * @property string $sex Пол
 * @property string|null $avatar Фотография
 * @property string $phone_number Номер телефона
 * @property string|null $email E-mail
 * @property string|null $information Информация о тренере
 * @property string $created_at Дата создания
 * @property string $updated_at Дата последнего обновления
 * @property string|null $deleted_at Дата удаления
 * @property string $FullName ФИО Тренера
 *
 * @property ClientTrener[] $clientTreners
 * @property GroupJob[] $groupJobs
 */
class Trener extends Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trener';
    }
    public function afterSave($insert, $changedAttributes)
    {
        $this->created_at = (new \DateTime())->format('Y-m-d H:i:s');
        $this->updated_at = (new \DateTime())->format('Y-m-d H:i:s');
        parent::afterSave($insert, $changedAttributes);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'double_name', 'phone_number'], 'required'],
            [['information'], 'string'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
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
            'first_name' => 'Имя',
            'double_name' => 'Фамилия',
            'patronymic' => 'Отчество',
            'FullName' => "ФИО Тренера",
            'sex' => 'Пол',
            'avatar' => 'Фотография',
            'phone_number' => 'Номер телефона',
            'email' => 'E-mail',
            'information' => 'Информация о тренере',
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
        return $this->hasMany(ClientTrener::className(), ['id_trener' => 'id']);
    }

    /**
     * Gets query for [[GroupJobs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroupJobs()
    {
        return $this->hasMany(GroupJob::className(), ['id_trener' => 'id']);
    }


    public function delete_at() {
        $this->deleted_at = (new \DateTime())->format('Y-m-d H:i:s');
        return $this->save();
    }

    public function getFullName()
    {
        return $this->double_name . ' ' . $this->first_name . ' ' . $this->patronymic;
    }
}
