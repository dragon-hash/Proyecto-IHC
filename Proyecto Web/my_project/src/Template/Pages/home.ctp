<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->layout = false;

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Hot Metal</title>

<!-- Stylesheets -->
<link href="home/css/bootstrap.css" rel="stylesheet">
<link href="home/plugins/revolution/css/settings.css" rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
<link href="home/plugins/revolution/css/layers.css" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
<link href="home/plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->
<link href="home/css/style.css" rel="stylesheet">
<link href="home/css/responsive.css" rel="stylesheet">

<!--Color Switcher Mockup-->
<link href="home/css/color-switcher-design.css" rel="stylesheet">

<!--Color Themes-->
<link id="theme-color-file" href="home/css/color-themes/default-theme.css" rel="stylesheet">

<!--Favicon-->
<link rel="shortcut icon" href="home/images/favicon.png" type="image/x-icon">
<link rel="icon" href="home/images/favicon.png" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>
<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Main Header-->
    <header class="main-header">

        <!--Header Top-->
        <div class="header-top">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <div class="top-left">
                        <ul class="clearfix">
                            <li><?php echo __('Auto Repair & Service') ?></li>
                        </ul>
                    </div>
                    <div class="top-right clearfix">
                        <ul class="social-icon-one clearfix">
                            <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                            <li><a href="https://www.youtube.com/channel/UCQKyKJ4GtrUQco_5EVZVcig?view_as=subscriber"><span class="fab fa-youtube"></span></a></li>
                <li><a href="#"><span class="fab fa-github"></span></a></li>
                
                        </ul>
            <!--Login and Register-->
                        <div class="call-btn">
                    <?php if(isset($current_user)):?>
                    <?php if($current_user['role'] === 'Administrador'):?>
                    <?= $this->Html->link( $current_user['name'], ['controller' => 'users', 'action' => 'index', '__full' => true]);?>
                    <?php else: ?>
                     <?= $this->Html->link( $current_user['name'], ['controller' => 'cars', 'action' => 'index', '__full' => true]);?>      
                     <?php endif ?>
                    <?= $this->Html->link( __('Logout'), ['controller' => 'users', 'action' => 'logout', '__full' => true]);?>      
                <?php else: ?>
                    <?= $this->Html->link( __('Register'), ['controller' => 'users', 'action' => 'register', '__full' => true]);?>
                            <?= $this->Html->link( __('Login'), ['controller' => 'users', 'action' => 'login', '__full' => true]);?>
                <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top -->

        <!--Header-Upper-->
        <div class="header-upper">
            <div class="auto-container">
                <div class="clearfix">
                    <div class="pull-left logo-outer">
                        <div class="logo"><a href="http://198.23.255.30/~batman/my_project/"><img src="home/images/logo.png" alt="" title=""></a></div>
                    </div>
                    <div class="pull-right upper-right clearfix">
                        <!--Info Box-->
                        <div class="upper-column info-box">
                            <div class="icon-box"><span class="flaticon-home"></span></div>
                            <ul>
                                <li><strong><?php echo __('Alto Selva Alegre J 22,') ?></strong></li>
                                <li><?php echo __('Arequipa City, Peru') ?></li>
                            </ul>

                        </div>
                        <!--Info Box-->
                        <div class="upper-column info-box">
                            <div class="icon-box"><span class="flaticon-mail-1"></span></div>
                            <ul>
                                <li><strong><?php echo __('Send your mail at') ?></strong></li>
                                <li><a href="#">hotmetal432@gmail.com</a></li>
                            </ul>
                        </div>

                        <!--Info Box-->
                        <div class="upper-column info-box">
                            <div class="icon-box"><span class="flaticon-clock"></span></div>
                            <ul>
                                <li><strong><?php echo __('Working time:') ?></strong></li>
                                <li><?php echo __('Monday - Friday: 08 AM - 06 PM') ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!--Header Lower-->
        <div class="header-lower">

            <div class="auto-container">
                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <div class="navbar-header">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="current dropdown"><a href="#"><?php echo __('Home') ?></a>
                                    <ul>
                                        <li><?= $this->Html->link(__('Home'),'');?></li>
                                        <?php if(isset($current_user)):?>
                                            <?php if($current_user['role'] === 'Administrador'):?>
                                                 <li><?= $this->Html->link( $current_user['name'], ['controller' => 'users', 'action' => 'index', '__full' => true]);?></li>
                                            <?php else: ?>
                                                    <li><?= $this->Html->link( $current_user['name'], ['controller' => 'cars', 'action' => 'index', '__full' => true]);?></li>     
                                            <?php endif ?>
                                            <li><?= $this->Html->link( __('Logout'), ['controller' => 'users', 'action' => 'logout', '__full' => true]);?></li>         
                                        <?php else: ?>
                                            <li><?= $this->Html->link( __('Register'), ['controller' => 'users', 'action' => 'register', '__full' => true]);?></li> 
                                            <li><?= $this->Html->link( __('Login'), ['controller' => 'users', 'action' => 'login', '__full' => true]);?></li>   
                                        <?php endif ?>

                                    </ul>
                                </li>
                                    <li><?= $this->Html->link(__('Services'),'/services');?></li>
 
                                <li class="dropdown"><a href="#"><?php echo __('Shop') ?></a>
                                    <ul>
                                        <li><?= $this->Html->link(__('Products'),'/shop');?></li>
                                        <li><?= $this->Html->link(__('Shopping Cart'),'/cart');?></li>
                                    </ul>
                                </li>
                                <li><?= $this->Html->link(__('Contact'),'/contact');?></li>
                <li class="dropdown"><a href="#"><?php echo __('Language') ?></a>
                                    <ul>
                    <li><?=$this->Html->link([
                                            $this->Html->image("icons/32/Peru.png", ["alt" => "Español"]),'&ensp;'.__('Spanish')],
                                            ['controller' => 'App', 'action' => 'change-language', 'es_PE'],
                                            ['escape' => false]
                                        );?></li>
                    <li><?=$this->Html->link([
                                            $this->Html->image("icons/32/EEUU.png", ["alt" => "English"]),'&ensp;'.__('English')],
                                            ['controller' => 'App', 'action' => 'change-language', 'en_US'],
                                            ['escape' => false]
                                        );?></li>
                                        <li><?=$this->Html->link([
                                            $this->Html->image("icons/32/brazil.png", ["alt" => "Portugues"]),'&ensp;'.__('Portuguese')],
                                            ['controller' => 'App', 'action' => 'change-language', 'pt_BR'],
                                            ['escape' => false]
                                        );?></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->

                    <!--Search Box-->
                    <div class="search-box-outer">
                        <!--Search Box-->
                        <div class="dropdown dropdown-outer">
                            <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                            <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                <li class="panel-outer">
                                    <div class="form-container">
                                        <form method="post" action="#">
                                            <div class="form-group">
                                                <input type="search" name="field-name" value="" placeholder="Search Here" required="">
                                                <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
    



                        </div>
                    </div><!--End earch Box-->

                </div>
            </div>
        </div>
        <!--End Header Lower-->

        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <a href="http://198.23.255.30/~batman/my_project/" class="img-responsive"><img src="home/images/logo-small.png" alt="" title=""></a>
                </div>

                <!--Right Col-->
                <div class="right-col pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu  navbar-expand-md">
                        <div class="navbar-header">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                            <ul class="navigation clearfix">
                                <li class="current dropdown"><a href="#"><?php echo __('Home') ?></a>
                                    <ul>
                                        <li><?= $this->Html->link(__('Home'),'');?></li>
                                        <?php if(isset($current_user)):?>
                    <?php if($current_user['role'] === 'Administrador'):?>
                    <li><?= $this->Html->link( $current_user['name'], ['controller' => 'users', 'action' => 'index', '__full' => true]);?></li>
                    <?php else: ?>
                     <li><?= $this->Html->link( $current_user['name'], ['controller' => 'cars', 'action' => 'index', '__full' => true]);?></li>     
                     <?php endif ?>
                    <li><?= $this->Html->link( __('Logout'), ['controller' => 'users', 'action' => 'logout', '__full' => true]);?></li>         
                <?php else: ?>
                    <li><?= $this->Html->link( __('Register'), ['controller' => 'users', 'action' => 'register', '__full' => true]);?></li> 
                            <li><?= $this->Html->link( __('Login'), ['controller' => 'users', 'action' => 'login', '__full' => true]);?></li>   
                <?php endif ?>

                                    </ul>
                                </li>
                                           
                                <li><?= $this->Html->link(__('Services'),'/services');?></li>
                                <li class="dropdown"><a href="#"><?php echo __('Shop') ?></a>
                                    <ul>
                    <li><?= $this->Html->link(__('Products'),'/shop');?></li>
                                        <li><?= $this->Html->link(__('Shopping Cart'),'/cart');?></li>
                                    </ul>
                                </li>
                                <li><?= $this->Html->link(__('Contact'),'/contact');?></li>
				<li class="dropdown"><a href="#"><?php echo __('Language') ?></a>
                                    <ul>
                    <li><?=$this->Html->link([
                                            $this->Html->image("icons/32/Peru.png", ["alt" => "Español"]),'&ensp;'.__('Spanish')],
                                            ['controller' => 'App', 'action' => 'change-language', 'es_PE'],
                                            ['escape' => false]
                                        );?></li>
                    <li><?=$this->Html->link([
                                            $this->Html->image("icons/32/EEUU.png", ["alt" => "English"]),'&ensp;'.__('English')],
                                            ['controller' => 'App', 'action' => 'change-language', 'en_US'],
                                            ['escape' => false]
                                        );?></li>
                                        <li><?=$this->Html->link([
                                            $this->Html->image("icons/32/brazil.png", ["alt" => "Portugues"]),'&ensp;'.__('Portuguese')],
                                            ['controller' => 'App', 'action' => 'change-language', 'pt_BR'],
                                            ['escape' => false]
                                        );?></li>
                                    </ul>
                                </li>
                            </ul>
				
                        </div>
                    </nav><!-- Main Menu End-->
                </div>

            </div>
        </div>
        <!--End Sticky Header-->
    </header>
    <!--End Main Header -->

    <!--Main Slider-->
    <section class="main-slider">
        <div class="rev_slider_wrapper fullwidthbanner-container"  id="rev_slider_one_wrapper" data-source="gallery">
            <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
                <ul>
                    <!-- Slide 1 -->
                    <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1687" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="images/main-slider/image-1.jpg" data-title="Slide Title" data-transition="parallaxvertical">

                        <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="images/main-slider/image-1.jpg">

                        <div class="tp-caption"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-width="['550','600','550','550']"
                        data-whitespace="normal"
                        data-hoffset="['15','15','15','15']"
                        data-voffset="['-120','-120','-120','-120']"
                        data-x="['left','left','left','left']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                            <h4><?php echo __('Your Vehicle is')?></h4>
                        </div>

                        <div class="tp-caption"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-width="['700','700','700','700']"
                        data-whitespace="normal"
                        data-hoffset="['15','15','15','15']"
                        data-voffset="['-65','-65','-65','-65']"
                        data-x="['left','left','left','left']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                            <h2><?php echo __('Save in our Hands')?></h2>
                        </div>

                        <div class="tp-caption"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-whitespace="normal"
                        data-width="['700','700','450','450']"
                        data-hoffset="['15','15','15','15']"
                        data-voffset="['5','5','5','5']"
                        data-x="['left','left','left','left']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                            <div class="text"><?php echo __('We specialize in complete auto care at a low cost and in a')?> <br> <?php echo __('professional manner.')?></div>
                        </div>

                        <div class="tp-caption tp-resizeme"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-width="auto"
                        data-whitespace="nowrap"
                        data-hoffset="['15','15','15','15']"
                        data-voffset="['105','105','105','105']"
                        data-x="['left','left','left','left']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                <?= $this->Html->link( __('Booking Now'), '/services',['class' => 'theme-btn btn-style-one']); ?>
                            
                        </div>
                    </li>

                    <!-- Slide 2 -->
                    <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1688" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="images/main-slider/image-1.jpg" data-title="Slide Title" data-transition="parallaxvertical">

                        <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="images/main-slider/image-2.jpg">

                        <div class="tp-caption"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-width="['550','600','550','550']"
                        data-whitespace="normal"
                        data-textalign="center"
                        data-hoffset="['0','0','0','0']"
                        data-voffset="['-120','-120','-120','-120']"
                        data-x="['center','center','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                            <h4><?php echo __('The Best Car Repair and')?></h4>
                        </div>

                        <div class="tp-caption"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-width="['700','700','700','700']"
                        data-textalign="center"
                        data-whitespace="normal"
                        data-hoffset="['0','0','0','0']"
                        data-voffset="['-65','-65','-65','-65']"
                        data-x="['center','center','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                            <h2><?php echo __('Maintenance Auto Service')?></h2>
                        </div>

                        <div class="tp-caption"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-textalign="center"
                        data-whitespace="normal"
                        data-width="['700','700','550','450']"
                        data-hoffset="['0','0','0','0']"
                        data-voffset="['5','5','5','15']"
                        data-x="['center','center','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                            <div class="text"><?php echo __('We specialize in complete auto care at a low cost and in a')?> <br> <?php echo __('professional manner.')?></div>
                        </div>

                        <div class="tp-caption tp-resizeme"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-width="auto"
                        data-whitespace="nowrap"
                        data-textalign="center"
                        data-hoffset="['0','0','0','0']"
                        data-voffset="['105','105','105','105']"
                        data-x="['center','center','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                            <?= $this->Html->link( __('Booking Now'), '/services',['class' => 'theme-btn btn-style-one']); ?>
                        </div>
                    </li>

                    <!-- Slide 3 -->
                    <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1697" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="images/main-slider/image-1.jpg" data-title="Slide Title" data-transition="parallaxvertical">
                        <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="images/main-slider/image-3.jpg">

                        <div class="tp-caption"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-width="['490','490','490','490']"
                        data-whitespace="normal"
                        data-hoffset="['0','15','15','15']"
                        data-voffset="['-120','-120','-120','-120']"
                        data-x="['right','left','left','left']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                            <h4><?php echo __('The Best Car Repair and')?></h4>
                        </div>

                        <div class="tp-caption"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-width="['490','590','490','490']"
                        data-whitespace="normal"
                        data-hoffset="['0','15','15','15']"
                        data-voffset="['-65','-65','-65','-65']"
                        data-x="['right','left','left','left']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                            <h2><?php echo __('Maintenance Service')?></h2>
                        </div>

                        <div class="tp-caption"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-whitespace="normal"
                        data-width="['490','490','390','490']"
                        data-hoffset="['0','15','15','15']"
                        data-voffset="['5','5','5','5']"
                        data-x="['right','left','left','left']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                            <div class="text"><?php echo __('We specialize in complete auto care at a low cost and in a')?> <br> <?php echo __('professional manner.')?></div>
                        </div>

                        <div class="tp-caption tp-resizeme"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-width="['490','490','490','490']"
                        data-whitespace="nowrap"
                        data-hoffset="['0','15','15','15']"
                        data-voffset="['105','105','105','105']"
                        data-x="['right','left','left','left']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                            <?= $this->Html->link( __('Booking Now'), '/services',['class' => 'theme-btn btn-style-one']); ?>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </section>
    <!--End Main Slider-->

    <!-- About Us -->
    <section class="about-us">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <h2><?php echo __('Welcome to Hot Metal')?></h2>
                    <h4><?php echo __('Repair and Car Service')?></h4>
                    <div class="primary-text"><?php echo __('We offer a wide range of hydraulic cartridge valves, customized hydraulic integrated manifolds and valves for hydraulic breaking systems')?></div>
                    <div class="text"><?php echo __('We work with clients big and small across a range of sectors and we utilise all forms of media to get your name out there in a way that’s right for you. We have a number of different teams within our agency that specialise in different areas of business so you can be sure that you won’t receive a generic service and although we can’t boast years and years of service we can ensure you that is a good thing in this industry')?></div>
                    <ul class="list-style-one clearfix">
                        <li><?php echo __('Professional car cleaning')?></li>
                        <li><?php echo __('Monthly car inspections')?></li>
                        <li><?php echo __('Car painting assets and service')?></li>
                        <li><?php echo __('Creating new car assets and wheels')?></li>
                    </ul>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="image-box">
                        <a href="#"><img src="home/images/resource/about-img.jpg" alt=""></a>
                    </div>
                    <div class="row clearfix">
                        <div class="column col-lg-6 col-md-6 col-sm-12">
                            <h3><a href="#"><?php echo __('Our Mission')?></a></h3>
                            <p><?php echo __('Our most popular service is our Virtual Receptionist. We know that sometimes it’s difficult to get to the phone')?></p>
                            <a href="#" class="read-more"><?php echo __('Read More')?></a>
                        </div>

                        <div class="column col-lg-6 col-md-6 col-sm-12">
                            <h3><a href="#"><?php echo __('Our History')?></a></h3>
                            <p><?php echo __('If you are in the middle of something and you don’t want to miss that important call that could be the start of an exciting')?></p>
                            <a href="#" class="read-more"><?php echo __('Read More')?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us -->

    <!-- Fact counter -->
    <section class="fun-fact-section" style="background-image:url(home/images/background/1.jpg);">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- Count box -->
                <div class="count-box col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box"><span class="flaticon-avatar-1"></span></div>
                        <span class="count-text" data-speed="2000" data-stop="1035">0</span>
                        <div class="counter-title"><h5><?php echo __('Total experts')?></h5></div>
                    </div>
                </div>

                <!-- Count box -->
                <div class="count-box col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box"><span class="flaticon-transport"></span></div>
                        <span class="count-text" data-speed="2000" data-stop="1035">0</span>
                        <div class="counter-title"><h5><?php echo __('Service Done')?></h5></div>
                    </div>
                </div>

                <!-- Count box -->
                <div class="count-box col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box"><span class="flaticon-boy-broad-smile"></span></div>
                        <span class="count-text" data-speed="2000" data-stop="1226">0</span>
                        <div class="counter-title"><h5><?php echo __('Happy Client')?></h5></div>
                    </div>
                </div>

                <!-- Count box -->
                <div class="count-box col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box"><span class="flaticon-car-1"></span></div>
                        <span class="count-text" data-speed="2000" data-stop="1035">0</span>
                        <div class="counter-title"><h5><?php echo __('Total Service')?></h5></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Fact counter -->

    <!-- Feature Section -->
    <section class="feature-section" style="background-image:url(home/images/background/2.jpg);">
        <div class="auto-container">
            <div class="title-box">
                <h2><?php echo __('Our Features')?></h2>
            </div>

            <div class="features-carousel owl-carousel owl-theme">
                <!-- Feature block -->
                <div class="feature-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <a href="#"><img src="home/images/resource/feature-1.jpg" alt=""></a>
                            <span class="price">65<sup>$</sup></span>
                        </div>
                        <div class="lower-content">
                            <h3><?= $this->Html->link(__('Suspension Repair'),'/service_detail');?></h3>
                            <a href="#" class="read-more"><i class="fa fa-angle-right"></i> <?php echo __('Get A Quote')?></a>
                        </div>
                    </div>
                </div>

                <!-- Feature block -->
                <div class="feature-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <a href="#"><img src="home/images/resource/feature-2.jpg" alt=""></a>
                            <span class="price">45<sup>$</sup></span>
                        </div>
                        <div class="lower-content">
                            <h3><?= $this->Html->link(__('Engine Overhaul'),'/service_detail');?></h3>
                            <a href="#" class="read-more"><i class="fa fa-angle-right"></i> <?php echo __('Get A Quote')?></a>
                        </div>
                    </div>
                </div>

                <!-- Feature block -->
                <div class="feature-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <a href="#"><img src="home/images/resource/feature-3.jpg" alt=""></a>
                            <span class="price">25<sup>$</sup></span>
                        </div>
                        <div class="lower-content">
                            <h3><?= $this->Html->link(__('Wheel Alignment'),'/service_detail');?></h3>
                            <a href="#" class="read-more"><i class="fa fa-angle-right"></i> <?php echo __('Get A Quote')?></a>
                        </div>
                    </div>
                </div>

                <!-- Feature block -->
                <div class="feature-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <a href="#"><img src="home/images/resource/feature-4.jpg" alt=""></a>
                            <span class="price">85<sup>$</sup></span>
                        </div>
                        <div class="lower-content">
                            <h3><?= $this->Html->link(__('Suspension Repair'),'/service_detail');?></h3>
                            <a href="#" class="read-more"><i class="fa fa-angle-right"></i> <?php echo __('Get A Quote')?></a>
                        </div>
                    </div>
                </div>

                                <!-- Feature block -->
                <div class="feature-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <a href="#"><img src="home/images/resource/feature-1.jpg" alt=""></a>
                            <span class="price">65<sup>$</sup></span>
                        </div>
                        <div class="lower-content">
                            <h3><a href="#"><?php echo __('Suspension Repair')?></a></h3>
                            <a href="#" class="read-more"><i class="fa fa-angle-right"></i> <?php echo __('Get A Quote')?></a>
                        </div>
                    </div>
                </div>

                <!-- Feature block -->
                <div class="feature-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <a href="#"><img src="home/images/resource/feature-2.jpg" alt=""></a>
                            <span class="price">45<sup>$</sup></span>
                        </div>
                        <div class="lower-content">
                            <h3><a href="#"><?php echo __('Engine Overhaul')?></a></h3>
                            <a href="#" class="read-more"><i class="fa fa-angle-right"></i> <?php echo __('Get A Quote')?></a>
                        </div>
                    </div>
                </div>

                <!-- Feature block -->
                <div class="feature-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <a href="#"><img src="home/images/resource/feature-3.jpg" alt=""></a>
                            <span class="price">25<sup>$</sup></span>
                        </div>
                        <div class="lower-content">
                            <h3><a href="#"><?php echo __('Wheel Alignment')?></a></h3>
                            <a href="#" class="read-more"><i class="fa fa-angle-right"></i> <?php echo __('Get A Quote')?></a>
                        </div>
                    </div>
                </div>

                <!-- Feature block -->
                <div class="feature-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <a href="#"><img src="home/images/resource/feature-4.jpg" alt=""></a>
                            <span class="price">85<sup>$</sup></span>
                        </div>
                        <div class="lower-content">
                            <h3><a href="#"><?php echo __('Suspension Repair')?></a></h3>
                            <a href="#" class="read-more"><i class="fa fa-angle-right"></i> <?php echo __('Get A Quote')?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Feature Section -->

    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2><?php echo __('Our Latest Works')?></h2>
                <div class="separator"><span class="flaticon-settings-2"></span></div>
            </div>

             <!--MixitUp Galery-->
            <div class="mixitup-gallery">
                <!--Filter-->
                <div class="filters text-center clearfix">
                    <ul class="filter-tabs filter-btns clearfix">
                        <li class="active filter" data-role="button" data-filter="all"><?php echo __('View All')?></li>
                        <li class="filter" data-role="button" data-filter=".diagnostics"><?php echo __('Diagnostics')?></li>
                        <li class="filter" data-role="button" data-filter=".engine"><?php echo __('Engine')?></li>
                        <li class="filter" data-role="button" data-filter=".repair"><?php echo __('Repairs')?></li>
                        <li class="filter" data-role="button" data-filter=".wheel"><?php echo __('Wheel Service')?></li>
                        <li class="filter" data-role="button" data-filter=".conditioner"><?php echo __('Air Conditioner')?></li>
                    </ul>
                </div>

                <div class="filter-list row clearfix">
                    <!-- Project item -->
                    <div class="gallery-item mix all engine wheel conditioner col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img src="home/images/gallery/1.jpg" alt=""></figure>
                            <div class="overlay-box">
                                <div class="icon-box">
                                    <a href="#" class="link"><span class="icon fa fa-link"></span></a>
                                    <a href="home/images/gallery/1.jpg" class="link" data-fancybox="gallery" data-caption=""><span class="icon fa fa-expand-arrows-alt"></span></a>
                                    <h3><a href="#"><?php echo __('Car Repair Service')?></a></h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Project item -->
                    <div class="gallery-item mix all diagnostics repair col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img src="home/images/gallery/2.jpg" alt=""></figure>
                            <div class="overlay-box">
                                <div class="icon-box">
                                    <a href="#" class="link"><span class="icon fa fa-link"></span></a>
                                    <a href="home/images/gallery/2.jpg" class="link" data-fancybox="gallery" data-caption=""><span class="icon fa fa-expand-arrows-alt"></span></a>
                                    <h3><a href="#"><?php echo __('Car Repair Service')?></a></h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Project item -->
                    <div class="gallery-item mix all engine repair conditioner col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img src="home/images/gallery/3.jpg" alt=""></figure>
                            <div class="overlay-box">
                                <div class="icon-box">
                                    <a href="#" class="link"><span class="icon fa fa-link"></span></a>
                                    <a href="home/images/gallery/3.jpg" class="link" data-fancybox="gallery" data-caption=""><span class="icon fa fa-expand-arrows-alt"></span></a>
                                    <h3><a href="#"><?php echo __('Car Repair Service')?></a></h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Project item -->
                    <div class="gallery-item mix all wheel repair col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img src="home/images/gallery/4.jpg" alt=""></figure>
                            <div class="overlay-box">
                                <div class="icon-box">
                                    <a href="#" class="link"><span class="icon fa fa-link"></span></a>
                                    <a href="home/images/gallery/4.jpg" class="link" data-fancybox="gallery" data-caption=""><span class="icon fa fa-expand-arrows-alt"></span></a>
                                    <h3><a href="#"><?php echo __('Car Repair Service')?></a></h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Project item -->
                    <div class="gallery-item mix all diagnostics conditioner engine col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img src="home/images/gallery/5.jpg" alt=""></figure>
                            <div class="overlay-box">
                                <div class="icon-box">
                                    <a href="#" class="link"><span class="icon fa fa-link"></span></a>
                                    <a href="home/images/gallery/5.jpg" class="link" data-fancybox="gallery" data-caption=""><span class="icon fa fa-expand-arrows-alt"></span></a>
                                    <h3><a href="#"><?php echo __('Car Repair Service')?></a></h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Project item -->
                    <div class="gallery-item mix all wheel repair col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img src="home/images/gallery/6.jpg" alt=""></figure>
                            <div class="overlay-box">
                                <div class="icon-box">
                                    <a href="#" class="link"><span class="icon fa fa-link"></span></a>
                                    <a href="home/images/gallery/6.jpg" class="link" data-fancybox="gallery" data-caption=""><span class="icon fa fa-expand-arrows-alt"></span></a>
                                    <h3><a href="#"><?php echo __('Car Repair Service')?></a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-box text-center">
                    <a href="#" class="theme-btn btn-style-two"><?php echo __('View All')?></a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Gallery section -->

    <!-- Subscribe Section -->
    <section class="subscribe-section">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h3><?php echo __('Check out our repair service for your car and get a free clean')?></h3>
                <a href="#" class="call-btn"><?php echo __('Order Now')?></a>
            </div>
        </div>
    </section>
    <!-- End Subscribe Section -->

    <!-- News section -->
    <section class="news-section" style="background-image: url(home/images/background/pattern.png);">
        <div class="auto-container">
            <div class="title-box">
                <h2><?php echo __('Our Latest News')?></h2>
            </div>

            <!-- News Carousel -->
            <div class="news-carousel owl-carousel owl-theme">
                <!-- News Block -->
                <div class="news-block">
                    <div class="inner-box clearfix">
                        <div class="image-box">
                            <div class="image"><a href="#"><img src="home/images/resource/news-1.jpg" alt=""></a></div>
                            <div class="label">
                                <div class="date"><span>17</span> oct</div>
                                <div class="likes"><i class="far fa-heart"></i> 02</div>
                            </div>
                        </div>
                        <div class="content-box">
                            <h3><a href="#"><?php echo __('Tips for car maintanence')?></a></h3>
                            <ul class="info">
                                <li><a href="#"><i class="far fa-user"></i> <?php echo __('Admin')?></a></li>
                                <li><a href="#"><i class="far fa-comments"></i> <?php echo __('comment')?> 02</a></li>
                            </ul>
                            <p><?php echo __('A lot of auto repair customerss questions the importance of wheel alignment.')?></p>
                            <a href="#" class="read-more"><?php echo __('Read More')?> <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- News Block -->
                <div class="news-block">
                    <div class="inner-box clearfix">
                        <div class="image-box">
                            <div class="image"><a href="#"><img src="home/images/resource/news-2.jpg" alt=""></a></div>
                            <div class="label">
                                <div class="date"><span>17</span> oct</div>
                                <div class="likes"><i class="far fa-heart"></i> 02</div>
                            </div>
                        </div>
                        <div class="content-box">
                            <h3><a href="#"><?php echo __('Tips for car maintanence')?></a></h3>
                            <ul class="info">
                                <li><a href="#"><i class="far fa-user"></i> <?php echo __('Admin')?></a></li>
                                <li><a href="#"><i class="far fa-comments"></i> <?php echo __('comment')?> 02</a></li>
                            </ul>
                            <p><?php echo __('A lot of auto repair customerss questions the importance of wheel alignment.')?></p>
                            <a href="#" class="read-more"><?php echo __('Read More')?> <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- News Block -->
                <div class="news-block">
                    <div class="inner-box clearfix">
                        <div class="image-box">
                            <div class="image"><a href="#"><img src="home/images/resource/news-1.jpg" alt=""></a></div>
                            <div class="label">
                                <div class="date"><span>17</span> oct</div>
                                <div class="likes"><i class="far fa-heart"></i> 02</div>
                            </div>
                        </div>
                        <div class="content-box">
                            <h3><a href="#"><?php echo __('Tips for car maintanence')?></a></h3>
                            <ul class="info">
                                <li><a href="#"><i class="far fa-user"></i> <?php echo __('Admin')?></a></li>
                                <li><a href="#"><i class="far fa-comments"></i> <?php echo __('comment')?> 02</a></li>
                            </ul>
                            <p><?php echo __('A lot of auto repair customerss questions the importance of wheel alignment.')?></p>
                            <a href="#" class="read-more"><?php echo __('Read More')?> <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- News Block -->
                <div class="news-block">
                    <div class="inner-box clearfix">
                        <div class="image-box">
                            <div class="image"><a href="#"><img src="home/images/resource/news-2.jpg" alt=""></a></div>
                            <div class="label">
                                <div class="date"><span>17</span> oct</div>
                                <div class="likes"><i class="far fa-heart"></i> 02</div>
                            </div>
                        </div>
                        <div class="content-box">
                            <h3><a href="#"><?php echo __('Tips for car maintanence')?></a></h3>
                            <ul class="info">
                                <li><a href="#"><i class="far fa-user"></i> <?php echo __('Admin')?></a></li>
                                <li><a href="#"><i class="far fa-comments"></i> <?php echo __('comment')?> 02</a></li>
                            </ul>
                            <p><?php echo __('A lot of auto repair customerss questions the importance of wheel alignment.')?></p>
                            <a href="#" class="read-more"><?php echo __('Read More')?> <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End News section -->

    <!-- Tesm Section -->
    <section class="team-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2><?php echo __('Expert Workers')?></h2>
                <div class="separator"><span class="flaticon-settings-2"></span></div>
            </div>

            <div class="row clearfix">
                <!-- Team Block -->
                <div class="team-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure><img src="home/images/resource/team-1.png" alt=""></figure>
                            <ul class="social-icon">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                        <div class="info-box">
                            <div class="inner-box">
                                <h3 class="name"><a href="#">HARKUS HARVING</a></h3>
                                <span class="designation"><?php echo __('Mechanic Worker')?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Block -->
                <div class="team-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure><img src="home/images/resource/team-2.png" alt=""></figure>
                            <ul class="social-icon">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                        <div class="info-box">
                            <div class="inner-box">
                                <h3 class="name"><a href="#">Hackson willingham</a></h3>
                                <span class="designation"><?php echo __('Project Manager')?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Block -->
                <div class="team-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure><img src="home/images/resource/team-3.png" alt=""></figure>
                            <ul class="social-icon">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                        <div class="info-box">
                            <div class="inner-box">
                                <h3 class="name"><a href="#">HARKUS HARVING</a></h3>
                                <span class="designation"><?php echo __('Mechanic Worker')?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Tesm Section -->

    <!-- Testimonial Seectin -->
    <section class="testimonial-section" style="background-image: url(home/images/background/3.jpg);">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2><?php echo __('What Client Says')?></h2>
                <div class="separator"><span class="flaticon-settings-2"></span></div>
            </div>

            <!-- Testimonial Block -->
            <div class="testimonial-carousel owl-carousel owl-theme">

                <div class="testimonial-block even">
                    <figure class="thumb"><img src="home/images/resource/thumb-1.jpg" alt=""></figure>
                    <p><?php echo __('“We know that sometimes it’s difficult to get to the phone if you are in the middle of something and you don’t want to miss.”')?></p>
                    <div class="name">DAVID MATIN / <span class="designation"><?php echo __('Manager')?></span></div>
                    <span class="icon fa fa-quote-left"></span>
                </div>

                <!-- Testimonial Block -->
                <div class="testimonial-block even">
                    <figure class="thumb"><img src="home/images/resource/thumb-2.jpg" alt=""></figure>
                    <p><?php echo __('“We know that sometimes it’s difficult to get to the phone if you are in the middle of something and you don’t want to miss.”')?></p>
                    <div class="name">DAVID MATIN / <span class="designation"><?php echo __('Manager')?></span></div>
                    <span class="icon fa fa-quote-left"></span>
                </div>

                <div class="testimonial-block even">
                    <figure class="thumb"><img src="home/images/resource/thumb-1.jpg" alt=""></figure>
                    <p><?php echo __('“We know that sometimes it’s difficult to get to the phone if you are in the middle of something and you don’t want to miss.”')?></p>
                    <div class="name">DAVID MATIN / <span class="designation"><?php echo __('Manager')?></span></div>
                    <span class="icon fa fa-quote-left"></span>
                </div>

                <!-- Testimonial Block -->
                <div class="testimonial-block even">
                    <figure class="thumb"><img src="home/images/resource/thumb-2.jpg" alt=""></figure>
                    <p><?php echo __('“We know that sometimes it’s difficult to get to the phone if you are in the middle of something and you don’t want to miss.”')?></p>
                    <div class="name">DAVID MATIN / <span class="designation"><?php echo __('Manager')?></span></div>
                    <span class="icon fa fa-quote-left"></span>
                </div>
            </div>
        </div>
    </section>
    <!--End Testimonial Seectin -->

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2><?php echo __('Contact US') ?></h2>
                <div class="separator"><span class="flaticon-settings-2"></span></div>
            </div>

            <div class="contact-info">
                <div class="row clearfix">
                    <div class="image-column col-lg-8 col-md-12 col-sm-12">
                        <figure><img src="home/images/resource/car-image.png" alt=""></figure>
                    </div>

                    <div class="info-column col-lg-4 col-md-12 col-sm-12">
                        <h3><?php echo __('Contact Info') ?></h3>
                        <ul>
                            <li>
                                <span class="icon flaticon-placeholder"></span>
                                <p><strong><?php echo __('Address:') ?></strong><br><?php echo __('Alto Selva Alegre J 22, Arequipa City, Peru') ?></p>
                            </li>

                            <li>
                                <span class="icon flaticon-phone"></span>
                                <p><strong><?php echo __('Phone:') ?></strong>984338491</p>
                                <p><span><?php echo __('Email:') ?></span><a href="#">hotmetal432@gmail.com</a></p>
                            </li>

                            <li>
                                <span class="icon flaticon-stopwatch"></span>
                                <p><strong><?php echo __('Workshop Timeing :') ?></strong><br><?php echo __('Monday - Friday: 08 AM - 06 PM') ?></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section -->

    <!-- Contact Map Section -->
    <section class="contact-map-section">
        <!--Map Outer-->
        <div class="map-outer">
            <!--Map Canvas-->
            <div class="map-canvas"
                data-zoom="12"
                data-lat="-37.817085"
                data-lng="144.955631"
                data-type="roadmap"
                data-hue="#ffc400"
                data-title="Envato"
                data-icon-path="home/images/icons/map-marker.png"
                data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>">
            </div>
        </div>
    </section>
    <!-- End Map Section -->

     <!--Clients Section-->
    <section class="clients-section">
        <div class="auto-container">
            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/1.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/2.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/3.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/4.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/5.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/1.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/2.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/3.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/4.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/5.png" alt=""></a></figure></li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Clients Section-->

    <!-- Main Footer -->
    <footer class="main-footer" style="background-image: url(home/images/background/4.jpg);">
        <div class="auto-container">

            <!--Widgets Section-->
            <div class="widgets-section">
                <div class="row clearfix">
                    <!--Footer Column-->
                    <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-widget about-widget">
                            <div class="footer-logo">
                                <figure>
                                    <a href="http://198.23.255.30/~batman/my_project/"><img src="home/images/footer-logo.png" alt=""></a>
                                </figure>
                            </div>
                            <div class="widget-content">
                                <div class="text"><?php echo __('We offer the essence of perfection.')?></div>
                                <h4><?php echo __('Follow Us:')?></h4>
                                <ul class="social-icon">
                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                            <li><a href="https://www.youtube.com/channel/UCQKyKJ4GtrUQco_5EVZVcig?view_as=subscriber"><span class="fab fa-youtube"></span></a></li>
                    <li><a href="#"><span class="fab fa-github"></span></a></li>
                                  
                            </div>
                        </div>
                    </div>

                    <!--Footer Column-->
                    <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-widget services-widget">
                            <h2 class="widget-title"><?php echo __('Our Services')?></h2>
                            <div class="widget-content">
                                <ul class="services-list">
                                    <li><a href="#"><?php echo __('Engine Diagnostic & Repair')?></a></li>
                                    <li><a href="#"><?php echo __('Maintanence & Inspection')?></a></li>
                                    <li><a href="#"><?php echo __('Electrical System Diagnostic')?></a></li>
                                    <li><a href="#"><?php echo __('Wheel Allignment & Installation')?></a></li>
                                    <li><a href="#"><?php echo __('Air Conditioner Service & Repair')?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--Footer Column-->
                    <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                        <!--Footer Column-->
                        <div class="footer-widget gallery-widget">
                            <h2 class="widget-title">Instragram</h2>
                             <!--Footer Column-->
                            <div class="widget-content">
                                <div class="outer clearfix">
                                    <figure class="image">
                                        <a href="home/images/resource/feature-1.jpg" class="lightbox-image" title="Image Title Here"><img src="home/images/resource/insta-1.jpg" alt=""></a>
                                    </figure>

                                    <figure class="image">
                                        <a href="home/images/resource/feature-2.jpg" class="lightbox-image" title="Image Title Here"><img src="home/images/resource/insta-2.jpg" alt=""></a>
                                    </figure>

                                    <figure class="image">
                                        <a href="home/images/resource/feature-3.jpg" class="lightbox-image" title="Image Title Here"><img src="home/images/resource/insta-3.jpg" alt=""></a>
                                    </figure>

                                    <figure class="image">
                                        <a href="home/images/resource/feature-4.jpg" class="lightbox-image" title="Image Title Here"><img src="home/images/resource/insta-4.jpg" alt=""></a>
                                    </figure>

                                    <figure class="image">
                                        <a href="home/images/resource/news-1.jpg" class="lightbox-image" title="Image Title Here"><img src="home/images/resource/insta-5.jpg" alt=""></a>
                                    </figure>

                                    <figure class="image">
                                        <a href="home/images/resource/news-2.jpg" class="lightbox-image" title="Image Title Here"><img src="home/images/resource/insta-6.jpg" alt=""></a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--Footer Column-->
                    <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                        <!--Footer Column-->
                        <div class="footer-widget news-widget">
                            <h2 class="widget-title"><?php echo __('Latest News')?></h2>
                             <!--Footer Column-->
                            <div class="widget-content">
                                <div class="post">
                                    <h4><a href="#"><?php echo __('Get Usefull Car Maintanence Tips From Our Expets')?></a></h4>
                                    <span class="date"><i class="far fa-calendar-check"></i><?php echo __('Aug')?> 21, 2015</span>
                                </div>

                                <div class="post">
                                    <h4><a href="#"><?php echo __('Get Usefull Car Maintanence Tips From Our Expets')?></a></h4>
                                    <span class="date"><i class="far fa-calendar-check"></i><?php echo __('Aug')?> 21, 2015</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Footer Bottom-->
         <div class="footer-bottom">
            <div class="auto-container">
                <div class="copyright-text">
                    <p><?php echo __('Copyrights © 2019 All Rights Reserved')?></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Main Footer -->

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-double-up"></span></div>

<script src="home/js/jquery.js"></script>
<script src="home/js/popper.min.js"></script>
<script src="home/js/bootstrap.min.js"></script>
<!--Revolution Slider-->
<script src="home/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="home/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="home/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="home/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="home/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="home/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="home/plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="home/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="home/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="home/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="home/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="home/js/main-slider-script.js"></script>
<!--End Revolution Slider-->
<script src="home/js/jquery.fancybox.js"></script>
<script src="home/js/owl.js"></script>
<script src="home/js/appear.js"></script>
<script src="home/js/wow.js"></script>
<script src="home/js/mixitup.js"></script>
<script src="home/js/validate.js"></script>
<script src="home/js/script.js"></script>
<!--Google Map APi Key-->
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDaaCBm4FEmgKs5cfVrh3JYue3Chj1kJMw"></script>
<script src="home/js/map-script.js"></script>
<!--End Google Map APi-->
<script src="home/js/color-settings.js"></script>
</body>
</html>
