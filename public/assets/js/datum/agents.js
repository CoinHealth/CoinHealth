'use strict';
String.prototype.capitalizeFirstLetter = function() {
	return this.charAt(0).toUpperCase() + this.slice(1);
}
var agentsDatum = new Bloodhound({
  datumTokenizer: function (e) {
    return Bloodhound.tokenizers.whitespace(e);
  },
  queryTokenizer: Bloodhound.tokenizers.whitespace,

  remote: {
    url: '/api/agents?query=%QUERY',
    wildcard: '%QUERY',
    filter: function (data) {
        return $.map(data, function (d) {
          return {
            fullname: d.fname.toLowerCase().capitalizeFirstLetter() + ' ' + d.lname.toLowerCase().capitalizeFirstLetter(),
						username: d.username,
						image: d.avatar_path,
						name: d.fname.toLowerCase().capitalizeFirstLetter() + ' ' + d.lname.toLowerCase().capitalizeFirstLetter(),
            data : d
          }
        });
    }
  },
});
