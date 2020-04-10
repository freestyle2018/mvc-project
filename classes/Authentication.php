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

    function __construct() {
        if(!isset($_SESSION)) session_start();

        self::$dbh = new PDO("mysql:host=localhost;dbname=phpauthtest", "root", "");
        self::$config = new PHPAuth\Config(self::$dbh);
        self::$auth   = new PHPAuth\Auth(self::$dbh, self::$config);
    }

    function index() {

        $sess_email = empty($_SESSION["email"]) ? '' : $_SESSION["email"];

        if($sess_email != '') {
            $hash = self::$dbh->query("SELECT hash FROM phpauth_sessions WHERE uid = (SELECT id FROM phpauth_users WHERE email = '".$sess_email."');", PDO::FETCH_ASSOC)->fetch()['hash'];

            $yslovie = self::$auth->checkSession($hash);

            if($yslovie == false){
                return false;
            }
            else{
                self::$auth->config->cookie_renew = "+30 minutes";

                return true;
            }

        }
        else {
            return false;
        }
    }


    function out() {
        $sess_email = empty($_SESSION["email"]) ? '' : $_SESSION["email"];

        $hash = self::$dbh->query("SELECT hash FROM phpauth_sessions WHERE uid = (SELECT id FROM phpauth_users WHERE email = '".$sess_email."');", PDO::FETCH_ASSOC)->fetch()['hash'];

        $auth = self::$auth->logout($hash);

        session_destroy();
    }

}
