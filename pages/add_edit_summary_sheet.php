<?php
$page_title = 'Summary Sheet';

if(!empty($_GET['action']) && $_GET['action'] == 'edit'){
$cnno = !empty($_GET['cnno']) ? $_GET['cnno'] : "";
$project_id = !empty($_GET['pid']) ? $_GET['pid'] : "";
$url = 'http://primetech.digisarathi.net/contructionapi.php/api/summary1/single/'.$cnno;
$responseArray = $curl->curlGetMethod($url);
//print_r($responseArray);
$edit = $responseArray['expenseReport'];
//print_r($edit);
$page_title = 'Summary Sheet';

}

if(!empty($_POST) && !empty($_POST['btnSubmit'])){

$project_id = $_POST['inputProjectId'];
$title = $_POST['inputTitle'];
$name = $_POST['inputName'];
$description = $_POST['inputDescription'];
$street = $_POST['inputStreet'];
$state = $_POST['inputState'];
$city = $_POST['inputCity'];
$zip = $_POST['inputZip'];
$phoneno = $_POST['inputPhoneNo'];
$date = $_POST['inputDate'];
$clientName = $_POST['inputClientName'];
$projectManager = $_POST['inputProjectManager'];
$inspector = $_POST['inputInspector'];
$lat = $_POST['inputLat'];
$long = $_POST['inputLong'];

if(empty($_POST['inputEditId'])){					  
	$url = 'http://primetech.digisarathi.net/contructionapi.php/api/project/create/Art/'.$project_id.'/'.$project_id.'/'.$name.'/'.$description.'/'.$title.'/'.$street.'/'.$city.'/'.$state.'/'.$zip.'/'.$phoneno.'/'.$date.'/'.$clientName.'/'.$projectManager.'/'.$lat.'/'.$long.'/'.$inspector;
} else {
	$url = '';
}
$curl->curlPostMethod($url);
}

?>

	

<div class="pull-right no-print">
<div class="btn-group">
        <a href="javascript:window.print()" title="Print" class="btn btn-default" type="button">Print</a>
        <!--<a href="#" class="btn btn-default" title="Email" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-envelope"></span></a>-->
		<a href="index.php?page_name=summary-sheets&pid=<?php echo $project_id; ?>" class="btn btn-default" title="Go to All <?php echo $page_title; ?>" >Back</a>
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
<input type="hidden" class="form-control" name="inputEditId" value="<?php echo !empty($edit['id']) ? $edit['id'] : ""; ?>">
  <div class="form-group">
    <label for="inputEmail3" class=" control-label">Checked By</label>
    <input type="text" class="form-control" name="inputContractor" value="<?php echo !empty($edit['checkedBy']) ? $edit['checkedBy'] : ""; ?>">
    </div>
  <div class="form-group">
    <label for="inputEmail3" class=" control-label">Report Number</label>
    
      <input type="text" class="form-control" name="inputAddress" value="<?php echo !empty($edit['reportNumber']) ? $edit['reportNumber'] : ""; ?>">
    </div>
  
  <div class="form-group">
    <label for="inputEmail3" class=" control-label">Date</label>
  
      <input type="text" class="form-control" name="inputCity" value="<?php echo !empty($edit['date']) ? date('m-d-y', strtotime($edit['date'])) : ""; ?>">
    </div>

  <div class="form-group">
    <label for="inputEmail3" class=" control-label">Contractor Performing Work</label>
   
      <input type="text" class="form-control" name="inputState" value="<?php echo !empty($edit['contractorPerformingWork']) ? $edit['contractorPerformingWork'] : ""; ?>">
    </div>
 
 
   <div class="form-group">
    <label for="inputEmail3" class=" control-label">Description of Work</label>
    
       <textarea class="form-control" name="inputDescription" rows="3"><?php echo !empty($edit['descriptionOfWork']) ? $edit['descriptionOfWork'] : ""; ?></textarea>
    </div>
  
  
    <div class="form-group">
    <label for="inputEmail3" class=" control-label">Address</label>
    
            <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['address']) ? $edit['address'] : ""; ?>">

    
  </div>
    <div class="form-group">
    <label for="inputEmail3" class=" control-label">Date of Work</label>
    
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['dateOfWork']) ? date('m-d-y', strtotime($edit['dateOfWork'])) : ""; ?>">
    
  </div>
  <div class="form-group">
    <label for="inputEmail3" class=" control-label">Federal Aid Number</label>
    
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['federalAidNumber']) ? $edit['federalAidNumber'] : ""; ?>">
    
  </div>
 <!-- <div class="form-group">
    <label for="inputEmail3" class=" control-label">Approved</label>
    
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['isApproved']) ? $edit['isApproved'] : ""; ?>">
   
  </div>-->
  
  <div class="form-group">
    <label for="inputEmail3" class=" control-label">Project Number</label>
   
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['project_id']) ? $edit['project_id'] : ""; ?>">
    
  </div>
   <div class="form-group">
    <label for="inputEmail3" class=" control-label">Construction Order</label>
   
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['constructionOrder']) ? $edit['constructionOrder'] : ""; ?>">
    
  </div>
   <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label"></label>
    
