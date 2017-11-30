'use strict';

var doctorDatum = new Bloodhound({
  datumTokenizer: function (e) {
    return Bloodhound.tokenizers.whitespace(e);
  },
  queryTokenizer: Bloodhound.tokenizers.whitespace,

  remote: {
    url: '/api/doctorhospital?query=%QUERY',
    wildcard: '%QUERY',
    filter: function (data) {
      console.log(data);
      return $.map(data, function (d) {
        return {
          fullname: d.name,
          data : d
        }
      });
    },
    prepare: function(query, settings) {
      if (query && getParameterByName('zip_code')) {
        var url = '/api/doctorhospital?query='+query+'&zip_code='+getParameterByName('zip_code');
        settings.url = url;
        return settings;
      }

      settings.url = '/api/doctorhospital?query='+query;
      return settings;
    },
  },
});
