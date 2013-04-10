<?php
    use Monolog\Handler\StreamHandler;
    use Monolog\Logger;
    use ORMTest\Base\Registry;

    class SelectTest extends BaseTest
    {
        private $table = "User";
        private $view = "OwnedProducts";
        private $id = 1;
        private $tableSchema = array("id", "firstName", "lastName", "password", "createdAt", "updatedAt");
        private $viewSchema = array("name", "price", "fullName", "amount");

        public function testSingleColumnSelect()
        {
            $orms = $this->getORMs();
            foreach ($orms as $orm) {
                $result = $orm->singleColumnSelect($this->table, $this->id);
                $this->assertNotNull($result);
            }
        }

        public function testSingleTableSelect()
        {
            $orms = $this->getORMs();
            foreach ($orms as $orm) {
                $result = $orm->singleTableSelect($this->table, $this->id);
                $this->assertSameSize($this->tableSchema, $result);
            }
        }

        public function testSingleViewSelect()
        {
            $orms = $this->getORMs();
            foreach ($orms as $orm) {
                $result = $orm->singleViewSelect($this->view);
                $this->assertSameSize($this->viewSchema, $result);
            }
        }
    }