<?php
$page_title = 'Daily Inspection Report';


if(!empty($_GET['action']) && $_GET['action'] == 'edit'){
$inno = !empty($_GET['inno']) ? $_GET['inno'] : "";
$project_id = !empty($_GET['pid']) ? $_GET['pid'] : "";
$editId = !empty($_GET['editId']) ? $_GET['editId'] : "";
$url = 'http://primetech.digisarathi.net/contructionapi.php/api/dailyinspection/single/'.$_SESSION['username'].'/'.$inno;
$responseArray = $curl->curlGetMethod($url);
//print_r($responseArray);

$item_url = 'http://primetech.digisarathi.net/contructionapi.php/api/quantity_summary/itemByINID/'.$_SESSION['username'].'/'.$inno;
$itemResponseArray = $curl->curlGetMethod($item_url);
//print_r($itemResponseArray);
if($itemResponseArray['message']['status'] != 'failed'){
$items = $itemResponseArray['quantity_items'];
}
//print_r($items);
$edit = $responseArray['dailyinspection'];
//print_r($edit);
$page_title = 'Daily Inspection Report';

}

if(!empty($_POST) && !empty($_POST['btnSubmit'])){
$address = $_POST['inputAddress'];
$city = $_POST['inputCity'];
$state = $_POST['inputState'];
$zip = $_POST['inputZip'];
$phone = $_POST['inputPhone'];
$date = $_POST['inputDate'];
$competentPerson = $_POST['inputCompetentPerson'];
$town = $_POST['inputTown'];
$weather = $_POST['inputWeather'];
$time = $_POST['inputTime'];
$project = $_POST['inputProject'];
$email = $_POST['inputEmail'];
$workDoneBy = $_POST['inputWorkDoneBy'];
$contractorsHoursOfWork = $_POST['inputContractorsHoursOfWork'];
$inspectionIncharge = $_POST['inputInspectionIncharge'];

if(!empty($_POST['inputEditId'])){
	$url = 'http://primetech.digisarathi.net/contructionapi.php/api/dailyinspection/update/Art/'.$editId.'/'.$address.'/'.$city.'/'.$state.'/'.$zip.'/'.$phone.'/'.$date.'/'.$competentPerson.'/'.$town.'/'.$weather.'/'.$time.'/'.$project.'/'.$email.'/'.$workDoneBy.'/'.$contractorsHoursOfWork.'/'.$inspectionIncharge;
$curl->curlPostMethod($url);
	} else {
	$url = '';
}

}

?>

	
<div class="pull-right no-print">
<div class="btn-group">
        <a href="javascript:window.print()" title="Print" class="btn btn-default" type="button">Print</a>
        <!--<a href="#" class="btn btn-default" title="Email" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-envelope"></span></a>-->
		<a href="index.php?page_name=daily-inspection-reports&pid=<?php echo $project_id; ?>" class="btn btn-default" title="Go to All <?php echo $page_title; ?>" >Back</a>
         </div>
</div>
<div class="jumbotron">
<div class="row">
	<div class="col-md-3"><img src="assets/img/Prime-Tech-Logo.png"></div>
	<div class="col-md-5"><h2><?php echo $page_title; ?></h2></div>
	<div class="col-md-4"><br><img src="assets/img/CardinalLogoWeb2.png"></div>
</div>


<div class="row">
<div class="form-group">
<div class="col-md-3"><h4>PRIME AE GROUP,Inc</h4>
                        <h5>Capital Blvd.,2nd Floor Rocky Hill,</h5>
                         <h5>Connecticut 06067</h5>
                          <h5>Tel. (860) 436-5600</h5>
  </div>
  <div class="col-md-5"><h4>CONTRACTOR:</h4>
                        <h5>Northeast Remsco,</h5>
                         <h5>Construction.(NRC)</h5>
  </div>
<div class="col-md-4"><h4>REPORT NO:<?php echo !empty($edit['report_No']) ? $edit['report_No'] : ""; ?></h4>
                        <h5>COMPETENT PERSON: William Clayton</h5>
                        <h5>City of Middletown, Water & Sewer Department</h5>
  </div>
  </div>
