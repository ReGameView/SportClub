<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group_job_client".
 *
 * @property int $id #
 * @property int|null $id_group_job #Групповое Занятие
 * @property int|null $id_client #Клиент
 *
 * @property GroupJob $groupJob
 * @property Client $client
 */
class GroupJobClient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_job_client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_group_job', 'id_client'], 'integer'],
            [['id_group_job'], 'exist', 'skipOnError' => true, 'targetClass' => GroupJob::className(), 'targetAttribute' => ['id_group_job' => 'id']],
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
            'id_group_job' => '#Групповое Занятие',
            'id_client' => '#Клиент',
        ];
    }

    /**
     * Gets query for [[GroupJob]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroupJob()
    {
        return $this->hasOne(GroupJob::className(), ['id' => 'id_group_job']);
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
