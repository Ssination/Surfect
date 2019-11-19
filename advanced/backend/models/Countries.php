<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property int $country_id
 * @property string $name_portuguese
 * @property string $name_english
 *
 * @property Adresses[] $adresses
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_portuguese', 'name_english'], 'required'],
            [['name_portuguese', 'name_english'], 'string', 'max' => 65],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'country_id' => 'Country ID',
            'name_portuguese' => 'Name Portuguese',
            'name_english' => 'Name English',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdresses()
    {
        return $this->hasMany(Adresses::className(), ['country_id' => 'country_id']);
    }
}
