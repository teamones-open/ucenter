<?php


namespace teamones\ucenter;


use Exception;
use teamones\ucenter\service\CertificateProxy;
use teamones\ucenter\service\Chat;
use teamones\ucenter\service\Customer;
use teamones\ucenter\service\Message;
use teamones\ucenter\service\MessageTemplate;
use teamones\ucenter\service\OAuth;
use teamones\ucenter\service\Options;
use teamones\ucenter\service\Role;
use teamones\ucenter\service\Supplier;
use teamones\ucenter\service\Tenant;
use teamones\ucenter\service\TenantAuthentication;
use teamones\ucenter\service\TenantGrant;
use teamones\ucenter\service\TenantUser;
use teamones\ucenter\service\User;

/**
 * Class Server
 * @package common\service
 * @property CertificateProxy auth 授权代理
 * @property Role role 角色
 * @property Tenant tenant
 * @property TenantUser tenantUser
 * @property User user
 * @property Options options
 * @property TenantAuthentication tenantAuthentication
 * @property Supplier supplier
 * @property OAuth oAuth
 * @property Customer customer
 * @property MessageTemplate messageTemplate
 * @property Message message
 * @property Chat chat
 * @property TenantGrant tenantGrant 签署授权管理
 */
class Server
{

    /** @var CertificateProxy $auth */
    public $auth;
    private static $instance;
    private $debug;

    /**
     * @param array $config
     * @return Server
     */
    public static function getInstance($config = []): Server
    {
        if (empty(self::$instance)) {
            self::$instance = new self($config);
        }

        return self::$instance;
    }

    /**
     * ImHttpService constructor.
     * @param $config
     */
    private function __construct($config)
    {
        $this->auth = new CertificateProxy();
        if (is_array($config) && array_key_exists('debug', $config)) {
            $this->debug = (bool)$config['debug'];
            $this->auth->setDebug($this->debug);
            $this->auth->setServerName($config['server_name']);
        }
    }

    /**
     * 设置xuserinfo
     * @param $xUserInfo
     */
    public function setXUserInfo($xUserInfo)
    {
        $this->auth->setXUserInfo($xUserInfo);
    }

    /**
     * 自动加载实例化 im下的类
     * @param $name
     * @return mixed
     * @throws Exception
     */
    public function __get($name)
    {
        $pos = strrpos(__CLASS__, '\\');
        $namePrefix = substr(__CLASS__, 0, $pos + 1);
        $className = $namePrefix . 'service\\' . camelize(to_under_score($name));

        if (class_exists($className)) {
            $this->$name = new $className($this->auth);
            return $this->$name;
        } else {
            throw new Exception("can`t found attribute {$name}/{$className} in " . __CLASS__, -200500);
        }
    }
}