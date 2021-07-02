<?php
include ("includes/surya.dream.php"); 
// Ajax code 
require_once(SITE_FS_PATH."/includes/Sajax.php");
sajax_init();
// $sajax_debug_mode = 1;
sajax_export("get_username_details");
sajax_export("get_sponsor_details");
sajax_handle_client_request();
// END Ajax code

if ($_GET[ref]!='') { 
	$_SESSION[ref]= $_GET[ref]; 
} 
/*OK tested skskskk if ($_SESSION['sess_uid']=='') {
	header("location: join-us.php");
	exit;
}*/
$arr_error_msgs = array();
$page='registration' ;
///protect_user_page();
 #header("location: registration_stop.php");
 #exit;
/* if ($_SESSION['sess_uid']!='') {
	header("location: myaccount.php");
	exit;
}*/

/// 103558
//print_r($_POST);

  if ($u_ref_userid=='') { $u_ref_userid = $_SESSION[ref];}

@extract ($_SESSION[POST]);
$ip =  gethostbyaddr($_SERVER['REMOTE_ADDR']);
if(is_post_back()) {
 	    @extract ($_SESSION[POST]);
	    @extract ($_POST);
 		//$total_count = db_scalar("select count(*) from ngo_users where u_username2 = '$u_username2'");
		$total_count = db_scalar("select count(*) from ngo_users where u_username='$u_username2' ");
		if ($total_count >0) { $arr_error_msgs[] =  "An account already exists for username:" .$u_username2;}  
 		$total_count22 = db_scalar("select count(*) from ngo_users where u_mobile = '$u_username2'   ");
		if ($total_count22 >0) { $arr_error_msgs[] =  "This Mobile Number is already registered with us ";} 
		
		$auto_id = db_scalar("select u_id from ngo_users where u_username = '$u_ref_userid'");
  	 	$total_ref = db_scalar("select count(u_id) from ngo_users where u_id = '$auto_id'");
		if ($total_ref ==0) { $arr_error_msgs[] =  "Referer ID  does not exist!";}
		///
		/*$auto_id = db_scalar("select u_id from ngo_users where (u_mobile = '$u_ref_userid' OR u_username2='$u_ref_userid') ");
		*/
   	 	/*if ($u_ref_side =='') { $arr_error_msgs[] =  "Please select referer side";}*/
 		// if($u_password != $u_password2){ 	 $arr_error_msgs[] ="Your confirm password does not match with new password"; }
	
		/*if ($_POST['conf_num2']!=$_SESSION['conf_num1']){ 
			$arr_error_msgs[] ="Confirmation number does not match"; 
 		}*/
 		// "select  u_email from ngo_users where u_email = '$u_email'";
 		//print "<br> =". "select u_email  from ngo_users where u_email = '$u_email'";
 		if ($u_username2 =='') { $arr_error_msgs[] = "Username required.!";}
		#$first_number = strtoupper(substr($u_username2, 0,1));  
		#if ($first_number <=5 || strlen($u_username2)!=10) { $arr_error_msgs[] =  "Invalid username ($u_username2), Must be a 10 digit mobile numder";}
 		/*if ($u_mobile =='') { $arr_error_msgs[] = "Mobile number required.!";}
		$first_number = strtoupper(substr($u_mobile, 0,1));  
		if ($first_number <=6 || strlen($u_mobile)!=10) { $arr_error_msgs[] =  "Mobile  Must be 10 digit";}*/
 		/*if ($u_whatsapp_no =='') { $arr_error_msgs[] = "Whatsapp  number required.!";}
		$first_number = strtoupper(substr($u_whatsapp_no, 0,1));  
		if ($first_number <=6 || strlen($u_whatsapp_no)!=10) { $arr_error_msgs[] =  " Whatsapp No Must be a 10 digit   Required";}*/
  		 $total_mobile = db_scalar("select count(*)  from ngo_users where  u_mobile = '$u_mobile' and u_join_mode='General' ");
		 if ($total_mobile >=1) { $arr_error_msgs[] =  "With $u_mobile Mobile Number already registered with us!";}
  		/* $total_mobile = db_scalar("select count(*)  from ngo_users where  u_mobile = '$u_mobile'");
		if ($total_mobile >=1) { $arr_error_msgs[] =  "With $u_mobile Mobile Number already registered with us!";}*/
 		/*if($u_email!='') {
		$email_count = db_scalar("select count(*)  from ngo_users where u_email = '$u_email'");
		if($email_count>=1) { $arr_error_msgs[] =  "With $u_email, Email Already  registered with us.";} 
 		}*/
		/*if($u_panno!='') {
		$panno_count = db_scalar("select count(*)  from ngo_users where u_panno = '$u_panno'");
		if($panno_count>=1) { $arr_error_msgs[] =  "With $u_panno, Pan Card Already registered with us.";} 
 		}*/
 		//and code_useto>=ADDDATE(now(),INTERVAL 120 MINUTE)
		#  $total_code = db_scalar("select count(*) from ngo_code where code_id='$u_slno' and code_string='$u_code' and code_is='Available' and  code_cate='1' and code_status='Active'  ");
	   # if ($total_code ==0) { $arr_error_msgs[] =  "E-Pin SlNo or E-Pin Code does not exist or already used!";}
 
		#$total_limit = db_scalar("select count(u_id) from ngo_users where u_fname = '$u_fname' and u_dob = '$u_dob' and  u_ref_userid = '$u_ref_userid' and  u_bank_acno='$u_bank_acno' and u_mobile = '$u_mobile'");
		#if ($total_ref >=7) { $arr_error_msgs[] =  "Maximum limit over! you can only open 7 account for same name,mobile,DOB, Bank Acc";}
		  
 
 
  		$ip =  gethostbyaddr($_SERVER['REMOTE_ADDR']);
 		$_SESSION['arr_error_msgs'] = $arr_error_msgs;
		//check if there is no error
		
		if (count($arr_error_msgs) ==0) {
			# $_SESSION[POST] = $_POST;
			# $confirmation_code = rand(10000,99999);
			#$_SESSION['confirmation_code'] = $confirmation_code;
			# $_SESSION['u_code'] = $confirmation_code;
 
			//$u_ref_fname = db_scalar("select  u_fname from ngo_users where u_username2 = '$u_ref_userid'");
			 $u_ref_userid = db_scalar("select  u_id from ngo_users where u_username = '$u_ref_userid' ");
			
			//$u_ref_userid = db_scalar("select  u_id from ngo_users where (u_mobile = '$u_ref_userid' OR u_username2='$u_ref_userid') ");
 			
			//$u_sponsor_id = get_sponsor_id($u_ref_userid,$u_ref_side);
 			 $u_parent_id = db_scalar("select u_parent_id from ngo_users  order by u_id desc limit 0,1")+rand(1,9);
 			 //$u_username2 =  rand(10,99).$u_parent_id.rand(10,99);    
			#$u_password =  rand(100000,999999) ;
			 $u_password2 =  rand(100000,999999) ;
			$sql = "insert into ngo_users set  u_parent_id = '$u_parent_id', u_ref_userid = '$u_ref_userid', u_username='$u_username2', u_username2='$u_username2',u_email='$u_email', u_password = '$u_password',u_password2 = '$u_password2' , u_fname = '$u_fname', u_address = '$u_address' , u_city = '$u_city'  , u_country = '$u_country', u_mobile = '$u_mobile',u_group='2' ,u_join_mode='General' , u_admin = '$u_admin' ,u_status='Active', u_date= ADDDATE(now(),INTERVAL 570 MINUTE),u_last_login=ADDDATE(now(),INTERVAL 570 MINUTE) ";
  		  	$result = db_query($sql);
			$u_id = mysqli_insert_id($GLOBALS['dbcon']);
 			$_SESSION[sess_recid] =$u_id ;
			
			///250 sign up bonus in shopping wallet
			/*$pay_amount = 250;
			$pay_for22 ="Free Sign Up Bonus";
			$sql22 = "insert into ngo_users_ewallet set pay_drcr='Cr',pay_group='SW',pay_userid ='$u_id' ,pay_refid ='$u_id' ,pay_plan='SIGN_UP_BONUS', pay_for = '$pay_for22' ,pay_ref_amt='$pay_amount' ,pay_unit = '%' ,pay_rate = '100', pay_amount = '$pay_amount' ,pay_date=ADDDATE(now(),INTERVAL 570 MINUTE) ,pay_datetime =ADDDATE(now(),INTERVAL 570 MINUTE),pay_admin='SPOT' ";
			db_query($sql22);*/
			//////////////////////////////////////
			
			
 			/*$_SESSION['sess_uid'] 		= $u_id;
			$_SESSION['sess_username'] 	= $u_username2;
			$_SESSION['sess_email']		= $u_email;
			$_SESSION['sess_fname']		= $u_fname;
			$_SESSION['sess_date']		= $u_date;
			*/
			//update  pin number 
			#$sql_code="update ngo_code set code_is='Used', code_use_userid='$topup_userid' ,code_use_name='$u_fname' ,code_usefrom=ADDDATE(now(),INTERVAL 270 MINUTE) where code_id = '$u_slno' and code_string='$u_code'";
			#db_query($sql_code);
			//Dear #value your login id:#value ,account password:#value ,transaction password:#value ,for details plz visit #value
 			///$message = "Dear ".$u_fname." Welcome To ".SITE_NAME." Your Login ID is ".$u_username2." & Password is ".$u_password." & Txn Password :".$u_password." For Details plz visit ".SITE_URL;
			$message = "Dear $u_fname Your login ID is $u_username2 ,Password is $u_password and Trans Password is $u_password2";
			#$msg= send_sms($u_phone,$message);
			 ///exit;
			
// email 

		 
$message=" 
Hi ". $u_fname .", 

Thank you for becoming a member of the ". SITE_NAME .".  

Your login information is provided below.  Please also keep in mind that you must finish your registration by clicking on the link below.
 
Username = ". $u_username2 ."
Password = ". $u_password. "
Transaction Password=". $u_password2. "

 

To ensure that you continue receiving our emails, please add us to your address book or safe list.

Once again, Thank you for being a part of our team!

". SITE_NAME ."
". SITE_URL ."
";
 
$HEADERS  = "MIME-Version: 1.0 \n";
$HEADERS .= "Content-type: text/plain; charset=iso-8859-1 \n";
$HEADERS .= "From:  <".ADMIN_EMAIL.">\n";
$SUBJECT  = SITE_NAME." Registration";
if ($u_email!='') { @mail($u_email, $SUBJECT, $message,$HEADERS); }
////////////////////////////
 	header("Location: registration_conf.php");
	exit;
   	}	
	 
 }
