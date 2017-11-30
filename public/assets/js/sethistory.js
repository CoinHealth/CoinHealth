$(function() {
	var History = window.History;

	if (!History.enabled) 
		return false;

	History.Adapter.bind(window,'statechange',function() { // Note: We are using statechange instead of popstate
		var State = History.getState();
		console.log(State);
		// $('#content').load(State.url);
	      /* Instead of the line above, you could run the code below if the url returns the whole page instead of just the content (assuming it has a `#content`):
	      $.get(State.url, function(response) {
	          $('#content').html($(response).find('#content').html()); });
	          */
	});

	$('[name="county"]').on('change', function(e) {
		// History.pushState(null, null, '');
	});
});