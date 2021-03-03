<?php


namespace teamones\ucenter\service;


class Chat extends Base
{
    const ROUTE_CREATE_CHAT = 'create_chat';


    /**
     * 创建会话url
     * @return string
     * @throws \Exception
     */
    public function getCreateChatUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_CREATE_CHAT;
    }

    /**
     * 创建会话
     * @param $data
     * @param array $header
     * @return mixed
     * @throws \Exception
     */
    public function createChat($data, $header = [])
    {
        return $this->request("POST", $this->getCreateChatUrl(), $data, $header);
    }
}