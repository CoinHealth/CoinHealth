'use strict';

var blog = {
  editMCE: null,
  newMCE: null,
  init: function() {
    var self = this;
    self.someNews();
    self.initMCE();
    self.initVotes();
    $('#edit-blog').on('show.bs.modal', self.edit);
  },

  edit: function(e) {
    var $modal = $(this),
        id = $(e.relatedTarget).data('id');
    var start = function() {
      $.get('/community/blogs/'+id+'/edit').done(done);
    },
    done = function(data) {

      $modal.find('[name=title]').val(data.title);
      $modal.find('[name=content]').text(data.content);
      $modal.find('form').attr('action', '/community/blogs/'+id);
      tinymce.init({
        selector: 'textarea.tinymce.edit',
        plugins: "paste link fullscreen autolink",
        toolbar: 'bold italic underline | h3 h4 | link | removeformat fullscreen',
        menubar: false,
        link_assume_external_targets: true,
      });
    };

    start();
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

  initMCE: function() {
    var self = this
    self.newMCE = tinymce.init({
      selector: 'textarea.tinymce.new',
      plugins: "paste link fullscreen autolink",
      toolbar: 'bold italic underline | h3 h4 | link | removeformat fullscreen',
      menubar: false,
      link_assume_external_targets: true,
      setup: function(ed) {
        var maxlength = 10;
        var count = 0;
        ed.on('keydown', function(e) {
          maxlength = ed.getContent().length;
          count++;
          console.log(maxlength);
          // if (count >= maxlength)
          // {
          //   // alert("false");
          //   return false;
          // }
        });
      },

    });
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
      $.post('/community/blogs/'+id+'/vote', {
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
