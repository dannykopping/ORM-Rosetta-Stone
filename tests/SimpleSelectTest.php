<?php
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use ORMTest\Base\Registry;

class SimpleSelectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var     Logger
     */
    private $log;

    private $table = "User";
    private $view = "OwnedProducts";
    private $id = 1;
    private $tableSchema = array("id", "firstName", "lastName", "password");
    private $viewSchema = array("name", "price", "fullName", "amount");

    protected function setUp()
    {
        $this->log = new Logger('orm-log');
        $this->log->pushHandler(new StreamHandler(__DIR__ . '/../log.txt'));

        new ORMTest\ORM\Laravel\ORM($this->log);
    }

    public function testSingleColumnSelect()
    {
        $laravel = Registry::get("Laravel");

        $l = $laravel->singleColumnSelect($this->table, $this->id);
        $this->assertNotNull($l);
    }

    public function testSingleTableSelect()
    {
        $laravel = Registry::get("Laravel");

        $l = $laravel->singleTableSelect($this->table, $this->id);
        $this->assertSameSize($this->tableSchema, $l);
    }

    public function testSingleViewSelect()
    {
        $laravel = Registry::get("Laravel");

        $l = $laravel->singleViewSelect($this->view);
        $this->assertSameSize($this->viewSchema, $l);
    }
}