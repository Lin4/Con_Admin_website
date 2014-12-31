<?php
$project_id = !empty($_GET['pid']) ? $_GET['pid'] : "";

$url = 'http://primetech.digisarathi.net/contructionapi.php/api/quantity_summary/all/'.$_SESSION['username'].'/'.$project_id;
$responseArray = $curl->curlGetMethod($url);
//print_r($responseArray);
$url2 = 'http://primetech.digisarathi.net/contructionapi.php/api/project/get/edit/'.$project_id;
$project_details = $curl->curlGetMethod($url2);
$project_detail = $project_details['project'][0];
//print_r($project_details);
$project_report="";
if(!empty($responseArray['all_quantity_summary'])){
foreach($responseArray['all_quantity_summary'] AS $response){
	$project_report .= "<tr>
			<td>".$response['qunatityReportNo']."</td>
			<td>".date('Y-m-d', strtotime($response['date']))."</td>
			<td>".$response['user']."</td>
			<td><a href='index.php?page_name=edit-quantity-summary&action=edit&qtyno=".$response['qunatityReportNo']."&pid=".$project_id."' class='btn btn-info btn-sm'>View Report</a></td>
			</tr>";
}
}
?>
<div class="well">
<legend><?php echo $project_detail['p_name']; ?> Reports <a href="index.php?page_name=manage-projects" class="btn btn-sm btn-success pull-right">All Projects</a></legend>

<ul class="nav nav-tabs" role="tablist">
  <li><a href="index.php?page_name=compliance-reports&pid=<?php echo $project_id; ?>">Compliance Report</a></li>
  <li><a href="index.php?page_name=non-compliance-reports&pid=<?php echo $project_id; ?>">Non Compliance Report</a></li>
  <li><a href="index.php?page_name=daily-inspection-reports&pid=<?php echo $project_id; ?>">Daily Inspection Report</a></li>
  <li><a href="index.php?page_name=expense-reports&pid=<?php echo $project_id; ?>">Expense Report</a></li>
  <li><a href="index.php?page_name=summary-sheets&pid=<?php echo $project_id; ?>">Summary Sheet</a></li>
  <li class="active"><a href="index.php?page_name=quantity-summary&pid=<?php echo $project_id; ?>">Quantity Summary</a></li>
</ul>
<br>
<legend>Quantity Summary Report</legend>
<div class="table-responsive">
<table class="table table-bordered">
	<thead>
		<tr>
			<td>Id</td>
			<td>Date</td>
			<td>User</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
	<?php echo $project_report; ?>
	</tbody>
</table>
</div>
</div>