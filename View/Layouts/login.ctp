<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--[if lt IE 9]>
        <?php echo $this->Html->script(array('html5.js')); ?>
         <![endif]-->
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->script(array('common', 'bootstrap'));
        echo $this->Html->css(array('bootstrap', 'bootstrap-responsive', 'style'));

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>

        <style >
            #header1 img{
                float: left;
                margin-left: 120px;
            }

            #row_bottom{
                position: relative;
                margin-left: 100px;
            }
            #menu_tab{
                float: left;
                height: 36px;
                list-style: none outside none;
                margin: 0;
                padding: 0;
                width: auto;
            }
            #img_row{
                height: 90%;
            }
            .tab_link{
                background-color: white;
                padding: 12px 25px;
            }
            .tab_link a{
                color: #000000;
                font-size: 16px;
            }
            .choosed{
                background-color: #E1E1E1;
            }
            .span3{
                width: 20px;
            }
            .span9{
                background-color: #E1E1E1;
                height: 600px;
                width: 87%;
            }
            #form_login{
                position: inherit;
                margin-top: -200px;
                margin-left: 10%;

            }
            #login-form{
                background-color: #E1E1E1;
            }
            #form_logout{
                float: left;
                margin-top: -46px;
            }
        </style>
    </head>
    <body>
        <div id="header1">
            <?php
            echo $this->Html->css('jquery-ui');
            echo $this->Html->css('jquery.fancybox');
            echo $this->Html->script('jquery-1.8.3');
            echo $this->Html->script('jquery.1.7.2.min');
            echo $this->Html->script('jquery.fancybox');
            ?>
            <?php echo $this->Html->image('shop_logo.png') ?>
        </div>
        <div class="container" id="header_container">
            <div class="row" id="img_row">
                <div id="header" class="span12">
                    <div>
                        <p style="align: center">
                            <?php
                            ?>

                        </p>
                    </div>
                </div>
            </div>

            <div id ="row_bottom">
                <span class="tab_link choosed"><a href="#">Deal's that rock</a></span> 
                <span class="tab_link"><a href="#">Deal's that shop's</a></span> 
            </div>    
            <div id='form_login'>
                <?php
                $ses_user = $this->Session->read('User');
                $logout = $this->Session->read('logout');
               // debug($ses_user);
                if (!$this->Session->check('User') && empty($ses_user)) {
                   	//$this->Html->image('facebook.png');
                     echo $this->element('form_login');
                } else {

                    echo '<div id="form_logout"> <img src="https://graph.facebook.com/' . $ses_user['id'] . '/picture" width="30" height="30"/><div>' . $ses_user['name'] . '</div>';
                    echo '<a href="' . $logout . '">Logout</a></div>';
                }
                ?>

            </div>

        </div>
        <!--end container-->
        <div class="container">
            <div class='row'>
                <div class='span3'>
                    <div class='box sidebar-nav'>
                        <?php
                        if ($this->Session->read('Auth.User'))
                            echo $this->element('menu');
                        ?>
                    </div>
                    <div id="ads" style="min-height: 100px">
                        <?php
                        if ($this->Session->read('Auth.User'))
//						echo $this->Html->link($this->Html->image('btn_service_01_f2.gif'), '#', array('escape' => false,'onclick'=>"popitup2('http://www.arcterus.com/caiz/info.html')"));
                        //						echo $this->Html->image ('ads.png');
                            
                            ?>
                    </div>
                </div>
                <div class='span9'>
                    <div class="profile-info-page">
                        <!--                        <h2 class='page-title'>
                                                </h2>-->
                        <?php echo $this->Session->flash('auth'); ?>
                        <?php echo $this->Session->flash(); ?>

                        <?php echo $this->fetch('content'); ?>

                    </div>
                </div>

            </div>
        </div>
<!--        <footer>
            <p>Copyright© bibi Nguyen All rights reserved.</p>
        </footer>-->
    </body>
</html>
