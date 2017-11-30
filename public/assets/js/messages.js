'use strict';

var messages = {
  mentionedNames: [],
  init: function(isNew) {
    var self = this;
    var _form = isNew ? 'new' : 'send';
    var $form = $('#form-'+_form);
    var start = function() {
      $("#messages-container-mobile:visible").animate({
        scrollTop: $('#messages-container-mobile:visible').length ? $('#messages-container-mobile:visible')[0].scrollHeight : 0,
      }, 700);
      $("#messages-container-desktop:visible").animate({
        scrollTop:  $('#messages-container-desktop:visible').length ? $('#messages-container-desktop:visible')[0].scrollHeight: 0,
      }, 700);
      self.initMention();
      $('#select-attachment').on('hide.bs.modal', fillFields);
      $form.one('submit', submit);
      $('#attachment').on('change', function() {
        var length = this.files.length;
        var txt = length > 1 ? 'files' : 'file';
        $('.file-notif > .counter').text(length + txt);
      });
      $('.image-checkbox').on('change', function() {
        console.log('shit');
        var length = $('.image-checkbox:checked').length;
        var txt = length > 1 ? 'files' : 'file';
        $('.file-notif > .counter').text(length + txt);
      });
    },
    fillFields = function() {
      var modal = $(this);
      var images = modal.find('.images-wrapper .image-wrapper input.image-checkbox:checked');
      if (images.length) {
        var cloned = images.clone();
        cloned.attr('name', 'attachedImages[]');
        cloned.addClass('used');
        $form.find('.uploaded-images-container').append(cloned);
      }
    },
    submit = function(e) {
      e.preventDefault();
      $('.atwho > .atwho-inserted > .user-mentioned').each(function(i,v) {
        var id = $(v).data('id');
        var input = $('<input>').attr({
          'name': 'user_mentioned[]',
          'value': id,
          'type': 'hidden',
        });
        $('.mentioned-users-container').append(input);
      });
      $form.find('[name="message"]').val($('#message-content').text());
      $form.submit();
    };
    start();
  },

  initMention: function() {
    var cachequeryMentions = [],
    itemsMentions = null,
    thisVal = '',
    start = function() {
      $('.atwho').atwho({
        at: "@",
        insertTpl: "<span class='user-mentioned' data-id='${id}'>${atwho-at}${full_name}</span>",
        searchKey: 'full_name',
        displayTpl: "<li data-id='${id}'><img src='${avatar_path}' height='20' width='20'/> ${full_name} </li>",
        callbacks: {
          remoteFilter: _remoteFilter,
        }
      });
    },
    _remoteFilter = function (query, render_view) {
      thisVal = query,
      self = $(this);
      if( !self.data('active') && thisVal.length >= 2 ){
        self.data('active', true);
        itemsMentions = cachequeryMentions[thisVal]
        if(typeof itemsMentions == "object"){
          render_view(itemsMentions);
        }
        else {
          if (self.xhr)
            self.xhr.abort();

          var xhr = $.getJSON("/api/members",{
            query: thisVal
          }, function(data) {
            cachequeryMentions[thisVal] = data;
            render_view(data);
          });
          self.xhr = xhr;
        }
        self.data('active', false);
      }
    };

    start();
  },

};
