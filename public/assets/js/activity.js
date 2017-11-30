var activity = {

	init: function() {

	},


	initCommunity: function() {
		var start = function() {
			$('.btn-west').on('click', enterWestCoast);
			$('.btn-east').on('click', enterEastCoast);
		},
		enterWestCoast = function() {
			$.post('/activity', {
	      _token: csrf_token,
	   		from_url: '/community/community-ew',
	   		message: 'Enter Community West Coast',
	    }).done(done);
		},
		enterEastCoast = function() {
			$.post('/activity', {
	      _token: csrf_token,
	   		from_url: '/community/community-ew',
	   		message: 'Enter Community East Coast',
	    }).done(done);
		},
		done = function(data) {
			console.log(data);
		};
		start();
	},

	initNews: function() {
		var start = function() {

		};
		start();
	},

	initProfile: function() {
		var start = function() {
			$('.btn-upload-attachments').on('click', uploadAttachment);
		},
		uploadAttachment = function() {
			$.post('/activity', {
	      _token: csrf_token,
	   		from_url: '/profile',
	   		message: 'Upload an attachment.',
	    }).done(done);
		},
		done = function(data) {
			console.log(data)
		};
		start();
	},

	initQuote: function() {
		var start = function() {

		};
		start();
	},

	initOverview: function() {
		var start =function() {

		};
		start();
	},

	initAgent: function() {
		var start = function() {

		};
		start();
	},


};