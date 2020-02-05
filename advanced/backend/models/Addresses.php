<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "addresses".
 *
 * @property int $address_id
 * @property string $address_name
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
class Addresses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'addresses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address_name', 'city', 'zip_code', 'district', 'email', 'country_id'], 'required'],
            [['zip_code'], 'safe'],
            [['country_id'], 'integer'],
            [['address_name', 'city', 'district', 'email'], 'string', 'max' => 65],
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
            'address_id' => 'Address ID',
            'address_name' => 'Address Name',
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
        return $this->hasMany(Purchases::className(), ['address_id' => 'address_id']);
    }
}
