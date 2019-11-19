<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "adresses".
 *
 * @property int $adress_id
 * @property string $adress_name
 * @property string $city
 * @property string $zip_code
 * @property string $district
 * @property string $email
 * @property int $country_id
 *
 * @property User $emailUser
 * @property Countries $country
 * @property Purchases[] $purchases
 */
class Adresses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'adresses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['adress_name', 'city', 'zip_code', 'district', 'email', 'country_id'], 'required'],
            [['zip_code'], 'safe'],
            [['country_id'], 'integer'],
            [['adress_name', 'city', 'district', 'email'], 'string', 'max' => 65],
            [['email'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['email' => 'email']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Countries::className(), 'targetAttribute' => ['country_id' => 'country_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'adress_id' => 'Adress ID',
            'adress_name' => 'Adress Name',
            'city' => 'City',
            'zip_code' => 'Zip Code',
            'district' => 'District',
            'email' => 'Email',
            'country_id' => 'Country ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmailUser()
    {
        return $this->hasOne(User::className(), ['email' => 'email']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Countries::className(), ['country_id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchases()
    {
        return $this->hasMany(Purchases::className(), ['adress_id' => 'adress_id']);
    }
}
