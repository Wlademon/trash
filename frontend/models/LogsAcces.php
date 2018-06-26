<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "logs_acces".
 *
 * @property int $id
 * @property string $IP
 * @property string $datetime
 * @property string $type_request
 * @property string $log
 */
class LogsAcces extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logs_acces';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IP', 'datetime', 'type_request', 'log'], 'required'],
            [['datetime'], 'safe'],
            [['IP'], 'string', 'max' => 15],
            [['type_request'], 'string', 'max' => 4],
            [['log'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'IP' => 'Ip',
            'datetime' => 'Datetime',
            'type_request' => 'Type Request',
            'log' => 'Log',
        ];
    }
}
