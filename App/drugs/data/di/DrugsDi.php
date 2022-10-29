<?php
require_once(dirname(__FILE__).'/../../../core/data/db/model/DbConnection.php');
require_once(dirname(__FILE__).'/../db/dao/DrugsDao.php');
require_once(dirname(__FILE__).'/../db/dao/DrugDossageDao.php');
require_once(dirname(__FILE__).'/../db/dao/DrugGroupDao.php');
require_once(dirname(__FILE__).'/../db/dao/DrugTypeDao.php');
require_once(dirname(__FILE__).'/../db/dao/DrugLocationDao.php');
require_once(dirname(__FILE__).'/../repository/DrugsRepositoryImp.php');
require_once(dirname(__FILE__).'/../repository/DrugDossageRepositoryImp.php');
require_once(dirname(__FILE__).'/../repository/DrugGroupRepositoryImp.php');
require_once(dirname(__FILE__).'/../repository/DrugTypeRepositoryImp.php');
require_once(dirname(__FILE__).'/../repository/DrugLocationRepositoryImp.php');
class DrugsDi{
    private $drugsRepositoryImp;
    private $dbConnection;
    private $drugsDao;
    private $drugGroupDao;
    private $drugTypeDao;
    private $drugLocationDao;
    private $drugDossageDao;
    private $drugsDossageRepositoryImp;
    private $drugGroupRepositoryImp;
    private $drugTypeRepositoryImp;
    private $drugLocationRepositoryImp;

    public function __construct(){
        $this->dbConnection = (new DbConnection("localhost","root","","perfectdb"))->getDbConnection();
        $this->drugsDao = new DrugsDao($this->dbConnection);
        $this->drugGroupDao = new DrugGroupDao($this->dbConnection);
        $this->drugTypeDao = new DrugTypeDao($this->dbConnection);
        $this->drugLocationDao = new DrugLocationDao($this->dbConnection);
        $this->drugDossageDao = new DrugDossageDao($this->dbConnection);
        $this->drugsRepositoryImp = new DrugsRepositoryImp($this->drugsDao);
        $this->drugsDossageRepositoryImp = new DrugDossageRepositoryImp($this->drugDossageDao);
        $this->drugGroupRepositoryImp = new DrugGroupRepositoryImp($this->drugGroupDao);
        $this->drugTypeRepositoryImp = new DrugTypeRepositoryImp($this->drugTypeDao);
        $this->drugLocationRepositoryImp = new DrugLocationRepositoryImp($this->drugLocationDao);
    }
    public  function  getDrugsRepository(){return $this->drugsRepositoryImp;}
    public function getDrugDossageRepository(){return $this->drugsDossageRepositoryImp;}
    public function getDrugGroupRepository(){return $this->drugGroupRepositoryImp;}
    public function getDrugTypeRepository(){return $this->drugTypeRepositoryImp;}
    public function getDrugLocationRepository(){return $this->drugLocationRepositoryImp;}
}