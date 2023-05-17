<?php 
/* Template Name: Contact Us */

get_header();
$form_title=get_field('contact_form_title');
$contact_banner_image = get_field('contact_banner_image');
?>

<?php if($form_title || $contact_banner_image) {?>
<div id="contact">
    <loader v-if="isLoading"/>
    <div class="contactWrap">
        <div class="container p-lg-0">
            <div class="bannerWrap">
                <div class="colOne">
                    <div class="formWrap">
                        <div class="contact-form">
                            <div class="fieldWrap">
                                <h2 class="sectionHeading"><?php echo $form_title;?><span>.</span></h2>
                                <?php echo do_shortcode(get_field('contact_form_shortcode')); ?>
                                <?php  //echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true" tabindex="49"]'); ?>
                            </div>
                        </div>
                        <!-- <form class="contact-form">
                            <div class="fieldWrap">
                               
                                <div class="formRow">
                                    <div class="formGroup">
                                        <label for="firstName">First Name *</label>
                                        <input id="firstName" type="text" name="firstName" required>
                                    </div>
                                    <div class="formGroup">
                                        <label for="lastName">Last Name *</label>
                                        <input id="lastName" type="text" name="lastName" required>
                                    </div>
                                </div>
                                <div class="formGroup">
                                    <label for="email">Email *</label>
                                    <input id="email" type="email" name="email" required>
                                </div>
                                <div class="formGroup">
                                    <label for="phone">Phone</label>
                                    <input id="phone" type="tel" name="phone" required>
                                </div>
                                <div class="formGroup">
                                    <label for="message">Brief Us About Your Next Big Project *</label>
                                    <textarea id="message" rows="5" name="message" required></textarea>
                                </div>
                                <div class="formGroup cstmCheckbox">
                                    <input value="checked" type="checkbox" name="privacy" id="privacy">
                                    <label for="privacy">I understand the information above will be stored only for business purposes.</label>
                                </div>
                            </div>
                            <input class="ctaBtn" type="submit" value="Submit">
                            <p class="successMsg">Thanks, We'll Contact You Shortly!</p>
                        </form> -->
                    </div>
                </div>
                <?php if($contact_banner_image){?>
                    <div class="colTwo">
                        <img src="<?php echo $contact_banner_image;?>" alt="believintech contact">
                    </div>
                <?php }?>    
            </div>
        </div>
    </div>
</div>
<?php }?>
<?php get_footer(); ?>