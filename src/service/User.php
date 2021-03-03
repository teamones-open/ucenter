<?php


namespace teamones\ucenter\service;


class User extends Base
{
    const ROUTE_GET_OTHER_USER_INFO = 'get_other_user_info';
    const ROUTE_GET_OTHER_USERS_INFO = 'get_other_users_info';
    const ROUTE_ORDER_DEDUCT = "order_deduct";
    const ROUTE_ORDER_INCREASE = "order_increase";

    /**
     * @return string
     * @throws \Exception
     */
    protected function getGetOtherUserInfoUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_GET_OTHER_USER_INFO;
    }

    /**
     * @return string
     * @throws \Exception
     */
    protected function getGetOtherUsersInfoUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_GET_OTHER_USERS_INFO;
    }

    /**
     * 查询用户信息
     * @param $param
     * @param array $header
     * @return mixed
     * @throws \Exception
     */
    public function getOtherUserInfo($param, $header = [])
    {
        return $this->request("POST", $this->getGetOtherUserInfoUrl(), $param, $header);
    }

    /**
     * 查询用户信息列表
     * @param $param
     * @param array $header
     * @return mixed
     * @throws \Exception
     */
    public function getOtherUsersInfo($param, $header = [])
    {
        return $this->request("POST", $this->getGetOtherUsersInfoUrl(), $param, $header);
    }


    /**
     * 订单扣款api地址
     * @return string
     * @throws \Exception
     */
    protected function getOrderDeductUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_ORDER_DEDUCT;
    }

    /**
     * 订单扣款
     * @param $param
     * @param array $header
     * @return mixed
     * @throws \Exception
     */
    public function orderDeduct($param, $header = [])
    {
        return $this->request("POST", $this->getOrderDeductUrl(), $param, $header);
    }

    /**
     * 订单打款api地址
     * @return string
     * @throws \Exception
     */
    protected function getOrderIncreaseUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_ORDER_INCREASE;
    }

    /**
     * 订单打款
     * @param $param
     * @param array $header
     * @return mixed
     * @throws \Exception
     */
    public function orderIncrease($param, $header = [])
    {
        return $this->request("POST", $this->getOrderIncreaseUrl(), $param, $header);
    }
}