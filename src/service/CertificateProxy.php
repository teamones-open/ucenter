<?php


namespace teamones\ucenter\service;


/**
 * 身份凭证代理类  传递request以及一些认证信息
 * Class CertificateProxy
 * @package teamones\ucenter\service
 */
class CertificateProxy
{
    protected $appId;
    protected $appSecret;
    protected $ip;
    protected $debug = false;
    protected $serverName;
    protected $xUserInfo = "";

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     */
    public function setIp($ip): void
    {
        $this->ip = $ip;
    }

    /**
     * @return mixed
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @param mixed $appId
     */
    public function setAppId($appId): void
    {
        $this->appId = $appId;
    }

    /**
     * @return mixed
     */
    public function getAppSecret()
    {
        return $this->appSecret;
    }

    /**
     * @param mixed $appSecret
     */
    public function setAppSecret($appSecret): void
    {
        $this->appSecret = $appSecret;
    }

    /**
     * @return bool
     */
    public function isDebug(): bool
    {
        return $this->debug;
    }

    /**
     * @param bool $debug
     */
    public function setDebug(bool $debug): void
    {
        $this->debug = $debug;
    }

    /**
     * @return mixed
     */
    public function getServerName()
    {
        return $this->serverName;
    }

    /**
     * @param mixed $serverName
     */
    public function setServerName($serverName): void
    {
        $this->serverName = $serverName;
    }

    /**
     * @return string
     */
    public function getXUserInfo(): string
    {
        return $this->xUserInfo;
    }

    /**
     * @param string $xUserInfo
     */
    public function setXUserInfo(string $xUserInfo): void
    {
        $this->xUserInfo = $xUserInfo;
    }

}