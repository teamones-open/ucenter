<?php


namespace teamones\ucenter\service;


class OAuth extends Base
{
    const ROUTE_GET_AUTHORIZE_CODE_BY_TOKEN = 'get_authorize_code_by_token';
    const ROUTE_GET_AUTHORIZE_TOKEN = 'get_authorize_token';
    const ROUTE_SEND_SYSTEM_NOTICE_MESSAGE = 'send_system_notice_message';
    const ROUTE_RENDER_MESSAGE_TEMPLATE = 'render_message_template';
    const ROUTE_CREATE_CHAT = "create_chat";
    const ROUTE_INVITE_CHAT_USER = 'invite_chat_user';
    const ROUTE_DELETE_CHAT_USER = "delete_chat_user";
    const ROUTE_FIND_CHAT = 'find_chat';
    const ROUTE_DELETE_CHAT = 'delete_chat';
    const ROUTE_CLEAR_TOKEN_BY_DEVICE_CODE = 'clear_user_token_by_device_code';
    const ROUTE_SEND_DATA_TO_USER_CHANNEL = 'send_data_to_user_channel';
    const ROUTE_MARK_TENANT_FRAMEWORK_AGREEMENT_STATUS_URL = 'mark_tenant_framework_agreement_status';


    /**
     * 获得授权code地址
     * @return string
     * @throws \Exception
     */
    protected function getAuthorizeCodeByTokenUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_GET_AUTHORIZE_CODE_BY_TOKEN;
    }

    /**
     * 获得授权code
     * @param $param
     * @param array $header
     * @return mixed
     * @throws \Exception
     */
    public function getAuthorizeCodeByToken($param, $header = [])
    {
        return $this->request("POST", $this->getAuthorizeCodeByTokenUrl(), $param, $header);
    }

    /**
     * 通过code获得token地址
     * @return string
     * @throws \Exception
     */
    protected function getAuthorizeTokenUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_GET_AUTHORIZE_TOKEN;
    }

    /**
     * 通过code获得token
     * @param $param
     * @param array $header
     * @return mixed
     * @throws \Exception
     */
    public function getAuthorizeToken($param, $header = [])
    {
        return $this->request("POST", $this->getAuthorizeTokenUrl(), $param, $header);
    }


    /**
     * 获得发送系统通知地址
     * @return string
     * @throws \Exception
     */
    protected function getSendSystemNoticeMessageUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_SEND_SYSTEM_NOTICE_MESSAGE;
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
        return $this->request("POST", $this->getSendSystemNoticeMessageUrl(), $data, $header);
    }

    /**
     * 获得渲染消息模板url
     * @return string
     * @throws \Exception
     */
    protected function getRenderMessageTemplateUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_RENDER_MESSAGE_TEMPLATE;
    }

    /**
     * 渲染消息模板
     * @param $data
     * @param array $header
     * @return mixed
     * @throws \Exception
     */
    public function renderMessageTemplate($data, $header = [])
    {
        return $this->request("POST", $this->getRenderMessageTemplateUrl(), $data, $header);
    }

    /**
     * 获得创建会话url
     * @return string
     * @throws \Exception
     */
    protected function getCreateChatUrl()
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


    /**
     * 获得添加聊天用户url
     * @return string
     * @throws \Exception
     */
    protected function getInviteChatUserUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_INVITE_CHAT_USER;
    }

    /**
     * 邀请用户加入聊天
     * @param $data
     * @param array $header
     * @return mixed
     * @throws \Exception
     */
    public function inviteChatUser($data, $header = [])
    {
        return $this->request("POST", $this->getInviteChatUserUrl(), $data, $header);
    }

    /**
     * 获得查询会话url
     * @return string
     * @throws \Exception
     */
    protected function getFindChatUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_FIND_CHAT;
    }

    /**
     * 查询会话信息
     * @param $data
     * @param array $header
     * @return mixed
     * @throws \Exception
     */
    public function findChat($data, $header = [])
    {
        return $this->request("POST", $this->getFindChatUrl(), $data, $header);
    }

    /**
     * 获得删除聊天用户url
     * @return string
     * @throws \Exception
     */
    protected function getDeleteChatUserUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_DELETE_CHAT_USER;
    }

    /**
     * 删除聊天用户
     * @param $data
     * @param array $header
     * @return mixed
     * @throws \Exception
     */
    public function deleteChatUser($data, $header = [])
    {
        return $this->request("POST", $this->getDeleteChatUserUrl(), $data, $header);
    }

    /**
     * 删除聊天 url
     * @return string
     * @throws \Exception
     */
    public function getDeleteChatUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_DELETE_CHAT;
    }

    /**
     * 删除聊天
     * @param $data
     * @param array $header
     * @return mixed
     * @throws \Exception
     */
    public function deleteChat($data, $header = [])
    {
        return $this->request("POST", $this->getDeleteChatUrl(), $data, $header);
    }

    /**
     * 获得清空设备码登录记录 url
     * @return string
     * @throws \Exception
     */
    public function getClearTokenByDeviceCodeUrl(): string
    {
        return "{$this->getControllerName()}/" . self::ROUTE_CLEAR_TOKEN_BY_DEVICE_CODE;
    }

    /**
     * 清空指定设备码的登录记录
     * @param $data
     * @param array $header
     * @return mixed
     * @throws \Exception
     */
    public function clearTokenByDeviceCode($data, $header = [])
    {
        return $this->request("POST", $this->getClearTokenByDeviceCodeUrl(), $data, $header);
    }

    /**
     * 获得其他用户信息列表 url
     * @return string
     * @throws \Exception
     */
    private function getSendDataToUserChannelUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_SEND_DATA_TO_USER_CHANNEL;
    }

    /**
     * 发送消息到用户通道
     * @param $data
     * @param array $header
     * @return mixed
     * @throws \Exception
     */
    public function sendDataToUserChannel($data, $header = [])
    {
        return $this->request("POST", $this->getSendDataToUserChannelUrl(), $data, $header);
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function getMarkTenantFrameworkAgreementStatusUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_MARK_TENANT_FRAMEWORK_AGREEMENT_STATUS_URL;
    }

    /**
     * 更新租户框架合同签署状态
     * @param $data
     * @param array $header
     * @return array|string
     * @throws \Exception
     */
    public function markTenantFrameworkAgreementStatus($data, $header = [])
    {
        return $this->request("POST", $this->getMarkTenantFrameworkAgreementStatusUrl(), $data, $header);
    }


}