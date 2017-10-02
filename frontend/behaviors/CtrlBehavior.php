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
     * ��Ϊ��Ϊ Controller ������չ �ʿ���ע�� Controller ���¼�
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
        echo '����Ϊע�������¼������ݵ�$event->sender����Ϊ���������' . self::PHP_WEB_EOL;
        echo "����Ŀ������Ͷ�����" . $event->sender->uniqueId . '/' . $event->sender->action->id . self::PHP_WEB_EOL;
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
        echo '����Ϊע�������¼������ݵ�$event->sender����Ϊ���������' . self::PHP_WEB_EOL;
        echo "����Ŀ������Ͷ�����" . $event->sender->uniqueId . '/' . $event->sender->action->id . self::PHP_WEB_EOL;
    }

    /**
     * ��չ���� ͨ�� __METHOD__ ��ô���Կ���������������ʱ�����ǲ��������һ������
     */
    public function extendMethodForCtrl()
    {
        echo "����Ϊ�ж���ķ�����";
        echo __METHOD__ . self::PHP_WEB_EOL;
    }
}