$_SESSION[POST]='';
/* if ($code_id!='') {
	$sql_code= "select * from ngo_code where code_userid='$_SESSION[sess_uid]' and code_id='$code_id'";
	$result_code = db_query($sql_code);
	$line_code = mysqli_fetch_array($result_code);
	$u_slno = $line_code['code_id'];
	$u_code = $line_code['code_string'];
}*/  
?>
 <!DOCTYPE html>
<html lang="en">
    <head>
		<?php include ("includes/extra_file.inc.php");?>
		<?php include ("includes/fvalidate.inc.php");?>
		<script language="javascript">
<? sajax_show_javascript(); ?>
 //------check username availability code start------------------------------------------------
 function do_get_username_details() {
 	document.getElementById('details1').innerHTML = 'Username <span class="error">(Loading...)</span> ';
	username= document.registration.u_username2.value;
	//alert(username);
    	x_get_username_details('username_details', username, do_get_username_details_cb);
 }
function do_get_username_details_cb(z) {
  	document.getElementById('details1').innerHTML = z;
 }
   
  //------check sponsor availability code start------------------------------------------------
 function do_get_sponsor_details() {
 	document.getElementById('details').innerHTML = "Loading...";
	ref_userid= document.registration.u_ref_userid.value;
    	x_get_sponsor_details('sponsor_details', ref_userid, do_get_sponsor_details_cb);
 }