<div class="panel panel-default">
  <div class="panel-heading">Labor</div>
  <div class="panel-body">
  <table class="table table-bordered">
	<thead>
	<tr>
		<th>Class</th>
		<th>No</th>
		<th>Total Hrs</th>
    <th>Rate</th>
    <th>Amount</th>
	</tr>
	</thead>
	<tbody>
  <tr>
		<td><?php echo !empty($edit['lAClass1']) ? $edit['lAClass1'] : ""; ?></td>
		<td><?php echo !empty($edit['lANo1']) ? $edit['lANo1'] : ""; ?></td>
		<td><?php echo !empty($edit['lATotalHours1']) ? $edit['lATotalHours1'] : ""; ?></td>
    <td><?php echo !empty($edit['lARate1']) ? $edit['lARate1'] : ""; ?></td>
    <td><?php echo !empty($edit['lAAmount1']) ? $edit['lAAmount1'] : ""; ?></td>
	</tr>
	<tr>
		<td><?php echo !empty($edit['lAClass2']) ? $edit['lAClass2'] : ""; ?></td>
    <td><?php echo !empty($edit['lANo2']) ? $edit['lANo2'] : ""; ?></td>
    <td><?php echo !empty($edit['lATotalHours2']) ? $edit['lATotalHours2'] : ""; ?></td>
    <td><?php echo !empty($edit['lARate2']) ? $edit['lARate2'] : ""; ?></td>
    <td><?php echo !empty($edit['lAAmount2']) ? $edit['lAAmount2'] : ""; ?></td>
	</tr>
	<tr>
		<td><?php echo !empty($edit['lAClass3']) ? $edit['lAClass3'] : ""; ?></td>
    <td><?php echo !empty($edit['lANo3']) ? $edit['lANo3'] : ""; ?></td>
    <td><?php echo !empty($edit['lATotalHours3']) ? $edit['lATotalHours3'] : ""; ?></td>
    <td><?php echo !empty($edit['lARate3']) ? $edit['lARate3'] : ""; ?></td>
    <td><?php echo !empty($edit['lAAmount3']) ? $edit['lAAmount3'] : ""; ?></td>
	</tr>
	<tr>
		<td><?php echo !empty($edit['lAClass4']) ? $edit['lAClass4'] : ""; ?></td>
    <td><?php echo !empty($edit['lANo4']) ? $edit['lANo4'] : ""; ?></td>
    <td><?php echo !empty($edit['lATotalHours4']) ? $edit['lATotalHours4'] : ""; ?></td>
    <td><?php echo !empty($edit['lARate4']) ? $edit['lARate4'] : ""; ?></td>
    <td><?php echo !empty($edit['lAAmount4']) ? $edit['lAAmount4'] : ""; ?></td>
	</tr>
	<tr>
		<td><?php echo !empty($edit['lAClass5']) ? $edit['lAClass5'] : ""; ?></td>
    <td><?php echo !empty($edit['lANo5']) ? $edit['lANo5'] : ""; ?></td>
    <td><?php echo !empty($edit['lATotalHours5']) ? $edit['lATotalHours5'] : ""; ?></td>
    <td><?php echo !empty($edit['lARate5']) ? $edit['lARate5'] : ""; ?></td>
    <td><?php echo !empty($edit['lAAmount5']) ? $edit['lAAmount5'] : ""; ?></td>
	</tr>
  <tr>
    <td><?php echo !empty($edit['lAClass6']) ? $edit['lAClass6'] : ""; ?></td>
    <td><?php echo !empty($edit['lANo6']) ? $edit['lANo6'] : ""; ?></td>
    <td><?php echo !empty($edit['lATotalHours6']) ? $edit['lATotalHours6'] : ""; ?></td>
    <td><?php echo !empty($edit['lARate6']) ? $edit['lARate6'] : ""; ?></td>
    <td><?php echo !empty($edit['lAAmount6']) ? $edit['lAAmount6'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['lAClass7']) ? $edit['lAClass7'] : ""; ?></td>
    <td><?php echo !empty($edit['lANo7']) ? $edit['lANo7'] : ""; ?></td>
    <td><?php echo !empty($edit['lATotalHours7']) ? $edit['lATotalHours7'] : ""; ?></td>
    <td><?php echo !empty($edit['lARate7']) ? $edit['lARate7'] : ""; ?></td>
    <td><?php echo !empty($edit['lAAmount7']) ? $edit['lAAmount7'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['lAClass8']) ? $edit['lAClass8'] : ""; ?></td>
    <td><?php echo !empty($edit['lANo8']) ? $edit['lANo8'] : ""; ?></td>
    <td><?php echo !empty($edit['lATotalHours8']) ? $edit['lATotalHours8'] : ""; ?></td>
    <td><?php echo !empty($edit['lARate8']) ? $edit['lARate8'] : ""; ?></td>
    <td><?php echo !empty($edit['lAAmount8']) ? $edit['lAAmount8'] : ""; ?></td>
  </tr>
	</tbody>
  </table>
  </div>
  </div>
  </div>
 
   <div class="form-group">
    <label for="inputEmail3" class=" control-label">Total Labor</label>
    
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['totalLabor']) ? $edit['totalLabor'] : ""; ?>">
    </div>
  
    <div class="form-group">
    <label for="inputEmail3" class=" control-label">Health Welfare and Pension</label>
   
      <input type="text" class="form-control" name="inputHealWelAndPension" value="<?php echo !empty($edit['healWelAndPension']) ? $edit['healWelAndPension'] : ""; ?>">
    </div>
 
    <div class="form-group">
    <label for="inputEmail3" class=" control-label">ins and Texes on item 1</label>
    
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['insAndTaxesOnItem1']) ? $edit['insAndTaxesOnItem1'] : ""; ?>">
    </div>
  
    <div class="form-group">
	 <label for="inputEmail3" class=" control-label">20% of (Items 1 + 2 + 3)</label>
    
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['itemDescount20per']) ? $edit['itemDescount20per'] : ""; ?>">
   
  </div>
    <div class="form-group">
    <label for="inputEmail3" class=" control-label">Total (Items 1 thru 4)</label>
   
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['totalItems1through4']) ? $edit['totalItems1through4'] : ""; ?>">
   
  </div>
   <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label"></label>
    
