<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Temperature extends ActiveRecord
{
    public static function tableName()
    {
        return 'temperature';
    }

    /**
     * Déclare les attributs que ce modèle va gérer.
     */
    public function attributes()
    {
        return [
            'code',
            'dateEnregistre',
            'tempCelc',
            'tempFahr',
            'tempKelv',
        ];
    }

    // Si vous souhaitez appliquer des règles de validation (facultatif)
    public function rules()
    {
        return [
            [['dateEnregistre', 'tempCelc', 'tempFahr', 'tempKelv'], 'required'],
            [['tempCelc', 'tempFahr', 'tempKelv'], 'number'],
            [['dateEnregistre'], 'date', 'format' => 'yyyy-MM-dd'],
        ];
    }
}
