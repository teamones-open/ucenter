<?php


namespace teamones\ucenter\service;


class Tenant extends Base
{
    const ROUTE_SELECT_TENANT_USER = "select_tenant_user";
    const ROUTE_SWITCH_TO_TENANT = "switch_to_tenant";
    const ROUTE_SELECT_DEPARTMENT_USER = "select_department_user";

    /**
     * @return string
     * @throws \Exception
     */
    public function getSwitchToTenantUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_SWITCH_TO_TENANT;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getSelectTenantUserUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_SELECT_TENANT_USER;
    }


    /**
     * @return string
     * @throws \Exception
     */
    public function getSelectDepartmentUserUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_SELECT_DEPARTMENT_USER;
    }

    /**
     * 查询租户用户列表
     * @param $param
     * @param array $header
     * @return array
     * @throws \Exception
     */
    public function selectTenantUser($param, $header = [])
    {
        return $this->request("POST", $this->getSelectTenantUserUrl(), $param, $header);
    }

    /**
     * 切换租户
     * @param $param
     * @param array $header
     * @return array
     * @throws \Exception
     */
    public function switchToTenant($param, $header = [])
    {
        return $this->request("POST", $this->getSwitchToTenantUrl(), $param, $header);
    }


    /**
     * 查询部门用户
     * @param $param
     * @param array $header
     * @return mixed
     * @throws \Exception
     */
    public function selectDepartmentUser($param, $header = [])
    {
        return $this->request("POST", $this->getSelectDepartmentUserUrl(), $param, $header);
    }
}