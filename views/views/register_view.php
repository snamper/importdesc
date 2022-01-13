  <body class="body-wrapper">
  <div class="page-loader" style="background: url(assets/img/preloader.gif) center no-repeat #fff;"></div>
  <div class="main-wrapper">
   



<!-- PAGE TITLE SECTION -->
<!-- <section class="clearfix pageTitleSection" style="background-image: url();">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="pageTitle">
          <h2>Sign Up Page</h2>
        </div>
      </div>
    </div>
  </div>
</section> -->

<!-- SIGN UP SECTION -->
<section class="clearfix signUpSection">
  <div class="container">
    <div class="row">
      <!-- <div class="col-sm-4 col-xs-12">
        <div class="priceTableWrapper">
          <div class="priceTableTitle">
            <h2>Free <small>Need Free Support</small></h2>
          </div>
          <div class="priceAmount">
            <h2>0<small>USD/Year</small></h2>
          </div>
          <div class="priceInfo">
            <div class="priceShorting">
              <div class="checkbox-radio">
                <input id="checkbox41" type="checkbox" name="checkbox" value="41">
                <label for="checkbox41">
                  <span></span>Not Highlighted listing
                </label>
              </div>
              <div class="checkbox-radio">
                <input id="checkbox42" type="checkbox" name="checkbox" value="42">
                <label for="checkbox42">
                  <span></span>Low listing placement on:
                </label>
              </div>
              <div class="checkbox-radio marginCheck">
                <input id="radio41" type="radio" name="radio" value="41">
                <label for="radio41">
                  <span><span></span></span>Search results
                </label>
              </div>
              <div class="checkbox-radio marginCheck">
                <input id="radio42" type="radio" name="radio" value="42">
                <label for="radio42">
                  <span><span></span></span>Selected categories
                </label>
              </div>
              <div class="checkbox-radio marginCheck">
                <input id="radio43" type="radio" name="radio" value="43">
                <label for="radio43">
                  <span><span></span></span>Added keywords
                </label>
              </div>
            </div>
            <ul class="list-unstyled">
              <li>6 Products</li>
              <li>8 Photos</li>
              <li>5 Keywords</li>
              <li>6 Categories</li>
            </ul>
          </div>
        </div>
      </div> -->
      <div class="center-block col-sm-8 col-xs-12">
        <div class="signUpFormArea">
          <div class="priceTableTitle">
            <h2>Account Registration</h2>
          <!--   <p>Please fill out the fields below to create your account. We will send your account information to the email address you enter. Your email address and information will NOT be sold or shared with any 3rd party. If you already have an account, please, <a href="login.html">click here</a>.</p>
          </div> -->
          <div class="signUpForm">
            <form action="register" method="POST" name="register_form">
              <div class="formSection">
                <h3>Contact Information</h3>
                <div class="row">
                  <div class="form-group col-sm-6 col-xs-12 ">
                    <label for="firstName" class="control-label">First Name*</label>
                    <input type="text" class="form-control" id="firstName" name="firstName"  required>
                  </div>
                  <div class="form-group col-sm-6 col-xs-12">
                    <label for="lastName" class="control-label">Last Name*</label>
                    <input type="text" class="form-control" id="lastName" name="lastName"  required>
                  </div>
                  <div class="form-group col-xs-12">
                    <label for="emailAddress" class="control-label">Email Address*</label>
                    <input type="email" class="form-control" id="emailAddress" name="emailAddress">
                  </div>
                </div>
              </div>
              <div class="formSection">
                <h3>Account Information</h3>
                <div class="row">
                  <div class="form-group col-xs-12">
                    <label for="usernames" class="control-label">Username*</label>
                    <input type="text" class="form-control" id="usernames" name="usernames"  required>
                  </div>
                  <div class="form-group col-sm-6 col-xs-12">
                    <label for="passwordFirst" class="control-label">Password*</label>
                    <input type="password" class="form-control" id="password" name="password" minlength="10" required>
                  </div>
                  <div class="form-group col-sm-6 col-xs-12">
                    <label for="passwordAgain" class="control-label">Password (re-type)*</label>
                    <input type="password" class="form-control" id="passwordAgain" name="passwordAgain" minlength="10" required>
                  </div>
                </div>
              </div>
              <!-- <div class="form-group col-xs-12">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox">
                        I agree to the <a href="terms-of-services.html">Terms of Use</a> & <a href="#">Privacy Policy</a>. Your business listing is fully backed by our 100% money back guarantee.
                      </label>
                    </div>
                  </div> -->
                  <div class="form-group col-xs-12 ">
                      <input type="hidden" name="add">
                    <button type="submit" class="btn btn-primary">Create Account</button>
                  </div>
              <!-- <div class="formSection">
                <h3>Security Control</h3>
                <div class="row">
                  <div class="form-group col-xs-12">
                    <label for="usernames" class="control-label">Confirm that you are human*</label>
                    <img src="assets/img/business/recaptcha.jpg" alt="Image captcha" class="img-responsive img-rtl">
                  </div>
                  
                  
                </div> -->
              </div>
             <!--  <div class="formSection">
                <div class="cardBox">
                  <div class="paymentMethod">
                    <img src="assets/img/business/paypal.png" alt="Image paypal">
                  </div>
                  <ul class="list-inline">
                    <li><a href="#"><img src="assets/img/business/visa.jpg" alt="Image card"></a></li>
                    <li><a href="#"><img src="assets/img/business/master-card.jpg" alt="Image card"></a></li>
                    <li><a href="#"><img src="assets/img/business/american-express.jpg" alt="Image card"></a></li>
                    <li><a href="#"><img src="assets/img/business/discover.jpg" alt="Image card"></a></li>
                  </ul>
                </div>
                <p>We use <span>PayPal</span> to process all transactions securely. <span>Payments can be made using any major credit card, without the need for a PayPal account</span>. If you already have a PayPal account, you can also pay with PayPal funds or through your bank account. We don't keep any credit card information stored on our site. No tax is added to your order. For more information <a href="https://www.paypal.com">www.paypal.com</a></p>
              </div> -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  </div>

  <!-- LOGIN  MODAL -->
 <div id="loginModal" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog">

     
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Log In to your Account</h4>
        </div>
        <div class="modal-body">
          <form class="loginForm" method="POST" name="login_form" action="login">
            <div class="form-group">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <input type="email" class="form-control" id="EmailAddress" name="EmailAddress" placeholder="Email">
            </div>
            <div class="form-group">
              <i class="fa fa-lock" aria-hidden="true"></i>
              <input type="password" class="form-control" id="userPassword" name="userPassword" placeholder="Password">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Log In</button>
            </div>
            <div class="checkbox">
              <label><input type="checkbox"> Remember me</label>
              <a href="#" class="pull-right link">Fogot Password?</a>
            </div>
              <input type="hidden" name="login">
          </form>
        </div>
        <div class="modal-footer">
          <p>Don’t have an Account? <a href="#" class="link">Sign up</a></p>
        </div>
      </div>

    </div>
  </div>




 

</body>