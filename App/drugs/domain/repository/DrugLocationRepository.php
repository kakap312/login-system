<?php
interface DrugLocationRepository  {
    public function fetchDrugLocations();
    public function fetchDrugLocationByNameOrId($drugLocationNameOrId);
}