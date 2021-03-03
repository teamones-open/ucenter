<?php


namespace teamones\ucenter\service;


class Options extends Base
{
    const ROUTE_GET_MEDIA_UPLOAD_SERVER = "get_media_upload_server";
    const ROUTE_GET_EVENT_LOG_SERVER = "get_event_log_server";


    /**
     * @return string
     * @throws \Exception
     */
    protected function getGetMediaUploadServerUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_GET_MEDIA_UPLOAD_SERVER;
    }


    /**
     * @return string
     * @throws \Exception
     */
    protected function getGetEventLogServerUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_GET_EVENT_LOG_SERVER;
    }


    /**
     * 获取媒体服务器配置
     * @param $param
     * @param array $header
     * @return mixed
     * @throws \Exception
     */
    public function getMediaUploadServer($param, $header = [])
    {
        return $this->request("POST", $this->getGetMediaUploadServerUrl(), $param, $header);
    }

    /**
     * 获取事件服务器配置
     * @param $param
     * @param array $header
     * @return mixed
     * @throws \Exception
     */
    public function getEventLogServer($param, $header = [])
    {
        return $this->request("POST", $this->getGetEventLogServerUrl(), $param, $header);
    }

}