<?php

// phpunit backward compatibility
if (!class_exists('\PHPUnit\Framework\TestCase') && class_exists('\PHPUnit_Framework_TestCase')) {
    class_alias('\PHPUnit_Framework_TestCase', '\PHPUnit\Framework\TestCase');
}

// абстрактый класс контроллера
Abstract Class Controller_Base extends \PHPUnit\Framework\TestCase {

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


    protected $registry;
    protected $template;
    public $layouts; // шаблон

    public $vars = array();

    // в конструкторе подключаем шаблоны
    function __construct($registry) {

        self::$dbh = new PDO("mysql:host=localhost;dbname=phpauthtest", "root", "");
        self::$config = new PHPAuth\Config(self::$dbh);
        self::$auth   = new PHPAuth\Auth(self::$dbh, self::$config);

        $this->registry = $registry;
        // шаблоны
        $this->template = new Template($this->layouts, get_class($this));
    }

    abstract function index();
}