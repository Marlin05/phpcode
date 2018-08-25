<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property string $id
 * @property string $title
 * @property string $alias
 * @property string $parent
 * @property string $content
 * @property string $image
 * @property double $price
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
        
         // если будем работать  с таблицей продуктов в конт.продуктов и нужно связать её с категорией
    // связ hasОne т.к. у 1 продукта не может быть 2 категорий
    /*public function getCategories(){
        return $this->hasOne(Category::className(), ['id' => 'parent']);
    }*/
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'alias', 'parent', 'content', 'price'], 'required'],
            [['parent'], 'integer'],
            [['content'], 'string'],
            [['price'], 'number'],
            [['title', 'alias', 'image'], 'string', 'max' => 255],
            [['alias'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'alias' => 'Alias',
            'parent' => 'Parent',
            'content' => 'Content',
            'image' => 'Image',
            'price' => 'Price',
        ];
    }
}
