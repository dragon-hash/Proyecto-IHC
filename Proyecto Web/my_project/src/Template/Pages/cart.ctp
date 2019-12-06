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
<title>Shopping Cart </title>

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
                        <div class="logo"><a href="#"><img src="images/logo-3.png" alt=""></a></div>
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
                                        <li><?= $this->Html->link(__('Services'),'/services');?></li>
     
                                    <li class="current dropdown"><a href="#"><?php echo __('Shop') ?></a>
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
                                        <li><?= $this->Html->link(__('Services'),'/services');?></li>
     
                                    <li class="current dropdown"><a href="#"><?php echo __('Shop') ?></a>
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
                <h1>shopping cart</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="#">Home</a></li>
                    <li>shopping cart</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!--Cart Section-->
    <section class="cart-section">
        <div class="auto-container">

            <!--Cart Outer-->
            <div class="cart-outer">
                <div class="table-outer">
                    <table class="cart-table">
                        <thead class="cart-header">
                            <tr>
                                <th>Preview</th>
                                <th class="prod-column">product</th>
                                <th class="price">Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="prod-column">
                                    <div class="column-box">
                                        <figure class="prod-thumb"><a href="#"><img src="home/images/resource/products/5.jpg" alt=""></a></figure>
                                    </div>
                                </td>
                                <td><h4 class="prod-title"><?php echo __('Batteries') ?></h4></td>
                                <td class="sub-total">$35.00</td>
                                <td class="qty"><div class="item-quantity"><input class="quantity-spinner" type="text" value="2" name="quantity"></div></td>
                                <td class="total">$35.00</td>
                                <td><a href="#" class="remove-btn"><span class="fa fa-times"></span></a></td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div class="cart-options clearfix">
                    <div class="pull-left">
                        <div class="apply-coupon clearfix">
                            <div class="form-group clearfix">
                                <input type="text" name="coupon-code" value="" placeholder="Coupon Code">
                            </div>
                            <div class="form-group clearfix">
                                <button type="button" class="theme-btn btn-style-five coupon-btn">Apply Coupon</button>
                            </div>
                        </div>
                    </div>

                    <div class="pull-right">
                        <button type="button" class="theme-btn cart-btn btn-style-five">update cart</button>
                    </div>

                </div>

                <div class="row clearfix">

                    <div class="column pull-left col-lg-5 col-md-12 col-sm-12">
                        <div class="shipping-block">
                            <div class="inner-box">
                                <h3>Shipping Free Shipping</h3>
                                <h4>Calculate Shipping</h4>

                                <!-- Shipping Form -->
                                <div class="shipping-form">
                                    <!--Shipping Form-->
                                    <form method="post" action="#">
                                        <div class="row clearfix">
                                            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                                <input type="text" name="text" placeholder="Pakistan" required>
                                            </div>

                                            <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                                <input type="text" name="text" placeholder="Postcode / ZIP" required>
                                            </div>

                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" name="text" placeholder="State / county" required>
                                            </div>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <button class="theme-btn btn-style-five" type="submit" name="submit-form">update totals</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column pull-right col-lg-6 col-md-12 col-sm-12">
                        <!--Totals Table-->
                        <ul class="totals-table">
                            <li><h3>Cart Totals</h3></li>
                            <li class="clearfix total"><span class="col">Sub Total</span><span class="col price">$35.00</span></li>
                            <li class="clearfix total"><span class="col">Total</span><span class="col price">$35.00</span></li>
                            <li class="text-right"><button type="submit" class="theme-btn btn-style-five proceed-btn">Proceed to Checkout</button></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--End Cart Section-->

    <!-- Subscribe Section -->
    <section class="subscribe-section">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h3>Check out our repair service for your car and get a free clean</h3>
                <a href="#" class="call-btn">Order Now</a>
            </div>
        </div>
    </section>
    <!-- End Subscribe Section -->

    <!-- Main Footer -->
    <footer class="main-footer alternate" style="background-image: url(home/images/background/4.jpg);">
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
<script src="home/js/jquery.bootstrap-touchspin.js"></script>
<script src="home/js/wow.js"></script>
<script src="home/js/mixitup.js"></script>
<script src="home/js/script.js"></script>
<script src="home/js/color-settings.js"></script>
</body>
</html>

