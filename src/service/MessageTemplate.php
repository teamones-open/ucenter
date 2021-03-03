<?php


namespace teamones\ucenter\service;


class MessageTemplate extends Base
{
    const ROUTE_RENDER = 'render';

    /**
     * 渲染消息模板url
     * @return string
     * @throws \Exception
     */
    public function getRenderUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_RENDER;
    }

    /**
     * 渲染消息模板
     * @param $data
     * @param array $header
     * @return mixed
     * @throws \Exception
     */
    public function render($data, $header = [])
    {
        return $this->request('POST', $this->getRenderUrl(), $data, $header);
    }
}