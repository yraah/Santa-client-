var activeStatus = "";
jQuery(document).ready(function(){
    if(!jQuery(".upgrade-button.open-popup").length) {
        if (jQuery(".wrap .page-title-action").length) {
            jQuery(".wrap .page-title-action").after(settings.PRO_BUTTON);
        } else if (jQuery(".wrap .wp-heading-inline").length) {
            jQuery(".wrap .wp-heading-inline").after(settings.PRO_BUTTON);
        } else if (jQuery("#edittag").length) {
            jQuery(".wrap h1").after(settings.PRO_BUTTON);
        }
        setTimeout(function () {
            jQuery(".upgrade-block-button").addClass("active");
        }, 1000);
    }

    if(settings.PRO_BUTTON != "" && jQuery(".post_type_page").val() == "stars_testimonial" && jQuery(".post_status_page").val() == "all") {
        jQuery("#ajax-response").before(settings.IFRAME_CODE);
    }

    jQuery(".testimonial-grid-box").mCustomScrollbar({
        setHeight: jQuery(window).height()-60,
        theme:"dark"
    });
    jQuery(".testimonial-col:not(.has-prow-feature)").click(function(){
        jQuery(".testimonial-col").removeClass("active");
        jQuery(this).addClass("active");
        thisId = jQuery(this).attr("data-for");
        jQuery("#custom-form").removeClass("grid-form").removeClass("grid-form").removeClass("slider-form");
        jQuery("#custom-form").addClass(thisId);
        jQuery("#grid-form").addClass("active");
        jQuery("#testimonial_type").val(jQuery(this).attr("data-value"));
        if(jQuery("#grid-form").length) {
            jQuery("body,html").animate({
                scrollTop: jQuery("#grid-form").offset().top - 25
            },500);
        }
    });
    jQuery(".back-button").click(function(){
        jQuery("#custom-form").removeClass("grid-form").removeClass("grid-form").removeClass("slider-form");
        jQuery(".testimonial-type").show();
        jQuery("#grid-form").addClass("active");
        jQuery("#custom-form").hide();
    });
    jQuery("#grid-form input[name='testimonial_style']").change(function(){
        jQuery(".grid-form-row").removeClass("active");
        jQuery(this).closest(".grid-form-row").addClass("active");
        jQuery("#testimonial_style").val(jQuery("#grid-form input[name='testimonial_style']:checked").val());
    });
    jQuery("#grid-form input[name='testimonial_style']").click(function(e){
        e.stopPropagation();
    });
    jQuery("#grid-form  .grid-form-row").click(function(){
       jQuery(this).find("input[name='testimonial_style']").trigger("click");
    });
    jQuery(".customize-button").click(function(){
        jQuery(".testimonial-type").hide();
        jQuery(".testimonial-form-data").removeClass("active");
        jQuery("#custom-form").show();
        jQuery(".grid-style-box .col-1-3, .grid-style-box .col-1-2").addClass("preview-row");
        boxHtml = jQuery(".radio-btn:checked").closest(".grid-form-row").find(".grid-style-box .preview-row:first").html();
        jQuery(".preview-section .preview-inner").html(boxHtml+'<div class="clear"></div>');
        setStyleColor(jQuery("#grid-form .radio-btn:checked").val());
        jQuery(window).scrollTop(0);
    });
    jQuery("#custom-color input[type='radio']").change(function(){
        jQuery(this).closest("tr").find(".custom-color-box").find("span").css("background-color","transparent");
        jQuery(this).closest("tr").find(".custom-color-box").find("span i").removeClass("fa-check").addClass("fa-question");
        jQuery(this).closest("tr").find(".custom-color-box").find("span").removeClass("active");
        jQuery(this).closest("tr").find(".testimonial-color-picker").val("");
        className = jQuery(this).closest(".color-row").attr("data-class");
        colorCode = jQuery(this).attr("value");
        if(className.indexOf("-bg") == -1) {
            jQuery("#preview-box ." + className).css("color","#"+colorCode);
        } else {
            jQuery("#preview-box ." + className).css("background-color","#"+colorCode);
        }
    });
    jQuery(".grid-columns").asRange({
        step: 1,
        range: false,
        min: 1,
        max: 12
    });
    jQuery('.testimonial-color-picker').click(function(){
        jQuery('.testimonial-color-picker').removeClass("active-color");
        jQuery(this).addClass("active-color");
    });
    jQuery('a[href*="upgrade-to-pro"]').each(function() {
        jQuery(this).addClass("pro-feature-link");
    });
    jQuery("#grid_categories").select2({
        closeOnSelect : false,
        placeholder : "All Categories",
        allowHtml: true,
        tags: false
    });
    jQuery("#testimonial_order").select2({
        minimumResultsForSearch: -1,
        allowHtml: true
    });
    jQuery(".custom-select").click(function(e){
        e.stopPropagation();
        jQuery(this).closest(".custom-select-box").toggleClass("active");
    });
    jQuery("body").click(function(e){
        jQuery(".custom-select-box").removeClass("active");
    });
    jQuery(".custom-select-box .select-content li").click(function(e){
        e.stopPropagation();
        jQuery(".custom-select-box .select-content li").removeClass("active");
        jQuery(this).addClass("active");
        thisText = jQuery(this).text();
        jQuery(".custom-select").val(thisText);
        jQuery(".custom-select, #preview-box figure, #preview-box blockquote").css("font-family",thisText);
        jQuery(".custom-select-box").removeClass("active");
    });
    jQuery(".reset-button").click(function(){
        reserData();
    });
    jQuery(".submit-button").click(function(){
        errorCounter = 0;
        jQuery("#testimonial_form .input-error").removeClass("input-error");
        jQuery("#testimonial_form .error-message").remove();
        jQuery("#testimonial_form .required").each(function(){
           if(jQuery.trim(jQuery(this).val()) == "") {
               jQuery(this).addClass("input-error");
               jQuery(this).after("<span class='error-message'>"+settings.REQUIRED_MESSAGE+"</span>");
               errorCounter++;
           }
        });
        if(errorCounter == 0 && !jQuery(this).hasClass("loading")) {
            jQuery(this).html('<i class="fa fa-spin fa-refresh" aria-hidden="true"></i>');
            jQuery(this).addClass("loading");
            data = jQuery("#testimonial_form").serialize();
            jQuery.post(settings.ajaxurl, data, function (response) {
                response = jQuery.parseJSON(response);
                if(response.status == "1") {
                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        type: 'success'
                    });
                    window.location = settings.plugin_url;
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        type: 'error'
                    });
                    jQuery(".submit-button").removeClass("loading");
                }
            });
        } else {
            jQuery("#testimonial_form .input-error:first").focus();
        }
    });
    jQuery(".copy-shortcode").click(function(){
        thisId = jQuery(this).closest("tr").attr("data-id");
        copyText = document.getElementById("short-code-"+thisId);
        copyText.select();
        document.execCommand("copy");
        jQuery(this).append('<span class="tool-tip">Your shortcode was successfully copied</span>');
        setTimeout(function(){
            jQuery(".tool-tip").remove();
        },1000);
    });
    jQuery(".view-preview").click(function(){
       if(!jQuery(this).closest("tr").hasClass("active")) {
           jQuery(".search-results tr.active").removeClass("active");
           jQuery(".search-results tbody tr.preview-column td").hide();
           thisId = jQuery(this).closest("tr").data("id");
           jQuery(this).closest("tr").addClass("active")
           jQuery(".search-results tbody tr#preview-column-"+thisId+" td").slideDown();
           if(jQuery(this).closest("tr").data("type") == "slider") {
               jQuery("#grid-slider-"+thisId).slick("refresh");
           }
       } else {
           jQuery(".search-results tr.active").removeClass("active");
           jQuery(".search-results tbody tr.preview-column td").hide();
       }
    });
    jQuery(".remove-preview").click(function(){
        activeStatus = jQuery(this).closest("tr").data("id");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
            jQuery.ajax({
                url: settings.ajaxurl,
                data: "action=remove_testimonial_record&id="+activeStatus+"&nonce="+jQuery("#row-"+activeStatus).data("nonce"),
                type: "post",
                success: function(response) {
                    response = jQuery.parseJSON(response);
                    if(response.status == "1") {
                        Swal.fire({
                            title: 'Success',
                            text: response.message,
                            type: 'success'
                        });
                        window.location.reload();
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: response.message,
                            type: 'error'
                        });
                    }
                }
            })
            }
        });
    });
});
function rgb2hex(rgb){
    rgb = rgb.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
    return (rgb && rgb.length === 4) ?
    ("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
    ("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
    ("0" + parseInt(rgb[3],10).toString(16)).slice(-2) : '';
}
function reserData() {
    jQuery(".grid-style-box .col-1-3, .grid-style-box .col-1-2").addClass("preview-row");
    jQuery("#grid_columns").asRange('val', '3');
    jQuery("#slides_to_scroll").asRange('val', '1');
    jQuery("#custom-color input[type='radio']").attr("checked",false);
    jQuery(".testimonial-color-picker").val("");
    jQuery(".custom-color-box span").css("background-color","transparent");
    jQuery(".custom-color-box span i").removeClass("fa-check").addClass("fa-question");
    jQuery(".custom-color-box span").removeClass("active");
    jQuery("#grid_categories").val("").trigger("change");
    boxHtml = jQuery("#grid-form .radio-btn:checked").closest(".grid-form-row").find(".grid-style-box .preview-row:first").html();
    jQuery(".preview-section .preview-inner").html(boxHtml+'<div class="clear"></div>');
    jQuery("#testimonial-scroll-speed-1").trigger("click");
    jQuery("#slider-interval-1").trigger("click");
    jQuery("#navigation_dots").attr("checked",true);
    jQuery("#navigation_arrows").attr("checked",true);
    jQuery("#is_slider_autoplay").attr("checked",true);
    jQuery(".select-content li:first").trigger("click");
    jQuery(".select-content .active").removeClass("active");
    jQuery("#font_family").attr("style","");
    jQuery("#shortcode_name").val("");
    jQuery("#testimonial_order").val("1").trigger("change");
    setStyleColor(jQuery("#grid-form .radio-btn:checked").val());
}

function setStyleColor(styleNo) {
    styleNo = parseInt(styleNo)-1;
    styleJSON = settings.stylesObj;
    styleArray = jQuery.parseJSON(styleJSON);
    styleArray = jQuery.makeArray(styleArray);
    styleArray = styleArray[0];
    jQuery(".dynamic-color-col").each(function(){
        jQuery(this).show();
        thisType = jQuery(this).data("col");
        jQuery(this).find("input:checked").attr("checked",false);
        if(styleArray[thisType][styleNo] != undefined) {
            thisCSS = styleArray[thisType][styleNo];
            jQuery(this).find('input[type="radio"]').each(function(){
                if(jQuery(this).val() == thisCSS) {
                    jQuery(this).attr("checked",true);
                    jQuery(this).trigger("change");
                }
            });
        }
        if(jQuery(this).find("input:checked").length == 0) {
            jQuery(this).hide();
        }
        if(jQuery("#testimonial_type").val() != "slider") {
            jQuery(".color-arrow-col").hide();
        }
    });
}