<div class="panel panel-default">
  <div class="panel-heading">Material</div>
  <div class="panel-body">
  <table class="table table-bordered">
	<thead>
	<tr>
		<th>Description</th>
		<th>Quality</th>
		<th>Unit Price</th>
		<th>Amount</th>
	</tr>
	</thead>
	<tbody>
		<tr>
		<td><?php echo !empty($edit['mEDescription1']) ? $edit['mEDescription1'] : ""; ?></td>
		<td><?php echo !empty($edit['mEQuantity1']) ? $edit['mEQuantity1'] : ""; ?></td>
		<td><?php echo !empty($edit['mEUnitPrice1']) ? $edit['mEUnitPrice1'] : ""; ?></td>
		<td><?php echo !empty($edit['mEAmount1']) ? $edit['mEAmount1'] : ""; ?></td>
	</tr>
	<tr>
		<td><?php echo !empty($edit['mEDescription2']) ? $edit['mEDescription2'] : ""; ?></td>
		<td><?php echo !empty($edit['mEQuantity2']) ? $edit['mEQuantity2'] : ""; ?></td>
		<td><?php echo !empty($edit['mEUnitPrice2']) ? $edit['mEUnitPrice2'] : ""; ?></td>
		<td><?php echo !empty($edit['mEAmount2']) ? $edit['mEAmount2'] : ""; ?></td>
	</tr>
	<tr>
		<td><?php echo !empty($edit['mEDescription3']) ? $edit['mEDescription3'] : ""; ?></td>
		<td><?php echo !empty($edit['mEQuantity3']) ? $edit['mEQuantity3'] : ""; ?></td>
		<td><?php echo !empty($edit['mEUnitPrice3']) ? $edit['mEUnitPrice3'] : ""; ?></td>
		<td><?php echo !empty($edit['mEAmount3']) ? $edit['mEAmount3'] : ""; ?></td>
	</tr>
	<tr>
		<td><?php echo !empty($edit['mEDescription4']) ? $edit['mEDescription4'] : ""; ?></td>
		<td><?php echo !empty($edit['mEQuantity4']) ? $edit['mEQuantity4'] : ""; ?></td>
		<td><?php echo !empty($edit['mEUnitPrice4']) ? $edit['mEUnitPrice4'] : ""; ?></td>
		<td><?php echo !empty($edit['mEAmount4']) ? $edit['mEAmount4'] : ""; ?></td>
	</tr>
		<tr>
		<td><?php echo !empty($edit['mEDescription5']) ? $edit['mEDescription5'] : ""; ?></td>
		<td><?php echo !empty($edit['mEQuantity5']) ? $edit['mEQuantity5'] : ""; ?></td>
		<td><?php echo !empty($edit['mEUnitPrice5']) ? $edit['mEUnitPrice5'] : ""; ?></td>
		<td><?php echo !empty($edit['mEAmount5']) ? $edit['mEAmount5'] : ""; ?></td>
	</tr>
  <tr>
    <td><?php echo !empty($edit['mEDescription6']) ? $edit['mEDescription6'] : ""; ?></td>
    <td><?php echo !empty($edit['mEQuantity6']) ? $edit['mEQuantity6'] : ""; ?></td>
    <td><?php echo !empty($edit['mEUnitPrice6']) ? $edit['mEUnitPrice6'] : ""; ?></td>
    <td><?php echo !empty($edit['mEAmount6']) ? $edit['mEAmount6'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['mEDescription7']) ? $edit['mEDescription7'] : ""; ?></td>
    <td><?php echo !empty($edit['mEQuantity7']) ? $edit['mEQuantity7'] : ""; ?></td>
    <td><?php echo !empty($edit['mEUnitPrice7']) ? $edit['mEUnitPrice7'] : ""; ?></td>
    <td><?php echo !empty($edit['mEAmount7']) ? $edit['mEAmount7'] : ""; ?></td>
  </tr>
    <tr>
    <td><?php echo !empty($edit['mEDescription5']) ? $edit['mEDescription5'] : ""; ?></td>
    <td><?php echo !empty($edit['mEQuantity8']) ? $edit['mEQuantity8'] : ""; ?></td>
    <td><?php echo !empty($edit['mEUnitPrice8']) ? $edit['mEUnitPrice8'] : ""; ?></td>
    <td><?php echo !empty($edit['mEAmount8']) ? $edit['mEAmount8'] : ""; ?></td>
  </tr>
	</tbody>
  </table>
  </div>
  </div>
  </div>

 <div class="form-group">
    <label for="inputEmail3" class=" control-label">Total</label>
    
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['material_total1']) ? $edit['material_total1'] : ""; ?>">
    </div>
 
   <div class="form-group">
    <label for="inputEmail3" class=" control-label">Less Discount</label>
   
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['lessDiscount']) ? $edit['lessDiscount'] : ""; ?>">
    </div>

   <div class="form-group">
    <label for="inputEmail3" class=" control-label">Total</label>
    
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['material_total2']) ? $edit['material_total2'] : ""; ?>">
    </div>
  
   <div class="form-group">
    <label for="inputEmail3" class=" control-label">Additional % = 15%</label>
  
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['additionalDiscount']) ? $edit['additionalDiscount'] : ""; ?>">
    </div>
  
  <div class="form-group">
    <label for="inputEmail3" class=" control-label">Total</label>
    
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['material_total3']) ? $edit['material_total3'] : ""; ?>">
    </div>

    
    <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label"></label>
    
