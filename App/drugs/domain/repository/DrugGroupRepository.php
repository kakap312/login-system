<?php
interface DrugGroupRepository{
    public function fetchDrugGroups();
    public function fetchDrugGroupByNameOrId($drugNameOrId);
}