<?php


namespace teamones\ucenter\service;


class Message extends Base
{
    const ROUTE_SEND_MESSAGE = "send_message";
    const ROUTE_SEND_SYSTEM_NOTICE_MESSAGE = 'send_system_notice_message';

    /**
     * 发送消息 URL
     * @return string
     * @throws \Exception
     */
    public function getSendMessageUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_SEND_MESSAGE;
    }


    /**
     * 获取发送系统通知URL
     * @return string
     * @throws \Exception
     */
    public function getSendSystemNoticeMessageUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_SEND_SYSTEM_NOTICE_MESSAGE;
    }

    /**
     * 发送消息
     * @param $data
     * @param array $header
     * @return array
     * @throws \Exception
     */
    public function sendMessage($data, $header = [])
    {
        return $this->request('POST', $this->getSendMessageUrl(), $data, $header);
    }


    /**
     * 发送系统通知
     * @param $data
     * @param array $header
     * @return mixed
     * @throws \Exception
     */
    public function sendSystemNoticeMessage($data, $header = [])
    {
        return $this->request('POST', $this->getSendSystemNoticeMessageUrl(), $data, $header);
    }
}