function do_get_sponsor_details_cb(z) {
  	document.getElementById('details').innerHTML = z;
 }  
   
   </script>
 	</head>
    <body class="cnt-home">
		<!-- ============================================== HEADER ============================================== -->
  <?php include ("includes/header.inc.php");?>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Registration</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page width-50 centered">
			<div class="row">
		 
				<div class="col-md-12 my-wishlist  ">
	<div class="table-responsive">
  
 <? include("error_msg.inc.php");?>
 
  
<form name="registration" method="post" id="login_form"    action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data"  <?= validate_form()?> >
<p class="tdhead" align="left" style="text-align:left; padding:10px;">&nbsp;Registration  </p>
 
                            <table align="center" width="100%"  class="table table-bordered stock-management-off" >
                              <tbody>
                                
                                </tr>
                          <!-- <tr class="tdhead">
                                  <td colspan="3" align="left" >&nbsp;&nbsp;&nbsp;Referral Information</td>
                                </tr> -->
                               <tr >
                                   <td width="154" align="left"  ><span style="color: #ff0033"><strong>* </strong></span><strong>Referral information</strong></td>
                                  <td align="left" class="maintxt"  ><input   name="u_ref_userid" type="text"  class="form-control unicase-form-control"   maxlength="10"  id="u_ref_userid"  value="<?=$u_ref_userid?>" alt="blank" emsg="Please enter referral information"   onChange="do_get_sponsor_details();" placeholder="Enter referral information"  style="width:400px;"/>  <div align="left" id="details" class="error"> </div>
                                    </td>
                                 <?php /*?> <td width="175"  valign="top"  ><!--Enter Introducer User Mobile No--> </td><?php */?>
                                </tr>
								
								
                                 <?php /*?> <tr>
                                 
                                  <td align="left" class="maintxt"><span class="error">*</span> <strong>Position</strong></td>
                                  <td align="left" valign="top" class="maintxt"><select name="u_ref_side"  id="u_ref_side" style="float:left; width:400px;"   alt="select" emsg="Please Select Your Position"  >
          <option value=""> Select Position  </option>
          <option <? if ($u_ref_side=='A') {?> selected="selected" <? } ?> value="A"   >Left</option>
          <option <? if ($u_ref_side=='B') {?> selected="selected" <? } ?>  value="B"  > Right</option>
         </select></td>
                                  <td  valign="top">&nbsp;&nbsp;</td>
                                </tr> 
                                <tr class="tdhead">
                                  <td colspan="3" align="left" class="tdhead">&nbsp;&nbsp;&nbsp;Personal Information </td>
                                </tr><?php */?>
                                <tr>
                                 
                                  <td align="left" class="maintxt" nowrap="nowrap"><strong><span style="color: #ff0033">* </span> Username </strong></td>
                                  <td align="left" valign="top" class="maintxt"> 
								  <input name="u_username2" type="text" class="form-control unicase-form-control" id="u_username2" style="width:400px;" maxlength="10" alt="blank" emsg="Please enter Username "   value="<?=$u_username2?>"   placeholder="Username"  onChange="do_get_username_details();" />  
                                   <div  id="details1"> </div>								  <!--Choose Your Login Username (Mobile No Minimum 10 characters)--></td>
                                </tr>
                                <tr>
                                  
                                  <td align="left"  nowrap="nowrap"><strong><span style="color: #ff0033">* </span> </strong><strong>Password </strong></td>
                                  <td style="height: 26px"><input  class="form-control unicase-form-control" name="u_password" type="password"   id="u_password"  value="<?=$u_password?>"  alt="blank" emsg="Please enter password" placeholder="Password" style="width:400px;"/></td>
                                </tr>
							  
							  
							    <tr>
                                  
                                  <td align="left" ><strong><span style="color: #ff0033">* </span> </strong><strong>  Name </strong></td>
                                  <td style="height: 26px"><input  class="form-control unicase-form-control" name="u_fname" type="text"   id="u_fname"  value="<?=$u_fname?>"  alt="blank" emsg="Please enter name" placeholder=" Name" style="width:400px;"/></td>
                                </tr>
								
								<?php /*?><tr>
                                  
                                  <td align="left" ><strong><span style="color: #ff0033"> </span> </strong><strong>Shop&nbsp;/&nbsp;Firm Name </strong></td>
                                  <td style="height: 26px"><input  class="form-control unicase-form-control" name="u_occupation" type="text"   id="u_occupation"  value="<?=$u_occupation?>"   placeholder="Shop / Firm Name" style="width:400px;"/></td>
                                  <td style="height: 26px">&nbsp;</td>
                                </tr><?php */?>
                                <!--<tr>
                    
                    <td align="left" ><strong><span style="color: #ff0033">* </span> </strong><strong> Your Gender </strong></td>
                    <td style="height: 26px"><?=gender_dropdown($u_gender,'class="form-control unicase-form-control"  style="width:400px; " alt="blank" emsg="Please select gender"')?></td>
                    <td style="height: 26px">&nbsp;</td>
                  </tr>-->
                                <!--<tr>
                   
                    <td align="left" class="maintxt"><strong><span style="color: #ff0033">* </span> Date of Birth </strong></td>
                    <td align="left" valign="top" class="maintxt"><table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td   align="left" valign="top"><?= month_dropdown("month",$month,' class="form-control unicase-form-control" alt="select" emsg="Please Enter birthdate month"')?>                          </td>
                          <td   align="left" valign="top"><?= day_dropdown("day",$month,'class="form-control unicase-form-control" alt="select" emsg="Please Enter birthdate day"')?>                          </td>
                          <td   align="left" valign="top"><?= year_dropdown('year', $year, '1920','2010','class="form-control unicase-form-control" alt="select" emsg="Please Enter birthdate year"')?></td>
                        </tr>
                      </table></td>
                    <td align="left" valign="top" class="maintxt">&nbsp;</td>
                  </tr> 
                                <tr>
                                  
                                  <td align="left" ><strong><span style="color: #ff0033"> * </span> </strong><strong>Address </strong></td>
                                  <td><textarea name="u_address" rows="50" class="form-control unicase-form-control"     id="u_address"   style="height:40px; width:200px;"  placeholder="Complete Address"    alt="blank" emsg="Please enter address"  ><?=$u_address?>
