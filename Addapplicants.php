<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Add_Applicants</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Add_PIC.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.8.8, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    
  
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Lists_PIC">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/"></head>
  <body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="en"><header class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-clearfix u-header" id="sec-1c6a" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1.25rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
            <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-color u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-spacing-30 u-unstyled u-nav-1">
                <li class="u-nav-item"><a class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" href="Blacklists.php" style="padding: 10px 0px;">Blacklists</a>
                    <div class="u-nav-popup">
                        <ul class="u-border-2 u-border-grey-75 u-h-spacing-7 u-nav u-unstyled u-v-spacing-12">
                            <li class="u-nav-item"><a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-white" href="Lists_PIC.php">Lists</a></li>
                            <li class="u-nav-item"><a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-white" href="Projects.php">Projects</a></li>
                            <li class="u-nav-item"><a class="u-active-custom-color-1 u-button-style u-hover-custom-color-1 u-nav-link u-white" href="Applicants.php">Applicants</a></li>
                        </ul>
                    </div>
                </li>
                <li class="u-nav-item"><a class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" href="PICcontrol.php" style="padding: 10px 0px;">Recruiters</a></li>
      <li class="u-nav-item"><a class="sign-out-button" href="Login.html">Sign Out</a></li>
                <li class="u-nav-item">
                    <span class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" style="padding: 10px 0px;">
                        <?php echo htmlspecialchars($_SESSION['email']); ?>
                    </span>
                </li>
                </ul>
        </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
        <img class="u-image u-image-contain u-image-default u-preserve-proportions u-image-1" src="images/image.png" alt="" data-image-width="512" data-image-height="512">
      </div></header>
  <body data-path-to-root="./" data-include-products="false" class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-header u-header" id="sec-a427"><div class="u-clearfix u-sheet u-sheet-1"></div></header>
    <section class="u-clearfix u-section-1" id="sec-4345">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="custom-expanded u-form u-grey-15 u-radius u-form-1">
          <form action="Add_Applicants.php" method="post">
            <div class="u-form-group u-form-name u-label-top">
                <label for="date-c33c" class="u-label u-label-1">Date:</label>
                <input type="date" id="date" name="date" class="u-input u-input-rectangle u-radius u-input-1" required="required">
            </div>
            <div class="u-form-group u-label-top">
              <label for="email-c33c" class="u-label u-label-2">Name:</label>
              <input type="text" placeholder="Enter applicant's name:" id="name" name="name" class="u-input u-input-rectangle u-radius u-input-2" required="required">
            </div>
            <div class="u-form-group u-label-top">
              <label for="message-c33c" class="u-label u-label-2">IC Number:</label>
              <input placeholder="Enter applicant's IC number:" id="IC" name="IC" class="u-input u-input-rectangle u-radius u-input-3" required="required" >
            </div>
            <div class="u-form-group u-label-top u-form-group-2">
              <label for="text-9beb" class="u-label u-label-4">Contact Number:</label>
              <input placeholder="Enter applicant's contact number:" id="contactNum" name="contactNum" class="u-input u-input-rectangle u-radius u-input-4" required="required">
            </div>
            <div class="u-form-group u-label-top u-form-group-2">
              <label for="text-9beb" class="u-label u-label-4">Email:</label>
              <input placeholder="Enter applicant's email address:" id="applicant_email" name="applicant_email" class="u-input u-input-rectangle u-radius u-input-4" required="required">
            </div>
            <div class="u-form-group u-form-message u-label-top u-form-group-6">
                <label for="text-37ba" class="u-label u-label-5">Remark:</label>
                <textarea placeholder="Any remark...." id="remark" name="remark" class="u-input u-input-rectangle u-radius u-input-5" data-country-code="my" ></textarea>
              </div>
            <div class="u-align-left u-form-group u-form-submit u-label-top">
              <label class="u-form-control-hidden u-label u-label-6"></label>
              <input type="submit" value="submit" class="u-form-control-hidden">
              <div class="u-align-center u-form-group u-form-submit u-label-top">
                <input type="submit" value="submit" class="u-form-control-hidden">
                <a href="#" class="u-active-white u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-color-1 u-hover-white u-radius-50 u-text-active-palette-2-base u-text-hover-palette-2-base u-btn-1">Submit</a>
              </div>
            </div>
            <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
            <div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix errors then try again. </div>
            <input type="hidden" value="" name="recaptchaResponse">
            <input type="hidden" name="formServices" value="04ba453f-9fe2-750a-246e-4aa8beaa194e">
          </form>
        </div>
      </div>
    </section>
    
  



    
    <section class="u-backlink u-clearfix u-grey-80">
      <p class="u-text">
        <span>This site was created with the </span>
        <a class="u-link" href="https://nicepage.com/" target="_blank" rel="nofollow">
          <span>Nicepage</span>
        </a>
      </p>
    </section>
  
</body></html>