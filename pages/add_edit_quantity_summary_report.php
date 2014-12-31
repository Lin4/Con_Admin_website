<?php
$page_title = 'Quantity Summary Sheet';

if(!empty($_GET['action']) && $_GET['action'] == 'edit'){
$exno = !empty($_GET['exno']) ? $_GET['exno'] : "";
$qtyno = !empty($_GET['qtyno']) ? $_GET['qtyno'] : "";
$editId = !empty($_GET['editId']) ? $_GET['editId'] : "";
$url = 'http://primetech.digisarathi.net/contructionapi.php/api/quantity_summary/single/Lin/'.$qtyno;


//echo $url;
$responseArray = $curl->curlGetMethod($url);
//print_r($responseArray);
$edit = $responseArray['all_quantity_summary'][0];

$qtyNourl = "http://primetech.digisarathi.net/contructionapi.php/api/dailyinspection/dailyInspectionItemByNo/Lin/".$edit['itemNo'];
$responseArray = $curl->curlGetMethod($qtyNourl);
$items = $responseArray['dailyInspectionForm'];

$page_title = 'Quantity Summary Sheet';

}

if(!empty($_POST) && !empty($_POST['btnSubmit'])){
$editId = $_POST['inputEditId'];
$projectDescription = $_POST['inputProjectDescription'];
$title = $_POST['inputTitle'];
$project = $_POST['inputProject'];
$dateIssued = $_POST['inputDateIssued'];
$contractorResponsible = $_POST['inputContractorResponsible'];
$to = $_POST['inputTo'];
$dateCRTCB = $_POST['inputDateCRTCB'];
$dateContractorStarted = $_POST['inputDateContractorStarted'];
$dateContractorCompleted = $_POST['inputDateContractorCompleted'];
$dateOfDWRReported = $_POST['inputDateOfDWRReported'];
$descriptionOfNonCompliance = $_POST['inputDescriptionOfNonCompliance'];


if(!empty($_POST['inputEditId'])){
	$url = 'http://primetech.digisarathi.net/contructionapi.php/api/expense/update/Art/'.$editId.'/'.$projectDescription.'/'.$title.'/'.$dateIssued.'/'.$contractorResponsible.'/'.$to.'/'.$dateCRTCB.'/'.$dateContractorStarted.'/'.$dateContractorCompleted.'/'.$dateOfDWRReported.'/'.$descriptionOfNonCompliance;
$curl->curlPostMethod($url);

} else {
	$url = '';
}

}

?>
	
<div class="pull-right no-print">
	<div class="btn-group">
        <a href="javascript:window.print()" title="Print" class="btn btn-default" type="button">Print</a>
		<a href="index.php?page_name=daily-inspection-reports&pid=<?php echo $project_id; ?>" class="btn btn-default" title="Go to All <?php echo $page_title; ?>" >Back</a>
	</div>
</div>
<div class="jumbotron">
<div class="row">
	<div class="col-md-3"><img src="assets/img/Prime-Tech-Logo.png"></div>
	<div class="col-md-5"><h2><?php echo $page_title; ?></h2></div>
	<div class="col-md-4"><br><img src="assets/img/CardinalLogoWeb2.png"></div>
</div>
<hr/>
<form class="form-horizontal validation" method="post" name="projectForm" role="form">
<input type="hidden" class="form-control" name="inputEditId" value="<?php echo !empty($editId) ? $editId : ""; ?>">
	<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Project</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputProjectId" value="<?php echo !empty($edit['Project_id']) ? $edit['Project_id'] : ""; ?>">
    </div>
  </div>
  <!--<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Approved</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputProjectId" value="<?php echo !empty($edit['isApproved']) ? $edit['isApproved'] : ""; ?>">
    </div>
  </div>-->
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Date</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputProjectId" value="<?php echo !empty($edit['date']) ? $edit['date'] : ""; ?>">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Item Number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputProjectId" value="<?php echo !empty($edit['itemNo']) ? $edit['itemNo'] : ""; ?>">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Item Description</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputProjectId" value="<?php echo !empty($items[0]['Description']) ? $items[0]['Description'] : ""; ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Estimated Qty</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputAddress" value="<?php echo !empty($edit['est_Quantity']) ? $edit['est_Quantity'] : ""; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Unit</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputCity" value="<?php echo !empty($edit['unit']) ? $edit['unit'] : ""; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Unit Price</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputState" value="<?php echo !empty($edit['unitPrice']) ? $edit['unitPrice'] : ""; ?>">
    </div>
  </div>
   <div class="form-group">
  <label for="inputtext3" class="col-sm-2 control-label"></label>
  <div class="col-sm-10">
<div class="panel panel-default">
  <div class="panel-heading">Item</div>
  <div class="panel-body">
  <table class="table table-bordered">
	<thead>
	<tr>
		<th>Item No</th>
		<th>Date</th>
		<th>Location or Station</th>
		<th>Daily</th>
		<th>Accum</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($items AS $item) {
		$accum += $item['Qty']
	?>
	<tr>
		<td><?php echo $item['inspectionID']; ?></td>
		<td><?php echo $item['date']; ?></td>
		<td><?php echo $item['Description']; ?></td>
		<td><?php echo $item['Qty']; ?></td>
		<td><?php echo $accum; ?></td>
	</tr>
	<?php } ?>
	</tbody>
  </table>
  </div>
  </div>
  </div>
  </div>
   
 
   <div class="form-group no-print">
    <div class="col-sm-offset-5 col-sm-7">
     <!-- <input type="submit" name="btnSubmit" value="Submit" class="btn btn-success">
	  <a href="index.php?page_name=manage-projects" class="btn btn-danger">Cancel</a>-->
    </div>
  </div>
</form>

</div>