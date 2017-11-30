'use strict';

var profile = {


  init: function() {
    var self = this;

    $('.btn-post').on('click', self.createPost);
    $('[data-timeline-reply]').on('click', self.replyPost);
    $('[data-timeline-edit]').on('click', timeline.edit);
    $('[data-timeline-delete]').on('click', timeline.delete);
    $('[data-timeline-reply-form]').on('submit', self.initForm);
    self.initOnAppend();
    self.initAvatar();
  },

  initForm: function(e) {
      e.preventDefault();
      $(this).find('[data-timeline-reply]').trigger('click');
  },

  initAvatar: function() {
      $('#avatar').on('change', function(e) {
          if (this.files.length && this.files[0])
          $('#avatar-uploader-form').submit();
      });
      $('#avatar-uploader-form').find('label').on('click', function(e) {
          e.stopPropagation();
      });
      $('.upload-avatar').on('click', function(e) {
          $('#avatar-uploader-form').find('label').trigger('click');
      });
  },

  initOnAppend: function() {
    var self = this;

    var start = function() {
      $('.comment-container').on('timeline.post.added', append);
    },
    append = function(ev, el) {
      var $el = $(el);
      $el.find('[data-timeline-reply]').on('click', self.replyPost);
      $el.find('[data-timeline-reply-form]').on('submit', self.initForm);
    };
    start();
  },

  createPost: function() {
    var self = profile;
    var $this = $(this),
        $parent = $this.parents('.new-post-container');
    var start = function() {
      if ( !$parent.find('[name="description"]').val() ) {
        $parent.find('[name="description"]').closest('.form-group').addClass('has-error');
      }
      else {
        $parent.find('[name="description"]').closest('.form-group').removeClass('has-error');
        timeline.create($parent.find('form'));
      }
    };
    start();
  },

  replyPost: function(e) {
    e.preventDefault();
    var $this = $(this);
    var $form = $this.closest('form');
    var start = function() {
      if ( !$form.find('[name="message"]').val() ) {
        $form.find('.form-group').addClass('has-error');
      }
      else {
        $form.find('.form-group').removeClass('has-error');
        timeline.reply($form);
      }
    };

    start();
  },


};
