<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/viewmodel/LocationViewModel.php';
require_once __DIR__ . '/viewmodel/PhenomenaReportViewModel.php';
require_once __DIR__ . '/viewmodel/RelatedEvidenceViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'phenomena_reports'; // Default to phenomena_reports
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if($entity == 'locations'){
    $viewModel = new LocationViewModel();
    if($action == 'list'){
        $locations = $viewModel->getAllLocations();
        require_once __DIR__ . '/views/locations.php';
    }
    elseif($action == 'detail'){
        $location = $viewModel->getLocationById($_GET['id']);
        require_once __DIR__ . '/views/locations_detail.php';
    }
    elseif($action == 'add'){
        require_once __DIR__ . '/views/locations_form.php';
    }
    elseif($action == 'edit'){
        $location = $viewModel->getLocationById($_GET['id']);
        require_once __DIR__ . '/views/locations_form.php';
    }
    elseif($action == 'save'){
        $viewModel->createLocation($_POST['name'], $_POST['district'], $_POST['description']);
        header('Location: ' . BASE_URL . 'index.php?entity=locations&action=list');
        exit();
    }
    elseif($action == 'update'){
        $viewModel->updateLocation($_POST['id'], $_POST['name'], $_POST['district'], $_POST['description']);
        header('Location: ' . BASE_URL . 'index.php?entity=locations&action=list');
        exit();
    }
    elseif($action == 'delete'){
        $viewModel->deleteLocation($_GET['id']);
        header('Location: ' . BASE_URL . 'index.php?entity=locations&action=list');
        exit();
    }
}
elseif($entity == 'phenomena_reports'){
    $viewModel = new PhenomenaReportViewModel();
    $locationViewModel = new LocationViewModel(); // For dropdown in form

    if($action == 'list'){
        $phenomenaReports = $viewModel->getAllPhenomenaReports();
        require_once __DIR__ . '/views/phenomena_reports.php';
    }
    elseif($action == 'detail'){
        $report = $viewModel->getPhenomenaReportById($_GET['id']);
        $relatedEvidenceViewModel = new RelatedEvidenceViewModel();
        $evidences = $relatedEvidenceViewModel->getRelatedEvidenceByReportId($_GET['id']);
        require_once __DIR__ . '/views/phenomena_reports_detail.php';
    }
    elseif($action == 'add'){
        $locations = $locationViewModel->getAllLocations();
        require_once __DIR__ . '/views/phenomena_reports_form.php';
    }
    elseif($action == 'edit'){
        $report = $viewModel->getPhenomenaReportById($_GET['id']);
        $locations = $locationViewModel->getAllLocations();
        require_once __DIR__ . '/views/phenomena_reports_form.php';
    }
    elseif($action == 'save'){
        $viewModel->createPhenomenaReport(
            $_POST['report_title'],
            $_POST['reported_date'],
            $_POST['location_id'],
            $_POST['description'],
            $_POST['reporter_alias'],
            $_POST['severity_level']
        );
        header('Location: ' . BASE_URL . 'index.php?entity=phenomena_reports&action=list');
        exit();
    }
    elseif($action == 'update'){
        $viewModel->updatePhenomenaReport(
            $_POST['id'],
            $_POST['report_title'],
            $_POST['reported_date'],
            $_POST['location_id'],
            $_POST['description'],
            $_POST['reporter_alias'],
            $_POST['severity_level']
        );
        header('Location: ' . BASE_URL . 'index.php?entity=phenomena_reports&action=list');
        exit();
    }
    elseif($action == 'delete'){
        $viewModel->deletePhenomenaReport($_GET['id']);
        header('Location: ' . BASE_URL . 'index.php?entity=phenomena_reports&action=list');
        exit();
    }
}
elseif($entity == 'related_evidence'){
    $viewModel = new RelatedEvidenceViewModel();
    $reportViewModel = new PhenomenaReportViewModel(); // For dropdown in form

    if($action == 'list'){
        $relatedEvidences = $viewModel->getAllRelatedEvidence();
        require_once __DIR__ . '/views/related_evidence.php';
    }
    elseif($action == 'detail'){
        $evidence = $viewModel->getRelatedEvidenceById($_GET['id']);
        require_once __DIR__ . '/views/related_evidence_detail.php';
    }
    elseif($action == 'add'){
        $reports = $reportViewModel->getAllPhenomenaReports();
        $report_id_prefill = isset($_GET['report_id']) ? $_GET['report_id'] : null;
        require_once __DIR__ . '/views/related_evidence_form.php';
    }
    elseif($action == 'edit'){
        $evidence = $viewModel->getRelatedEvidenceById($_GET['id']);
        $reports = $reportViewModel->getAllPhenomenaReports();
        require_once __DIR__ . '/views/related_evidence_form.php';
    }
    elseif($action == 'save'){
        $collected_date = !empty($_POST['collected_date']) ? $_POST['collected_date'] : null;
        $viewModel->createRelatedEvidence(
            $_POST['report_id'],
            $_POST['evidence_type'],
            $_POST['description'],
            $collected_date
        );
        header('Location: ' . BASE_URL . 'index.php?entity=related_evidence&action=list');
        exit();
    }
    elseif($action == 'update'){
        $viewModel->updateRelatedEvidence(
            $_POST['id'],
            $_POST['report_id'],
            $_POST['evidence_type'],
            $_POST['description'],
            $_POST['collected_date']
        );
        header('Location: ' . BASE_URL . 'index.php?entity=related_evidence&action=list');
        exit();
    }
    elseif($action == 'delete'){
        $viewModel->deleteRelatedEvidence($_GET['id']);
        header('Location: ' . BASE_URL . 'index.php?entity=related_evidence&action=list');
        exit();
    }
}
else{
    // Default view or error page
    $phenomenaReportViewModel = new PhenomenaReportViewModel();
    $phenomenaReports = $phenomenaReportViewModel->getAllPhenomenaReports();
    require_once __DIR__ . '/views/phenomena_reports.php';
}
?>
