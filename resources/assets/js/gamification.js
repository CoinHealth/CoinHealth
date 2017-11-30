// import Modal from './components/Gamifications/Modal.vue';

// const gamification = new Vue(
// 	el:'#gamification',
// 	components: {
// 		'modal': Modal,
// 	},
// 	data: {
// 		show: '',
// 		points: '',
// 		award: '',
// 	}, 

// 	mounted () {

// 	},

// 	methods: {

// 	},

// 	computed: {

// 	},

// });


var gamification = {
	init: function () {
		var self = this;
		self.showModal();
	},

	showModal:  function () {
		var modal = $('#modal-gamification');
		var start = function () {
			if ($('#Points').val().length > 0){
				var points = $('#Points').val(),
					desc = $('#Award').val();
				modal.modal('show');
				modal.find('.points').text(points);
				modal.find('.points-desc').text(desc);
			}

		};
		start();
	}


};
gamification.init();