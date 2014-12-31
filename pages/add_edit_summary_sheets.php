<?php
$page_title = 'Compliance Reports';

if(!empty($_GET['action']) && $_GET['action'] == 'edit'){
$inno = !empty($_GET['inno']) ? $_GET['inno'] : "";
$url = 'http://primetech.digisarathi.net/contructionapi.php/api/dailyinspection/single/'.$_SESSION['username'].'/'.$inno;
$responseArray = $curl->curlGetMethod($url);
print_r($responseArray);
$edit = $responseArray['dailyinspection'];
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

<legend><?php echo $page_title; ?> <a href="index.php?page_name=daily-inspection-reports&pid=<?php echo !empty($edit['ContractNo']) ? $edit['ContractNo'] : ""; ?>" class="btn btn-success btn-xs pull-right">Manage Reports</a></legend>
<form class="form-horizontal validation" method="post" name="projectForm" role="form">
<input type="hidden" class="form-control" name="inputEditId" value="<?php echo !empty($edit['id']) ? $edit['id'] : ""; ?>">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Contractor</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputProjectId" value="<?php echo !empty($edit['Contractor']) ? $edit['Contractor'] : ""; ?>">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Contractor Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputProjectId" value="<?php echo !empty($edit['Non_ComplianceNoticeNo']) ? $edit['Non_ComplianceNoticeNo'] : ""; ?>" readonly>
    </div>
  </div>

  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Address</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputTitle" value="<?php echo !empty($edit['P_O_Box']) ? $edit['P_O_Box'] : ""; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">State</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputName" value="<?php echo !empty($edit['State']) ? $edit['State'] : ""; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Zip Code</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['Zip_Code']) ? $edit['Zip_Code'] : ""; ?>">
    </div>
  </div>
   <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Telephone Number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputPhone" value="<?php echo !empty($edit['Telephone_No']) ? $edit['Telephone_No'] : ""; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Competent Person</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputName" value="<?php echo !empty($edit['CompetentPerson']) ? $edit['CompetentPerson'] : ""; ?>">
    </div>
  </div>
    <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Town/City</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['Town_City']) ? $edit['Town_City'] : ""; ?>">
    </div>
  </div>
    <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Weather</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['weather']) ? $edit['weather'] : ""; ?>">
    </div>
  </div>
    <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Time</label>
    <div class="col-sm-10">
      <input type="text" class="form-control datepicker" name="inputDate" value="<?php echo !empty($edit['DateContractorCompleted']) ? date('Y-m-d', strtotime($edit['DateContractorCompleted'])) : ""; ?>">
    </div>
  </div>
    <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Project</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['Project']) ? $edit['Project'] : ""; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['E_Mail']) ? $edit['E_Mail'] : ""; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Work Done By Contractor</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="inputDescription" rows="3"><?php echo !empty($edit['WorkDoneBy']) ? $edit['WorkDoneBy'] : ""; ?></textarea>
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
		<th>Description</th>
		<th>Quantity</th>
	</tr>
	</thead>
	<tbody>
		<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	</tbody>
  </table>
  </div>
  </div>
  </div>
  </div>
 
   <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
<div class="panel panel-default">
  <div class="panel-heading">Official Visitors to Job</div>
  <div class="panel-body">
  <table class="table table-bordered">
	<thead>
	<tr>
		<th>Name</th>
		<th>Title</th>
	</tr>
	</thead>
	<tbody>
		<tr>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
	</tbody>
  </table>
  </div>
  </div>
  </div>
  </div>

    <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
<div class="panel panel-default">
  <div class="panel-heading">Inspection Force</div>
  <div class="panel-body">
  <table class="table table-bordered">
	<thead>
	<tr>
		<th>Name</th>
		<th>Title</th>
	</tr>
	</thead>
	<tbody>
		<tr>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
	</tbody>
  </table>
  </div>
  </div>
  </div>
  </div>

    <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
<div class="panel panel-default">
  <div class="panel-heading">Work Done By Others</div>
  <div class="panel-body">
  <table class="table table-bordered">
	<thead>
	<tr>
		<th>Name</th>
		<th>Title</th>
	</tr>
	</thead>
	<tbody>
		<tr>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
	</tbody>
  </table>
  </div>
  </div>
  </div>
  </div>
     <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Hours of work</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['ContractorsHoursOfWork']) ? $edit['ContractorsHoursOfWork'] : ""; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Inspection Incharge</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputDate" value="<?php echo !empty($edit['E_Mail']) ? $edit['E_Mail'] : ""; ?>">
    </div>
  </div>
    <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">Signature</label>
    <div class="col-sm-10">
     <?php echo !empty($edit['Signature']) ? '<img width="200" src="http://primetech.digisarathi.net/ConstructionAPI/images/'.$edit['Signature'].'" />' : ""; ?>
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