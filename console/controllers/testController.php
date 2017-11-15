<?php
/*
 *  调用方式  进入对应的项目目录  执行  php yii  test/test
 * 
 */
namespace console\controllers;

use yii\console\Controller;

class TestController extends Controller
{
    public function actionTest()
    {
        echo date("Y-m-d H:i:s")."test";
    }
}