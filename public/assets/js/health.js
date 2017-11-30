var health = {

	init: function() {
		var self= this;
		self.initHealth();
		self.initReward();
	},

	initQuestions: function() {
		var start = function() {
			console.log($('#health-question').val());
			if ($('#health-question').val() == 0) {
				window.addEventListener('load', openModal);
				$('#health-question').val(1);
			}
		},
		openModal = function() {
			$('#questionsModal').modal('toggle');
		};
		start();
	},

	initHealth: function() {
		var start = function() {
			if ($('#HealthID').val() && !$('#check-session').val()){
				window.addEventListener('load', openModal);
			}
		},
		openModal = function() {
			$('#healthModal').modal('toggle');
		};
		start();
	},

	initReward: function() {
		var start = function() {
			if ($('#benefit_ids').val()){
				$('#benefitsModal').modal('toggle', setTimeout(function() {
					  $('#benefitsModal').modal('toggle');
					}, 10000) );
			}
		};
		start();
	},


};
