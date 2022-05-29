<?php

namespace app\core;

abstract class ProductModel extends DbModel
{
  abstract public function getProductId(): int;
  abstract public function getProductName(): string;
  abstract public function getProductPrice(): int;
  abstract public function getProductDetails(): string;
}