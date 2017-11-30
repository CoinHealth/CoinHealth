var shop = {

	init: function() {
		var self= this;
	},

	checkoutItem: function() {
		var start = function() {
			$('.checkoutBtn').on('click', verifyUser);
		},
		verifyUser = function() {
			if ($('#userLog').val().length > 0){
				$(this).attr("href", "/careconnect/checkout");
			}
			else {
				$(this).removeAttr("href");
				$('#logFirstModal').modal('toggle'); 
				$('#cartModal').modal('hide');
			}
		};
		start();
	},

	addToCartItem: function() {
		var start = function() {
			$('#addtocartBtn').on('click', viewCart);
		},
		viewCart = function() {
			$('#cartModal').modal('toggle'); 
		};	
		start();
	},



};