<?php
require_once __DIR__ . '/../model/PhenomenaReport.php';

class PhenomenaReportViewModel {
    private $phenomenaReportModel;

    public function __construct() {
        $this->phenomenaReportModel = new PhenomenaReport();
    }

    public function getAllPhenomenaReports() {
        return $this->phenomenaReportModel->getAll();
    }

    public function getPhenomenaReportById($id) {
        return $this->phenomenaReportModel->getById($id);
    }

    public function createPhenomenaReport($report_title, $reported_date, $location_id, $description, $reporter_alias, $severity_level) {
        return $this->phenomenaReportModel->create($report_title, $reported_date, $location_id, $description, $reporter_alias, $severity_level);
    }

    public function updatePhenomenaReport($id, $report_title, $reported_date, $location_id, $description, $reporter_alias, $severity_level) {
        return $this->phenomenaReportModel->update($id, $report_title, $reported_date, $location_id, $description, $reporter_alias, $severity_level);
    }

    public function deletePhenomenaReport($id) {
        return $this->phenomenaReportModel->delete($id);
    }
}
?>
