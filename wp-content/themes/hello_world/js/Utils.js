var Utils = {
  adjustBodyWidth: function() {
    if(jQuery !== undefined) {
      jQuery('.container').css({"max-width": jQuery('body').width() - 200})
    }
  }
};