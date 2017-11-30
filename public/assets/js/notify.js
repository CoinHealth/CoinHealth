var notify = {

    init: function() {
        var self = this;
        self.notify();
        self.timeline();
    },

    notify: function() {
        var self = this;
        var channel = null;
        var start = function() {
            var channel = self.subscribe('profile_channel').bind('notify', binder);
        },
        binder = function(data) {
            var temp = $('.activity-template').find('.activity-wrapper').clone();
            temp.hide();
            temp.find('.act-title p').text(data.activity.from_url);
            temp.find('.act-desc p').text(data.activity.notification);
            $('.row-act').prepend(temp.fadeIn());
        };
        start();
    },

    timeline: function() {
        var self = this;

        var start = function() {
            self.subscribe('timeline_channel').bind('timeline_post_created', createBinder);
            self.subscribe('timeline_channel').bind('timeline_reply_created', replyBinder);
            self.subscribe('timeline_channel').bind('timeline_update_post', editBinder);
            self.subscribe('timeline_channel').bind('timeline_delete_post', deleteBinder);
            $('.post-container > .post-wrapper').each(function(i,v) {
                var id = $(v).data('id');
                self.subscribe('timeline_channel-'+id).bind('timeline_update_votes', votesBinder);
            });
        },
        votesBinder = function(data) {
            var timeline = data.timeline;
            var post = $('.post-container > .post-wrapper').filter('[data-id='+timeline.id+']');
            var votes = post.find('[data-timeline-btn-upvote]');
            votes.find('.count.upvotes').text(timeline.upvote_count);
            votes.find('.count.downvotes').text(timeline.downvote_count);
            console.log(votes);
        },
        createBinder = function(data) {
            var temp = timeline.$template.clone();
            var _timeline = data.timeline;

            if (_timeline.attachments) {
                $.each(_timeline.attachments, function(i,v) {
                    var img = $('.timeline-image-template').find('img').clone();
                    img.attr({
                        alt: v.title,
                        src: v.display_path,
                    });

                    temp.find('.attachments-container').append(img);
                });
            }
            temp.find('[data-timeline-user-avatar]').attr('src', _timeline.user.avatar_path);
            temp.find('[data-timeline-user-fullname]').attr({
                'href': '/profile/overview/'+_timeline.user.id,
            }).text(_timeline.user.full_name);
            temp.find('[data-timeline-description]').text(_timeline.description);
            temp.find('[data-timeline-createdat]').text(_timeline.time);
            temp.find('form').attr({
                action: '/timeline/'+_timeline.id+'/reply',
                method: 'POST',
            });
            temp.find('[data-timeline-edit]').data('timeline-edit', _timeline.id).on('click', timeline.edit);
            temp.find('[data-timeline-delete]').data('timeline-delete', _timeline.id).on('click', timeline.delete);
            $('[name="description"]').val('');
            $('.comment-container').prepend(temp.fadeIn()).trigger('timeline.post.added', temp);
        },
        replyBinder = function(data) {
            var _reply = data.reply;
            var temp = timeline.$replyTemplate.clone();
            var $elem = timeline.$currentReplyForm.parents('.comment-row, .post-wrapper');
            temp.find('[data-timeline-reply-user-avatar]').attr('src', _reply.user.avatar_path);
            temp.find('[data-timeline-reply-user-fullname]').attr('href', '/profile/overview/'+_reply.user.id).text(_reply.user.full_name);
            temp.find('[data-timeline-reply-message]').text(_reply.message);
            temp.find('[data-timeline-reply-createdat]').text(_reply.time);
            timeline.$currentReplyForm.find('[name="message"]').val('');
            $elem.find('.timeline-replies-container').append(temp.fadeIn());
        },
        editBinder = function(data) {
            var _timeline = data.timeline;
            var $post = timeline.$currentPost;
            $post.find('[data-timeline-description]').text(_timeline.description)
            .hide().fadeIn('slow');
            $post.find('[data-timeline-createdat]').text(_timeline.time);
            $('#edit-post').modal('hide');
        },
        deleteBinder = function(data) {
            var success = data.success;
            var $post = timeline.$currentPost;
            $post.fadeOut("slow", function() {
                $(this).remove();
            });
        };

        start();
    },

    subscribe: function(channel) {
        return pusher.subscribe(channel);
    }

};

$(function() {
    notify.init();
});
