<?php
/**
 * Created by sallency.
 * User: sallency
 * Date: 2016/5/31 0031
 * Time: 16:03
 */

namespace app\behaviors;

use yii\base\Behavior;
use yii\base\Event;
use yii\rest\Controller;

class CtrlBehavior extends Behavior
{
    const PHP_WEB_EOL = "<br>";

    public $param_1;
    public $param_2;

    /**
     * 行为是为 Controller 做的扩展 故可以注册 Controller 的事件
     * @return array events for component owner
     */
    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => "handlerBeforeAction",
            Controller::EVENT_AFTER_ACTION => "handlerAfterAction"
        ];
    }

    /**
     * event handler
     * @param \yii\base\Event $event
     */
    public function handlerBeforeAction(Event $event)
    {
        echo __METHOD__ . self::PHP_WEB_EOL;
        echo '由行为注册的组件事件，传递的$event->sender属性为此组件对象' . self::PHP_WEB_EOL;
        echo "组件的控制器和动作：" . $event->sender->uniqueId . '/' . $event->sender->action->id . self::PHP_WEB_EOL;
        echo self::PHP_WEB_EOL;
    }

    /**
     * event handler
     * @param \yii\base\Event $event
     */
    public function handlerAfterAction(Event $event)
    {
        echo self::PHP_WEB_EOL;
        echo __METHOD__ . self::PHP_WEB_EOL;
        echo '由行为注册的组件事件，传递的$event->sender属性为此组件对象' . self::PHP_WEB_EOL;
        echo "组件的控制器和动作：" . $event->sender->uniqueId . '/' . $event->sender->action->id . self::PHP_WEB_EOL;
    }

    /**
     * 扩展方法 通过 __METHOD__ 我么可以看出这货被组件调用时到底是不是组件的一个方法
     */
    public function extendMethodForCtrl()
    {
        echo "在行为中定义的方法：";
        echo __METHOD__ . self::PHP_WEB_EOL;
    }
}