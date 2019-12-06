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
<title>Service Detail</title>

<!-- Stylesheets -->
<link href="home/css/bootstrap.css" rel="stylesheet">
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
    <header class="main-header header-style-four">

        <!--Header Top-->
        <div class="header-top">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <div class="top-left">
                        <ul class="clearfix">
                            <li>Hot metal has the solution to the needs of your car!</li>
                        </ul>
                    </div>
                    <div class="top-right clearfix">
                        <p><i class="fa fa-phone-volume"></i>Support: 984338491</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top -->

        <!-- Header Lower -->
        <div class="header-lower">
            <div class="auto-container">
               <div class="main-box clearfix">
                    <!--Logo Box-->
                    <div class="logo-box">
                        <div class="logo"><a href="#"><img src="home/images/logo-3.png" alt=""></a></div>
                    </div>
                    <!--Nav Outer-->
                    <div class="nav-outer clearfix">
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
                                    <li class="dropdown"><a href="#"><?php echo __('Home') ?></a>
                                        <ul>
                                            <li><?= $this->Html->link(__('Home'),'/');?></li>
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
                                        <li class="current dropdown"><?= $this->Html->link(__('Services'),'/services');?></li>
     
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

                        <!--outer Box-->
                        <div class="outer-box">
                            <!-- Cart Btn -->
                            <div class="cart-btn">
                                <?= $this->Html->link( $this->Html->tag('i', '', ['class' => 'flaticon-shopping-bag-1']).$this->Html->tag('span','2',['class' => 'count']), '/shop',['escape'=>false]); ?>
                            </div>

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
                        </div><!--End outer Box-->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Lower -->

        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <a href="#" class="img-responsive"><img src="home/images/logo-small.png" alt="" title=""></a>
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
                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class="dropdown"><a href="#"><?php echo __('Home') ?></a>
                                        <ul>
                                            <li><?= $this->Html->link(__('Home'),'/');?></li>
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
                                        <li class="current dropdown"><?= $this->Html->link(__('Services'),'/services');?></li>
     
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

    <!--Page Title-->
    <section class="page-title" style="background-image:url(home/images/background/8.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>service detail</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="#">Home</a></li>
                    <li>service detail</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Service Detail Section -->
    <div class="service-detail-section">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Content Side-->
                <div class="content-side pull-right col-lg-9 col-md-12 col-sm-12">
                    <div class="service-detail">
                        <div class="service-detail-slider owl-carousel owl-theme">
                            <div class="slide-item">
                                <div class="image-box">
                                    <figure><img src="home/images/resource/service-detail.jpg" alt=""></figure>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="image-box">
                                    <figure><img src="home/images/resource/service-detail.jpg" alt=""></figure>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="image-box">
                                    <figure><img src="home/images/resource/service-detail.jpg" alt=""></figure>
                                </div>
                            </div>
                            <div class="slide-item">
                                <div class="image-box">
                                    <figure><img src="home/images/resource/service-detail.jpg" alt=""></figure>
                                </div>
                            </div>
                        </div>

                        <div class="lower-content">
                            <h2>Air Conditioner</h2>
                            <p>Pleasure and praising pain was born and I will give you a complete account of the systems, and expound the actually teachings of the great explorer of the truth, the master-builder of human uts happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</p>
                            <p>Complete account of the systems and expound the actually teachings of the great explorer of the truth, the master-builder of human uts happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful anyone who loves or pursues.</p>
                            <blockquote>Who do not know how to pursue pleasure rationally encounters consequences that are extremely painful nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionallycircumstances occur in which toil and pain can procure him some great pleasure. <br>
                            <cite>William Jomurray</cite>
                            </blockquote>

                            <div class="two-column">
                                <div class="row clearfix">
                                    <div class="info-column col-lg-5 col-md-12 col-sm-12">
                                        <h3>Our Working Topics</h3>
                                        <p>Actually teachings of the great explorer of the truth, the master-builder of human uts happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because who do not consequences.</p>
                                        <ul>
                                            <li>Engine oil level should be regularly checked</li>
                                            <li>Tyres have a minimum of 1.6mm of tread depth</li>
                                            <li>Ensure that the electrolyte level is correct</li>
                                            <li>Never remove the radiator when the engine is</li>
                                            <li>Ensure that your vehicle's brake fluid is full</li>
                                        </ul>
                                    </div>

                                    <div class="video-column col-lg-7 col-md-12 col-sm-12">
                                        <div class="inner-column">
                                            <figure class="image"><img src="home/images/resource/video-img-2.jpg" alt="">
                                                <a href="https://www.youtube.com/watch?v=aT3Ajznq0Po" class="link" data-fancybox="gallery" data-caption=""><span class="icon fab fa-google-play"></span></a>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Service Detail -->

                    <!-- Pricing Feature -->
                    <div class="pricing-feature">
                        <div class="sec-title">
                            <h2><span>Feature</span> Pricing</h2>
                            <div class="separator"><span class="flaticon-settings-2"></span></div>
                        </div>

                        <div class="table-outer">
                            <table class="feature-table">
                                <thead>
                                    <tr>
                                        <td>Car Model </td>
                                        <td>Labor Cost</td>
                                        <td>Parts Cost</td>
                                        <td>Estimate</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2016 MAZDA 3 SPORT</td>
                                        <td>$ 20.49</td>
                                        <td>$ 44.99</td>
                                        <td>$ 65.48</td>
                                    </tr>
                                    <tr>
                                        <td>1989 GMC V3500</td>
                                        <td>$ 18.00</td>
                                        <td>$ 34.99</td>
                                        <td>$ 52.99</td>
                                    </tr>
                                    <tr>
                                        <td>1991 TOYATA CELICAS</td>
                                        <td>$ 25.99</td>
                                        <td>$ 29.99</td>
                                        <td>$ 55.98</td>
                                    </tr>
                                    <tr>
                                        <td>FUEL HOSE</td>
                                        <td>$ 40.00</td>
                                        <td>$ 34.99</td>
                                        <td>$ 30.00</td>
                                    </tr>
                                    <tr>
                                        <td>STERING HOSE</td>
                                        <td>$ 34.99</td>
                                        <td>$ 29.99</td>
                                        <td>$ 24.99</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End pricing -->

                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-3 col-md-4 col-sm-12">
                    <aside class="sidebar services-sidebar">

                        <!-- Services Cat List -->
                        <div class="sidebar-widget categories">
                            <ul class="service-cat-list">
                                <li><a href="#">Body Paint & Denting</a></li>
                                <li><a href="#">Engin Oil and Filter</a></li>
                                <li><a href="#">Engine Diagonostic</a></li>
                                <li class="active"><a href="#">Air Conditioning</a></li>
                                <li><a href="#">Belt and Hoses</a></li>
                                <li><a href="#">Wheel Repair</a></li>
                                <li><a href="#">Break Repair</a></li>
                                <li><a href="#">Water kit</a></li>
                            </ul>
                        </div>

                        <!-- Brochure -->
                        <div class="sidebar-widget brochures">
                            <h3>Our Brochures</h3>
                            <div class="brochure-box">
                                <div class="image-box"><img src="home/images/resource/brochure.jpg" alt=""></div>
                                <div class="link-box">
                                    <a href="#"><span class="fa fa-file-pdf"></span>Service Brochure. PDF</a>
                                    <a href="#"><span class="fa fa-file-excel"></span>Air Conditioner. Exc</a>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- End Service Detail Section -->

    <!-- Contact Info Section -->
    <section class="contact-info-section">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- Contact Info Block -->
                <div class="contact-info-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <span class="icon flaticon-placeholder"></span>
                        <p>13005 Greenville Avenue <br> California, TX 70240</p>
                    </div>
                </div>

                <!-- Contact Info Block -->
                <div class="contact-info-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <span class="icon flaticon-phone"></span>
                        <p>+1 800125 6524</p>
                        <p><a href="#">mail@autowork.com</a></p>
                    </div>
                </div>

                <!-- Contact Info Block -->
                <div class="contact-info-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <span class="icon flaticon-stopwatch"></span>
                        <p>10:00am to 6:00pm</p>
                        <p>Sunday Closed</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Info Section -->

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
                                    <a href="#"><img src="home/images/footer-logo.png" alt=""></a>
                                </figure>
                            </div>
                            <div class="widget-content">
                                <div class="text">How to pursue pleasure rationally thats encounter consequences that extremely painful. Nor again is there anyones who loves or pursues or ut desires obtains pain of itself, because.</div>
                                <h4>Follow Us:</h4>
                                <ul class="social-icon">
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                            <li><a href="https://www.youtube.com/channel/UCQKyKJ4GtrUQco_5EVZVcig?view_as=subscriber"><span class="fab fa-youtube"></span></a></li>
                <li><a href="#"><span class="fab fa-github"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--Footer Column-->
                    <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-widget services-widget">
                            <h2 class="widget-title">Our Services</h2>
                            <div class="widget-content">
                                <ul class="services-list">
                                    <li><a href="#">Engine Diagnostic & Repair</a></li>
                                    <li><a href="#">Maintanence Inspaection</a></li>
                                    <li><a href="#">Electrical System Diagnostic</a></li>
                                    <li><a href="#">Wheel Allignment & Installation</a></li>
                                    <li><a href="#">Air Conditioner Service & Repair</a></li>
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
                            <h2 class="widget-title">Latest News</h2>
                             <!--Footer Column-->
                            <div class="widget-content">
                                <div class="post">
                                    <h4><a href="#">Get Usefull Car Maintanence Tips From Our Expets</a></h4>
                                    <span class="date"><i class="far fa-calendar-check"></i>Aug 21, 2015</span>
                                </div>

                                <div class="post">
                                    <h4><a href="#">Get Usefull Car Maintanence Tips From Our Expets</a></h4>
                                    <span class="date"><i class="far fa-calendar-check"></i>Aug 21, 2015</span>
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
                    <p>Copyrights © 2019 All Rights Reserved.</p>
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
<script src="home/js/jquery-ui.js"></script>
<script src="home/js/jquery.fancybox.js"></script>
<script src="home/js/owl.js"></script>
<script src="home/js/appear.js"></script>
<script src="home/js/wow.js"></script>
<script src="home/js/mixitup.js"></script>
<script src="home/js/script.js"></script>
<script src="home/js/color-settings.js"></script>
</body>
</html>
