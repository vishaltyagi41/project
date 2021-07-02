
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
				<li class='active'>Contact Us</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
    <div class="contact-page">
		<div class="row">
			
				<div class="col-md-12 contact-map outer-bottom-vs">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d158543.8819112938!2d77.15518029417572!3d28.589036942845624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1579099989903!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
					 
				</div>
				<div class="col-md-9 contact-form">
				<form name="form1"  class="register-form" >
					 
	<div class="col-md-12 contact-title">
		<h4>Contact Form</h4>
	</div>
	<div class="col-md-6 ">
		 
		

			<div class="form-group">
		    <label class="info-title" for="exampleInputName">Your Name <span>*</span></label>
			<input name="contact_name" type="text"   class="form-control unicase-form-control text-input"   alt="blank" emsg="Please Enter Name"/> 
		   
		  </div>
		 
	</div>
	<div class="col-md-6">
		 
			<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="contact_email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
		  </div>
		 
	</div>
	<div class="col-md-6">
		 
			<div class="form-group">
		    <label class="info-title" for="exampleInputTitle">Mobile  <span>*</span></label>
		     	<input name="contact_mobile" class="form-control unicase-form-control text-input" type="text"  id="contact_email"    alt="blank"  emsg="Please Enter Your  Email"/>
		  </div>
		 
	</div>
	<div class="col-md-6">
		 
			<div class="form-group">
		    <label class="info-title" for="exampleInputTitle">Subject <span>*</span></label>
		    <select id="contact_subject" class="form-control unicase-form-control" name="contact_subject">
                            <option value="">Choose Subject</option>
                                                            <option value="Customer Services : For any question about Products" >Customer Services : For any question about Products</option>
                                                            <option value="Webmaster : A technical problem occurs on this website" >Webmaster : A technical problem occurs on this website</option>
                                                    </select>
		  </div>
		 
	</div>
	<div class="col-md-12">
		 
			<div class="form-group">
		    <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
		    
			 <textarea  class="form-control unicase-form-control" name="contact_comments" id="contact_comments"  alt="blank" emsg="Please Enter message  " style="height:100px;"  ></textarea>
		  </div>
		
	</div>
	<div class="col-md-12 outer-bottom-small m-t-20">
		<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Send Message</button>
	</div>
	</form>
</div>
<div class="col-md-3 contact-info">
	<div class="contact-title">
		<h4>Information</h4>
	</div>
	<div class="clearfix address">
		<span class="contact-i"><i class="fa fa-map-marker"></i></span>
		<span class="contact-span">Kiet College, Ghaziabad, Uttar Pradesh 201206</span>
	</div>
	 
	<div class="clearfix email">
		<span class="contact-i"><i class="fa fa-envelope"></i></span>
		<span class="contact-span"><a href="#">support@housingrental.com</a></span>
	</div>
</div>			</div><!-- /.contact-page -->
		</div><!-- /.row -->
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

