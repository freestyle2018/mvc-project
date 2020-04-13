<?php
// phpunit backward compatibility
if (!class_exists('\PHPUnit\Framework\TestCase') && class_exists('\PHPUnit_Framework_TestCase')) {
    class_alias('\PHPUnit_Framework_TestCase', '\PHPUnit\Framework\TestCase');
}

Class Authentication  extends \PHPUnit\Framework\TestCase
{
    /**
     * @var PHPAuth\Auth
     */
    public static $auth;

    /**
     * @var PHPAuth\Config;
     */
    public static $config;

    /**
     * @var \PDO
     */
    public static $dbh;

    public static $sess_email;

    function __construct() {
        if(!isset($_SESSION)) session_start();

        self::$dbh = new PDO("mysql:host=localhost;dbname=phpauthtest", "root", "");
        self::$config = new PHPAuth\Config(self::$dbh);
        self::$auth   = new PHPAuth\Auth(self::$dbh, self::$config);
        self::$sess_email = !isset($_SESSION["email"]) ? '' : $_SESSION["email"];
    }

    function index() {
        $result = array();

        if(isset(self::$sess_email) && self::$sess_email != '') {
            $hash = self::$dbh->query("SELECT hash FROM phpauth_sessions WHERE uid = (SELECT id FROM phpauth_users WHERE email = '".self::$sess_email."');", PDO::FETCH_ASSOC)->fetch()['hash'];

            $yslovie = self::$auth->checkSession($hash);

            if($yslovie === false){
                $result["auth"] =  false;
                $result["status"] = "";
                return $result;
            }
            else{
                self::$auth->config->cookie_renew = "+30 minutes";

                $result["status"] = $this->status();
                $result["auth"] =  true;
                return $result;
            }

        }
        else {
            $result["auth"] =  false;
            $result["status"] = "";
            return $result;
        }


    }

    function status() {

        $status = self::$dbh->query("SELECT auth FROM phpauth_users WHERE email = '".self::$sess_email."';", PDO::FETCH_ASSOC)->fetch()['auth'];

        return $status;
    }

    function out() {
        $hash = self::$dbh->query("SELECT hash FROM phpauth_sessions WHERE uid = (SELECT id FROM phpauth_users WHERE email = '".self::$sess_email."');", PDO::FETCH_ASSOC)->fetch()['hash'];

        self::$auth->logout($hash);

        session_destroy();

        return true;
    }

}
