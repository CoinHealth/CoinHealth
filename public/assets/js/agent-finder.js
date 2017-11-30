'use strict';

var agent = {

  init: function () {
    var self= this;
    self.initAdd();
    self.initTypeahead();
    //self.initPremiumListing();
  },

  initTypeahead: function() {
		var start = function() {
			agentsDatum.initialize();
			$('#provider_input').typeahead(null, {
				minLength: 1,
				limit: 15,
				displayKey: 'location',
				source: agentsDatum.ttAdapter(),
				templates: {
					suggestion: function(data) {
            var ratings = data.data.total_rating;
            console.log(data);
            return '<div class="doctor-list"'+
                    '<h3><b>'+data.fullname+'</b>'+
                    // '<span class="doc-star pull-right">'+
                    //   '<ul>'+
                    //     '<li><a href="#"><span class=" '+ (ratings >=1 ? "search-rate" : "") +' glyphicon glyphicon-star"></span></a></li>'+
                    //     '<li><a href="#"><span class=" '+ (ratings >=2 ? "search-rate" : "") +' glyphicon glyphicon-star"></span></a></li>'+
                    //     '<li><a href="#"><span class=" '+ (ratings >=3 ? "search-rate" : "") +' glyphicon glyphicon-star"></span></a></li>'+
                    //     '<li><a href="#"><span class=" '+ (ratings >=4 ? "search-rate" : "") +' glyphicon glyphicon-star"></span></a></li>'+
                    //     '<li><a href="#"><span class=" '+ (ratings >=5 ? "search-rate" : "") +' glyphicon glyphicon-star"></span></a></li>'+
                    //   '</ul>'+
                    // '</span>'+
                    '</h3>'+
                    '<p class="small"><strong>'+data.data.specialization+'</strong></p>'+
                    '<p class="small">'+data.data.street+', '+data.data.state+'</p>'+

                    '<p class="small"><strong>'+data.data.contact_no+'</strong></p>'+
                    '</div>';
					},
					empty: '<div class="empty-message">No matches.</div>',
				}
			}).on('typeahead:select', selected);
		},
		selected = function(obj, selected) {
			$(this).typeahead('val', selected.zip_code);
			$('[name="location_id"]').val(selected.id);
		};

		start();
	},

  initRegistration: function() {
    var data = [
      $('[name=username]'),
      $('[name=password]'),
      $('[name=password_confirmation]'),
      $('[name=email]'),
      $('[name=license_number]'),
      $('[name=company]'),
    ],
    start = function() {
      $('#btnSignUp').on('submit', submit);
    },
    submit = function(e) {
      e.preventDefault();

    };
    start();
    // $('#btnSignUp').on('submit',)
  },

  validate : function() {
    var elem = $(this),
      dataRules = elem.data('authRule').split('|'),
      rules = {},
      _rules = null;
    var start = function() {
      if (dataRules.length)
        $.each(dataRules, each);

      validate();

    },
    each = function(i,v ) {
      var r = v.split(':');
      if (r[0] == 'unique') {
        rules[r[0]] = {
          'table' : r[1].split(',')[0],
          'field'	: r[1].split(',')[1],
          'value'	: elem.val(),
        };
      }
      else {
        rules[r[0]] = r[1];
      }
    },
    validate = function() {
      _rules = rules;
      if (rules.unique) {
        $.get('/careconnect/checkValidate', rules.unique).done(function(data) {
          _rules.unique = data == 0;
        });
      }

      if (rules.min)
        rules.min >= elem.val().length ? _rules.min = true : _rules.min = true;

      if (rules.max)
        rules.max <= elem.val().length ? _rules.max = true : _rules.max = false;
      getErrors(rules)
    },
    getErrors = function(r) {
      console.log(r);
    };
    start();
  },

  initPremiumListing: function () {
    var start = function () {
      $('#btnPremium').on('click', openPl);
      $('#btnAgentpl').on('click', openPayment);
    },
    openPl = function() {
      $('#pl').modal('toggle');
    },
    openPayment = function() {
      $('#pl').modal('toggle');
      $('#agentPaymentModal').modal('toggle');
    };
    start();
  },

  initAdd: function() {
    var start = function() {
      $('.row-premium').hide();
      $('#chk_premium').on('change', checked);
      //get the exp date
      $('#expiration_date').val($('#exp_month').val() + '/' + $('#exp_year').val());
      $('#exp_month, #exp_year').on('change', getExpiration);
      $('#btnAgentpl').on('click', close);
    },
    close = function() {
      $('#pl').modal('toggle');
    },
    checked = function() {
      if ($(this).is(':checked')){
        $('.row-premium').fadeIn('slow');
        $('#full_name').val($('#fname').val() + ' ' + $('#lname').val() );
        $('#subscription, #email, #full_name, #credit_card_number, #credit_card_type, #cvv_cid').prop('required', true);
        $('#pl').modal('toggle');
      } else {
        $('.row-premium').fadeOut('slow');
        $('#subscription, #email, #full_name, #credit_card_number, #credit_card_type, #cvv_cid').prop('required', false);
      }
    },
    getExpiration = function() {
      $('#expiration_date').val($('#exp_month').val() + '/ ' + $('#exp_year').val());
    };
    start();
  },

};
