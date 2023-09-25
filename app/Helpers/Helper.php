<?php

namespace App\Helpers;

use App\Models\Product;

class Helper{
    public static function productCode()
    {
        $product = Product::orderBy('id','desc')->first();
        $product_code = '';

        if(isset($product)){
            if($product->id > 0){
                $product_code = '00000'.$product->id;
            }else if($product->id > 9){
                $product_code = '0000'.$product->id;
            }else if($product->id > 99){
                $product_code = '000'.$product->id;
            }else if($product->id > 999){
                $product_code = '00'.$product->id;
            }else if($product->id > 9999){
                $product_code = '0'.$product->id;
            }else{
                $product_code = $product->id;
            }
        }else{
            $firstCode = '000001';
            $product_code = $firstCode;
        }

        return $product_code;
    }
}