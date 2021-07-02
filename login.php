<?php include ("includes/surya.dream.php");  
   
?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<?php include ("includes/extra_file.inc.php");?>
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
				<li class='active'>Login</li>
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
 
 
 
  
			<form class="box"   >
			 
				<p class="tdhead" align="left" style="text-align:left; padding:10px;">&nbsp;Login Now</p>
				<div class="form_content clearfix">
				<? include("error_msg.inc.php");?>
					<div class="form-group">
						<label for="email">Username/Userid. </label>
						<input type="text" name="username" value="<?=$username?>"   class="is_required validate account_input form-control"   alt="blank" emsg="Please Enter Your Username/Userid" />
 						 
					</div>
					<div class="form-group">
						<label for="passwd">Password</label>
						<span><input name="password" type="password" value="<?=$username?>"   class="is_required validate account_input form-control"   alt="blank" emsg="Please Enter Your Password" />
						 </span>
					</div>
					
						 
					 <p class="submit">
 							<button type="submit" id="SubmitLogin" name="SubmitLogin"  class="btn btn-primary">
							<span>
								<i class="icon-lock left" style="margin-top:4px;"></i></span>&nbsp;&nbsp;Sign in
							
						</button>
					</p>
					<p class="lost_password form-group"><a href="registration.php" title="Create an account" rel="nofollow">New Here? Create an account</a></p>
					<p class="lost_password form-group"><a href="forgot_password.php" title="Recover your forgotten password" rel="nofollow">Forgot your password?</a></p>
					
				</div>
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