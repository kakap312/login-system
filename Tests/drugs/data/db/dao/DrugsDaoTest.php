<?php
use PHPUnit\Framework\TestCase;
require_once(dirname(__FILE__).'/../../../../../app/core/data/db/model/DBConnectionInterfce.php');
require_once(dirname(__FILE__).'/../../../../../app/drugs/data/db/dao/DrugsDao.php');
class DrugsDaoTest extends PHPUnit_Framework_TestCase{
    private $dbConnection;
    private $drugsDao;

    public function __construct(){
        $this->dbConnection = $this->getMockBuilder(DbConnectionInt::class)->getMock();
        $this->drugsDao = new DrugsDao($this->dbConnection);
    }

    public function testShouldReturnTrueIfDrugIsCreatedSuccessfully(){
        $this->dbConnection->expects($this->any())->method("query")->willReturn(true);
        $result = $this->drugsDao->insertOrUpdate($this->any());
        $this->assertTrue($result);

    }

    public function testShouldReturnFalseIfDrugIsNotCreatedSuccessfully(){
        $this->dbConnection->expects($this->any())->method("query")->willReturn(false);
        $result = $this->drugsDao->insertOrUpdate($this->any());
        $this->assertFalse($result);

    }

}
?>