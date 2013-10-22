<?php
/**
 * Created by JetBrains PhpStorm.
 * User: syd3050
 * Date: 13-9-26
 * Time: 下午10:21
 * To change this template use File | Settings | File Templates.
 */

class TransformUtil {
    public static function arrayToObject($e){
        if( gettype($e)!='array' ) return;
        foreach($e as $k=>$v){
            if( gettype($v)=='array' || getType($v)=='object' )
                $e[$k]=(object)TransformUtil::arrayToObject($v);
        }
        return (object)$e;
    }

    public static function objectToArray($e){
        $e=(array)$e;
        foreach($e as $k=>$v){
            if( gettype($v)=='resource' ) return;
            if( gettype($v)=='object' || gettype($v)=='array' )
                $e[$k]=(array)TransformUtil::objectToArray($v);
        }
        return $e;
    }
}