</div>
<div class="row">
<div class="col-md-3"><h5>PRIME JOB NO:<?php echo !empty($edit['report_No']) ? $edit['report_No'] : ""; ?></h5>
                       <h5>DATE:<?php echo !empty($edit['Date']) ? $edit['Date'] : ""; ?></h5>
                        <h5>ORG. CALENDAR DAYS: 540</h5>
                          <h5>DAYS USED:<?php echo !empty($edit['calendar_Days_Used']) ? $edit['calendar_Days_Used'] : ""; ?></h5>
  </div>
  <div class="col-md-5"><h5>ADDRESS:</h5>
                        <h5>1433 Rt.34, Bldg.B,</h5>
                         <h5>Farmingdale.NJ 07727</h5>
                         <h5>Tel:732-557-61003</h5>
  </div>
<div class="col-md-4"><h5>PROJECT: Mattabasset Force Main Sewer</h5>
                        <h5>CONTRACT NO: 2013-008</h5>
                        <h5>TOWN/CITY: Middletown & Cromwell,CT</h5>
                         
  </div>

</div>
<div class="row">
<div class="col-md-3"><h5>WEATHER: TEMP F  SKY</h5>
                       <h5><?php echo !empty($edit['weather']) ? $edit['weather'] : ""; ?></h5>
                        
  </div>
  <div class="col-md-5"><h5>REPORTED BY: RAE</h5>
                        <h5>NO.OF PAGES IN REPORT: 2</h5>
                         <h5>Cardinal Engineering</h5>
                         <h5>Associates, Meriden CT.</h5>
  </div>
<div class="col-md-4"><h5>Connecticut Department of Energy and</h5>
                        <h5>Environmental Protection</h5>
                        <h5>CT DEEP CWF-487C</h5>
                       <h4>CEA JOB NUMBER:<?php echo !empty($edit['ceaJobNumber']) ? $edit['ceaJobNumber'] : ""; ?></h4>
                         
  </div>

</div>

