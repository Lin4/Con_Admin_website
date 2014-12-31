<?php
$page_title = 'Compliance Reports';

if(!empty($_GET['action']) && $_GET['action'] == 'edit'){
$cnno = !empty($_GET['cnno']) ? $_GET['cnno'] : "";
$project_id = !empty($_GET['pid']) ? $_GET['pid'] : "";
$url = 'http://primetech.digisarathi.net/contructionapi.php/api/compliance/single/Lin/'.$cnno;
$responseArray = $curl->curlGetMethod($url);
//print_r($responseArray);
$edit = $responseArray['complianceReportNo'];
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

<div class="pull-right no-print">
	<div class="btn-group">
        <a href="javascript:window.print()" title="Print" value="Print" class="btn btn-default" type="button">Print</a>

        <!--<a href="#" class="btn btn-default" title="Email" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-envelope"></span></a>-->
		<a href="index.php?page_name=compliance-reports&pid=<?php echo $project_id; ?>" class="btn btn-default" title="Go to All <?php echo $page_title; ?>" >Back</a>
    </div> 
</div>

<div class="jumbotron">
<div class="row">
  <div class="col-md-3"><img src="assets/img/Prime-Tech-Logo.png"></div>
  <div class="col-md-5"><h2><?php echo $page_title; ?></h2></div>
  <div class="col-md-4"><br><img src="assets/img/CardinalLogoWeb2.png"></div>
</div>
<hr/>
<form class="form validation" method="post" name="projectForm" role="form">
<input type="hidden" class="form-control" name="inputEditId" value="<?php echo !empty($edit['id']) ? $edit['id'] : ""; ?>">
<div class="form-group">
    <label for="inputEmail3" class=" control-label">Compliance Notice No</label>
        <input type="text" class="form-control" name="inputProjectId" value="<?php echo !empty($edit['complianceReportNo']) ? $edit['complianceReportNo'] : ""; ?>">
  </div>
 <!-- <div class="form-group">
    <label for="inputEmail3" class=" control-label">Approved</label>
        <input type="text" class="form-control" name="inputProjectId" value="<?php echo !empty($edit['isApproved']) ? $edit['isApproved'] : ""; ?>">
  </div>-->
<div class="form-group">
    <label for="inputEmail3" class=" control-label">Contract No</label>
        <input type="text" class="form-control" name="inputProjectId" value="<?php echo !empty($edit['ContractNo']) ? $edit['ContractNo'] : ""; ?>">
  </div>
<div class="form-group">
    <label for="inputEmail3" class=" control-label">Project id</label>
        <input type="text" class="form-control" name="inputProjectId" value="<?php echo !empty($edit['Project_id']) ? $edit['Project_id'] : ""; ?>">
  </div>
	 <div class="form-group">
    <label for="inputtext3" class=" control-label">Project Description</label>
          <textarea class="form-control" name="inputProjectDescription"><?php echo !empty($edit['p_description']) ? $edit['p_description'] : ""; ?></textarea>
   </div>
  <div class="form-group">
    <label for="inputtext3" class=" control-label">Title</label>
          <input type="text" class="form-control" name="inputTitle" value="<?php echo !empty($edit['Title']) ? $edit['Title'] : ""; ?>">
   </div>
  <div class="form-group">
    <label for="inputtext3" class=" control-label">Project</label>
          <input type="text" class="form-control" name="inputName" value="<?php echo !empty($edit['p_name']) ? $edit['p_name'] : ""; ?>">
    </div>

  <div class="form-group">
    <label for="inputtext3" class=" control-label">Date Issued</label>
          <input type="text" class="form-control datepicker" name="inputDate" value="<?php echo !empty($edit['DateIssued']) ? date('Y-m-d', strtotime($edit['DateIssued'])) : ""; ?>">
  </div>
   <div class="form-group">
    <label for="inputtext3" class=" control-label">Contractor Responsible</label>
          <textarea class="form-control" name="inputDescription" rows="10"><?php echo !empty($edit['ContractorResponsible']) ? $edit['ContractorResponsible'] : ""; ?></textarea>
    </div>

  <div class="form-group">
    <label for="inputtext3" class=" control-label">To</label>
          <input type="text" class="form-control" name="inputName" value="<?php echo !empty($edit['To']) ? $edit['To'] : ""; ?>">
   </div>
    <div class="form-group">
    <label for="inputtext3" class=" control-label">Date Contractor Started</label>
          <input type="text" class="form-control datepicker" name="inputDate" value="<?php echo !empty($edit['DateContractorStarted']) ? date('Y-m-d', strtotime($edit['DateContractorStarted'])) : ""; ?>">
  </div>
    <div class="form-group">
    <label for="inputtext3" class=" control-label">Date Contractor Completed</label>
          <input type="text" class="form-control datepicker" name="inputDate" value="<?php echo !empty($edit['DateContractorCompleted']) ? date('Y-m-d', strtotime($edit['DateContractorCompleted'])) : ""; ?>">
   </div>
    <div class="form-group">
    <label for="inputtext3" class=" control-label">Date of DWR Reported</label>
          <input type="text" class="form-control datepicker" name="inputDate" value="<?php echo !empty($edit['DateOfDWRReported']) ? date('Y-m-d', strtotime($edit['DateOfDWRReported'])) : ""; ?>">
  </div>
  <div class="form-group">
    <label for="inputtext3" class=" control-label">Corrective Action Compliance</label>
          <textarea class="form-control" name="inputDescription" rows="10"><?php echo !empty($edit['CorrectiveActionCompliance']) ? $edit['CorrectiveActionCompliance'] : ""; ?></textarea>
   </div>
    <div class="form-group">
    <label for="inputtext3" class=" control-label">Signature</label><br/>
         <?php echo !empty($edit['Signature']) ? '<img width="200" src="http://primetech.digisarathi.net/ConstructionAPI/images/'.$edit['Signature'].'" />' : ""; ?>
  </div>
  <div class="form-group">
    <label for="inputtext3" class=" control-label">Printed Name</label><br/>
          <input type="text" class="form-control" name="inputState" value="<?php echo !empty($edit['PrintedName']) ? $edit['PrintedName'] : ""; ?>">
  </div>
  
   <div class="form-group">
    <label for="inputtext3" class=" control-label">Date</label>
         <input type="text" class="form-control datepicker" name="inputDate" value="<?php echo !empty($edit['Date']) ? date('Y-m-d', strtotime($edit['Date'])) : ""; ?>">
  </div>
  <div class="form-group">
    <label for="inputtext3" class="control-label">Image Attachments</label>
   
  <?php
  $images1 = explode(",", trim($edit['images_uploaded'],","));
  foreach($images1 AS $image1){ ?>
      <?php echo !empty($image1) ? '<img width="200" src="http://primetech.digisarathi.net/ConstructionAPI/images/'.$image1.'"' : ""; ?><br/>
      <?php } ?>
  </div>

 <!-- <div class="form-group">
    <label for="inputtext3" class="control-label">Sketch Attachments</label>
   
  <?php
  $images2 = explode(",", trim($edit['sketch_images'],","));
  foreach($images2 AS $image2){ ?>
      <?php echo !empty($image2) ? '<img width="200" src="http://primetech.digisarathi.net/ConstructionAPI/images/'.$image2.'"' : ""; ?> <br/>
    <?php } ?>
  </div>-->
  
   <div class="form-group no-print">
    <div class="col-sm-offset-5 col-sm-7">
      <!--<input type="submit" name="btnSubmit" value="Submit" class="btn btn-success">-->
	 <!-- <a href="index.php?page_name=manage-projects" class="btn btn-danger">Cancel</a>-->
    </div>
  </div>
</form>

</div>