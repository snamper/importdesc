<?php if(isset($_SESSION['user'])) {?>
<body class="body-wrapper">
  <div class="page-loader" style="background: url(assets/img/preloader.gif) center no-repeat #fff;"></div>
  <div class="main-wrapper">
    <!-- HEADER -->
   

<!-- DASHBOARD PROFILE SECTION -->
<section class="clearfix bg-dark profileSection">
	<div class="container center-block">
		<div class="row center-block">
			<!-- <div class="col-md-4 col-sm-5 col-xs-12">
				<div class="dashboardBoxBg mb30">
					<div class="profileImage">
						<img src="assets/img/dashboard/user-2.jpg" alt="Image User" class="img-circle">
						<div class="file-upload profileImageUpload">
							<div class="upload-area">
								<input type="file" name="img[]" class="file">
								<button class="browse" type="button">Upload a Picture <i class="icon-listy icon-upload"></i></button>
							</div>
						</div>
					</div>
					<div class="profileUserInfo bt profileName">
						<p>Your Current Plan</p>
						<h2>Platinum Package</h2>
						<h5>Next Payment: <span>15/01/2017</span></h5>
						<a href="#" class="btn btn-primary">Change</a>
					</div>
				</div>
			</div> -->
			<div class="col-md-8 col-sm-7 col-xs-12">
				<form action="profile" method="POST" name="register_form">
					<div class="dashboardBoxBg">
						<div class="profileIntro">
							<h2>Your Profile</h2>
						</div>
					</div>
					<div class="dashboardBoxBg mt30">
						<div class="profileIntro">
							<h3>About You</h3>
							<div class="row">
								<div class="form-group col-sm-6 col-xs-12">
									<label for="firstNameProfile">First Name</label>
									<input type="text" class="form-control" id="firstNameProfile" name='firstName' value="<?php echo $_POST['fname'] ?>" placeholder="Jane"/>
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label for="lastNameProfile">Last Name</label>
									<input type="text" class="form-control" id="lastNameProfile" name='lastName' value="<?php echo $_POST['lname'] ?>" placeholder="Doe"/>
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label for="emailProfile">Email</label>
									<input type="text" class="form-control" id="emailProfile" name='emailAddress' value="<?php echo $_POST['UserMail'] ?>" placeholder="Jane@example.com"/>
								</div>
								<!-- <div class="form-group col-sm-6 col-xs-12">
									<label for="emailProfile">Usernames</label>
									<input type="text" class="form-control" id="usernameProfile" name='usernames' value="<?php echo $_SESSION['Username'] ?>" placeholder="Jane@example.com"/>
								</div> -->
							</div>
						</div>

					</div>
					<div class="btn-area mt30">
							<input type="hidden" name="save_profile">
						<button class="btn btn-primary" type="submit">Save Change</button>
					</div>
					<div class="dashboardBoxBg mt30">
						<div class="profileIntro">
							<h3>Update password</h3>
							<div class="row">
								<!-- <div class="form-group col-xs-12">
									<label for="currentPassword">Current Password</label>
									<input type="password" class="form-control" id="currentPassword" name='password' value="<?php if(isset($_SESSION['user']['emailAddress'])) ?>" placeholder="********">
								</div> -->
								<div class="form-group col-xs-12">
									<label for="newPassword">New Password</label>
									<input type="password" class="form-control" id="newPassword" name='newpassword' value="<?php if(isset($_SESSION['user']['emailAddress'])) ?>" placeholder="New Password">
								</div>
								<div class="form-group col-xs-12">
									<label for="confirmPassword">Confirm Password</label>
									<input type="password" class="form-control" id="confirmPassword" name='confirmnewpassword' value="<?php if(isset($_SESSION['user']['emailAddress'])) ?>" placeholder="Confirm Password">
								</div>
								<div class="form-group col-xs-12">
									<button class="btn btn-primary" type="button">Change Password</button>
								</div>
							</div>
						</div>
					</div>
					<!-- <input type="hidden" name="save_profile"> -->
				</form>
			</div>
		</div>
	</div>
</section>

   

</body>
<?php }?>