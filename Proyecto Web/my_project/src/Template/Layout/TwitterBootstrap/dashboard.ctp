<?php

use Cake\Core\Configure;


$this->prepend('tb_body_attrs', ' class="' . implode(' ', [$this->request->getParam('controller'), $this->request->getParam('action')]) . '" ');
$this->start('tb_body_start');
?>
<body <?= $this->fetch('tb_body_attrs') ?>>  
    <?= $this->Html->css('main')?>
    <?= $this->Html->css('botonp')?>
<!--====== Scripts -->
    <?= $this->Html->script('jquery-3.1.1.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('material.min.js') ?>
    <?= $this->Html->script('ripples.min.js') ?>
    <?= $this->Html->script('sweetalert2.min.js') ?>
    <?= $this->Html->script('jquery.mCustomScrollbar.concat.min.js') ?>
    <?= $this->Html->script('main.js') ?>
    <script>
        $.material.init();
    </script> 
    <section class="full-box cover dashboard-sideBar">
        <div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
        <div class="full-box dashboard-sideBar-ct">
            <!--SideBar Title -->
            <div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
                Hot Metal <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
            </div>
            <!-- SideBar User info -->
            <div class="full-box dashboard-sideBar-UserInfo">
                <figure class="full-box">
		     <?=$this->Html->image($imagesUser,["alt" => "User Icon"]); ?>
                </figure>
                <ul class="full-box list-unstyled text-center">
				
				<li><?=$this->Html->image("icons/32/Peru.png", [
					"alt" => "Español",
					'url' => ['controller' => 'App', 'action' => 'change-language', 'es_PE']
					]); ?></li>
				<li><?= $this->Html->image("icons/32/EEUU.png", [
					"alt" => "English",
					'url' => ['controller' => 'App', 'action' => 'change-language', 'en_US']
					]); ?></li>
				<li><?= $this->Html->image("icons/32/brazil.png", [
					"alt" => "Portugues",
					'url' => ['controller' => 'App', 'action' => 'change-language', 'pt_BR']
					]); ?></li>	


		<ul class="full-box list-unstyled text-center">
		<h4><?= $current_user['role']?></h4>
                    <h4><?= $current_user['name'].' '.$current_user['surname']?></h4>
                </ul>
		<input id="lenguaje" name="lenguaje" type="hidden" value="<?= $this->request->getSession()->read('Config.language')?>">
		<ul class="full-box list-unstyled text-center">
		<li>
                        <a href="/~batman/my_project/users/perfil">
                            <i class="zmdi zmdi-settings"></i>
                        </a>

                    </li>
                    <li>
                        <a href="#!" class="btn-exit-system">
                            <i class="zmdi zmdi-power"></i>
                        </a>
                    </li>
		</ul>

            </div>
            <!-- SideBar Menu -->
            <ul class="list-unstyled full-box dashboard-sideBar-Menu">
                <li>
                    <a href="/~batman/my_project">
                        <i class="zmdi zmdi-home"></i> <?php echo __('Dashboard') ?>
                    </a>
                </li>
                <?php if(isset($current_user) && $current_user['role'] == 'Administrador'):?>
                    <li>
                    <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-account-add zmdi-hc-fw"></i> <?php echo __('Users') ?><i class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                        <li>
                            <?= $this->Html->link(__('View Users'),['controller' => 'users', 'action' => 'index', '__full' => true])?>
                        </li>
                        <li>
                            <?= $this->Html->link(__('Add User'),['controller' => 'users', 'action' =>'add', '__full' => true])?>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-male-female zmdi-hc-fw"></i> <?php echo __('Roles') ?><i class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                         <li>
                            <?= $this->Html->link(__('View Roles'),['controller' => 'roles', 'action' => 'index', '_full' => true])?>
                        </li>
                        <li>
                            <?= $this->Html->link(__('Add Roles'),['controller' => 'roles', 'action' => 'add', '_full' => true])?>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-card zmdi-hc-fw"></i><?php echo __('Mechanics') ?>  <i class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                        <li>
                            <?= $this->Html->link(__('View Mechanics'),['controller' => 'mechanics', 'action' => 'index', '_full' => true])?>
                        </li>
                        <li>
                            <?= $this->Html->link(__('Add Mechanics'),['controller' => 'mechanics', 'action' => 'add', '_full' => true])?>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-mall"></i> <?php echo __('Replacements') ?><i class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                        <li>
                            <?= $this->Html->link(__('View Replacements'),['controller' => 'replacements', 'action' => 'index', '_full' => true])?>
                        </li>
                        <li>
                            <?= $this->Html->link(__('Add Replacements'),['controller' => 'replacements', 'action' => 'add', '_full' => true])?>
                        </li>
                        <li>
                            <?= $this->Html->link(__('View Categories'),['controller' => 'categories', 'action' => 'index', '_full' => true])?>
                        </li>
                        <li>
                            <?= $this->Html->link(__('Add Categories'),['controller' => 'categories', 'action' => 'add', '_full' => true])?>
                        </li>
                    </ul>
                </li>
                  <li>
                    <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-car"></i>  <?php echo __('Cars') ?><i class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                        <li>
                            <?= $this->Html->link(__('View Cars'),['controller' => 'cars', 'action' => 'index', '_full' => true])?>
                        </li>
                        <li>
                            <?= $this->Html->link(__('Add Cars'),['controller' => 'cars', 'action' => 'add', '_full' => true])?>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-assignment-o"></i>  <?php echo __('Factures') ?> <i class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                        <li>
                            <?= $this->Html->link(__('View Factures'),['controller' => 'factures', 'action' => 'index', '_full' => true])?>
                        </li>
                        <li>
                            <?= $this->Html->link(__('Add Factures'),['controller' => 'factures', 'action' => 'add', '_full' => true])?>
                        </li>
                        <li>
                            <?= $this->Html->link(__('View Details'),['controller' => 'details', 'action' => 'index', '_full' => true])?>
                        </li>
                        <li>
                            <?= $this->Html->link(__('Add Details'),['controller' => 'details', 'action' => 'add', '_full' => true])?>
                        </li>
                    </ul>
                </li>
                <li>
                        <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-shield-security zmdi-hc-fw"></i> <?php echo __('Services') ?> <i class="zmdi zmdi-caret-down pull-right"></i>
                        </a>
                         <ul class="list-unstyled full-box">
                            <li>
                                <?= $this->Html->link(__('View Services'),['controller' => 'services', 'action' => 'index', '_full' => true])?>
                            </li>
                            <li>
                                <?= $this->Html->link(__('Add Services'),['controller' => 'services', 'action' => 'add', '_full' => true])?>
                             </li>
                        </ul>
                    </li>
			<li>
                        <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-card zmdi-hc-fw"></i> <?php echo __('Reports') ?> <i class="zmdi zmdi-caret-down pull-right"></i>
                        </a>
                         <ul class="list-unstyled full-box">
                            <li>
                                <?= $this->Html->link(__('Report One'),['controller' => 'reportes', 'action' => 'circular', '_full' => true])?>
                            </li>
			    <li>
                                <?= $this->Html->link(__('Report Two'),['controller' => 'reportes', 'action' => 'barra', '_full' => true])?>
                            </li>
                            <li>
                                <?= $this->Html->link(__('Report Three'),['controller' => 'reportes', 'action' => 'lineal', '_full' => true])?>
                            </li>
			    <li>
                                <?= $this->Html->link(__('Report Four'),['controller' => 'reportes', 'action' => 'particion', '_full' => true])?>
                            </li>
                            <li>
                                <?= $this->Html->link(__('Report Five'),['controller' => 'reportes', 'action' => 'grafo', '_full' => true])?>
                            </li>
                        </ul>
                    </li>
                  <?php elseif (isset($current_user) && $current_user['role'] == 'Cliente'): ?>
                    <li>
                    <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-account-add zmdi-hc-fw"></i>  <?php echo __('Cars') ?><i class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                        <li>
                            <?= $this->Html->link(__('View Cars'),['controller' => 'cars', 'action' => 'index', '_full' => true])?>
                        </li>
                        <li>
                            <?= $this->Html->link(__('Add Cars'),['controller' => 'cars', 'action' => 'add', '_full' => true])?>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-card zmdi-hc-fw"></i><?php echo __('Mechanics') ?>  <i class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                        <li>
                            <?= $this->Html->link(__('View Mechanics'),['controller' => 'mechanics', 'action' => 'index', '_full' => true])?>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-shield-security zmdi-hc-fw"></i> <?php echo __('Replacements') ?><i class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                        <li>
                            <?= $this->Html->link(__('View Replacements'),['controller' => 'replacements', 'action' => 'index', '_full' => true])?>
                        </li>
                        <li>
                            <?= $this->Html->link(__('View Categories'),['controller' => 'categories', 'action' => 'index', '_full' => true])?>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-card zmdi-hc-fw"></i>  <?php echo __('Factures') ?> <i class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                        <li>
                            <?= $this->Html->link(__('View Factures'),['controller' => 'factures', 'action' => 'index', '_full' => true])?>
                        </li>
                       
                    </ul>
                </li>
                <li>
                        <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-shield-security zmdi-hc-fw"></i> <?php echo __('Services') ?> <i class="zmdi zmdi-caret-down pull-right"></i>
                        </a>
                         <ul class="list-unstyled full-box">
                            <li>
                                <?= $this->Html->link(__('View Services'),['controller' => 'services', 'action' => 'index', '_full' => true])?>
                            </li>
                        </ul>
                    </li>
                 <?php endif ?>
            </ul>
        </div>
    </section>
    <!-- Content page-->
    <section class="full-box dashboard-contentPage">
        <!-- NavBar -->
        <nav class="full-box dashboard-Navbar">
            <ul class="full-box list-unstyled text-right">
                <li class="pull-left">
                    <a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
                </li>
            </ul>
        </nav>
        <!-- Content page -->
        <div class="container-fluid">

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        
                        <div  class="tab-pane fade active in" id="new">
                            <div class="table-responsive">
                                <?php
/**
 * Default `flash` block.
 */
if (!$this->fetch('tb_flash')) {
    $this->start('tb_flash');
    if (isset($this->Flash)) {
        echo $this->Flash->render();
    }
    $this->end();
}
$this->end();

$this->start('tb_body_end');
echo '</body>';
$this->end();

$this->append('content', '</div></div></div>');
echo $this->fetch('content');?>
                            </div>
                   
            </div>
        </div>
    </section>
   
