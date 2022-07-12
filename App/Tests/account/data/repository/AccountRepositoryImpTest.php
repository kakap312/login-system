<?php
use PHPUnit\Framework\TestCase;
require_once(dirname(__FILE__).'/../../../../app/account/data/AccountRepositoryImp.php');
require_once(dirname(__FILE__).'/../../../../app/account/data/dao/AccountDao.php');
require_once(dirname(__FILE__).'/../../factory/AccountTestFactory.php');


class AccountRepositoryImpTest extends PHPUnit_Framework_TestCase {
    private $accountRepositoryImp;
    private $mockDao;

    public function __construct(){
        $this->mockDao = $this->getMockBuilder(AccountDao::Class)->getMock();
        $this->accountRepositoryImp = new AccountRepositoryImp($this->mockDao);
    }
    public function testCreateAccountShouldReturnTrueWhenSuccessful(){
        $result = AccountTestFactory::makeResult();
        $this->mockDao->method('insertIntoAccount')->willReturn(AccountTestFactory::makeDbQueryResponse());
        $dbQueryResponse = $this->accountRepositoryImp->createAccount(AccountTestFactory::makeSavedAccountInfo());
        $this->assertEquals($dbQueryResponse->getMessage(),$result->getMessage());
    }
    public function testIsAccountFound(){
        $username = "flow1995";
        $result = AccountTestFactory::makeResult();
        $this->mockDao->method('findAccountInstance')->willReturn(AccountTestFactory::makeDbQueryResponse());
        $dbQueryResponse = $this->accountRepositoryImp->isAccountFound($username);
        $this->assertEquals($result->getMessage(),$dbQueryResponse->getMessage());
    }
    public function testLoginshouldSuccessfullyLogsAUserIn(){
        $credential = AccountTestFactory::makeCredential();
        $this->mockDao->method('findAccountInstance')->willReturn(AccountTestFactory::makeDbQueryResponse());
        $dbQueryResponse = $this->accountRepositoryImp->login($credential);
        $this->assertEquals($result->getMessage(),$dbQueryResponse->getMessage());
    }

}