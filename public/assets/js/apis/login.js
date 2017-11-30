'use strict';

var auth = {
    $modal: $('#modal-authenticate'),

    init: function() {
        var self = this;
        self.$modal.find('form').on('submit', self.initLogin);
    },

    initLogin: function(e) {
        e.preventDefault();
        var self = auth;
        var $this = $(this),
            $btn = $this.find('button[type="submit"]');
        var start = function() {
            $btn.attr('disabled', true)
                .html('<i class="fa fa-spin fa-spinner"></i> Logging in..');
            $.post($this.attr('action'), $this.serialize())
                .done(done)
                .fail(failed);

        },
        done = function(response) {
            console.log(response);
            $btn.attr('disabled', false)
                .html('LOG IN');
            if (response.attempt) {
                self.$modal.find('.alert')
                    .toggleClass('alert-danger alert-success')
                    .fadeIn('fast')
                    .find('.error-list').html('<li>Success!</li>');
                setTimeout(function() {
                    self.$modal.modal('hide');
                },500)
            }
            else {
                self.$modal.find('.alert')
                    .removeClass('alert-success')
                    .addClass('alert-danger')
                    .fadeIn('fast')
                    .find('.error-list').html('<li>Login failed!</li>');
            }
        },
        failed = function(response) {
            $btn.attr('disabled', false)
                .html('LOG IN');
            if (response.status === 422) {
                console.log(response);
            }
        };

        start();
    },

    check: function() {
        var start = function() {
            $.get('/api/auth/check')
                .done(done);
        },
        done = function(response) {
            console.log(response);
        };

        start();
    },
};

auth.init();
