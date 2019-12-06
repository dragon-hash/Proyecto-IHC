<?= $this->Html->css('login') ?>
<?= $this->Html->css('alertas') ?>
<?= $this->Html->css('font-awesome') ?>
<?= $this->Html->css('bootstrap-social') ?>

<!-- include the BotDetect layout stylesheet --> 
<?= $this->Html->css(captcha_layout_stylesheet_url(), ['inline' => false]) ?>

<body>
<div class="form">
  <ul class="tab-group">
	<p><?= $this->Html->link(__('Return to main page'),'/');?></p>
    <li><?= $this->Html->link(__('Log In'),['controller' => 'Users', 'action' => 'login','_full' => true]);?></li>
    <li><?= $this->Html->link(__('Sign Up'),['controller' => 'Users', 'action' => 'register','_full' => true]);?></li>
  </ul>

  <div class="tab-content">
     
      <h2><?php echo __('Forgot password') ?></h2>

      <!--<form action="/" method="post">-->
        <?= $this->Form->create()?>
        <div class="field-wrap">
          <label>
             <?php echo __('Write your E-mail') ?><span class="req">*</span>
            </label>
          <input type="email" name="email" id="email" required autocomplete="off" />
        </div>
        <div class="field-wrap" >
	       <!-- show captcha image html --> 
	       <div align="center">
		<?= captcha_image_html() ?> 
		</div>
	</div>
      	<div class="field-wrap" >
		<!-- Captcha code user input textbox --> 
		<?= $this->Form->input('CaptchaCode', [ 
		  'label' => __('Retype the characters from the picture:').'*',
		  'maxlength' => '10', 
		  'id' => 'CaptchaCode',
		  'style' => 'color: white'
		]) ?> 
	</div>
        <button class="button button-block" ><?php echo __('Get new password') ?></button>
      <!--</form>-->
  <?= $this->Form->end()?>
    
  </div>

</div>

</body>






<!-- /form -->
<?= $this->Html->script('jquery-3.1.1.min.js') ?>
<?= $this->Html->script('login') ?>
