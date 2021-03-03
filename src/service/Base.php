<?php


namespace teamones\ucenter\service;


use Exception;
use teamones\Request;
use Throwable;

class Base
{

    /** @var CertificateProxy */
    public $auth;

    const ROUTE_FIND = "find";
    const ROUTE_UPDATE = "update";
    const ROUTE_SELECT = "select";
    const ROUTE_DELETE = "delete";
    const ROUTE_CREATE = "create";

    protected $controllerName;

    protected $latestErrorMessage;
    protected $latestErrorCode;


    public function __construct(CertificateProxy $auth)
    {
        $this->auth = $auth;
        // 自动填充路由控制器名为类名
        if (empty($this->controllerName)) {
            $name = get_called_class();
            $pos = strrpos($name, '\\');
            $name = substr($name, $pos + 1);
            $this->setControllerName($this->unCamelize($name));
        }
    }

    /**
     * 驼峰转下划线
     * @param $camelCaps
     * @param string $separator
     * @return string
     */
    public function unCamelize($camelCaps, $separator = '_')
    {
        return strtolower(preg_replace('/([a-z])([A-Z])/', "$1" . $separator . "$2", $camelCaps));
    }

    /**
     * 设置
     * @param mixed $controllerName
     */
    protected function setControllerName($controllerName): void
    {
        $this->controllerName = $controllerName;
    }

    /**
     * @return string
     */
    public function getLatestErrorMessage()
    {
        return $this->latestErrorMessage;
    }

    /**
     * @return int
     */
    public function getLatestErrorCode()
    {
        return $this->latestErrorCode;
    }

    /**
     *
     * 路由 controller部分
     * @return string
     * @throws Exception
     */
    public function getControllerName()
    {
        if (empty($this->controllerName)) {
            throw new Exception("controller name needed", -299501);
        }
        return $this->controllerName;
    }

    /**
     * find url
     * @return string
     * @throws Exception
     */
    protected function getFindUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_FIND;
    }

    /**
     * find url
     * @return string
     * @throws Exception
     */
    protected function getSelectUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_SELECT;
    }

    /**
     * create url
     * @return string
     * @throws Exception
     */
    protected function getCreateUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_CREATE;
    }

    /**
     * delete url
     * @return string
     * @throws Exception
     */
    protected function getDeleteUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_DELETE;
    }

    /**
     * update url
     * @return string
     * @throws Exception
     */
    protected function getUpdateUrl()
    {
        return "{$this->getControllerName()}/" . self::ROUTE_UPDATE;
    }


    /**
     * 发起请求
     * @param string $method
     * @param string $route
     * @param array $data
     * @param array $headers
     * @return array | string
     * @throws Exception
     */
    public function request($method, $route, $data, $headers = [])
    {
        try {
            $requestData = array();
            $requestData = array_merge($data, $requestData);

            // header 处理
            $presetHeaders = [];

            if (!empty($this->auth->getRequest()->getXUserInfo())) {
                $presetHeaders['X-Userinfo'] = $this->auth->getRequest()->getXUserInfo();
            }
            $headers = array_merge($presetHeaders, $headers);

            $result = Request::connection()
                ->setHeader($headers)
                ->setServerHost($this->auth->getServerName())
                ->setRoute($route)
                ->setBody($requestData)
                ->setMethod($method)
                ->request();

            if ((int)$result['code'] !== 0) {
                throw new Exception(isset($result['msg']) ? $result['msg'] : '', isset($result['code']) ? $result['code'] : -500);
            }
            return array_key_exists('data', $result) ? $result['data'] : $result;
        } catch (Throwable $e) {
            $this->latestErrorCode = $e->getCode();
            $this->latestErrorMessage = $e->getMessage();
            throw $e;
        }
    }

    /**
     * 查询一条
     * @param $param
     * @param array $header
     * @return mixed
     * @throws Exception
     */
    public function find($param, $header = [])
    {
        return $this->request("POST", $this->getFindUrl(), $param, $header);
    }

    /**
     * 查询多条
     * @param $param
     * @param array $header
     * @return mixed
     * @throws Exception
     */
    public function select($param, $header = [])
    {
        return $this->request("POST", $this->getSelectUrl(), $param, $header);
    }

    /**
     * 创建数据
     * @param $data
     * @param array $header
     * @return mixed
     * @throws Exception
     */
    public function create($data, $header = [])
    {
        return $this->request("POST", $this->getCreateUrl(), $data, $header);
    }

    /**
     * 更新数据
     * @param $data
     * @param array $header
     * @return mixed
     * @throws Exception
     */
    public function update($data, $header = [])
    {
        return $this->request("POST", $this->getUpdateUrl(), $data, $header);

    }

    /**
     * 删除数据
     * @param $param
     * @param array $header
     * @return mixed
     * @throws Exception
     */
    public function delete($param, $header = [])
    {
        return $this->request("POST", $this->getDeleteUrl(), $param, $header);
    }


}