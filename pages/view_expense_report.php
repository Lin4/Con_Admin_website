<?php
$page_title = 'Compliance Reports';

if(!empty($_GET['action']) && $_GET['action'] == 'edit'){
$cnno = !empty($_GET['cnno']) ? $_GET['cnno'] : "";
$url = 'http://primetech.digisarathi.net/contructionapi.php/api/noncompliance/single/Lin/'.$cnno;
$responseArray = $curl->curlGetMethod($url);
//print_r($responseArray);
$edit = $responseArray['nonComplianceForm'];
//print_r($edit);
$page_title = 'Compliance Reports';

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

	

<div class="well">

<legend><?php echo $page_title; ?> <a href="index.php?page_name=non-compliance-reports&pid=<?php echo !empty($edit['ContractNo']) ? $edit['ContractNo'] : ""; ?>" class="btn btn-success btn-xs pull-right">Manage Reports</a></legend>
<form class="form-horizontal validation" method="post" name="projectForm" role="form">
<input type="hidden" class="form-control" name="inputEditId" value="<?php echo !empty($edit['id']) ? $edit['id'] : ""; ?>">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Contract No</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputProjectId" value="<?php echo !empty($edit['ContractNo']) ? $edit['ContractNo'] : ""; ?>">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Non Compliance Notice Number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputProjectId" value="<?php echo !empty($edit['Non_ComplianceNoticeNo']) ? $edit['Non_ComplianceNoticeNo'] : ""; ?>" readonly>
    </div>
  </div>
   <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Project Description</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="inputDescription" rows="3"><?php echo !empty($edit['ContractorResponsible']) ? $edit['ContractorResponsible'] : ""; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputTitle" value="<?php echo !empty($edit['Title']) ? $edit['Title'] : ""; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Project</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputName" value="<?php echo !empty($edit['Project']) ? $edit['Project'] : ""; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Date Issued</label>
    <div class="col-sm-10">
      <input type="text" class="form-control datepicker" name="inputDate" value="<?php echo !empty($edit['DateIssued']) ? date('Y-m-d', strtotime($edit['DateIssued'])) : ""; ?>">
    </div>
  </div>
   <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Contractor Responsible</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="inputDescription" rows="3"><?php echo !empty($edit['ContractorResponsible']) ? $edit['ContractorResponsible'] : ""; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">To</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputName" value="<?php echo !empty($edit['To']) ? $edit['To'] : ""; ?>">
    </div>
  </div>
    <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Date Contractor Is Required to Complete By</label>
    <div class="col-sm-10">
      <input type="text" class="form-control datepicker" name="inputDate" value="<?php echo !empty($edit['DateContractorStarted']) ? date('Y-m-d', strtotime($edit['DateContractorStarted'])) : ""; ?>">
    </div>
  </div>
    <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Date Contractor Stated</label>
    <div class="col-sm-10">
      <input type="text" class="form-control datepicker" name="inputDate" value="<?php echo !empty($edit['DateContractorCompleted']) ? date('Y-m-d', strtotime($edit['DateContractorCompleted'])) : ""; ?>">
    </div>
  </div>
    <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Date Contractor Completed</label>
    <div class="col-sm-10">
      <input type="text" class="form-control datepicker" name="inputDate" value="<?php echo !empty($edit['DateContractorCompleted']) ? date('Y-m-d', strtotime($edit['DateContractorCompleted'])) : ""; ?>">
    </div>
  </div>
    <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Date of DWR Reported</label>
    <div class="col-sm-10">
      <input type="text" class="form-control datepicker" name="inputDate" value="<?php echo !empty($edit['DateOfDWRReported']) ? date('Y-m-d', strtotime($edit['DateOfDWRReported'])) : ""; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Corrective Action Compliance</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="inputDescription" rows="3"><?php echo !empty($edit['DescriptionOfNonCompliance']) ? $edit['DescriptionOfNonCompliance'] : ""; ?></textarea>
    </div>
  </div>
    <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Signature</label>
    <div class="col-sm-10">
     <?php echo !empty($edit['Signature']) ? '<img width="200" src="http://primetech.digisarathi.net/noncompliance/'.$edit['Signature'].'.jpg" />' : ""; ?>
    </div>
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Printed Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputState" value="<?php echo !empty($edit['PrintedName']) ? $edit['PrintedName'] : ""; ?>">
    </div>
  </div>
  
   <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Date</label>
    <div class="col-sm-10">
      <input type="text" class="form-control datepicker" name="inputDate" value="<?php echo !empty($edit['Date']) ? date('Y-m-d', strtotime($edit['Date'])) : ""; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Image Attachments</label>
    <div class="col-sm-10">
	<?php
	$images1 = explode(",", trim($edit['images_uploaded'],","));
	foreach($images1 AS $image1){ ?>
      <?php echo !empty($image1) ? '<img width="200" src="http://primetech.digisarathi.net/ConstructionAPI/images/'.$image1.'"' : ""; ?><br/>
      <?php } ?>
	</div>
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Sketch Attachments</label>
    <div class="col-sm-10">
	<?php
	$images2 = explode(",", trim($edit['sketch_images'],","));
	foreach($images2 AS $image2){ ?>
      <?php echo !empty($image2) ? '<img width="200" src="http://primetech.digisarathi.net/ConstructionAPI/images/'.$image2.'"' : ""; ?> <br/>
    <?php } ?>
	</div>
  </div>
  
   <div class="form-group">
    <div class="col-sm-offset-5 col-sm-7">
      <input type="submit" name="btnSubmit" value="Submit" class="btn btn-success">
	  <a href="index.php?page_name=manage-projects" class="btn btn-danger">Cancel</a>
    </div>
  </div>
</form>

</div>