<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('Fruits Bazaar', 'Direct from farms :: Stay healthy');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap-responsive.min');
        echo $this->Html->css('bootstrap');
        echo $this->Html->css('styles');
        echo $this->Html->css('redmond/jquery-ui-1.10.3.custom.min.css');
        
        
        echo $this->Html->script('jquery-1.9.1');
        echo $this->Html->script('jquery-ui-1.10.3.custom');
        echo $this->Html->script('jQuery.dualListBox-1.3');
        

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    <style type="text/css">
        body {
          padding-top: 20px;
          padding-bottom: 60px;
        }
  
        /* Custom container */
        .container {
          margin: 0 auto;
          max-width: 1000px;
        }
        .container > hr {
          margin: 60px 0;
        }
  
        /* Main marketing message and sign up button */
        .jumbotron {
          margin: 80px 0;
          text-align: center;
        }
        .jumbotron h1 {
          font-size: 100px;
          line-height: 1;
        }
        .jumbotron .lead {
          font-size: 24px;
          line-height: 1.25;
        }
        .jumbotron .btn {
          font-size: 21px;
          padding: 14px 24px;
        }
  
        /* Supporting marketing content */
        .marketing {
          margin: 60px 0;
        }
        .marketing p + h4 {
          margin-top: 28px;
        }
        /* Customize the navbar links to be fill the entire space of the .navbar */
        .navbar .navbar-inner {
          padding: 0;
        }
        .navbar .nav {
          margin: 0;
          display: table;
          width: 100%;
        }
        .navbar .nav li {
          display: table-cell;
          width: 1%;
          float: none;
        }
        .navbar .nav li a {
          font-weight: bold;
          text-align: center;
          border-left: 1px solid rgba(255,255,255,.75);
          border-right: 1px solid rgba(0,0,0,.1);
        }
        .navbar .nav li:first-child a {
          border-left: 0;
          border-radius: 3px 0 0 3px;
        }
        .navbar .nav li:last-child a {
          border-right: 0;
          border-radius: 0 3px 3px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="masthead">
            <h1 class="muted">Fruits Bazaar</h1>
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container">
                        <ul class="nav">
                            <li><?php echo $this->Html->link('Take Orders',array('controller' => 'orders','action'=>'add'));?></li>
                            <li><?php echo $this->Html->link('Orders Dashboard',array('controller' => 'orders','action'=>'admin_order_page'));?></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- /.navbar -->
        </div>
        
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			
		</div>
	</div>
</body>
</html>
