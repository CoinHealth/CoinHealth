'use strict';

var profile = {

  init: function() {
    var self = this;
    self.initCommandBtn();
    self.initDeleteAccount()
    self.initFollow();
		// $('.dl-menuwrapper').dlmenu();
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
    $('[data-toggle="tooltip"]').tooltip();
    
  },

  initDeleteAccount: function() {
    var start = function() {
      $('.btn-delete-account').on('click', deleteAccount);
    },
    deleteAccount = function(e) {
      e.preventDefault();
      e.stopPropagation();
      alertify.confirm('Heads up!','Deleting your account means you will lose all accumulated points, uploaded documents and other information. Do you wish to continue?.',
      sendAjax,
      function() {
        console.log('cancel');
      });
    },
    sendAjax = function() {
      $.post('/profile/ajax/deleteAccount', {
        _token: csrf_token,
        action: 'delete'
      }).done(ajaxDone);
    },
    ajaxDone = function(data) {
      if (data.success) {
        alertify.alert('Thank you!.', "We're sorry to see you go, your account has been deleted.",
        function(){
          location.reload();
        }
        );
      }
    };
    start();
  },

  initAttachments: function() {
    var self = this;
    var btnUpload = $('.btn-upload-attachments');
    var drop = new Dropzone('#dz-attachments', {
      url: '/profile/ajax/attachments',
      paramName: 'attachments',
      previewsContainer: '.dz-attachments-preview',
      uploadMultiple: true,
      parallelUploads: 100,
      autoProcessQueue: false,
      acceptedFiles: '.png, .jpg, .docx, .pdf, .doc',
      init: function() {
        this.on('addedfile', function(file) {
          var removeButton = Dropzone.createElement("<button class='btn btn-danger btn-xs btn-block' style='margin-top:5px;'>Remove file</button>");
          var _this = this;
          var ext = self.getFileExtension(file.name).toLowerCase();

          if (!checkExt(ext)) {
            _this.removeFile(file);
            return false;
          }
          else {
            removeButton.addEventListener("click", function(e) {
              e.preventDefault();
              e.stopPropagation();
              _this.removeFile(file);
            })
            file.previewElement.appendChild(removeButton);
          }
          if (btnUpload.hasClass('disabled'))
            btnUpload.removeClass('disabled');
        });
        this.on('sending', function(file,xhr,formData) {
          formData.append('_token', csrf_token);
        });
        this.on('queuecomplete', function() {
					location.reload();
				});
      }
    }),
    checkExt = function(ext) {
      return ext == "png" || ext == "jpg" || ext == "docx" || ext == "doc" || ext == "pdf";
    },
    start = function() {
      btnUpload.on('click', upload);
    },
    upload = function() {
      drop.processQueue();
      //activity
      $.post('/activity', {
        _token: csrf_token,
        from_url: '/profile',
        message: 'Upload an attachment.',
      }).done(done, function(data){});
    };
    start();
  },

  getFileExtension: function(filename) {
		var ext = /^.+\.([^.]+)$/.exec(filename);
		return ext == null ? "" : ext[1];
	},

  initCommandBtn: function() {
    var origValue = '',
    origName = '',
    start = function() {
      $('.cmdBtn').on('click', clicked);
    },
    clicked = function(e) {
      e.preventDefault();
      e.stopPropagation();
      var $this = $(this),
          $parent = $this.closest('.form-group');
      $parent.find('.input').attr('disabled', false).on('input change', toggleBtnContainer);
      origValue = $parent.find('.input').val();
      origName = $parent.find('.input').attr('name');
      $parent.find('.btn-container').empty();
      var $cont = $('.btn-container-template').find('span').clone();
      $cont.find('.btn-save').on('click', sendAjax);
      $cont.find('.btn-cancel').on('click', cancel);
      $parent.find('.btn-container').append($cont);
    },
    cancel = function(e) {
      e.preventDefault();
      e.stopPropagation();

      $(this).closest('.form-group')
        .find('input').val(origValue)
        .attr('disabled', true);
      $(this).parents('.btn-container').hide();
      $(this).parent().remove();
    },
    toggleBtnContainer = function() {
      var $this = $(this),
          $parent = $this.closest('.form-group'),
          $cont = $parent.find('.btn-container');
      if ($this.val().length && $this.val() != '') {
        $cont.fadeIn('fast');
      }
      else {
        cont.hide();
      }
    },
    sendAjax = function(e) {
      e.preventDefault();
      e.stopPropagation();
      var $parent = $(this).closest('.form-group'),
          $input = $parent.find('.input'),
          name = $input.attr('name'),
          val = $input.is('input[type=radio]') ? $input.filter(':checked').val() : $input.val();
      if (name === "password") {
        var pass = /^[0-9a-zA-Z]{8,}$/.test(val);
        if (pass) {
          $.post('/profile/ajax/changeSettings', {
            _token : csrf_token,
            name : name,
            value : val,
          }).done(ajaxDone);
        }
        else {
          $input.popover({
      			'title' : 'Your password must have',
      			'content': '<ul class="text-left">'+
      										'<li>8 characters minimum length</li>'+
      										'<li>1 Special Character (!@#$&*)</li>'+
      										'<li>2 letters in Upper Case</li>'+
      										'<li>2 numerals (0-9)</li>'+
      										'<li>3 letters in Lower Case</li>'+
      									'</ul>',
      			'placement': 'top',
      			'html' : true,
      			'trigger' :'focus'
      		});
          $input.focus();
        }
      }
      else {
        $.post('/profile/ajax/changeSettings', {
          _token : csrf_token,
          name : name,
          value : val,
        }).done(ajaxDone);
      }
    },
    ajaxDone = function(data) {
      location.reload();
      // origValue = data.user[origName];
    };

    start();
  },

  initFollow: function() {
    var start = function() {
      $('.profile-followers').on('click', showFollowers);
      $('.profile-following').on('click', showFollowing);
    },
    showFollowers = function() {
      $('#followersModal').modal('toggle');
    },
    showFollowing = function() {
      $('#followingModal').modal('toggle');
    };
    start();
  },


};

// var validate = {
//
//   check: function(string, options) {
//     var lists = options.split('|');
//     for(var i=0;i<lists.length;i++) {
//
//     };
//   }
// };
//
// String.prototype.isAlphaNumeric = function() {
//   var regExp = /^[A-Za-z0-9]+$/;
//   return (this.match(regExp));
// };
// String.prototype.isAlphaOnly = function() {
//   var regExp = /^[A-Za-z0-9]+{3,5}$/
// }
