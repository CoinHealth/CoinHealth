'use strict';

var news = {
  init: function() {
    var self = this;

    self.initVotes();
    self.someNews();
  },

  someNews: function(el) {

    var self = this;
    var start = function() {
      $('.some-news').on('click', scroll);
    },
    scroll = function(e) {
      e.preventDefault();
      var target = $(this.hash);
      $('html, body').animate({
          scrollTop: target.offset().top - 50,
      }, 500);
    };
    start();
  },

  initVotes: function() {
    var self = this;
    var start = function() {
      $('.btn-vote').on('click', vote);
    },
    vote = function(e) {
      e.preventDefault();
      var $this = $(this),
          value = $(this).data('value');
      if ($this.hasClass('voted'))
        value = 0;
      post($this.data('id'), value);

    },
    post = function(id,vote) {
      console.log(id,vote);
      $.post('/community/news/'+id+'/vote', {
        vote: vote,
        _token: csrf_token
      }).done(success);
    },
    success = function(data) {
      window.location.reload();
    };
    start();
  },
};
