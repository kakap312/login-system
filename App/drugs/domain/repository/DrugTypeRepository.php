<?php
interface DrugTypeRepository  {
    public function fetchDrugTypes();
    public function fetchDrugTypeByNameOrId($drugNameOrId);
}