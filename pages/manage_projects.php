<?php
$url = 'http://primetech.digisarathi.net/contructionapi.php/api/project/get/list/'.$_SESSION['username'];
$responseArray = $curl->curlGetMethod($url);

$projects="";
if(!empty($responseArray['project'])){
foreach($responseArray['project'] AS $response){
	$projects .= "<tr>
			<td>".$response['projecct_id']."</td>
			<td>".$response['p_name']."</td>
			<td>".$response['street'].', '.$response['city'].', '.$response['state'].', '.$response['zip']."</td>
			<td>".$response['phone']."</td>
			<td>".$response['client_name']."</td>
			<td>".$response['project_manager']."</td>
			<td>".$response['inspecter']."</td>
			<td>".date('Y-m-d', strtotime($response['created_date']))."</td>
			<td><div class='btn-group'>
                  <button class='btn btn-primary' type='button'>Reports</button>
                  <button data-toggle='dropdown' class='btn btn-primary dropdown-toggle' type='button'><span class='caret'></span></button>
                  <ul class='dropdown-menu'>
                    <li><a href='index.php?page_name=compliance-reports&pid=".$response['projecct_id']."'>Compliance Reports</a></li>
                    <li><a href='index.php?page_name=non-compliance-reports&pid=".$response['projecct_id']."'>Non Compliance Reports</a></li>
                    <li><a href='index.php?page_name=daily-inspection-reports&pid=".$response['projecct_id']."'>Daily Inspection Reports</a></li>
                    <li><a href='index.php?page_name=expense-reports&pid=".$response['projecct_id']."'>All Expense Reports</a></li>
                    <li><a href='index.php?page_name=summary-sheets&pid=".$response['projecct_id']."'>All Summary Reports</a></li>
					<li><a href='index.php?page_name=quantity-summary&pid=".$response['projecct_id']."'>Quantity Summary Reports</a></li>
                  </ul>
                </div>
			</td>";
		
	if($_SESSION['user_type'] != 'I'){		
		$projects .= "<td>
		<a href='index.php?page_name=edit-project&action=edit&action=edit&pid=".$response['projecct_id']."' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-pencil'></span></a></td>";
	}
		
	$projects .= "</tr>";
}
}
?>
<div class="well">
<legend>Manage Projects</legend>
<div class="table-responsive">
<table class="table table-bordered">
	<thead>
		<tr>
			<td>Project Id</td>
			<td>Name</td>
			<td>Address</td>
			<td>Phone</td>
			<td>Client</td>
			<td>Manager</td>
			<td>Inspector</td>
			<td>Created date</td>
			<td style="width:130px;">Reports</td>
		<?php if($_SESSION['user_type'] != 'I'){ ?>
			<td>Action</td>
		<?php } ?>
		</tr>
	</thead>
	<tbody>
	<?php echo $projects; ?>
	</tbody>
</table>
</div>
</div>