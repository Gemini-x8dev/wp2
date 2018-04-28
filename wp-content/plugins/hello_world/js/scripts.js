jQuery(document).ready(function($) {
  $.ajax({
    url: single_tree_obj.ajaxurl,
    type: 'post',
    data:{
      nonce: single_tree_obj.nonce,
      action: single_tree_obj.action,
      post_id: single_tree_obj.post_id
    },
    success: function( response ) {
      var response = JSON.parse(response);
      $('#viewed_times').html(response.vote_count + " times");
    },
  });
});