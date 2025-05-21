<?php
require_once __DIR__ . '/../model/RelatedEvidence.php';

class RelatedEvidenceViewModel {
    private $relatedEvidenceModel;

    public function __construct() {
        $this->relatedEvidenceModel = new RelatedEvidence();
    }

    public function getAllRelatedEvidence() {
        return $this->relatedEvidenceModel->getAll();
    }

    public function getRelatedEvidenceByReportId($report_id) {
        return $this->relatedEvidenceModel->getByReportId($report_id);
    }

    public function getRelatedEvidenceById($id) {
        return $this->relatedEvidenceModel->getById($id);
    }

    public function createRelatedEvidence($report_id, $evidence_type, $description, $collected_date = null) {
        return $this->relatedEvidenceModel->create($report_id, $evidence_type, $description, $collected_date);
    }

    public function updateRelatedEvidence($id, $report_id, $evidence_type, $description, $collected_date) {
        return $this->relatedEvidenceModel->update($id, $report_id, $evidence_type, $description, $collected_date);
    }

    public function deleteRelatedEvidence($id) {
        return $this->relatedEvidenceModel->delete($id);
    }
}
?>
