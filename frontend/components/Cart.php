<?php

namespace frontend\components;

use common\models\Products;
use Yii;




class Cart
{

    public static function addToCart($product_id)
    {
        
        $session = Yii::$app->session;

        if (!$session->has('cart')) {
            $session->set('cart', []);
        }

        if (!isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] = 1;
        } else {
            $_SESSION['cart'][$product_id] =  $_SESSION['cart'][$product_id] + 1;
        }
    }




    public static function count($product_id)
    {
        return $_SESSION['cart'][$product_id] ?? 0;
    }

    public static function minusFromCart(int $product_id)
    {

        $session = Yii::$app->session;
        if (!$session->has('cart')) {
            return false;
        }
        if (!isset($_SESSION['cart'][$product_id])) {
            return false;
        }
        if ($_SESSION['cart'][$product_id] > 1) {
            $_SESSION['cart'][$product_id] = (int)($_SESSION['cart'][$product_id]) - 1;
        } else {
            unset($_SESSION['cart'][$product_id]);
        }
    }

    public static function deleteProduct($id)
    {
        unset($_SESSION['cart'][$id]);
    }

    public static function cart()
    {
        return Yii::$app->session->get('cart', []);
    }

    public static function products()
    {
        $cart = static::cart();
        $ids = array_keys($cart);
        return Products::find()->andWhere(['in', 'id', $ids])->all();
    }

    public static function getProductIds()
    {
        return array_keys(self::cart());
    }

    public static function allcount()
    {
        $i = 0;
        $products = static::cart();
        foreach ($products as $product_id => $count) {
            $i += $count;
        }

        return $i;
    }

    public static function totalSum()
    {

        $products = self::products();
        $cart = self::cart();
        $sum = 0;
        foreach ($products as $product) {
            $sum += $cart[$product->id] * $product->newcost;
        }

        return $sum;
    }

    public static function productOneSum(int $id)
    {
        $count = $_SESSION['cart'][$id] ?? 0;
        $product = Products::find()->andWhere(['id' => $id])->one();

        return $count * $product->newcost;
    }
}
