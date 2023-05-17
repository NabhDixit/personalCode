<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); 
    $header_email = get_field('header_email','option');
    $header_phoneNum = get_field('header_phone_number','option');
    $header_logo = get_field('header_logo','option');
    $fb_link = get_field('facebook_link','option');
    $ld_link = get_field('linked_in_link','option');
    ?>
    
</head>

<body <?php body_class();?> >

    <header class="headerWrapper">
        <div class="infoNavWrapper">
            <div class="container p-lg-0">
            <div class="infoNav">
                <div class="infoCnt">
                <ul>
                    <?php if($header_email){?>
                    <li>
                        <a href="" href="mailto: <?php echo $header_email;?>">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <?php echo $header_email;?>
                        </a>
                    </li>
                    <?php }?>

                    <?php if($header_phoneNum){?>
                    <li>
                        <a href="" href="tel: <?php echo $header_phoneNum;?>">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <?php echo $header_phoneNum;?>
                        </a>
                    </li>
                    <?php }?>
                </ul>
                </div>
                <div class="infoscl">
                <ul>
                    <?php if($fb_link){?>
                    <li>
                    <a href="<?php echo $fb_link;?>" target="_blank">
                        <i class="fa fa-facebook-square" aria-hidden="true"></i>
                    </a>
                    </li>
                    <?php }?>

                    <?php if($ld_link){?>
                    <li>
                    <a href="<?php echo $ld_link;?>" target="_blank">
                        <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                    </a>
                    </li>
                    <?php }?>
                </ul>
                </div>
            </div>
            </div>
        </div>
        <div class="navbarWrapper">
            <nav class="cstmNav navbar-expand-lg navbar-light bg-faded">
                <div class="container p-lg-0 d-flex justify-content-between align-items-center">
                    <a href="<?php echo get_site_url();?>" class="cstmNavBrd">
                        <img src="<?php echo $header_logo;?>" alt="">
                    </a>
                    <label for="nav-collapse" class="hamburger" target="nav-collapse" @click="toggleNav">
                        <input type="checkbox" id="ham-check">
                        <span class="line lineTop"></span>
                        <span class="line lineMiddle"></span>
                        <span class="line lineBottom"></span>
                    </label>
                
                    <div id="nav-collapse" :class="{showMobMenu: showNav}" is-nav class="cstmNavColl">
                        <!-- Right aligned nav items -->
                        <?php   wp_nav_menu(array(
                                'menu' => 'header-menu',
                                'depth' => 3,
                                'container' => false,
                                'menu_class' => 'navbar-nav cstmNavbarUl' //ul ki class
                    )
                ); ?>
                        <!-- <ul class="navbar-nav cstmNavbarUl">
                            <li class="cstmNavItem">
                                <a href="" class="nav-link">Home</a>
                            </li>
                            <li class="cstmNavItem">
                                <a href="" class="nav-link">About Us</a>
                            </li>
                            <li class="cstmNavItem noHrLine">
                                <span class="nav-link">Services</span>
                                <ul class="cstmDrpdwn">
                                    <li>
                                        <a href="">Wordpress Development</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="cstmNavItem">
                                <a href="" class="nav-link">Work</a>
                            </li>
                            <li class="cstmNavItem">
                                <a href="" class="nav-link">Career</a>
                            </li>
                            <li class="cstmNavItem">
                                <a href="" class="nav-link">Blogs</a>
                            </li>
                            <li class="cstmNavItem noHrLine quoteBtn">
                                <a href="" class="nav-link">Let's Connect</a>
                            </li>
                        </ul> -->
                    </div>
                </div>
            </nav>
        </div>
    </header>
