<?php
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use ORMTest\Base\Registry;

class SimpleSelectTest extends BaseTest
{
    private $table = "User";
    private $view = "OwnedProducts";
    private $id = 1;
    private $tableSchema = array("id", "firstName", "lastName", "password");
    private $viewSchema = array("name", "price", "fullName", "amount");

    public function testSingleColumnSelect()
    {
        $laravel = Registry::get("Laravel");
        $doctrine2 = Registry::get("Doctrine2");

        $l = $laravel->singleColumnSelect($this->table, $this->id);
        $d = $doctrine2->singleColumnSelect($this->table, $this->id);
        foreach(array($l, $d) as $orm)
            $this->assertNotNull($orm);
    }

    public function testSingleTableSelect()
    {
        $laravel = Registry::get("Laravel");
        $doctrine2 = Registry::get("Doctrine2");

        $l = $laravel->singleTableSelect($this->table, $this->id);
        $d = $doctrine2->singleTableSelect($this->table, $this->id);
        foreach(array($l, $d) as $orm)
            $this->assertSameSize($this->tableSchema, $orm);
    }

    public function testSingleViewSelect()
    {
        $laravel = Registry::get("Laravel");
        $doctrine2 = Registry::get("Doctrine2");

        $l = $laravel->singleViewSelect($this->view);
        $d = $doctrine2->singleViewSelect($this->view);
        foreach(array($l, $d) as $orm)
            $this->assertSameSize($this->viewSchema, $orm);
    }
}