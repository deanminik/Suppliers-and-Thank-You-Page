$(document).ready(function () {
  var page_supplier = "https://suppliers.livewireinc.com/suppliers/";
  var page_thanks = "https://suppliers.livewireinc.com/thank-you/";
  var pageURL = jQuery(location).attr("href");

  var windowSize = jQuery(window).width();
  var scrollPosition = jQuery("html").scrollTop();

  if (windowSize >= 1024) {
    jQuery(window).scroll(function () {
      if (jQuery("html").scrollTop() <= 0) {
        jQuery(".header").removeClass("sticky_mode");
      } else {
        jQuery(".header").addClass("sticky_mode");
      }
    });
  } else {
  }

  if (pageURL == page_thanks) {
    jQuery(".grid__item").removeClass(
      "desk--five-sixths push--desk--one-twelfth"
    );
  } else {
  }

  if (pageURL == page_supplier) {
    jQuery(".gfield_label").attr("tabindex", "0");
    jQuery(".message.notice p").attr("tabindex", "0");
    jQuery("#input_3_2").attr("tabindex", "0");
    jQuery("#field_3_11 strong").attr("tabindex", "0");
    jQuery("#field_3_11").attr("tabindex", "0");
    jQuery(".row_4 p").attr("tabindex", "0");
  } else {
   jQuery(".row_4 p").attr("tabindex", "0");
  }
});
