<?php
$page_title = 'Expense Report';

if(!empty($_GET['action']) && $_GET['action'] == 'edit'){
$exno = !empty($_GET['exno']) ? $_GET['exno'] : "";
$project_id = !empty($_GET['pid']) ? $_GET['pid'] : "";
$editId = !empty($_GET['editId']) ? $_GET['editId'] : "";
$url = 'http://primetech.digisarathi.net/contructionapi.php/api/expense/single/Lin/'.$exno;
//echo $url;
$responseArray = $curl->curlGetMethod($url);
//print_r($responseArray);
$edit = $responseArray['expenseReport'];
//print_r($edit);
$page_title = 'Expense Report';

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
  <div class="row">
	<div class="col-md-6 col-lg-6">
		<div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">EMPLOYEE NAME(PRINT)</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="inputProjectId" value="<?php echo !empty($edit['EMPName']) ? $edit['EMPName'] : ""; ?>">
    </div>
  </div>
	</div>
	<div class="col-md-6 col-lg-6">
		<div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">SIGNATURE</label>
    <div class="col-sm-8">
      <?php echo !empty($edit['Signature']) ? '<img width="300" height="75" src="http://primetech.digisarathi.net/ConstructionAPI/images/'.$edit['Signature'].'" />' : ""; ?>
  </div>
  </div>
	</div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">EMPLOYEE NO</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputProjectId" value="<?php echo !empty($edit['employee_Number']) ? $edit['employee_Number'] : ""; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">WEEK ENDING</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputProjectId" value="<?php echo !empty($edit['WeekEnding']) ? $edit['WeekEnding'] : ""; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">DATE</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputAddress" value="<?php echo !empty($edit['Date']) ? $edit['Date'] : ""; ?>">
    </div>
  </div>
 
<div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
<div class="panel panel-default">
  <div class="panel-heading">EXPENSE DETAILS</div>
  <div class="panel-body">
  <table class="table table-bordered">
  <thead>
  <tr>
    <th>Date</th>
    <th>Description</th>
    <th>Job No</th>
    <th>Office</th>
    <th>Auto</th>
    <th>Empl</th>
    <th>Ent</th>
    <th>Travel</th>
    <th>Misc</th>
    <th>7</th>
    <th>8</th>
    <th>9</th>
    <th>Milage</th>
    <th>Rate</th>
    <th>Total</th>
  </tr>
  </thead>
  <tbody>
    <tr>
    <td><?php echo !empty($edit['ERDate1']) ? $edit['ERDate1'] : ""; ?></td>
    <td><?php echo !empty($edit['ERDescription1']) ? $edit['ERDescription1'] : ""; ?></td>
    <td><?php echo !empty($edit['ERJobNo1']) ? $edit['ERJobNo1'] : ""; ?></td>
    <td><?php echo !empty($edit['office_1']) ? $edit['office_1'] : ""; ?></td>
    <td><?php echo !empty($edit['Auto_1']) ? $edit['Auto_1'] : ""; ?></td>
    <td><?php echo !empty($edit['empl_1']) ? $edit['empl_1'] : ""; ?></td>
    <td><?php echo !empty($edit['ent_1']) ? $edit['ent_1'] : ""; ?></td>
    <td><?php echo !empty($edit['travel_1']) ? $edit['travel_1'] : ""; ?></td>
    <td><?php echo !empty($edit['misc_1']) ? $edit['misc_1'] : ""; ?></td>
    <td><?php echo !empty($edit['others1_1']) ? $edit['others1_1'] : ""; ?></td>
    <td><?php echo !empty($edit['others2_1']) ? $edit['others2_1'] : ""; ?></td>
    <td><?php echo !empty($edit['others3_1']) ? $edit['others3_1'] : ""; ?></td>
    <td><?php echo !empty($edit['ERPAMilage1']) ? $edit['ERPAMilage1'] : ""; ?></td>
    <td><?php echo !empty($edit['ERPAMilage1']) ? $edit['ERPAMilage1'] : ""; ?></td>
    <td><?php echo !empty($edit['ERTotal1']) ? $edit['ERTotal1'] : ""; ?></td>
    </tr>
  <tr>
    <td><?php echo !empty($edit['ERDate2']) ? $edit['ERDate2'] : ""; ?></td>
    <td><?php echo !empty($edit['ERDescription2']) ? $edit['ERDescription2'] : ""; ?></td>
    <td><?php echo !empty($edit['ERJobNo2']) ? $edit['ERJobNo2'] : ""; ?></td>
    <td><?php echo !empty($edit['office_2']) ? $edit['office_2'] : ""; ?></td>
    <td><?php echo !empty($edit['Auto_2']) ? $edit['Auto_2'] : ""; ?></td>
    <td><?php echo !empty($edit['empl_2']) ? $edit['empl_2'] : ""; ?></td>
    <td><?php echo !empty($edit['ent_2']) ? $edit['ent_2'] : ""; ?></td>
    <td><?php echo !empty($edit['travel_2']) ? $edit['travel_2'] : ""; ?></td>
    <td><?php echo !empty($edit['misc_2']) ? $edit['misc_2'] : ""; ?></td>
    <td><?php echo !empty($edit['others1_2']) ? $edit['others1_2'] : ""; ?></td>
    <td><?php echo !empty($edit['others2_2']) ? $edit['others2_2'] : ""; ?></td>
    <td><?php echo !empty($edit['others3_2']) ? $edit['others3_2'] : ""; ?></td>
    <td><?php echo !empty($edit['ERPAMilage2']) ? $edit['ERPAMilage2'] : ""; ?></td>
    <td><?php echo !empty($edit['ERPAMilage2']) ? $edit['ERPAMilage2'] : ""; ?></td>
    <td><?php echo !empty($edit['ERTotal2']) ? $edit['ERTotal2'] : ""; ?></td>
  <tr>
    <td><?php echo !empty($edit['ERDate3']) ? $edit['ERDate3'] : ""; ?></td>
    <td><?php echo !empty($edit['ERDescription3']) ? $edit['ERDescription3'] : ""; ?></td>
    <td><?php echo !empty($edit['ERJobNo3']) ? $edit['ERJobNo3'] : ""; ?></td>
    <td><?php echo !empty($edit['office_3']) ? $edit['office_3'] : ""; ?></td>
    <td><?php echo !empty($edit['Auto_3']) ? $edit['Auto_3'] : ""; ?></td>
    <td><?php echo !empty($edit['empl_3']) ? $edit['empl_3'] : ""; ?></td>
    <td><?php echo !empty($edit['ent_3']) ? $edit['ent_3'] : ""; ?></td>
    <td><?php echo !empty($edit['travel_3']) ? $edit['travel_3'] : ""; ?></td>
    <td><?php echo !empty($edit['misc_3']) ? $edit['misc_3'] : ""; ?></td>
    <td><?php echo !empty($edit['others1_3']) ? $edit['others1_3'] : ""; ?></td>
    <td><?php echo !empty($edit['others2_3']) ? $edit['others2_3'] : ""; ?></td>
    <td><?php echo !empty($edit['others3_3']) ? $edit['others3_3'] : ""; ?></td>
    <td><?php echo !empty($edit['ERPAMilage3']) ? $edit['ERPAMilage3'] : ""; ?></td>
    <td><?php echo !empty($edit['ERPAMilage3']) ? $edit['ERPAMilage3'] : ""; ?></td>
    <td><?php echo !empty($edit['ERTotal3']) ? $edit['ERTotal3'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['ERDate4']) ? $edit['ERDate4'] : ""; ?></td>
    <td><?php echo !empty($edit['ERDescription4']) ? $edit['ERDescription4'] : ""; ?></td>
    <td><?php echo !empty($edit['ERJobNo4']) ? $edit['ERJobNo4'] : ""; ?></td>
    <td><?php echo !empty($edit['office_4']) ? $edit['office_4'] : ""; ?></td>
    <td><?php echo !empty($edit['Auto_4']) ? $edit['Auto_4'] : ""; ?></td>
    <td><?php echo !empty($edit['empl_4']) ? $edit['empl_4'] : ""; ?></td>
    <td><?php echo !empty($edit['ent_4']) ? $edit['ent_4'] : ""; ?></td>
    <td><?php echo !empty($edit['travel_4']) ? $edit['travel_4'] : ""; ?></td>
    <td><?php echo !empty($edit['misc_4']) ? $edit['misc_4'] : ""; ?></td>
    <td><?php echo !empty($edit['others1_4']) ? $edit['others1_4'] : ""; ?></td>
    <td><?php echo !empty($edit['others2_4']) ? $edit['others2_4'] : ""; ?></td>
    <td><?php echo !empty($edit['others3_4']) ? $edit['others3_4'] : ""; ?></td>
    <td><?php echo !empty($edit['ERPAMilage4']) ? $edit['ERPAMilage4'] : ""; ?></td>
    <td><?php echo !empty($edit['ERPAMilage4']) ? $edit['ERPAMilage4'] : ""; ?></td>
    <td><?php echo !empty($edit['ERTotal4']) ? $edit['ERTotal4'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['ERDate5']) ? $edit['ERDate5'] : ""; ?></td>
    <td><?php echo !empty($edit['ERDescription5']) ? $edit['ERDescription5'] : ""; ?></td>
    <td><?php echo !empty($edit['ERJobNo5']) ? $edit['ERJobNo5'] : ""; ?></td>
    <td><?php echo !empty($edit['office_5']) ? $edit['office_5'] : ""; ?></td>
    <td><?php echo !empty($edit['Auto_5']) ? $edit['Auto_5'] : ""; ?></td>
    <td><?php echo !empty($edit['empl_5']) ? $edit['empl_5'] : ""; ?></td>
    <td><?php echo !empty($edit['ent_5']) ? $edit['ent_5'] : ""; ?></td>
    <td><?php echo !empty($edit['travel_5']) ? $edit['travel_5'] : ""; ?></td>
    <td><?php echo !empty($edit['misc_5']) ? $edit['misc_5'] : ""; ?></td>
    <td><?php echo !empty($edit['others1_5']) ? $edit['others1_5'] : ""; ?></td>
    <td><?php echo !empty($edit['others2_5']) ? $edit['others2_5'] : ""; ?></td>
    <td><?php echo !empty($edit['others3_5']) ? $edit['others3_5'] : ""; ?></td>
    <td><?php echo !empty($edit['ERPAMilage5']) ? $edit['ERPAMilage5'] : ""; ?></td>
    <td><?php echo !empty($edit['ERPAMilage5']) ? $edit['ERPAMilage5'] : ""; ?></td>
    <td><?php echo !empty($edit['ERTotal5']) ? $edit['ERTotal5'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['ERDate6']) ? $edit['ERDate6'] : ""; ?></td>
    <td><?php echo !empty($edit['ERDescription6']) ? $edit['ERDescription6'] : ""; ?></td>
    <td><?php echo !empty($edit['ERJobNo6']) ? $edit['ERJobNo6'] : ""; ?></td>
    <td><?php echo !empty($edit['office_6']) ? $edit['office_6'] : ""; ?></td>
    <td><?php echo !empty($edit['Auto_6']) ? $edit['Auto_6'] : ""; ?></td>
    <td><?php echo !empty($edit['empl_6']) ? $edit['empl_6'] : ""; ?></td>
    <td><?php echo !empty($edit['ent_6']) ? $edit['ent_6'] : ""; ?></td>
    <td><?php echo !empty($edit['travel_6']) ? $edit['travel_6'] : ""; ?></td>
    <td><?php echo !empty($edit['misc_6']) ? $edit['misc_6'] : ""; ?></td>
    <td><?php echo !empty($edit['others1_6']) ? $edit['others1_6'] : ""; ?></td>
    <td><?php echo !empty($edit['others2_6']) ? $edit['others2_6'] : ""; ?></td>
    <td><?php echo !empty($edit['others3_6']) ? $edit['others3_6'] : ""; ?></td>
    <td><?php echo !empty($edit['ERPAMilage6']) ? $edit['ERPAMilage6'] : ""; ?></td>
    <td><?php echo !empty($edit['ERPAMilage6']) ? $edit['ERPAMilage6'] : ""; ?></td>
    <td><?php echo !empty($edit['ERTotal6']) ? $edit['ERTotal6'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['ERDate7']) ? $edit['ERDate7'] : ""; ?></td>
    <td><?php echo !empty($edit['ERDescription7']) ? $edit['ERDescription7'] : ""; ?></td>
    <td><?php echo !empty($edit['ERJobNo7']) ? $edit['ERJobNo7'] : ""; ?></td>
    <td><?php echo !empty($edit['office_7']) ? $edit['office_7'] : ""; ?></td>
    <td><?php echo !empty($edit['Auto_7']) ? $edit['Auto_7'] : ""; ?></td>
    <td><?php echo !empty($edit['empl_7']) ? $edit['empl_7'] : ""; ?></td>
    <td><?php echo !empty($edit['ent_7']) ? $edit['ent_7'] : ""; ?></td>
    <td><?php echo !empty($edit['travel_7']) ? $edit['travel_7'] : ""; ?></td>
    <td><?php echo !empty($edit['misc_7']) ? $edit['misc_7'] : ""; ?></td>
    <td><?php echo !empty($edit['others1_7']) ? $edit['others1_7'] : ""; ?></td>
    <td><?php echo !empty($edit['others2_7']) ? $edit['others2_7'] : ""; ?></td>
    <td><?php echo !empty($edit['others3_7']) ? $edit['others3_7'] : ""; ?></td>
    <td><?php echo !empty($edit['ERPAMilage7']) ? $edit['ERPAMilage7'] : ""; ?></td>
    <td><?php echo !empty($edit['ERPAMilage7']) ? $edit['ERPAMilage7'] : ""; ?></td>
    <td><?php echo !empty($edit['ERTotal7']) ? $edit['ERTotal7'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['ERDate8']) ? $edit['ERDate8'] : ""; ?></td>
    <td><?php echo !empty($edit['ERDescription8']) ? $edit['ERDescription8'] : ""; ?></td>
    <td><?php echo !empty($edit['ERJobNo8']) ? $edit['ERJobNo8'] : ""; ?></td>
    <td><?php echo !empty($edit['office_8']) ? $edit['office_8'] : ""; ?></td>
    <td><?php echo !empty($edit['Auto_8']) ? $edit['Auto_8'] : ""; ?></td>
    <td><?php echo !empty($edit['empl_8']) ? $edit['empl_8'] : ""; ?></td>
    <td><?php echo !empty($edit['ent_8']) ? $edit['ent_8'] : ""; ?></td>
    <td><?php echo !empty($edit['travel_8']) ? $edit['travel_8'] : ""; ?></td>
    <td><?php echo !empty($edit['misc_8']) ? $edit['misc_8'] : ""; ?></td>
    <td><?php echo !empty($edit['others1_8']) ? $edit['others1_8'] : ""; ?></td>
    <td><?php echo !empty($edit['others2_8']) ? $edit['others2_8'] : ""; ?></td>
    <td><?php echo !empty($edit['others3_8']) ? $edit['others3_8'] : ""; ?></td>
    <td><?php echo !empty($edit['ERPAMilage8']) ? $edit['ERPAMilage8'] : ""; ?></td>
    <td><?php echo !empty($edit['ERPAMilage8']) ? $edit['ERPAMilage8'] : ""; ?></td>
    <td><?php echo !empty($edit['ERTotal8']) ? $edit['ERTotal8'] : ""; ?></td>
  </tr>
  </tbody>
  </table>
  </div>
  </div>
  </div>
  </div>


  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">LESS CASH ADVANCE</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputState" value="<?php echo !empty($edit['ERCashAdvance']) ? $edit['ERCashAdvance'] : ""; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">RE-IMBURSEMENT</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputZip" value="<?php echo !empty($edit['ERReimbursement']) ? $edit['ERReimbursement'] : ""; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">CHECK NO</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputWeather" value="<?php echo !empty($edit['CheckNo']) ? $edit['CheckNo'] : ""; ?>">
    </div>
</div>
 


 

 <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Image Attachments</label>
   
  <?php
  $images1 = explode(",", trim($edit['images_uploaded'],","));
  foreach($images1 AS $image1){ ?>
      <?php echo !empty($image1) ? '<img width="200" src="http://primetech.digisarathi.net/ConstructionAPI/images/'.$image1.'"' : ""; ?><br/>
      <?php } ?>
  </div>


   <div class="form-group no-print">
    <div class="col-sm-offset-5 col-sm-7">
     <!-- <input type="submit" name="btnSubmit" value="Submit" class="btn btn-success">
	  <a href="index.php?page_name=manage-projects" class="btn btn-danger">Cancel</a>-->
    </div>
  </div>
</form>

</div>