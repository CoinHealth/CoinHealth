'use strict';

var locationsDatum = new Bloodhound({
	datumTokenizer: function(e) {
		return Bloodhound.tokenizers.whitespace(e);
	},
	queryTokenizer: Bloodhound.tokenizers.whitespace,
	remote: {
		url: '/api/getLocations/%QUERY',
		wildcard: '%QUERY',
	},
});
