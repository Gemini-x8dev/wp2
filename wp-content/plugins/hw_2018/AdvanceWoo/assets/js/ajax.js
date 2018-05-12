jQuery(document).ready(function($) {
  Hw2018Ajax.changePassword();
});

var Hw2018Ajax = {
  changePassword: function() {
    var data = {
      'action': 'change_password',
      'password': jQuery('#hw2018-change-password input').val()
    };

    jQuery.post(ajaxurl, data, function(response) {
      response = JSON.parse(response);
      if (response.password_changed) {
        alert('Your password has changed..');
      }
      jQuery('#hw2018-change-password').html(response.html);
    });
  },
  Reviews: {
    loaded: false,
    save: function () {
      var data = {
        action: 'hw2018_store_review',
        name: jQuery('#hw2018-reviews-form input').val(),
        stars: jQuery('#hw2018-reviews-form select').val(),
        review: jQuery('#hw2018-reviews-form textarea').val(),
      };
  
      jQuery.post(ajaxurl, data, function(response) {
        UIkit.modal(jQuery('#post-review')).hide();
        jQuery('#hw2018-reviews-form input').val("");
        jQuery('#hw2018-reviews-form select').val("1");
        jQuery('#hw2018-reviews-form textarea').val("");
      });
    },
    get: function() {
      var data = {
        action: 'hw2018_store_reviews_get'
      };
      if (!Hw2018Ajax.Reviews.loaded) {
        jQuery.post(ajaxurl, data, function(response) {
          Hw2018Ajax.Reviews.loaded = true;
          var reviews = JSON.parse(response);
          var reviews_html = Hw2018Ajax.Reviews.html(reviews);
          jQuery('#reviews-time ul').html(reviews_html);
        });
      }
    },
    html: function(reviews) {
      var reviews_html = '';
      
      reviews.map(function(e) {
        reviews_html += '<li>' +
        ' <div class="uk-card uk-card-default uk-card-body">' +
        '     <div class="uk-card-badge">' + Hw2018Ajax.Reviews.stars(e.stars) +
        '     </div>' +
        '     <h3 class="uk-card-title">'+ e.name +'</h3>' +
        '     <p>'+ e.review +'</p>' +
        ' </div>' +
        '</li>';
      });
      return reviews_html;
    },
    stars: function(s) {
      var stars = '';
      for(var i=0;i<parseInt(s);i++){
        stars += '<span uk-icon="star">';
      }
      return stars;
    }
  }
};
