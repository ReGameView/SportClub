<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * @property string $created_at Дата создания
 * @property string $updated_at Дата последнего обновления
 * @property string|null $deleted_at Дата удаления
 */
class Model extends ActiveRecord
{
    public function afterSave($insert, $changedAttributes)
    {
        $this->created_at = (new \DateTime())->format('Y-m-d H:i:s');
        $this->updated_at = (new \DateTime())->format('Y-m-d H:i:s');
        parent::afterSave($insert, $changedAttributes);
    }

    public function delete()
    {
        $this->deleted_at = (new \DateTime())->format('Y-m-d H:i:s');
    }
}
