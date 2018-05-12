jQuery(document).ready(function() {
  Hw2018_Utils.adjustFooter();
});

var Hw2018_Utils = {
  adjustFooter: function () {
    var bottom_position = document.getElementById('colophon').getBoundingClientRect().bottom;
    var window_height = jQuery(window).height();
    var gap = window_height - bottom_position;
    if (bottom_position < window_height) {
      jQuery('#colophon').css({"margin-top" : gap + "px"});
    }
  }
};
