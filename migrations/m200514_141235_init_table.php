<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m200514_141235_init_table
 */
class m200514_141235_init_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('client', [
            'id' => $this->primaryKey()->comment("#"),
            'first_name' => $this->string(50)->notNull()->comment('Имя'),
            'double_name' => $this->string(50)->notNull()->comment('Фамилия'),
            'patronymic' => $this->string(50)->comment('Отчество'),
            'sex' => $this->string(1)->notNull()->defaultValue('m')->comment('Пол'),
            'avatar' => $this->string(255)->comment('Фотография'),
            'phone_number' => $this->string(50)->comment('Номер телефона'),
            'email' => $this->string(255)->comment('E-mail'),
            'created_at' => $this->timestamp()->comment('Дата создания'),
            'updated_at' => $this->timestamp()->comment('Дата последнего обновления'),
            'deleted_at' => $this->timestamp()->comment('Дата удаления')
        ]);


        $this->createTable('trener', [
            'id' => $this->primaryKey()->comment("#"),

            'first_name' => $this->string(50)->notNull()->comment('Имя'),
            'double_name' => $this->string(50)->notNull()->comment('Фамилия'),
            'patronymic' => $this->string(50)->comment('Отчество'),
            'sex' => $this->string(1)->notNull()->defaultValue('m')->comment('Пол'),
            'avatar' => $this->string(255)->comment('Фотография'),
            'phone_number' => $this->string(50)->notNull()->comment('Номер телефона'),
            'email' => $this->string(255)->comment('E-mail'),

            'information' => $this->text()->comment("Информация о тренере"),

            'created_at' => $this->timestamp()->comment('Дата создания'),
            'updated_at' => $this->timestamp()->comment('Дата последнего обновления'),
            'deleted_at' => $this->timestamp()->comment('Дата удаления')
        ]);

        $this->createTable('traffic', [
            'id' => $this->primaryKey()->comment("#"),
            'name' => $this->string(50)->notNull()->comment("Название тарифа"),
            'id_render' => $this->integer()->comment("#Рендер"),
            'discount' => $this->boolean()->defaultValue(false)->comment("Наличие скидки"),
            'discDescription' => $this->string(255)->comment("Описание скидки"),
            'discExpiration' => $this->timestamp()->comment("Дата окончания скидки"),
            'discPrice' => $this->double()->comment("Стоимость при скидке"),
            'is_archived' => $this->boolean()->defaultValue(false)->comment("Архивирован ли тариф"),

            'created_at' => $this->timestamp()->comment('Дата создания'),
            'updated_at' => $this->timestamp()->comment('Дата последнего обновления'),
            'deleted_at' => $this->timestamp()->comment('Дата удаления')
        ]);

        $this->createTable('traffic_render', [
            'id' => $this->primaryKey()->comment("#"),
            'name' => $this->string(50),
            'id_type' => $this->integer()->comment("#Тип"),
            'id_time' => $this->integer()->comment("#Время"),
            'price' => $this->double()->notNull()->comment("Стоимость"),

            'created_at' => $this->timestamp()->comment('Дата создания'),
            'updated_at' => $this->timestamp()->comment('Дата последнего обновления'),
            'deleted_at' => $this->timestamp()->comment('Дата удаления')
        ]);

        $this->createTable('traffic_type', [
            'id' => $this->primaryKey()->comment("#"),
            'name' => $this->string(50)->comment("Тип"),
        ]);

        $this->createTable('traffic_time', [
            'id' => $this->primaryKey()->comment("#"),
            'name' => $this->string(50)->comment("Время")
        ]);

        $this->createTable('hall', [
            'id' => $this->primaryKey()->comment("#"),
            'name' => $this->string(50)->notNull()->comment("Название"),
            'responsible' => $this->string(50)->notNull()->comment("Отвественный"),
            'area' => $this->string(50)->notNull()->comment("Площадь"),
            'information' => $this->text()->comment("Информация по залу"),
            'is_worked' => $this->boolean()->comment("Работает ли зал"),

            'created_at' => $this->timestamp()->comment('Дата создания'),
            'updated_at' => $this->timestamp()->comment('Дата последнего обновления'),
            'deleted_at' => $this->timestamp()->comment('Дата удаления')
        ]);

        $this->createTable('group_job', [
            'id' => $this->primaryKey()->comment("#"),
            'name' => $this->string(50)->notNull()->comment("Название"),
            'description' => $this->text()->notNull()->comment("Описание"),
            'time' => $this->time()->notNull()->comment("Время"),
            'date' => $this->string(50)->notNull()->comment("Дата"),
            'price' => $this->double()->notNull()->comment("Цена"),
            'id_trener' => $this->integer()->comment("#Тренер"),
            'id_hall' => $this->integer()->comment("#Зал"),

            'created_at' => $this->timestamp()->comment('Дата создания'),
            'updated_at' => $this->timestamp()->comment('Дата последнего обновления'),
            'deleted_at' => $this->timestamp()->comment('Дата удаления')
        ]);

        $this->createTable('group_job_client', [
            'id' => $this->primaryKey()->comment("#"),
            'id_group_job' => $this->integer()->comment('#Групповое Занятие'),
            'id_client' => $this->integer()->comment("#Клиент"),
        ]);

        $this->createTable('ticket', [
            'id' => $this->primaryKey()->comment("#"),
            'id_client' => $this->integer()->comment("#Клиент"),
            'id_traffic' => $this->integer()->comment("#Тариф"),
            'price' => $this->double()->comment("Цена"),

            'created_at' => $this->timestamp()->comment('Дата создания'),
            'expirated_at' => $this->timestamp()->comment('Дата истечения билета'),
            'updated_at' => $this->timestamp()->comment('Дата последнего обновления'),
            'deleted_at' => $this->timestamp()->comment('Дата удаления'),
        ]);

        $this->createTable('client_trener', [
            'id' => $this->primaryKey()->comment("#"),
            'id_client' => $this->integer()->comment("#Клиент"),
            'id_trener' => $this->integer()->comment("#Тренер"),
            'price' => $this->double()->comment("Цена"),
            'time' => $this->time()->comment("Время"),
            'date' => $this->string(50)->comment("Дата"),
            'comment' => $this->text()->comment("Комментарий")
        ]);

        $this->addForeignKey('FK_ticket_client', 'ticket', 'id_client', 'client', 'id');
        $this->addForeignKey('FK_ticket_traffic', 'ticket', 'id_traffic', 'traffic', 'id');

        $this->addForeignKey('FK_groupJob_hall', 'group_job', 'id_hall', 'hall', 'id', 'SET NULL');
        $this->addForeignKey('FK_groupJob_trener', 'group_job', 'id_trener', 'trener', 'id', 'SET NULL');

        $this->addForeignKey('FK_groupJob_client1', 'group_job_client', 'id_group_job', 'group_job', 'id');
        $this->addForeignKey('FK_groupJob_client2', 'group_job_client', 'id_client', 'client', 'id');

        $this->addForeignKey('FK_client_trener1', 'client_trener', 'id_trener', 'trener', 'id', 'SET NULL');
        $this->addForeignKey('FK_client_trener2', 'client_trener', 'id_client', 'client', 'id', 'SET NULL');

        $this->addForeignKey('FK_traffic_render', 'traffic', 'id_render', 'traffic_render', 'id', 'SET NULL');
        $this->addForeignKey('FK_render_time', 'traffic_render', 'id_time', 'traffic_time','id', 'SET NULL');
        $this->addForeignKey('FK_render_type', 'traffic_render', 'id_type', 'traffic_type', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_ticket_client', 'ticket');
        $this->dropForeignKey('FK_ticket_traffic', 'ticket');

        $this->dropForeignKey('FK_groupJob_hall', 'group_job');
        $this->dropForeignKey('FK_groupJob_trener', 'group_job');

        $this->dropForeignKey('FK_groupJob_client1', 'group_job_client');
        $this->dropForeignKey('FK_groupJob_client2', 'group_job_client');

        $this->dropForeignKey('FK_client_trener1', 'client_trener');
        $this->dropForeignKey('FK_client_trener2', 'client_trener');

        $this->dropForeignKey('FK_traffic_render', 'traffic');
        $this->dropForeignKey('FK_render_time', 'traffic_render');
        $this->dropForeignKey('FK_render_type', 'traffic_render');

        $this->dropTable('client');
        $this->dropTable('trener');
        $this->dropTable('traffic');
        $this->dropTable('traffic_render');
        $this->dropTable('traffic_type');
        $this->dropTable('traffic_time');
        $this->dropTable('hall');
        $this->dropTable('group_job');
        $this->dropTable('group_job_client');
        $this->dropTable('ticket');
        $this->dropTable('client_trener');

        return true;
    }
}
