<?php
/*
 *  ���÷�ʽ  �����Ӧ����ĿĿ¼  ִ��  php yii  test/test
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