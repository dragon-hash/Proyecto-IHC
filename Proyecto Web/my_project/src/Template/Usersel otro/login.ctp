<?= $this->Html->css('login') ?>
<?= $this->Html->css('alertas') ?>

<!-- include the BotDetect layout stylesheet --> 
<?= $this->Html->css(captcha_layout_stylesheet_url(), ['inline' => false]) ?>

<body>
<div class="form">

  <ul class="tab-group">
    <li class="tab active"><a href="#"><?php echo __('Log In') ?></a></li>
    <li><?= $this->Html->link(__('Sign Up'),['controller' => 'Users', 'action' => 'register','_full' => true]);?></li>
  </ul>

  <div class="tab-content">
     
      <h2><?php echo __('Log in with your account') ?></h2>

      <!--<form action="/" method="post">-->
        <?= $this->Form->create()?>
        <div class="field-wrap">
          <label>
             <?php echo __('Write your E-mail') ?><span class="req">*</span>
            </label>
          <input type="email" name="email" id="email" required autocomplete="off" />
        </div>

        <div class="field-wrap">
          <label>
              <?php echo __('Enter your password') ?><span class="req">*</span>
            </label>
          <input type="password" name="password" id="password" required autocomplete="off" />
        </div>
        <div class="field-wrap" >
       <!-- show captcha image html --> 
       <div align="center">
        <?= captcha_image_html() ?> 
        </div>
      
        <!-- Captcha code user input textbox --> 
        <?= $this->Form->input('CaptchaCode', [ 
          'label' => __('Retype the characters from the picture:').'*',
          'maxlength' => '10', 
          'id' => 'CaptchaCode',
          'style' => 'color: white'
        ]) ?> 

    </div>
        <p class="forgot"><a href="#"><?php echo __('Forgot Password?') ?></a></p>
    
        <button class="button button-block" ><?php echo __('Log In') ?></button>

      <!--</form>-->
  <?= $this->Form->end()?>
    
  </div>
  <!-- tab-content -->

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v5.0&appId=3226352974105703&autoLogAppEvents=1"></script>

<div class="fb-login-button" data-width="" data-size="large" data-button-type="login_with" data-auto-logout-link="false" data-use-continue-as="false"></div>

</div>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '3226352974105703',
      cookie     : true,
      xfbml      : true,
      version    : 'v5.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

</body>






<!-- /form -->
<?= $this->Html->script('jquery-3.1.1.min.js') ?>
<?= $this->Html->script('login') ?>
