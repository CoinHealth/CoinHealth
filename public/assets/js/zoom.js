'use strict';

var zoom = {
  level: 1,
  init: function() {
    var self = this;
    $('.zoom-btns#zoom-minus').on('click', self.zoomout);
    $('.zoom-btns#zoom-plus').on('click', self.zoomin);
  },
  zoomout: function() {
    var self = zoom;
    if ( self.level <= 0.8 )
      return false;

    self.level -= .2;
    self.zoom();
  },
  zoomin: function() {
    var self = zoom;
    if ( self.level >= 1.4 )
      return false;
    self.level += .2;
    self.zoom();
  },
  zoom: function() {
    var self = zoom;
    $('.zoom-level').text(100*self.level);
    document.body.style.zoom = self.level;
  }
};
$(function() {
  zoom.init();
})
