'use strict';

var share = {
  width: 600,
  height: 400,
  opts: '',
  init: function(width, height) {
    var self = this;
    self.setOpts(width, height);
    $('.fb-sharer').on('click', self.fbShare);
    $('.twit-sharer').on('click', self.twitShare);
  },
  setOpts: function(width, height) {
    var self = this;
    width = typeof width == 'undefined' ? self.width : width;
    height = typeof height == 'undefined' ? self.height : height;
    var left = ($(window).width() - width) / 2,
        top = ($(window).height() - height) / 2;
    self.opts = 'status=1' +
                ',width='  + width  +
                ',height=' + height +
                ',top='    + top    +
                ',left='   + left;
  },
  getOpts: function() {
    var self = this;
    return self.opts;
  },
  fbShare: function(e) {
    var self = share,
        hash = "https://careparrot.com"+$(this).data('href'),
        url = "https://www.facebook.com/sharer/sharer.php?app_id=192501274464058&sdk=joey&display=popup&ref=plugin&src=share_button&u="+hash;
    self.open(url, 'Facebook');
    return false;
  },
  twitShare: function(e) {
    var self = share,
        hash = "https://careparrot.com"+$(this).data('href'),
        url = "https://twitter.com/intent/tweet?text="+$(this).data('text')+"&url="+hash+"&via=https://careparrot.com"
    self.open(url, 'Twitter');
    return false;
  },
  open: function(url, title) {
    var self = this;
    window.open(url, title, self.getOpts);
  }
};