<div class="panel panel-default">
  <div class="panel-heading">Equipment</div>
  <div class="panel-body">
  <table class="table table-bordered">
	<thead>
	<tr>
		<th>Size and Class</th>
		<th>Idle (i) Active (A)</th>
		<th>No</th>
		<th>Total Hrs</th>
		<th>Rate</th>
		<th>Amount</th>
	</tr>
	</thead>
	<tbody>
		<tr>
		<td><?php echo !empty($edit['eQSizeandClass1']) ? $edit['eQSizeandClass1'] : ""; ?></td>
		<td><?php echo !empty($edit['eQIdleActive1']) ? $edit['eQIdleActive1'] : ""; ?></td>
		<td><?php echo !empty($edit['eQNo1']) ? $edit['eQNo1'] : ""; ?></td>
		<td><?php echo !empty($edit['eQTotalHours1']) ? $edit['eQTotalHours1'] : ""; ?></td>
		<td><?php echo !empty($edit['eQRAte1']) ? $edit['eQRAte1'] : ""; ?></td>
		<td><?php echo !empty($edit['eQAmount1']) ? $edit['eQAmount1'] : ""; ?></td>
	</tr>
	<tr>
		<td><?php echo !empty($edit['eQSizeandClass2']) ? $edit['eQSizeandClass2'] : ""; ?></td>
		<td><?php echo !empty($edit['eQIdleActive2']) ? $edit['eQIdleActive2'] : ""; ?></td>
		<td><?php echo !empty($edit['eQNo2']) ? $edit['eQNo2'] : ""; ?></td>
		<td><?php echo !empty($edit['eQTotalHours2']) ? $edit['eQTotalHours2'] : ""; ?></td>
		<td><?php echo !empty($edit['eQRAte2']) ? $edit['eQRAte2'] : ""; ?></td>
		<td><?php echo !empty($edit['eQAmount2']) ? $edit['eQAmount2'] : ""; ?></td>
	</tr>
	<tr>
		<td><?php echo !empty($edit['eQSizeandClass3']) ? $edit['eQSizeandClass3'] : ""; ?></td>
		<td><?php echo !empty($edit['eQIdleActive3']) ? $edit['eQIdleActive3'] : ""; ?></td>
		<td><?php echo !empty($edit['eQNo3']) ? $edit['eQNo3'] : ""; ?></td>
		<td><?php echo !empty($edit['eQTotalHours3']) ? $edit['eQTotalHours3'] : ""; ?></td>
		<td><?php echo !empty($edit['eQRAte3']) ? $edit['eQRAte3'] : ""; ?></td>
		<td><?php echo !empty($edit['eQAmount3']) ? $edit['eQAmount3'] : ""; ?></td>
	</tr>
	<tr>
		<td><?php echo !empty($edit['eQSizeandClass4']) ? $edit['eQSizeandClass4'] : ""; ?></td>
		<td><?php echo !empty($edit['eQIdleActive4']) ? $edit['eQIdleActive4'] : ""; ?></td>
		<td><?php echo !empty($edit['eQNo4']) ? $edit['eQNo4'] : ""; ?></td>
		<td><?php echo !empty($edit['eQTotalHours4']) ? $edit['eQTotalHours4'] : ""; ?></td>
		<td><?php echo !empty($edit['eQRAte4']) ? $edit['eQRAte4'] : ""; ?></td>
		<td><?php echo !empty($edit['eQAmount4']) ? $edit['eQAmount4'] : ""; ?></td>
	</tr>
  <tr>
    <td><?php echo !empty($edit['eQSizeandClass1']) ? $edit['eQSizeandClass1'] : ""; ?></td>
    <td><?php echo !empty($edit['eQIdleActive1']) ? $edit['eQIdleActive1'] : ""; ?></td>
    <td><?php echo !empty($edit['eQNo1']) ? $edit['eQNo1'] : ""; ?></td>
    <td><?php echo !empty($edit['eQTotalHours1']) ? $edit['eQTotalHours1'] : ""; ?></td>
    <td><?php echo !empty($edit['eQRAte1']) ? $edit['eQRAte1'] : ""; ?></td>
    <td><?php echo !empty($edit['eQAmount5']) ? $edit['eQAmount5'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['eQSizeandClass2']) ? $edit['eQSizeandClass2'] : ""; ?></td>
    <td><?php echo !empty($edit['eQIdleActive2']) ? $edit['eQIdleActive2'] : ""; ?></td>
    <td><?php echo !empty($edit['eQNo2']) ? $edit['eQNo2'] : ""; ?></td>
    <td><?php echo !empty($edit['eQTotalHours2']) ? $edit['eQTotalHours2'] : ""; ?></td>
    <td><?php echo !empty($edit['eQRAte2']) ? $edit['eQRAte2'] : ""; ?></td>
    <td><?php echo !empty($edit['eQAmount6']) ? $edit['eQAmount6'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['eQSizeandClass3']) ? $edit['eQSizeandClass3'] : ""; ?></td>
    <td><?php echo !empty($edit['eQIdleActive3']) ? $edit['eQIdleActive3'] : ""; ?></td>
    <td><?php echo !empty($edit['eQNo3']) ? $edit['eQNo3'] : ""; ?></td>
    <td><?php echo !empty($edit['eQTotalHours3']) ? $edit['eQTotalHours3'] : ""; ?></td>
    <td><?php echo !empty($edit['eQRAte3']) ? $edit['eQRAte3'] : ""; ?></td>
    <td><?php echo !empty($edit['eQAmount7']) ? $edit['eQAmount7'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['eQSizeandClass4']) ? $edit['eQSizeandClass4'] : ""; ?></td>
    <td><?php echo !empty($edit['eQIdleActive4']) ? $edit['eQIdleActive4'] : ""; ?></td>
    <td><?php echo !empty($edit['eQNo4']) ? $edit['eQNo4'] : ""; ?></td>
    <td><?php echo !empty($edit['eQTotalHours4']) ? $edit['eQTotalHours4'] : ""; ?></td>
    <td><?php echo !empty($edit['eQRAte4']) ? $edit['eQRAte4'] : ""; ?></td>
    <td><?php echo !empty($edit['eQAmount8']) ? $edit['eQAmount8'] : ""; ?></td>
  </tr>
	</tbody>
  </table>
  </div>
  </div>
 </div>
