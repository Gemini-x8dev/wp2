var Utils = {
  adjustBodyWidth: function() {
    if(jQuery !== undefined) {
      jQuery('.container').css({"max-width": jQuery('body').width() - 200})
    }
  },
  
  adjustMenuStyle: function() {
    jQuery('#menu-trees').addClass("nav");
    jQuery('#menu-trees li').addClass("nav-item");
    jQuery('#menu-trees li a').addClass("nav-link");
  }
  
};