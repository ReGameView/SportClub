<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hall".
 *
 * @property int $id #
 * @property string $name Название
 * @property string $responsible Отвественный
 * @property string $area Площадь
 * @property string|null $information Информация по залу
 * @property int|null $is_worked Работает ли зал
 * @property string $created_at Дата создания
 * @property string $updated_at Дата последнего обновления
 * @property string|null $deleted_at Дата удаления
 *
 * @property GroupJob[] $groupJobs
 */
class Hall extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hall';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'responsible', 'area', 'created_at', 'updated_at'], 'required'],
            [['information'], 'string'],
            [['is_worked'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['name', 'responsible', 'area'], 'string', 'max' => 50],
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
            'responsible' => 'Отвественный',
            'area' => 'Площадь',
            'information' => 'Информация по залу',
            'is_worked' => 'Работает ли зал',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата последнего обновления',
            'deleted_at' => 'Дата удаления',
        ];
    }

    /**
     * Gets query for [[GroupJobs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroupJobs()
    {
        return $this->hasMany(GroupJob::className(), ['id_hall' => 'id']);
    }
}
