<?php
session_start();
error_reporting(0);
include('include/config.php');
?>
<?php
if(!$_SESSION["username"] && !$_SESSION["userid"]){
  header("Location:../index.php");
}
else{
  
  
?>
<?php
if(isset($_POST['submit']))
  {
    
    $vid=$_GET['viewid'];
    $bp=$_POST['bp'];
    $bs=$_POST['bs'];
    $weight=$_POST['weight'];
    $temp=$_POST['temp'];
   $pres=$_POST['pres'];
   
 
      $query.=mysqli_query($con, "insert   tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres)value('$vid','$bp','$bs','$weight','$temp','$pres')");
    if ($query) {
    echo '<script>alert("Medical record has been added.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
if(isset($_POST['update']))
  {
    
    $vid=$_GET['viewid'];
    $bp=$_POST['bp'];
    $bs=$_POST['bs'];
    $weight=$_POST['weight'];
    $temp=$_POST['temp'];
   $pres=$_POST['pres'];
   
      $query =mysqli_query($con, "UPDATE tblmedicalhistory set BloodPressure='$bp', BloodSugar='$bs', Weight='$weight', Temperature='$temp', MedicalPres='$pres' WHERE PatientID='$vid'");
    if ($query) {
    echo '<script>alert("Medical record has been update successfully!")</script>';
    echo "<script>window.location.href ='view-patient.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}

if(isset($_POST['request']))
  {
    
    $vid=$_GET['viewid'];
    $cardNo=$_POST['cardNo'];
    $docId=$_SESSION['userid'];
    $patfname=$_POST['patfname'];
    $patlname=$_POST['patlname'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $testDate= date('y-m-d h:i:sa');
    $hema=$_POST['hema'];
    $para=$_POST['para'];
    $urin=$_POST['urin'];
    $sero=$_POST['sero'];
    $chem=$_POST['chem'];
    $bact=$_POST['bact'];
    $status=1;
      $query.=mysqli_query($con, "insert   labreport(cardNo,docId,patfname,patlname,age,gender,testDate,hema,para,urin,sero,chem,bact,status)value('$cardNo','$docId','$patfname','$patlname','$age','$gender','$testDate','$hema','$para','$urin','$sero','$chem','$bact','$status')");
    if ($query) {
    echo '<script>alert("Your request sent successfully.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }}
    if(isset($_POST['radiorequest']))
  {
    
    $vid=$_GET['viewid'];
    $cardNo=$_POST['cardNo'];
    $docId=$_SESSION['userid'];
    $patfname=$_POST['patfname'];
    $patlname=$_POST['patlname'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $testDate= date('y-m-d h:i:sa');
    $diag=$_POST['diag'];
    $status=1;
      $query.=mysqli_query($con, "insert   xultrareport(cardNo,docId,patfname,patlname,age,gender,testDate,diag,status)value('$cardNo','$docId','$patfname','$patlname','$age','$gender','$testDate','$diag','$status')");
    if ($query) {
    echo '<script>alert("Your request sent successfully.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }}
    if(isset($_POST['admit']))
  {
    
    $cardNo=$_POST['cardNo'];
    $docId=$_SESSION['userid'];
    $patfname=$_POST['patfname'];
    $patlname=$_POST['patlname'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $adDate= date('y-m-d h:i:sa');
    $drugname=$_POST['drugname'];
    $dose=$_POST['dose'];
    $medstrength=$_POST['medstrength'];
    $duration=$_POST['duration'];
    $docComment=$_POST['docComment'];
    $status=1;
      $query.=mysqli_query($con, "insert   medication(cardNo,patfname,patlname,age,gender,docId,drugname,dose,medstrength,duration,docComment,adDate,status)value('$cardNo','$patfname','$patlname','$age','$gender','$docId','$drugname','$dose','$medstrength','$duration','$docComment','$adDate','$status')");
    if ($query) {
    echo '<script>alert("Medication Prescription sent successfully.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor | Patient Information</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
    <script type="text/javascript">
      function valid(){
          var drugname=document.forms["adddoc"]["drugname"].value;
          var medstrength=document.forms["adddoc"]["medstrength"].value;
          var duration=document.forms["adddoc"]["duration"].value;
          var chk_txt = /^[a-zA-Z]+$/;
          var chk_num=/^[0-9]+$/;
          if ((drugname.search(chk_txt)==-1)) {
            alert("Please insert only character");
            document.adddoc.drugname.focus();
            return false;
          }
          if (medstrength<1) {
            alert("Please insert only postive numbers");
            document.adddoc.medstrength.focus();
            return false;
          }
          if (duration<1) {
            alert("Please insert number greaterthan or equal to one");
            document.adddoc.duration.focus();
            return false;
          }

      }
      function valida(){
          var hema=document.forms["adddocs"]["hema"].value;
          var sero=document.forms["adddocs"]["sero"].value;
          var para=document.forms["adddocs"]["para"].value;
          var chem=document.forms["adddocs"]["chem"].value;
          var urin=document.forms["adddocs"]["urin"].value;
          var bact=document.forms["adddocs"]["bact"].value;
          var chk_txt = /^[a-zA-Z]+$/;
          if ((hema.search(chk_txt)==-1)) {
            alert("Please insert only character");
            document.adddocs.hema.focus();
            return false;
          }
          if ((sero.search(chk_txt)==-1)) {
            alert("Please insert only character");
            document.adddocs.sero.focus();
            return false;
          }
          if ((para.search(chk_txt)==-1)) {
            alert("Please insert only character");
            document.adddocs.para.focus();
            return false;
          }
          if ((chem.search(chk_txt)==-1)) {
            alert("Please insert only character");
            document.adddocs.chem.focus();
            return false;
          }
          if ((urin.search(chk_txt)==-1)) {
            alert("Please insert only character");
            document.adddocs.urin.focus();
            return false;
          }
          if ((bact.search(chk_txt)==-1)) {
            alert("Please insert only character");
            document.adddocs.bact.focus();
            return false;
          }

      }
      function validb(){
          var diag=document.forms["adddocss"]["diag"].value;
          var chk_txt = /^[a-zA-Z]+$/;
          if ((diag.search(chk_txt)==-1)) {
            alert("Please insert only character");
            document.adddocss.diag.focus();
            return false;
          }
        }

    </script>
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
<div class="app-content">
<?php include('include/header.php');?>
<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle">Patient Information</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Doctor</span>
</li>
<li class="active">
<span>Patient Information</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15"><span class="text-bold">Patient Information</span></h5>
<?php
                               $vid=$_GET['viewid'];
                               $ret=mysqli_query($con,"select * from tblpatient where cardNo='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
                               ?>
<table border="1" class="table table-bordered">
 <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 Patient Details</td></tr>

    <tr>
    <th scope>Card Number</th>
    <td><?php  echo $row['cardNo'];?></td>
    <th>Patient Gender</th>
    <td><?php  echo $row['gender'];?></td>
   
    
  </tr>
  <tr>
     <th scope>Patient First Name</th>
    <td><?php  echo $row['patfname'];?></td>

    <th scope>Patient Age</th>
    <td><?php  echo $row['age'];?></td>
    
  </tr>
    <tr>
    <th scope>Patient Last Name</th>
    <td><?php  echo $row['patlname'];?></td>
    <th>Patient Address</th>
    <td><?php  echo $row['address'];?></td>
    
  </tr>
  <tr>
    <th>Patient Telephone</th>
    <td><?php  echo $row['tele'];?></td>
     <th>Patient Registered Date</th>
    <td><?php  echo $row['regDate'];?></td>
  </tr>
</table>
<?php  

$ret=mysqli_query($con,"select * from tblmedicalhistory  where PatientID='$vid'");



 ?>
 <br><br><br>
 <h5 class="over-title margin-bottom-15"><span class="text-bold">Patient Medical History</span></h5>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="8" style="font-size:20px;color:blue;">
 <center>Medical History</center></th>
  </tr>
  <tr>
    <th>NO</th>
<th>Blood Pressure</th>
<th>Weight</th>
<th>Blood Sugar</th>
<th>Body Temprature</th>
<th>Remark</th>
<th>Visit Date</th>
</tr>
<?php  
while ($med=mysqli_fetch_array($ret)) { 
  ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $med['BloodPressure'];?></td>
 <td><?php  echo $med['Weight'];?></td>
 <td><?php  echo $med['BloodSugar'];?></td> 
  <td><?php  echo $med['Temperature'];?></td>
  <td><?php  echo $med['MedicalPres'];?></td>
  <td><?php  echo $med['CreationDate'];?></td> 
 
</tr>
<?php $cnt=$cnt+1;} ?>
</table>

<p align="center">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Add Medical History</button></p>  
                                  <!-- Lab Report start -->
<h5 class="over-title margin-bottom-15"><span class="text-bold">Patient Laboratory History</span></h5>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="9" style="font-size:20px;color:blue;">
 <center>Laboratory Report</center></th>
  </tr>
  <tr>
    <th>No</th>
<th>Test Date</th>
<th>Hematology</th>
<th>Parastology</th>
<th>Urine Analysis</th>
<th>Serology</th>
<th>Chemistry</th>
<th>Bacterology</th>
<th>Result</th>
</tr>
<?php  
$lrep=mysqli_query($con, "SELECT * FROM labreport WHERE cardNo='".$_GET['viewid']."' AND status=0");
$n=1;
while ($lrow=mysqli_fetch_array($lrep)) { 
  ?>
<tr>
  <td><?php echo $n;?></td>
 <td><?php  echo $lrow['testDate'];?></td>
 <td><?php  echo $lrow['hema'];?></td>
 <td><?php  echo $lrow['para'];?></td> 
  <td><?php  echo $lrow['urin'];?></td>
  <td><?php  echo $lrow['sero'];?></td>
  <td><?php  echo $lrow['chem'];?></td> 
  <td><?php  echo $lrow['bact'];?></td> 
  <td><?php  echo $lrow['response'];?></td> 
</tr>
<?php $n=$n+1;} ?>
</table>
                                  <!-- Lab Report end -->
                                  <!-- Medication Report start here -->
<br>
<h5 class="over-title margin-bottom-15"><span class="text-bold">Medication History</span></h5>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="9" style="font-size:20px;color:blue;">
 <center>Medication Report</center></th>
  </tr>
  <tr>
    <th>No</th>
<th>Drug name</th>
<th>Dose</th>
<th>Strength</th>
<th>Duration</th>
<th>Date</th>
<th>Admistartion</th>
<th>Admitted By</th>
<th>Pharmacist Name</th>
</tr>
<?php  
$mrep=mysqli_query($con, "SELECT * FROM medication WHERE cardNo='".$_GET['viewid']."' AND status=0");
$m=1;
while ($mrow=mysqli_fetch_array($mrep)) { 
  $meddoc=mysqli_query($con, "SELECT * FROM employee WHERE id='".$mrow['docId']."'");
  while ($meddocs=mysqli_fetch_array($meddoc)) {
    $medpha=mysqli_query($con, "SELECT * FROM employee WHERE id='".$mrow['pid']."'");
   while ($medphs=mysqli_fetch_array($medpha)) {
  ?>
<tr>
  <td><?php echo $m;?></td>
 <td><?php  echo $mrow['drugname'];?></td>
 <td><?php  echo $mrow['dose'];?></td>
 <td><?php  echo $mrow['medstrength'];?></td> 
  <td><?php  echo $mrow['duration'];?></td>
  <td><?php  echo $mrow['adDate'];?></td>
  <td><?php  echo $mrow['administ'];?></td> 
  <td><?php  echo $meddocs['fname']." ".$meddocs['lname'];?></td> 
  <td><?php  echo $medphs['fname']." ".$medphs['lname'];?></td> 
</tr>
<?php $m=$m+1;}}} ?>
</table>
<br>
                                  <!-- Medication Report end here -->
                                  <!-- X-ray Report start here -->
<br>
<h5 class="over-title margin-bottom-15"><span class="text-bold">Radioscopy History</span></h5>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="9" style="font-size:20px;color:blue;">
 <center>Radioscopy Report</center></th>
  </tr>
  <tr>
    <th>No</th>
<th>Diagonsis</th>
<th>Plan</th>
<th>Test Date</th>
<th>Requested By</th>
<th>Radiologist Name</th>
</tr>
<?php  
$mrep=mysqli_query($con, "SELECT * FROM xultrareport WHERE cardNo='".$_GET['viewid']."' AND status=0");
$m=1;
while ($mrow=mysqli_fetch_array($mrep)) { 
  $meddoc=mysqli_query($con, "SELECT * FROM employee WHERE id='".$mrow['docId']."'");
  while ($meddocs=mysqli_fetch_array($meddoc)) {
    $medpha=mysqli_query($con, "SELECT * FROM employee WHERE id='".$mrow['rid']."'");
   while ($medphs=mysqli_fetch_array($medpha)) {
  ?>
<tr>
  <td><?php echo $m;?></td>
 <td><?php  echo $mrow['diag'];?></td>
 <td><?php  echo $mrow['plan'];?></td>
 <td><?php  echo $mrow['testDate'];?></td> 
  <td><?php  echo $meddocs['fname']." ".$meddocs['lname'];?></td> 
  <td><?php  echo $medphs['fname']." ".$medphs['lname'];?></td> 
</tr>
<?php $m=$m+1;}}} ?>
</table>
<br>
                                  <!-- X-ray Report end here -->
                                  <!-- Prescreption Start here -->

<form role="form" name="adddoc" method="post" onsubmit="return valid()" style="font-size: 20px;">
                          <!-- Test type start  -->
<table border="1" class="table table-bordered">
 <tr align="center">
<td colspan="5" style="font-size:20px;color:blue">
 <h5 class="over-title margin-bottom-15"><span class="text-bold">Medication Prescription Form</span></h5></td>
</tr>
<tr style="background-color: #3399FF; text-align: center;">
  <td>Name of medication</td>
  <td>Dosage</td>
  <td>Strength</td>
  <td>Duration</td>
  <td>Comment</td>
</tr>
    <tr>
    <td><textarea name="drugname" placeholder="Enter medication name"  style="width: 250px; height: 64px;" required="true"></textarea></td>
    <td><textarea name="dose" placeholder="Enter dosage of the medication"  style="width: 250px; height: 64px;" required="true"></textarea></td>
    <td><textarea name="medstrength" placeholder="Enter strength of the drug"  style="width: 250px; height: 64px;" required="true"></textarea></td>
    <td><textarea name="duration" placeholder="Enter duration of medication adimmited"  style="width: 250px; height: 64px;" required="true"></textarea></td>
    <td><textarea name="docComment" placeholder="Enter comments"  style="width: 250px; height: 64px;" required="true"></textarea></td>

</tr>
</table>
<center>
<button type="submit" name="admit" id="submit" class="btn btn-green waves-effect waves-light w-lg">
Admit
</button>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<button type="reset" name="clear"  class="btn btn-red waves-effect waves-light w-lg">
Clear<a href="#Top"></a>
</button></center>
<input type="text" name="cardNo" style="visibility: hidden;" class=""  value="<?php  echo $row['cardNo'];?>" readonly="true">
<input type="text" name="patfname" style="visibility: hidden;" class=""  value="<?php  echo $row['patfname'];?>" readonly="true">
<input type="text" name="patlname" style="visibility: hidden;"
 class=""  value="<?php  echo $row['patlname'];?>" readonly="true">
<input type="number" name="age" style="visibility: hidden;" value="<?php  echo $row['age'];?>" class=""  readonly="true">
<div class="" style="visibility: hidden;">
  <?php  if($row['gender']=="Female"){ ?>
    <input type="radio" name="gender" id="" value="Male">
    <input type="radio" name="gender" id="" value="Female" checked="true">
  <?php } else { ?>
   <input type="radio" name="gender" id="" value="Male" checked="true">
    <input type="radio" name="gender" id="" value="Female">
             <?php } ?>
           </div>
           </div>
</form>
                                  <!-- Test type end -->
</div>

                                  <!-- Prescreption End here -->
<!-- Lab Request start here -->
<br>
<form role="form" name="adddocs" onsubmit="return valida()" method="post" style="font-size: 20px;">
                          <!-- Test type start  -->
<table border="1" class="table table-bordered">
 <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 <h5 class="over-title margin-bottom-15"><span class="text-bold">Diagnostic Laboratory Request Form</span></h5></td>
</tr>
<tr style="background-color: #A0A0A0; text-align: center; ">
  <td>Type</td>
  <td>Description</td>
  <td>Type</td>
  <td>Description</td>
</tr>

    <tr>
    <th scope>Hematology </th>
    <td><textarea name="hema" placeholder="Enter test description of Hematology"  style="width: 250px; height: 64px;"></textarea></td>
    <th>Serology</th>
    <td><textarea name="sero" placeholder="Enter test description of Serology"  style="width: 250px; height: 64px;"></textarea></td>
  </tr>
  <tr>
     <th scope>Parastology</th>
    <td><textarea name="para" placeholder="Enter test description of Parastology"  style="width: 250px; height: 64px;"></textarea></td>
    <th scope>Chemistry</th>
    <td><textarea name="chem" placeholder="Enter test description of Chemistry"  style="width: 250px; height: 64px;"></textarea></td>
  </tr>
    <tr>
    <th scope>Urine Analysis</th>
    <td><textarea name="urin" placeholder="Enter test description of Urine Analysis" style="width: 250px; height: 64px;"></textarea></td>
    <th>Bacterology</th>
    <td><textarea name="bact" placeholder="Enter test description of Bacterology"  style="width: 250px; height: 64px;"></textarea></td>
  </tr>
</table>
<center>
<button type="submit" name="request" id="submit" class="btn btn-green waves-effect waves-light w-lg">
Send Request
</button>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<button type="reset" name="clear"  class="btn btn-red waves-effect waves-light w-lg">
Clear<a href="#Top"></a>
</button></center>
<input type="text" name="cardNo" style="visibility: hidden;" class=""  value="<?php  echo $row['cardNo'];?>" readonly="true">
<input type="text" name="patfname" style="visibility: hidden;" class=""  value="<?php  echo $row['patfname'];?>" readonly="true">
<input type="text" name="patlname" style="visibility: hidden;"
 class=""  value="<?php  echo $row['patlname'];?>" readonly="true">
<input type="number" name="age" style="visibility: hidden;" value="<?php  echo $row['age'];?>" class=""  readonly="true">
<div class="" style="visibility: hidden;">
  <?php  if($row['gender']=="Female"){ ?>
    <input type="radio" name="gender" id="" value="Male">
    <input type="radio" name="gender" id="" value="Female" checked="true">
  <?php } else { ?>
   <input type="radio" name="gender" id="" value="Male" checked="true">
    <input type="radio" name="gender" id="" value="Female">
             <?php } ?>
           </div>
           </div>
</form>
                                  <!-- Test type end -->
</div>
  <!-- Lab Request end here -->

                                <!-- Radioscopy start here -->

<br>
<form role="form" name="adddocss" onsubmit="return validb()" method="post" style="font-size: 20px;">
<table border="1" class="table table-bordered">
 <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 <h5 class="over-title margin-bottom-15"><span class="text-bold">Radioscopy Diagnosis Request Form</span></h5></td></tr>
    <tr>
    <td colspan="4"><center><textarea name="diag" placeholder="Enter radioscopy diagnosis"  style="width: 650px; height: 164px;"></textarea></center></td>
  </tr>
</table>
<center>
<button type="submit" name="radiorequest" id="submit" class="btn btn-green waves-effect waves-light w-lg">
Send Request
</button>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<button type="reset" name="clear"  class="btn btn-red waves-effect waves-light w-lg">
Clear<a href="#Top"></a>
</button></center>
<input type="text" name="cardNo" style="visibility: hidden;" class=""  value="<?php  echo $row['cardNo'];?>" readonly="true">
<input type="text" name="patfname" style="visibility: hidden;" class=""  value="<?php  echo $row['patfname'];?>" readonly="true">
<input type="text" name="patlname" style="visibility: hidden;"
 class=""  value="<?php  echo $row['patlname'];?>" readonly="true">
<input type="number" name="age" style="visibility: hidden;" value="<?php  echo $row['age'];?>" class=""  readonly="true">
<div class="" style="visibility: hidden;">
  <?php  if($row['gender']=="Female"){ ?>
    <input type="radio" name="gender" id="" value="Male">
    <input type="radio" name="gender" id="" value="Female" checked="true">
  <?php } else { ?>
   <input type="radio" name="gender" id="" value="Male" checked="true">
    <input type="radio" name="gender" id="" value="Female">
             <?php } ?>
           </div>
           </div>
</form>
  <?php } ?>     
  </div></div></div></div></div>                        <!-- Test type end -->
                          <!-- Radioscopy end here -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><center>Medical History</center></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                 <form method="post" name="submit">

      <tr>
    <th>Blood Pressure :</th>
    <td>
    <input name="bp" placeholder="Blood Pressure" class="form-control wd-450" required="true"></td>
  </tr>                          
     <tr>
    <th>Blood Sugar :</th>
    <td>
    <input name="bs" placeholder="Blood Sugar" class="form-control wd-450" required="true"></td>
  </tr> 
  <tr>
    <th>Weight :</th>
    <td>
    <input name="weight" placeholder="Weight" class="form-control wd-450" required="true"></td>
  </tr>
  <tr>
    <th>Body Temprature :</th>
    <td>
    <input name="temp" placeholder="Blood Sugar" class="form-control wd-450" required="true"></td>
  </tr>
                         
     <tr>
    <th>Remark :</th>
    <td>
    <textarea name="pres" placeholder="Remark" rows="8" cols="8" class="form-control wd-450" required="true"></textarea></td>
  </tr>  
   
</table>
</div>
<div class="modal-footer"><center>
 <button type="button" class="btn btn-red" data-dismiss="modal">Close</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
 <button type="submit" name="submit" class="btn btn-green">Submit</button>
  </center>
  </form>

<?php 
$up=mysqli_query($con,"select * from tblmedicalhistory  where PatientID='$vid'");
while ($row=mysqli_fetch_array($up)) { 
 ?>
<!-- Update Start -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
 <h5 class="modal-title" id="exampleModalLabel">Update Medical History</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">&times;</span>
          </button>
      </div>

                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                 <form method="post" name="update">
      <tr>
    <th>Blood Pressure :</th>
    <td>
    <input name="bp" value="<?php  echo $row['BloodPressure'];?>" class="form-control wd-450" required="true"></td>
  </tr>                          
     <tr>
    <th>Blood Sugar :</th>
    <td>
    <input name="bs" value="<?php  echo $row['BloodSugar'];?>" class="form-control wd-450" required="true"></td>
  </tr> 
  <tr>
    <th>Weight :</th>
    <td>
    <input name="weight" value="<?php  echo $row['Weight'];?>" class="form-control wd-450" required="true"></td>
  </tr>
  <tr>
    <th>Body Temprature :</th>
    <td>
    <input name="temp" value="<?php  echo $row['Temperature'];?>" class="form-control wd-450" required="true"></td>
  </tr>
                         
     <tr>
    <th>Prescription :</th>
    <td>
    <textarea name="pres" rows="12" cols="14" class="form-control wd-450" required="true"><?php  echo $row['MedicalPres']; ?></textarea></td>
  </tr>  
</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" name="update" class="btn btn-primary">Update</button>
  </form>

  <?php 
  }
   ?>
<!-- Update End -->
</div>
</div>
</div>
</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
<?php
}
?>