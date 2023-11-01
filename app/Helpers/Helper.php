<?php

namespace App\Helpers;

use App\Models\Product;
use App\Models\Purchase;

class Helper{
    public static function productCode()
    {
        $product = Product::orderBy('id','desc')->first();
        $product_code = '';

        if(isset($product)){
            if($product->id > 0){
                $product_code = '00000'.$product->id+1;
            }else if($product->id > 9){
                $product_code = '0000'.$product->id+1;
            }else if($product->id > 99){
                $product_code = '000'.$product->id+1;
            }else if($product->id > 999){
                $product_code = '00'.$product->id+1;
            }else if($product->id > 9999){
                $product_code = '0'.$product->id+1;
            }else{
                $product_code = $product->id;
            }
        }else{
            $firstCode = '000001';
            $product_code = $firstCode;
        }

        return $product_code;
    }


    public static function POReferenceCount()
    {
        $purchase = Purchase::orderBy('id','DESC')->first();
        $newRefCode = '';
        
        if(isset($purchase)){

            $lastPO_reference = $purchase->po_reference;
            $number = substr($lastPO_reference, 8);

            if($purchase->id > 0){
                $newRefCode = '00000'.$purchase->id;
            }else if($purchase->id > 9){
                $newRefCode = '0000'.$purchase->id;
            }else if($purchase->id > 99){
                $newRefCode = '000'.$purchase->id;
            }else if($purchase->id > 999){
                $newRefCode = '00'.$purchase->id;
            }else if($purchase->id > 9999){
                $newRefCode = '0'.$purchase->id;
            }else{
                $newRefCode = $purchase->id;
            }
        }else{
            $newRefCode = '000001';
        }

        $finalPoRef = 'PO-'.now()->year.'-'.$newRefCode;
        
        return $finalPoRef;
    }
}