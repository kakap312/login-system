<?php
interface DrugsRepository{
    public function createDrug($savedDrugsInfo);
    public function updateDrug($savedDrugsInfo);
    public function searchDrugByNameOrId($nameOrId);
    public function searchDrugsByName($name);
    public function searchDrugById($id);
    public function fetchDrugs();
    public function getTotalNumberOfDrugs();
    public function searchDrugByNameAndManufacturerAndType($name,$manufacturer,$type);
    function deleteDrug($id);

}