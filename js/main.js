jQuery(document).ready(function(){

    var styleSheetUrl = localdata.styleSheetUrl;
    console.log(styleSheetUrl)

    if(jQuery('.clientSlider').length > 0){
        jQuery('.clientSlider').owlCarousel({
            loop:true,
            margin: 20,
            nav:false,
            dots: false,
            autoplay: true,
            slideTransition: 'linear',
            autoplayTimeout: 3000,
            autoplaySpeed: 3000,
            autoplayHoverPause: false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:6
                }
            }
        });
    }

    if(jQuery('.testimonial-slider').length > 0){
        jQuery('.testimonial-slider').owlCarousel({
            loop:true,
            margin: 20,
            nav:false,
            dots: true,
            items: 1,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplaySpeed: 500,
            slideTransition: 'linear',
            autoplayHoverPause: false
        });
    }

    if(jQuery('.workSldr').length > 0){
        jQuery('.workSldr').owlCarousel({
            items: 1,
            dots: false,
            margin: 50,
            nav: true,
            navText: [`<img class="sldrIcn prevIcn" src="${styleSheetUrl}/assets/images/previous.png" />`, `<img class="sldrIcn nxtIcn" src="${styleSheetUrl}/assets/images/next.png" />`],
            responsive: {
                0:{
                    dots: true,
                    nav: false
                },
                992:{
                    dots: false
                }
            },
        });
    }

    if(jQuery('.home .mobBlogSlider').length > 0){
        jQuery('.home .mobBlogSlider').owlCarousel({
            items: 1,
            dots: false,
            margin: 30,
            nav: true,
            navText: [`<img class="sldrIcn prevIcn" src="${styleSheetUrl}/assets/images/previous.png" />`, `<img class="sldrIcn nxtIcn" src="${styleSheetUrl}/assets/images/next.png" />`]
        });
    }

    // --------------------------------Loadmore-------------------------------------


    let currentPage = 1;
        
    jQuery('#load-more').on('click', function() {

    let maxPage = parseInt(jQuery(this).data('max-page'));//get num of pages here

    currentPage++;

    jQuery.ajax({
    type:'POST',
    url:localdata.ajaxurl,
    dataType: 'html',
    data: {
        action: 'load_more_function',
        paged: currentPage,
    },
    beforeSend: function() {
        jQuery('#load-more').css('pointer-event','none');
        jQuery('.load-all').text('Loading...');
        },
    success: function (res) {
            //console.log(res);
            jQuery('#load-more').css('pointer-event','unset');
            jQuery('.blgCardGrpDesk').append(res);
            jQuery('.load-all').text('Load More');
            
            if(currentPage >= maxPage) {
            jQuery('#load-more').hide();
            }
        }
        });

    });


//--------------------Validation for comment Form-------------------------------
jQuery('#submit').click(function(e){
    jQuery(".error_message").remove();
   var comment = jQuery("#comment").val();
   var name = jQuery("#author").val();
   var email = jQuery("#email").val();
 
 
   if(comment == ''){
     jQuery('#comment').after('<div class="error_message">Please Fill Your Comment</div>');
     e.preventDefault();
   }
   if(name == ''){
     jQuery('#author').after('<div class="error_message">Please Enter Your Name</div>');
     e.preventDefault();
   } else{
     var regExp = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
     if(!regExp.test(name)){
       jQuery('#author').after('<div class="error_message">Please Enter Your Valid Name</div>');
       e.preventDefault();
     }
   }
   if(email == ''){
     jQuery('#email').after('<div class="error_message">Please Enter Your Email</div>');
     e.preventDefault();
   } else{
     var regEx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
     if (!regEx.test(email)) {
       jQuery('#email').after('<div class="error_message">Please Enter Your Valid Email</div>');
       e.preventDefault();
     }
   }
     
 }); 
 
});