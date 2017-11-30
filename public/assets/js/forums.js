'use strict';

var forum = {

  init: function() {
    var self = this;
    self.initCreateNewThreads();
    self.initThread();
    // self.initThreadList();
    self.initNewThread();
    self.initMCE();
    $('.btn-reply').on('click', self.initReply);
    $(document).on('focusin', function(event) {
        if ($(event.target).closest(".mce-window").length) {
            event.stopImmediatePropagation();
        }
    });
    if ($('.view-more-container').length)
      self.initComments();
  },

  initCreateNewThreads: function() {
    var self = this;
    var start = function() {
      $('[name=channel]').on('change', change);
    },
    change = function() {
      $('.share-forms').hide();
      if ($(this).val() == 3)
        $('.share-forms').fadeIn('fast');

    };
    start();
  },

  initMCE: function() {
    tinymce.init({
      selector: 'textarea.tinymce',
      plugins: "paste link fullscreen autolink",
      toolbar: 'bold italic underline | h3 h4 | link | removeformat fullscreen',
      menubar: false,
      link_assume_external_targets: true,
    });
  },

  initThread: function() {
    var self = this;
    var start = function() {
      $('[data-dismiss="thread"]').on('click', threadDismiss);
      $('[data-dismiss="leaderboard"]').on('click', dismiss);
    },
    threadDismiss = function() {
      $(this).parents('.thread').fadeOut("fast");
    },
    dismiss = function() {
      $(this).parents('.leaderboard').fadeOut("fast");
    };
    start();
  },

  initComments: function() {
    var self = this;
    var viewMoreBtn = $('.view-more-page'),
    start = function() {
      viewMoreBtn.on('click', loadMore);
    },
    loadMore = function(e) {
      e.preventDefault();
      if (!viewMoreBtn.hasClass('disabled')) {
        viewMoreBtn.closest('.view-more-container').find('.fa.fa-spin').fadeIn();
        $.get(viewMoreBtn.attr('href'), {
          'load-reply' : true,
        }).done(renderComments);
      }
    },
    renderComments = function(data) {
      if (typeof data === 'string')
        data = $.parseJSON(data);
      var comments = data.data;

      $.each(comments, function(i,comment) {
        var user = comment.user,
            replies = comment.replies,
            commentTemp = $('.comment-template').find('.post-wrapper').clone();

        commentTemp.find('.post-user > a').attr({
          'href': '/profile/overview/'+user.username,
        }).text(user.full_name);
        commentTemp.find('p.post-message > span').text(comment.message);
        commentTemp.find('p.post-message > small').text(comment.created_at);

        // render replies
        $.each(replies, function(_i,_v) {
          var reply = $('.reply-template').find('.reply-wrapper').clone();
          reply.find('.reply-user > a').attr({
            'href': '/profile/overview'+_v.user.username,
          }).text(_v.user.full_name);
          reply.find('.reply-message > span').text(_v.message);
          reply.find('.reply-message > small').text(_v.created_at);
          commentTemp.find('.replies-container').append(reply);
        });
        if (!replies.length)
          commentTemp.find('.replies-container').hide();
        commentTemp.find('.reply-container [name="message_id"]').val(comment.id);
        commentTemp.find('form').attr({
          'action' : '/community/forums/'+comment.forum_id+'/create'
        });
        commentTemp.find('[name="channel"]').val(comment.channel);
        commentTemp.find('.reply-container > .btn-reply').on('click', self.initReply);
        $('.post-container').append(commentTemp);
      });
      viewMoreBtn.closest('.view-more-container').find('.fa.fa-spin').fadeOut();
      $('.view-more-page').attr('href', data.next_page_url);
      if (!data.next_page_url)
        $('.view-more-page').addClass('disabled');
    };

    start();
  },

  initReply: function(e) {
    e.preventDefault();
    $('.reply-container').find('form').hide();
    $(this).parent().find('form').fadeIn();
  },

  initNewThread: function() {
    var self = this;
    var start = function() {
      $('#new-thread')
        .find('.btn-create').on('click', submitBtn);
      // $('#create-topic').on('submit', submit)
    },
    submitBtn = function() {
      $('#create-topic').submit();
    }
    start();
  },
};
