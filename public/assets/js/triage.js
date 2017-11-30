'use strict';

jQuery.fn.extend({
    checkbox: function(callback) {
        $(this).on('click', function() {
            var $this = $(this);
            var parent = $this.parents('.histories');
            $this.toggleClass('selected active');
            callback($this, parent);
        });
    },
    radio: function(callback) {
        $(this).on('click', function() {
            var $this = $(this);
            var parent = $this.parents('.histories');
            var ul = $this.parent();
            ul.find('li').not($this).removeClass('selected active');
            if (!$this.hasClass('selected active'))
                $this.addClass('selected active');

            callback($this, parent);
        });
    },
});

var triageData = {
    history: {}
};

var triage = {
    curStep: 0,
    init: function() {
        var self = this;
        $('.btn-history').on('click', self.initHistory);
        self.initChat();
    },

    initHistory: function() {
        var self = this;
        var $hCont = $('.histories-container');
        var start = function() {
            $('.chat-container').hide();
            $hCont.fadeIn("fast")
            $hCont.find('[data-checkbox]').checkbox(check);
            $hCont.find('[data-radio]').radio(check);
            $hCont.find('[data-notsure]').on('click', notsure);
            $hCont.find('[data-clear]').on('click', clear);
            $('[data-step]').on('click', next);
            $('.month-year').on('click', function() {
                var $this = $(this);
                $this.parents('.histories').find('.range-month-year').text($this.text());
            });
        },
        check = function(el, parent) {
            var list = parent.find('.selected-answers'),
                tpl = $('<span>'),
                text = el.find('a').text().trim();

            if ( el.hasClass('selected active') ) {
                tpl.attr({
                    'data-selector': el.data('selector'),
                }).text(text);

                if ("radio" in el.data()) {
                    list.empty();
                }
                else {
                    list.find('.not-sure').remove();
                }
                list.append(tpl);
            }
            else {
                list.find('span[data-selector='+el.data('selector')+']').remove();
            }
        },
        next = function() {
            var $this = $(this);
            $this.parents('.histories').hide();
            console.log($(this).data('step'));
            $('.histories-container').find('.histories.history-'+$this.data('step')).fadeIn();
        },
        clear = function() {
            var parent = $(this).parents('.histories')
            parent.find('.selected-answers').empty();
            parent.find('.answers-list li').removeClass('selected active');
        },
        notsure = function() {
            var parent = $(this).parents('.histories');
            parent.find('.selected-answers').empty();
            parent.find('.answers-list li').removeClass('selected active');
            parent.find('.selected-answers').append($('<span>').text('Not Sure').addClass('not-sure'));
        };

        start();
    },

    initChat: function() {
        var self = this;
        var steps = $('.chat-container .steps');
        var answers = $('.chat-container .answers'),
            $curStep = null,
            $curAnswer = null;

        var start = function() {
            nextStep((++self.curStep));
            $('.chat-container [data-step]').on('click', answer);
        },
        nextStep = function(step) {
            $curStep = steps.filter('.step-'+ step );
            setTime();
            $curStep.delay(500).fadeIn("fast");
            // scrollTop($curStep);
        },
        answer = function(e) {
            e.preventDefault();
            var $this = $(this),
                $inputs = $this.parents('.parent').find('[data-input]');
            if (!validate($inputs) && $inputs.length)
                return false;

            if (self.curStep == 2) {
                $inputs = $inputs.filter($this);
            }

            $curAnswer = answers.filter('.answer-' + ($this.data('answer')));
            showAnswer($inputs);
        },
        showAnswer = function($input) {
            var ans = '';
            if (self.curStep == 1) {
                ans = $input.val();
                triageData['name'] = ans;
                $curAnswer.find('.answer-text .name').text(ans);
            }
            else if (self.curStep == 2) {
                ans = $input.find('a').text();
                triageData['gender'] = ans;
                $curAnswer.find('.answer .text').text(ans);
            }
            else if (self.curStep == 3) {
                var month = $input.filter('[name=month]').val();
                var day = $input.filter('[name=day]').val();
                var year = $input.filter('[name=year]').val();
                $curAnswer.find('.answer .month').text(month);
                $curAnswer.find('.answer .day').text(day);
                $curAnswer.find('.answer .year').text(year);
                triageData['dob'] = month +' '+ day + ',' + year;
            }

            $curAnswer.fadeIn(500);
            self.scrollTop($curAnswer);
            nextStep(++self.curStep);
        },
        setTime = function() {
            var d = new Date();
            var time = d.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
            $curStep.find('.status .time').text(time);
        },
        validate = function(inputs) {
            if (self.curStep == 1) {
                if (!inputs.val().length) {
                    inputs.focus();
                    return false;
                }
            }
            return true;
        };

        start();
    },


    scrollTop: function($el) {
        $("html, body").delay(500).animate({ scrollTop: $el.offset().top });
    },
};