<hr/>
<form class="form-horizontal validation" method="post" name="projectForm" role="form">
<input type="hidden" class="form-control" name="inputEditId" value="<?php echo !empty($editId) ? $editId : ""; ?>">
  <div class="form-group">
    <label for="inputEmail3" class="control-label">WORK DONE BY CONTRACTOR</label>
     <textarea class="form-control" name="inputWorkDoneBy" rows="12"><?php echo !empty($edit['WorkDoneBy']) ? $edit['WorkDoneBy'] : ""; ?></textarea>
   
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label"></label>
    <div class="panel panel-default">
  <div class="panel-heading">EQUIPMENT</div>
  <div class="panel-body">
  <table class="table table-bordered">
  <thead>
  <tr>
    <th>Description</th>
    <th>Quantity</th>
    </tr>
  </thead>
  <tbody>
  <tr>
    <td><?php echo !empty($edit['I_Desc1']) ? $edit['I_Desc1'] : ""; ?></td>
    <td><?php echo !empty($edit['I_QTY1']) ? $edit['I_QTY1'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['I_Desc2']) ? $edit['I_Desc2'] : ""; ?></td>
    <td><?php echo !empty($edit['I_QTY2']) ? $edit['I_QTY2'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['I_Desc3']) ? $edit['I_Desc3'] : ""; ?></td>
    <td><?php echo !empty($edit['I_QTY3']) ? $edit['I_QTY3'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['I_Desc4']) ? $edit['I_Desc4'] : ""; ?></td>
    <td><?php echo !empty($edit['I_QTY4']) ? $edit['I_QTY4'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['I_Desc5']) ? $edit['I_Desc5'] : ""; ?></td>
    <td><?php echo !empty($edit['I_QTY5']) ? $edit['I_QTY5'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['I_Desc6']) ? $edit['I_Desc6'] : ""; ?></td>
    <td><?php echo !empty($edit['I_QTY6']) ? $edit['I_QTY6'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['I_Desc7']) ? $edit['I_Desc7'] : ""; ?></td>
    <td><?php echo !empty($edit['I_QTY7']) ? $edit['I_QTY7'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['I_Desc8']) ? $edit['I_Desc8'] : ""; ?></td>
    <td><?php echo !empty($edit['I_QTY8']) ? $edit['I_QTY8'] : ""; ?></td>
  </tr>

  </tbody>
  </table>
  </div>
  </div>
  </div>
 <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label"></label>
    <div class="panel panel-default">
  <div class="panel-heading">LABOR</div>
  <div class="panel-body">
  <table class="table table-bordered">
  <thead>
  <tr>
    <th>LABOR</th>
    <th>QTY</th>
    <th>OFFICIAL VISITORS TO JOB</th>
    <th>TITLE</th>
  </tr>
  </thead>
  <tbody>
    <tr>
    <td><?php echo !empty($edit['labor_1']) ? $edit['labor_1'] : ""; ?></td>
    <td><?php echo !empty($edit['labor_qty_1']) ? $edit['labor_qty_1'] : ""; ?></td>
    <td><?php echo !empty($edit['OVJName1']) ? $edit['OVJName1'] : ""; ?></td>
    <td><?php echo !empty($edit['OVJTitle1']) ? $edit['OVJTitle1'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['labor_2']) ? $edit['labor_2'] : ""; ?></td>
    <td><?php echo !empty($edit['labor_qty_2']) ? $edit['labor_qty_2'] : ""; ?></td>
    <td><?php echo !empty($edit['OVJName2']) ? $edit['OVJName2'] : ""; ?></td>
    <td><?php echo !empty($edit['OVJTitle2']) ? $edit['OVJTitle2'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['labor_3']) ? $edit['labor_3'] : ""; ?></td>
    <td><?php echo !empty($edit['labor_qty_3']) ? $edit['labor_qty_3'] : ""; ?></td>
    <td><?php echo !empty($edit['OVJName3']) ? $edit['OVJName3'] : ""; ?></td>
    <td><?php echo !empty($edit['OVJTitle3']) ? $edit['OVJTitle3'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['labor_4']) ? $edit['labor_4'] : ""; ?></td>
    <td><?php echo !empty($edit['labor_qty_4']) ? $edit['labor_qty_4'] : ""; ?></td>
    <td><?php echo !empty($edit['OVJName4']) ? $edit['OVJName4'] : ""; ?></td>
    <td><?php echo !empty($edit['OVJTitle4']) ? $edit['OVJTitle4'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['labor_5']) ? $edit['labor_5'] : ""; ?></td>
    <td><?php echo !empty($edit['labor_qty_5']) ? $edit['labor_qty_5'] : ""; ?></td>
    <td><?php echo !empty($edit['OVJName5']) ? $edit['OVJName5'] : ""; ?></td>
    <td><?php echo !empty($edit['OVJTitle5']) ? $edit['OVJTitle5'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['labor_6']) ? $edit['labor_6'] : ""; ?></td>
    <td><?php echo !empty($edit['labor_qty_6']) ? $edit['labor_qty_6'] : ""; ?></td>
    <td><?php echo !empty($edit['OVJName6']) ? $edit['OVJName6'] : ""; ?></td>
    <td><?php echo !empty($edit['OVJTitle6']) ? $edit['OVJTitle6'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['labor_7']) ? $edit['labor_7'] : ""; ?></td>
    <td><?php echo !empty($edit['labor_qty_7']) ? $edit['labor_qty_7'] : ""; ?></td>
    <td><?php echo !empty($edit['OVJName7']) ? $edit['OVJName7'] : ""; ?></td>
    <td><?php echo !empty($edit['OVJTitle7']) ? $edit['OVJTitle7'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['labor_8']) ? $edit['labor_8'] : ""; ?></td>
    <td><?php echo !empty($edit['labor_qty_8']) ? $edit['labor_qty_8'] : ""; ?></td>
    <td><?php echo !empty($edit['OVJName8']) ? $edit['OVJName8'] : ""; ?></td>
    <td><?php echo !empty($edit['OVJTitle18']) ? $edit['OVJTitle8'] : ""; ?></td>
  </tr>
  </tbody>
  </table>
  </div>
  </div>
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label"></label>
   <div class="panel panel-default">
  <div class="panel-heading">INSPECTION FORCE</div>
  <div class="panel-body">
  <table class="table table-bordered">
  <thead>
  <tr>
    <th>NAME</th>
    <th>TITLE</th>
  </tr>
  </thead>
  <tbody>
    <tr>
    <td><?php echo !empty($edit['IFName1']) ? $edit['IFName1'] : ""; ?></td>
    <td><?php echo !empty($edit['IFTitle1']) ? $edit['IFTitle1'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['IFName2']) ? $edit['IFName2'] : ""; ?></td>
    <td><?php echo !empty($edit['IFTitle2']) ? $edit['IFTitle2'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['IFName3']) ? $edit['IFName3'] : ""; ?></td>
    <td><?php echo !empty($edit['IFTitle3']) ? $edit['IFTitle3'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['IFName4']) ? $edit['IFName4'] : ""; ?></td>
    <td><?php echo !empty($edit['IFTitle4']) ? $edit['IFTitle4'] : ""; ?></td>
  </tr>
  </tbody>
  </table>
  </div>
  </div>
  </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label"></label>
   <div class="panel panel-default">
  <div class="panel-heading">WORK DONE BY OTHERS</div>
  <div class="panel-body">
  <table class="table table-bordered">
  <thead>
  <tr>
    <th>DEPT. OR COMPANY</th>
    <th>DESCRIPTION OF WORK</th>
  </tr>
  </thead>
  <tbody>
    <tr>
    <td><?php echo !empty($edit['WDODepartmentOrCompany1']) ? $edit['WDODepartmentOrCompany1'] : ""; ?></td>
    <td><?php echo !empty($edit['WDODescriptionOfWork1']) ? $edit['WDODescriptionOfWork1'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['WDODepartmentOrCompany2']) ? $edit['WDODepartmentOrCompany2'] : ""; ?></td>
    <td><?php echo !empty($edit['WDODescriptionOfWork2']) ? $edit['WDODescriptionOfWork2'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['WDODepartmentOrCompany3']) ? $edit['WDODepartmentOrCompany3'] : ""; ?></td>
    <td><?php echo !empty($edit['WDODescriptionOfWork3']) ? $edit['WDODescriptionOfWork3'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['WDODepartmentOrCompany4']) ? $edit['WDODepartmentOrCompany4'] : ""; ?></td>
    <td><?php echo !empty($edit['WDODescriptionOfWork4']) ? $edit['WDODescriptionOfWork4'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['WDODepartmentOrCompany5']) ? $edit['WDODepartmentOrCompany5'] : ""; ?></td>
    <td><?php echo !empty($edit['WDODescriptionOfWork5']) ? $edit['WDODescriptionOfWork5'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['WDODepartmentOrCompany6']) ? $edit['WDODepartmentOrCompany6'] : ""; ?></td>
    <td><?php echo !empty($edit['WDODescriptionOfWork6']) ? $edit['WDODescriptionOfWork6'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['WDODepartmentOrCompany7']) ? $edit['WDODepartmentOrCompany7'] : ""; ?></td>
    <td><?php echo !empty($edit['WDODescriptionOfWork7']) ? $edit['WDODescriptionOfWork7'] : ""; ?></td>
  </tr>
  <tr>
    <td><?php echo !empty($edit['WDODepartmentOrCompany8']) ? $edit['WDODepartmentOrCompany8'] : ""; ?></td>
    <td><?php echo !empty($edit['WDODescriptionOfWork8']) ? $edit['WDODescriptionOfWork8'] : ""; ?></td>
  </tr>
  </tbody>
  </table>
  </div>
  </div>
  </div>
 <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">HOURS OF WORK:</label>
    <input type="text" class="form-control" name="inputContractorsHoursOfWork" value="<?php echo !empty($edit['ContractorsHoursOfWork']) ? $edit['ContractorsHoursOfWork'] : ""; ?>">
    </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">REVIEWED BY:</label>
    <input type="text" class="form-control" name="inputInspectionIncharge" value="<?php echo !empty($edit['reviewedBy']) ? $edit['reviewedBy'] : ""; ?>">
    </div>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">SIGNATURE</label>
    <?php echo !empty($edit['InspectorSign']) ? '<img width="300" height="100"src="http://primetech.digisarathi.net/ConstructionAPI/images/'.$edit['InspectorSign'].'" />' : ""; ?>
    </div>
 <?php
  $images1 = explode(",", trim($edit['images_uploaded'],","));
    if(!empty($images1)){
    foreach($images1 AS $image1){ ?>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">IMAGE ATTACHMENTS</label>
    <?php echo !empty($image1) ? '<img width="200" src="http://primetech.digisarathi.net/ConstructionAPI/images/'.$image1.'"' : ""; ?><br/>
    </div>
<?php }} ?>
  <?php
  $images2 = explode(",", trim($edit['sketch_images'],","));
  if(!empty($images2)){
  foreach($images2 AS $image2){ ?>
  <div class="form-group">
    <label for="inputtext3" class="col-sm-2 control-label">SKETCH ATTACHMENTS</label>
   <?php echo !empty($image2) ? '<img width="200" src="http://primetech.digisarathi.net/ConstructionAPI/images/'.$image2.'"' : ""; ?> <br/>
    </div>
<?php }} ?> 
   <div class="form-group no-print">
    <div class="col-sm-offset-5 col-sm-7">
     <!-- <input type="submit" name="btnSubmit" value="Submit" class="btn btn-success">
    <a href="index.php?page_name=manage-projects" class="btn btn-danger">Cancel</a>-->
    </div>
  </div>
</form>

</div>