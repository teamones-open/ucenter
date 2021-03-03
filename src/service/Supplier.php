<?php


namespace teamones\ucenter\service;


class Supplier extends Base
{
    const ROUTE_FIND_SUPPLIER = "find_supplier";
    const ROUTE_BASE_FIND = 'base_find';

    /**
     * @return string
     * @throws \Exception
     */
    public function getFindSupplierUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_FIND_SUPPLIER;
    }

    /**
     * 查询供应商详情
     * @param $param
     * @param array $header
     * @return mixed
     * @throws \Exception
     */
    public function findSupplier($param, $header = [])
    {
        return $this->request("POST", $this->getFindSupplierUrl(), $param, $header);
    }

    /**
     * 基础row查询 url
     * @return string
     * @throws \Exception
     */
    public function getBaseFindUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_BASE_FIND;
    }

    /**
     * 基础row查询
     * @param $param
     * @param $headers
     * @return array|string
     * @throws \Exception
     */
    public function baseFind($param, $headers = [])
    {
        return $this->request("POST", $this->getBaseFindUrl(), $param, $headers);
    }
}