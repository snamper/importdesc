	<div id="page-container">
		<!-- BEGIN login -->
        <div class="login">
			<!-- BEGIN login-cover -->
			<div class="login-cover"></div>
			<!-- END login-cover -->
			<!-- BEGIN login-content -->
			<div class="login-content">
				<!-- BEGIN login-brand -->
				<div class="login-brand">
					<a href="#"><span class="logo"><i class="ti-infinite"></i></span> Infinite Admin</a>
				</div>
				<!-- END login-brand -->
				<!-- BEGIN login-desc -->
				<div class="login-desc">
					<?php echo $_SESSION['lang']['login_1'] ?>
				</div>
				<!-- END login-desc -->
				<!-- BEGIN login-form -->
				<form action="login" method="POST" name="login_form">
					<div class="form-group">
						<label class="control-label"><?php echo $_SESSION['lang']['login_2'] ?></label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Username" />
					</div>
					<div class="form-group">
						<label class="control-label"><?php echo $_SESSION['lang']['login_3'] ?></label>
						<input type="password" class="form-control" id="userPassword" name="userPassword" placeholder="Password" />
					</div>
					<button type="submit" class="btn btn-primary"><?php echo isset($_SESSION['lang']) ? $_SESSION['lang']['login_4'] : "Sign In"; ?></button>
					<input type="hidden" name="login">
				</form>
				<!-- END login-form -->
			</div>
			<!-- END login-content -->
        </div>
        <!-- END login -->
		
		<!-- BEGIN btn-scroll-top -->
		<a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="ti-arrow-up"></i></a>
		<!-- END btn-scroll-top -->
	</div>