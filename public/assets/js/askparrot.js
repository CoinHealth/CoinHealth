'use strict';

var ask = {

  items: $('.search-lists > .search-item').hide(),
  typeFunc: null,
  typeInterval: 1000,
  init: function() {
    var self = this;
    $('.search-form').on('input', self.search);
  },

  search: function() {
    var self = ask,
        $this = $(this);
    self.items.hide();

    clearTimeout(self.typeFunc);

    if ($this.val())
      self.typeFunc = setTimeout(initSearch, self.typeInterval);
    else
      $('.main-topics').fadeIn();

    function initSearch() {
      var self = ask;
      $('.main-topics').hide();
      self.items.hide();
      self.items.filter("[data-keyword*='"+$this.val().toLowerCase()+"']").fadeIn();
    };
  },

};
