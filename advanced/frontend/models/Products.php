<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $product_id
 * @property string $name
 * @property int $price
 * @property int $total
 * @property int $stock
 * @property string $description
 * @property int $discount
 * @property int $category_id

 * @property Photos[] $photos
 * @property Categories $category
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'stock', 'description', 'discount', 'category_id'], 'required'],
            [['price'], 'number'],
            [['stock', 'discount', 'category_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 65],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'category_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'name' => 'Name',
            'price' => 'Price',
            'stock' => 'Stock',
            'description' => 'Description',
            'discount' => 'Discount',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photos::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['category_id' => 'category_id']);
    }
}
