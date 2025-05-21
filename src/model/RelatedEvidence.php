<?php
require_once __DIR__ . '/../config/Database.php';

class RelatedEvidence {
    private $conn;
    private $table = 'related_evidence';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT re.*, pr.report_title 
                  FROM " . $this->table . " re
                  JOIN phenomena_reports pr ON re.report_id = pr.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getByReportId($report_id) {
        $query = "SELECT re.*, pr.report_title 
                  FROM " . $this->table . " re
                  JOIN phenomena_reports pr ON re.report_id = pr.id
                  WHERE re.report_id = :report_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':report_id', $report_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT re.*, pr.report_title 
                  FROM " . $this->table . " re
                  JOIN phenomena_reports pr ON re.report_id = pr.id
                  WHERE re.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($report_id, $evidence_type, $description, $collected_date = null) {
        // If collected_date is null, database will use CURRENT_TIMESTAMP by default
        $sql_collected_date = $collected_date ? ':collected_date' : 'CURRENT_TIMESTAMP';
        $query = "INSERT INTO " . $this->table . " (report_id, evidence_type, description, collected_date) 
                  VALUES (:report_id, :evidence_type, :description, " . $sql_collected_date . ")";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':report_id', $report_id);
        $stmt->bindParam(':evidence_type', $evidence_type);
        $stmt->bindParam(':description', $description);
        if ($collected_date) {
            $stmt->bindParam(':collected_date', $collected_date);
        }
        return $stmt->execute();
    }

    public function update($id, $report_id, $evidence_type, $description, $collected_date) {
        $query = "UPDATE " . $this->table . " 
                  SET report_id = :report_id, evidence_type = :evidence_type, 
                      description = :description, collected_date = :collected_date 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':report_id', $report_id);
        $stmt->bindParam(':evidence_type', $evidence_type);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':collected_date', $collected_date);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
