<?php

namespace App\Service;

class ProductHandler
{

    /**
     * 计算商品总价格
     *
     * @param $products
     * @return float|int
     */
    public function getTotalPrice($products)
    {
        $products_price = array_column($products, 'price');
        return array_sum($products_price);
    }

    /**
     * 商品价格排序
     *
     * @param $products
     * @return array
     */
    public function getProductSort($products)
    {
        $products_price_sort = array_column($products,'price');
        asort($products_price_sort);
        $new_products = [];
        foreach ($products_price_sort as $key => $value) {
            $new_products[] = $products[$key];
        }
        return $new_products;
    }

    /**
     * 日期转时间戳
     *
     * @param $product
     * @return int
     */
    public function convertDateTimeToTimestamp($product): int
    {
        $create_at_timestamp = strtotime($product['create_at']);
        return $create_at_timestamp !== false ? $create_at_timestamp: 0;
    }
}