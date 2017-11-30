'use strict';

var member = {

  init: function() {
    var self = this;
    self.initTypeahead();
  },

  initTypeahead: function() {
    var start = function() {
      memberDatum.initialize();

      $('.members-typeahead').typeahead(null, {
        minLength: 0,
        highlight: true,
        displayKey: 'fullname',
        source: memberDatum.ttAdapter(),
        templates: {
          suggestion: function(data) {
            return '<div class="member-list"'+
                    '<h3>'+data.fullname+'</b></h3>'+
                    '</div>';
          },
          empty: '<div class="empty-message">No matches.</div>',
        }
      }).on('typeahead:selected', typeaheadSelect);
    },
    typeaheadSelect = function(obj, datum, name) {
      $('[name="to_id"]').val( datum.data.id );
    };

    start();
  },
};