<div class="form-group">
    <label for="inputEmail3" class=" control-label">Equipment Total</label>
   
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['equipment_total']) ? $edit['equipment_total'] : ""; ?>">
    </div>

<div class="form-group">
    <label for="inputEmail3" class=" control-label">Inspector</label>
   
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['inspector']) ? $edit['inspector'] : ""; ?>">
    </div>

<div class="form-group">
    <label for="inputEmail3" class=" control-label">Inspector Signature</label>
    
     <?php echo !empty($edit['inspectorSign']) ? '<img width="200" src="http://primetech.digisarathi.net/ConstructionAPI/images/'.$edit['inspectorSign'].'" />' : ""; ?>
    </div>

<div class="form-group">
    <label for="inputEmail3" class=" control-label">Date</label>
   
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['date']) ? date('m-d-y', strtotime($edit['date'])) : ""; ?>">
    </div>

<div class="form-group">
    <label for="inputEmail3" class=" control-label">Contractor Representative</label>
   
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['contractorRepresentative']) ? $edit['contractorRepresentative'] : ""; ?>">
    </div>

<div class="form-group">
  <label for="inputEmail3" class=" control-label">Contractor Signature</label>
   
     <?php echo !empty($edit['contractorSign']) ? '<img width="200" src="http://primetech.digisarathi.net/ConstructionAPI/images/'.$edit['contractorSign'].'" />' : ""; ?>
    </div>

	<div class="form-group">
    <label for="inputEmail3" class=" control-label">Date</label>
 
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['date']) ? date('m-d-y', strtotime($edit['date'])) : ""; ?>">
    </div>
 
  <div class="form-group">
    <label for="inputEmail3" class=" control-label">Daily Total</label>
   
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['dailyTotal']) ? $edit['dailyTotal'] : ""; ?>">
    </div>
 
  <div class="form-group">
    <label for="inputEmail3" class=" control-label">Total to Date</label>
   
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['total_to_date']) ? $edit['total_to_date'] : ""; ?>">
    </div>
 
  
   <div class="form-group no-print">
    <div class="col-sm-offset-5 col-sm-7">
      <!--<input type="submit" name="btnSubmit" value="Submit" class="btn btn-success">
	  <a href="index.php?page_name=manage-projects" class="btn btn-danger">Cancel</a>-->
    </div>
  </div>
</form>
</div>