<?php
require_once __DIR__ . '/../model/Location.php';

class LocationViewModel {
    private $locationModel;

    public function __construct() {
        $this->locationModel = new Location();
    }

    public function getAllLocations() {
        return $this->locationModel->getAll();
    }

    public function getLocationById($id) {
        return $this->locationModel->getById($id);
    }

    public function createLocation($name, $district, $description) {
        return $this->locationModel->create($name, $district, $description);
    }

    public function updateLocation($id, $name, $district, $description) {
        return $this->locationModel->update($id, $name, $district, $description);
    }

    public function deleteLocation($id) {
        return $this->locationModel->delete($id);
    }
}
?>
