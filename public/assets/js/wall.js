var wall = {

    init: function() {
        var self = this;

        $('.btn-post').on('click', self.createPost);
        $('[data-timeline-btn-view-comment]').on('click', self.showReplies);
        $('[data-timeline-btn-reply]').on('click', self.initReply);
        $('[data-timeline-reply]').on('click', self.replyPost);
        $('[data-timeline-btn-upvote]').on('click', self.voting);
        $('[data-timeline-reply-form]').on('submit', self.initForm);
        self.initOnAppend();
        self.initDropzone();
    },

    initDropzone: function() {
        var self = this;
        var drop = null;
        var start = function() {
            drop = $('.dropzone').dropzone({
                url:'/community/public-chat',
                autoProcessQueue: false,
                paramName: 'attachments',
                uploadMultiple: true,
                acceptedFiles: '.png, .jpg, .jpeg',
                init: function() {
                    var dz = this;
                    dz.on('addedfile', function(file) {
                        var $preview = $(file.previewElement);
                        var temp = $('<button>').attr({
                            type: 'button',
                        }).addClass('btn btn-xs btn-danger btn-remove').on('click', function(e) {
                            e.preventDefault();
                            dz.removeFile(file);
                        }).html('&times;');
                        $preview.append(temp);
                    });
                    dz.on('sending', function(file, xhr, fd) {
                        fd.append('_token', csrf_token);
                        fd.append('description', $('[name="description"]').val());
                    });
                    dz.on('queuecomplete', function() {
                        drop[0].dropzone.removeAllFiles();
                    });
                },
            });
        };
        start();
    },

    checkAuth: function() {
        if (!$('#y04nVjgOvE').length)
            window.location = '/auth/login?continue=/community/public-chat';
        return true;
    },

    voting: function(e) {
        e.preventDefault();
        var self = wall;
        var id = $(this).parents('.post-wrapper').data('id');
        var value = $(this).data('timeline-btn-upvote');
        self.checkAuth();
        var start = function() {
            $.post('/community/public-chat/'+id+'/vote', {
                _token: csrf_token,
                vote: value,
                timeline_id: id,
            });
        };

        start();
    },

    initOnAppend: function() {
        var self = this;

        var start = function() {
            $('.comment-container').on('timeline.post.added', append);
        },
        append = function(ev, el) {
            var $el = $(el);
            $el.find('[data-timeline-btn-reply]').on('click', self.initReply);
            $el.find('[data-timeline-btn-view-comment]').on('click', self.showReplies);
            $el.find('[data-timeline-reply]').on('click', self.replyPost);
            $el.find('[data-timeline-reply-form]').on('submit', self.initForm);
        };
        start();
    },

    initForm: function(e) {
        e.preventDefault();
        $(this).find('[data-timeline-reply]').trigger('click');
    },

    initReply: function() {
        var self = wall;
        var $this = $(this),
        $parents = $this.parents('.post-wrapper');
        // self.checkAuth();

        if ($parents.find('.reply-container').is(':hidden')) {
            $parents
                .find('.reply-container').fadeIn()
                .find('[name="message"]').focus();

            if ($parents.find('.timeline-replies-container').is(':hidden')) {

                $parents.find('[data-timeline-btn-view-comment]').trigger('click');
            }
        }
        else {
            $parents
            .find('.reply-container')
            .find('[name="message"]').focus();
        }
    },

    showReplies: function() {
        var self = wall;
        var $this = $(this),
            $parent = $this.parents('.post-wrapper');


        var start = function() {
            $parent.find('[data-timeline-btn-reply]').trigger('click');
            if ($parent.find('.reply-list').is(':hidden')) {
                // $this.text('comments');
                $parent.find('.reply-list').fadeIn();
            }
        };
        start();
    },

    replyPost: function(e) {
        e.preventDefault();

        wall.checkAuth();

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

    createPost: function() {
        var self = wall;
        var $this = $(this);
        var $parent = $('.new-post-container');
        var dz = $('.dropzone')[0];
        self.checkAuth();
        var start = function() {
            if ( !$parent.find('[name="description"]').val()) {
                $parent.find('[name="description"]').closest('.form-group').addClass('has-error');
            }
            else {
                $parent.find('[name="description"]').closest('.form-group').removeClass('has-error');
                if (dz.dropzone.files.length) {
                    dz.dropzone.processQueue();
                }
                else {
                    timeline.create($parent.find('form'));
                }
            }
        };
        start();
    },

    rate: function() {

    },
};
