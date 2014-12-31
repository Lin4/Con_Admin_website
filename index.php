<?php
session_start();

if($_SESSION['is_login'] != 'yes'){
	header( 'Location: login.php' ) ;
}

include 'config.php';
include 'classes/curl.class.php';

$curl = new Curl();

$page_name = !empty($_GET['page_name']) ? $_GET['page_name'] : "";

	switch($page_name){
		case "manage-projects" :
			$body = "pages/manage_projects.php";
		break;
		case "add-project" :
			$body = "pages/add_edit_project.php";
		break;
		case "edit-project" :
			$body = "pages/add_edit_project.php";
		break;
		case "compliance-reports" :
			$body = "pages/manage_compliance_reports.php";
		break;
		case "edit-compliance-report" :
			$body = "pages/add_edit_compliance_report.php";
		break;
		case "view-compliance-report" :
			$body = "pages/reports/view_compliance_report.php";
		break;
		case "non-compliance-reports" :
			$body = "pages/manage_non_compliance_reports.php";
		break;
		case "edit-non-compliance-report" :
			$body = "pages/add_edit_non_compliance_report.php";
		break;
		case "daily-inspection-reports" :
			$body = "pages/manage_daily_inspection_reports.php";
		break;
		case "edit-daily-inspection-report" :
			$body = "pages/add_edit_daily_inspection_report.php";
		break;
		case "expense-reports" :
			$body = "pages/manage_expense_reports.php";
		break;
		case "edit-expense-report" :
			$body = "pages/add_edit_expense_report.php";
		break;
		case "summary-sheets" :
			$body = "pages/manage_summary_sheets.php";
		break;
		case "edit-summary-sheet" :
			$body = "pages/add_edit_summary_sheet.php";
		break;
		case "quantity-summary" :
			$body = "pages/manage_quantity_summary.php";
		break;
		case "edit-quantity-summary" :
			$body = "pages/add_edit_quantity_summary_report.php";
		break;
		default:
			session_destroy();
			header( 'Location: login.php' ) ;
		break;
	}
?>


<?php include 'pages/layouts/header.php'; ?>
    <div class="container">
		<?php include $body; ?>
    </div>
<?php include 'pages/layouts/footer.php' ?>
