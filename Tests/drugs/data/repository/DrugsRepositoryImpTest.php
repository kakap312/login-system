<?php
require_once(dirname(__FILE__).'/../../../../app/drugs/data/repository/DrugsRepositoryImp.php');
require_once(dirname(__FILE__).'/../../../../app/drugs/data/db/dao/DrugsDao.php');
require_once(dirname(__FILE__).'/../../factory/DrugsFactory.php');
class  DrugsRepositoryImpTest extends PHPUnit_Framework_TestCase{
    private $drugDao;
    private $drugRepository;

    public function __construct(){
        $this->drugDao = $this->dbConnection = $this->getMockBuilder(DrugsDao::class)->getMock();
        $this->drugRepository = new  DrugsRepositoryImp($this->drugDao);
    }
    public function testShouldReturnResultWithSuccessCodeAndNullDataWhenCreatedSuccessfully(){
        $successRult = DrugsFactory::getSuccessResult();
        $this->drugDao->expects($this->any())->method("insertOrUpdate")->willReturn(true);
        $result = $this->drugRepository->createDrug($this->any());
        $this->assertEquals($successRult->getData(),$result->getData());
        $this->assertEquals($successRult->getErrorCode(),$result->getErrorCode());
    }
    public function testShouldReturnResultWithFailureCodeAndNullDataWhenNotCreatedSuccessfully(){
        $successRult = DrugsFactory::getFailureResult();
        $this->drugDao->expects($this->any())->method("insertOrUpdate")->willReturn(false);
        $result = $this->drugRepository->createDrug($this->any());
        $this->assertEquals($successRult->getData(),$result->getData());
        $this->assertEquals($successRult->getErrorCode(),$result->getErrorCode());
    }
}