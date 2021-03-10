<?php


namespace teamones\ucenter\service;


class TenantUser extends Base
{
    const ROUTE_SELECT_TENANT_USER = 'select_tenant_user';

    /**
     * @return string
     * @throws \Exception
     */
    private function getSelectTenantUserUrl(): string
    {
        return "{$this->getControllerName()}/" . self::ROUTE_SELECT_TENANT_USER;
    }

    /**
     * 查询租户用户
     * @param $data
     * @param array $headers
     * @return array|string
     * @throws \Exception
     */
    public function selectTenantUser($data, $headers = [])
    {
        return $this->request('POST', $this->getSelectTenantUserUrl(), $data, $headers);
    }
}