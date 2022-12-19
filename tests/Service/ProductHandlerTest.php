<?php

namespace Test\Service;

use PHPUnit\Framework\TestCase;
use App\Service\ProductHandler;

/**
 * Class ProductHandlerTest
 */
class ProductHandlerTest extends TestCase
{
    private $products = [
        [
            'id' => 1,
            'name' => 'Coca-cola',
            'type' => 'Drinks',
            'price' => 10,
            'create_at' => '2021-04-20 10:00:00',
        ],
        [
            'id' => 2,
            'name' => 'Persi',
            'type' => 'Drinks',
            'price' => 5,
            'create_at' => '2021-04-21 09:00:00',
        ],
        [
            'id' => 3,
            'name' => 'Ham Sandwich',
            'type' => 'Sandwich',
            'price' => 45,
            'create_at' => '2021-04-20 19:00:00',
        ],
        [
            'id' => 4,
            'name' => 'Cup cake',
            'type' => 'Dessert',
            'price' => 35,
            'create_at' => '2021-04-18 08:45:00',
        ],
        [
            'id' => 5,
            'name' => 'New York Cheese Cake',
            'type' => 'Dessert',
            'price' => 40,
            'create_at' => '2021-04-19 14:38:00',
        ],
        [
            'id' => 6,
            'name' => 'Lemon Tea',
            'type' => 'Drinks',
            'price' => 8,
            'create_at' => '2021-04-04 19:23:00',
        ],
    ];

    public function testGetTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $price = $product['price'] ?: 0;
            $totalPrice += $price;
        }

        $this->assertEquals(143, $totalPrice);
    }

    /**
     * 测试 总价格
     */
    public function testGetTotalPrice2()
    {
        $totalPrice =(new ProductHandler())->getTotalPrice($this->products);
        $this->assertEquals(143, $totalPrice);
    }

    /**
     * 测试 商品排序
     * @return void
     */
    public function testGetProductSort()
    {
        $products =(new ProductHandler())->getProductSort($this->products);
        array_multisort(array_column($this->products, 'price'), SORT_ASC, $this->products);
        $this->assertSame($this->products, $products);
    }

    /**
     * 测试 日期转时间戳
     */
    public function testConvertDateTimeToTimestamp()
    {
        foreach ($this->products as $product) {
            $create_at_timestamp = strtotime($product['create_at']);
            $create_timestamp =(new ProductHandler())->convertDateTimeToTimestamp($product);
            $this->assertEquals($create_at_timestamp, $create_timestamp);
        }
    }

}