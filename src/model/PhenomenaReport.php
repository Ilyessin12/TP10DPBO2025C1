<?php
require_once __DIR__ . '/../config/Database.php';

class PhenomenaReport {
    private $conn;
    private $table = 'phenomena_reports';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT pr.*, l.name as location_name 
                  FROM " . $this->table . " pr 
                  LEFT JOIN locations l ON pr.location_id = l.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT pr.*, l.name as location_name 
                  FROM " . $this->table . " pr 
                  LEFT JOIN locations l ON pr.location_id = l.id 
                  WHERE pr.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($report_title, $reported_date, $location_id, $description, $reporter_alias, $severity_level) {
        $query = "INSERT INTO " . $this->table . " (report_title, reported_date, location_id, description, reporter_alias, severity_level) 
                  VALUES (:report_title, :reported_date, :location_id, :description, :reporter_alias, :severity_level)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':report_title', $report_title);
        $stmt->bindParam(':reported_date', $reported_date);
        $stmt->bindParam(':location_id', $location_id);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':reporter_alias', $reporter_alias);
        $stmt->bindParam(':severity_level', $severity_level);
        return $stmt->execute();
    }

    public function update($id, $report_title, $reported_date, $location_id, $description, $reporter_alias, $severity_level) {
        $query = "UPDATE " . $this->table . " 
                  SET report_title = :report_title, reported_date = :reported_date, location_id = :location_id, 
                      description = :description, reporter_alias = :reporter_alias, severity_level = :severity_level 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':report_title', $report_title);
        $stmt->bindParam(':reported_date', $reported_date);
        $stmt->bindParam(':location_id', $location_id);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':reporter_alias', $reporter_alias);
        $stmt->bindParam(':severity_level', $severity_level);
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
