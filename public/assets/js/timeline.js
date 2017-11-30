'use strict';

var timeline = {
  $template:null,
  $replyTemplate: null,
  $currentReplyForm:null,
  $currentPost: null,
  init: function() {
    var self = this;
    console.log(self);
  },

  create: function($form) {
    var self = this;
    var start = function() {
      $.post('/timeline', {
        _token: csrf_token,
        description: $form.find('[name="description"]').val(),
      });
    };
    start();
  },

  reply: function($form) {
    var self = this;
    self.$currentReplyForm = $form;
    var start = function() {
      $.post($form.attr('action'), {
        _token: csrf_token,
        message: $form.find('[name="message"]').val(),
      }).done(function(data) {
        console.log(data);
      });
    };

    start();
  },

  edit: function(e) {
    e.preventDefault();
    var self = timeline,
        $this = $(this),
        id = $this.data('timeline-edit'),
        modal = null;
    self.$currentPost = $this.parents('.comment-row');
    var start = function() {
      $('#edit-post')
        .off('shown.bs.modal')
        .on('show.bs.modal', shown)
        .on('hide.bs.modal', hide)
        .modal('toggle');
    },
    shown = function() {
      var $modal = $(this);
      modal = $modal;
      $.get('/timeline/'+id+'/edit').done(function(data) {
        $modal.find('[name="description"]').val(data.description);
      });
      $modal.find('[data-timeline-post-save]').off().on('click', update);
    },
    hide = function() {
      var $modal = $(this);
      modal = null;
      $modal.find('[name="description"]').val('');
    },
    update = function() {
      $(this).attr('disabled', true);
      $.post('/timeline/'+id, {
        _token: csrf_token,
        _method: "PUT",
        description: modal.find('[name="description"]').val(),
        timeline_id: id,
      });
    };

    start();
  },

  delete: function(e) {
    e.preventDefault();
    var self = timeline,
        $this = $(this),
        id = $this.data('timeline-delete');
    self.$currentPost = $this.parents('.comment-row');
    var start = function() {
      $.post('/timeline/'+id, {
        _token: csrf_token,
        _method: "DELETE",
      });
    };

    start();
  },


};
