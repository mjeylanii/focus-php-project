<?php

namespace app\models;

use app\core\ProductModel;

class Product extends ProductModel
{
    const PRODUCT_AVAILABLE = 'Available';
    const PRODUCT_UNAVAILABLE = 'Unavailable';
    public int $product_id = 0;
    public string $product_name = '';
    public int $product_price = 0;
    public string $product_details = '';

    public function save()
    {

        return parent::save();
    }

    public function tableName(): string
    {
        return 'products';
    }

    public function primaryKey(): string
    {
        return 'product_id';
    }

    public function rules(): array
    {
        return [
            'product_id' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'class' => self::class]],
            'product_name' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'class' => self::class]],
            'product_price' => [self::RULE_REQUIRED],
            'product_details' => [self::RULE_REQUIRED]
        ];
    }

    public function attributes(): array
    {
        return ['product_id', 'product_name', 'product_price', 'product_details'];
    }

    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function getProductName(): string
    {
        return $this->product_name;
    }

    public function getProductDetails(): string
    {
        return $this->product_details;
    }

    public function getProductPrice(): int
    {
        return $this->product_price;
    }

    public function getAllProducts(): array
    {
       return self::getAll(self::class);
    }
}