</textarea>
                                  </td>
                                  <td >Do not submit a PO Box. Provide your full real address or your product cannot be shipped</td>
                                </tr>-->
                                <tr>
                                  
                                  <td align="left" ><strong><span style="color: #ff0033">* </span> </strong><strong>City</strong></td>
                                  <td><input  class="form-control unicase-form-control" name="u_city" type="text"   id="u_city"  value="<?=$u_city?>"   placeholder="City Name"  style="width:400px; "  alt="blank" emsg="Please enter city" />                                  </td>
                                </tr>  
								
								 <?php /*?><tr>
                                  
                                  <td align="left" ><strong><span style="color: #ff0033">* </span> </strong><strong> Postal&nbsp;/&nbsp;Code</strong></td>
                                  <td><input  class="form-control unicase-form-control" name="u_postalcode" type="text"   id="u_postalcode"  value="<?=$u_postalcode?>"   placeholder="Postal Code"  style="width:400px; "  alt="blank" emsg="Please enter Postal Code" />
                                  </td>
                                  <td>&nbsp;</td>
                                </tr><?php */?>
								
                               <?php /*?> <tr>
                                  
                                  <td align="left" ><strong><span style="color: #ff0033"> * </span> </strong><strong>State </strong></td>
                                  <td><!--<input  class="form-control unicase-form-control" name="u_state" type="text"   id="u_state"  value="<?=$u_state?>" placeholder="State Name"   style="width:400px;"  alt="blank" emsg="Please enter state" />-->
								  
								  <select name="u_state" value="<?=$u_state?>"  placeholder="State Name"   style="width:400px;"  alt="blank" emsg="Please enter state">
                        <option value="">Please Select State</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Orissa">Orissa</option>
                        <option value="Pondicherry">Pondicherry</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttaranchal">Uttaranchal</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="West Bengal">West Bengal</option>
                      </select>
								  
								  
                                  </td>
                                  <td>&nbsp;</td>
                                </tr><?php */?>
                             <!--    <tr>
                                  
                                  <td align="left" ><strong><span style="color: #ff0033"> </span> </strong><strong>Country </strong></td>
                                  <td><?
		// if ($u_country=='') {$u_country=99;} 
		$sql ="select countries_name , countries_name from ngo_countries order by countries_id";  
		echo make_dropdown($sql, 'u_country', 'India', 'class="form-control unicase-form-control" style="width:400px; "', '','--select--');
		?>
                                  </td>
                                  <td >Select Country</td>
                                </tr>
                                <tr>
                    
                    <td align="left" ><strong><span style="color: #ff0033">* </span> </strong><strong>Zip Code </strong></td>
                    <td><input  class="form-control unicase-form-control" name="u_postalcode" type="text"   id="u_postalcode"  value="<?=$u_postalcode?>" alt="blank" emsg="Please Enter Zip code" placeholder="Zip Code"  style="width:400px;"/>                    </td>
                    <td > Fill 0000 if your country does not have Zip Code</td>
                  </tr>-->
				  <tr>
                                  
                                  <td align="left"  nowrap="nowrap"><strong><span style="color: #ff0033">* </span> </strong><strong>Mobile No. </strong></td>
                                  <td><input   class="form-control unicase-form-control" name="u_mobile" type="text"   id="u_mobile"  maxlength="10" value="<?=$u_mobile?>" alt="blank" emsg="Please enter mobile no  " placeholder="Only 10 Digit Mobile No" style="width:400px;"/></td>
                                  <!--<td >Please enter 10 digit mobile no only </td>-->
                                </tr>
                                <?php /*?><tr>
                                  
                                  <td align="left" ><strong><span style="color: #ff0033">* </span> </strong><strong>Mobile  Phone No </strong></td>
                                  <td><input   class="form-control unicase-form-control" name="u_mobile" type="text"   id="u_mobile"  maxlength="10" value="<?=$u_mobile?>" alt="blank" emsg="Please enter mobile no  " placeholder="Only 10 Digit Mobile No" style="width:400px;"/></td>
                                  <td >Please enter 10 digit mobile no only </td>
                                </tr>
								<?php */?>
								<?php /*?><tr>
                                  
                                  <td align="left" ><strong><span style="color: #ff0033">  </span> </strong><strong>Whatsapp No.</strong></td>
                                  <td><input   class="form-control unicase-form-control" name="u_whatsapp_no" type="text"   id="u_whatsapp_no"  maxlength="10" value="<?=$u_whatsapp_no?>"   placeholder="Only 10 Digit Whatsapp No" style="width:400px;"/></td>
                                  <td ><!--Please enter 10 digit mobile no only--> </td>
                                </tr><?php */?>
								
								
                               <tr>
                                  
                                  <td align="left" ><strong><span style="color: #ff0033">  </span> </strong><strong>E-Mail   </strong></td>
                                  <td><input  class="form-control unicase-form-control" name="u_email" type="text"   id="u_email"  value="<?=$u_email?>"    placeholder=" E-Mail" style="width:400px;"/></td>
                                </tr> 
                                <!--<tr>
                                  
                                  <td width="154" align="left" nowrap="nowrap" class="maintxt"><strong><span style="color: #ff0033"> </span>Pan No </strong></td>
                                  <td width="200" align="left" valign="top" class="maintxt"><input name="u_panno" type="text" class="form-control unicase-form-control" id="u_panno" style="width:400px;" value="<? //=$u_panno?>"  placeholder="Pan No"  /></td>
								  <td width="5" align="left" >&nbsp;</td>
                                </tr>-->
                               <?php /*?> <tr class="tdhead">
                                  <td colspan="3" align="left" valign="top" class=" ">&nbsp;Bank Account Details </td>
                                </tr>
                                <tr>
                                  
                                  <td width="154" align="left" valign="top" class="maintxt"><strong><span style="color: #ff0033"> </span> </strong><strong>Bank Name</strong></td>
                                  <td width="200" align="left" valign="top"><span class="maintxt">
                                    <input name="u_bank_name" type="text"   class="form-control unicase-form-control" id="u_bank_name" style="width:200px;" value="<?=$u_bank_name?>" />
                                    </span></td>
									<td width="5" align="left" >&nbsp;</td>
                                  
                                </tr>
                                <tr>
                                  
                                  <td align="left" valign="top" class="maintxt"><strong><span style="color: #ff0033"> </span> </strong><strong>Account Number</strong></td>
                                  <td align="left" valign="top"><span class="maintxt">
                                    <input name="u_bank_acno" type="text"   class="form-control unicase-form-control" id="u_bank_acno" style="width:200px;" value="<?=$u_bank_acno?>" />
                                    </span></td>
									<td width="5" align="left" >&nbsp;</td>
                                  
                                </tr>
                                <tr>
                                  
                                  <td align="left" valign="top" class="maintxt"><strong><span style="color: #ff0033"> </span> </strong><strong>Branch </strong></td>
                                  <td align="left" valign="top"><span class="maintxt">
                                    <input name="u_bank_branch" type="text" class="form-control unicase-form-control"    id="u_bank_branch" style="width:200px;" value="<?=$u_bank_branch?>" />
                                    </span></td>
									<td width="5" align="left" >&nbsp;</td>
                                  
                                </tr>
                                <tr>
                                  
                                  <td align="left" valign="top" class="maintxt"><strong>IFS Code</strong></td>
                                  <td align="left" valign="top"><input name="u_bank_ifsc_code" type="text" class="form-control unicase-form-control" id="u_bank_ifsc_code" style="width:200px;" value="<?=$u_bank_ifsc_code?>" /></td>
                                  
                                  <td width="5" align="left" >&nbsp;</td>
                                </tr><?php */?>
                                <!-- <tr>
					  
					    <td align="left" class="maintxt"><strong> MICR Code</strong></td>
					    <td align="left" valign="top" class="maintxt"><input name="u_bank_ifsc_code2" type="text" class="form-control unicase-form-control" id="u_bank_ifsc_code2" style="width:200px;" value="<?=$u_bank_micr_code?>" /></td>
						
				    </tr>-->
                                <!-- <tr>
                              <td align="right" class="maintxt">Package*</td>
                              <td align="left" valign="top" class="maintxt"><?
					 
						//echo make_dropdown("select utype_id , utype_name from ngo_users_type where utype_status='Active' and utype_id=1 order by utype_id", 'u_utype', $u_utype,  'class="form-control unicase-form-control"  style="width:140px;" alt="select" emsg="Please select apply for" ','--select--');
							?></td>
                            </tr>-->
                                <!--<tr class="tdhead">
                    <td align="left"  >&nbsp;</td>
                    <td colspan="3" align="left" class="tdhead"><h3> &nbsp;&nbsp;&nbsp;E-Currency Details </h3></td>
                  </tr>
				  <tr>
                    <td>&nbsp;</td>
                    <td><strong><span style="color: #ff0033">* </span>Your Perfect Money Account No</strong></td>
                    <td colspan="2"  align="left" style="margin-right:100px;"><input type="text" name="u_perfect_money" id="u_perfect_money" size="30"  class="form-control unicase-form-control" value="<?=$u_perfect_money?>"  alt="blank" emsg="Please enter  Your Perfect Money Account No "  /> &nbsp;&nbsp;  Ex. U123456 </td>
                  </tr>
				  <tr>
                    <td>&nbsp;</td>
                    <td><strong><span style="color: #ff0033"> </span>Your EGO Pay Email</strong></td>
                    <td colspan="2"  align="left" style="margin-right:100px;"><input type="text" name="u_egopay" id="u_egopay" size="30"  class="form-control unicase-form-control" value="<?=$u_egopay?>"  /> &nbsp;&nbsp;   </td>
                  </tr>
				  -->
                                <!--<tr>
                    <td>&nbsp;</td>
                    <td><strong><span style="color: #ff0033">*</span>What will you choose to invest your money?</strong></td>
                    <td colspan="2"  align="left" >  
                      <select name="u_product" class="form-control unicase-form-control" alt="select" emsg="Please select What will you choose to invest your money" >
                         <option value="">Please Select</option>
						 <option value="Beverages">Beverages</option>
                        <option value="Wines">Wines</option>
                       
                      </select>
                     </td>
                  </tr>-->
                                <tr>
                                 
                                  <td>&nbsp;  <input type="hidden"   name="u_join_mode" id="u_join_mode" class="form-control" value="General" placeholder=""   /> </td>
                                  <td  align="left" style="margin-right:100px;"><input type="checkbox"  name="terms" id="terms" value="ON"   alt="checkbox|0" emsg="Please accept terms and conditions">
                                    <span class="error">* </span>  <a href="static_page.php?page=SITE_TERMS" target="_blank" style="color:#000000;">I accept  
                                    Terms of Use & Privacy Policy.</a></td>
                               </tr>
                                <tr>
                                 
                                  <td  ></td>
                                  <td align="center" style="text-align: left">
								  
								   <p class="submit">
 							<button type="submit" id="SubmitLogin" name="SubmitLogin"  class="btn btn-primary">
							<span>
								<i class="icon-user left" style="margin-top:4px;"></i></span>&nbsp;&nbsp;Register Now </button>
					</p>
								  
								  
								  
								  
								  <!--<p class="btn btn-success" >
                                    <input name="submit" type="submit" value="Submit"   />
                                    </p>--></td>
                                </tr>
                              </tbody>
                            </table>
              </form> 
						  
</div>
</div>			
 

</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
 <?php include ("includes/our_brand.inc.php");?><!-- /.logo-slider --><br>

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->
  <?php include ("includes/footer.inc.php");?>
<!-- ============================================================= FOOTER : END============================================================= -->
<?php include ("includes/extra_footer.inc.php");?>
	

</body>

</html>						  
			 