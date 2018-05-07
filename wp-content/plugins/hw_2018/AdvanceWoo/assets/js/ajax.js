jQuery(document).ready(function($) {
  Hw2018Ajax.changePassword();
});

var Hw2018Ajax = {
  changePassword: function() {
    var data = {
      'action': 'change_password',
      'whatever': hw2018_welcome.password
    };
    
    jQuery.post(hw2018_welcome.ajax_url, data, function(response) {
      jQuery('#hw2018-change-password').html(response);
    });
  }
};
