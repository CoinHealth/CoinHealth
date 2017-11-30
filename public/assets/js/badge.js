var badge = {

	init:function() {
		var self= this;
		self.badges();
	},

	badges: function() {
		var start = function() {
			if ($('.badge').length){
				if ($('#Badge').val().length > 0){
		      var somedialog = document.getElementById( 'somedialog' ),
				      morphEl = somedialog.querySelector( '.morph-shape' ),
							s = Snap( morphEl.querySelector( 'svg' ) ),
				      path = s.select( 'path' ),
				      initialPath = path.attr('d'),
				      steps = {
				          open : morphEl.getAttribute( 'data-morph-open' )
				      },
				      badge= $('#Badge').val(),
				      level= $('#LeveledUp').val(),
				      icon= $('#badgeIcon').val(),
				      dlg = new DialogFx( somedialog, {
				          onOpenDialog : function( instance ) {
											$('#imgBadge').attr('src', icon);
											$('#badgeName').text(badge);
											$('#badgLevel').text(level);
                      // playAudio();
											if ($('.dl-menuwrapper'))
												$('.dl-menuwrapper').hide();
											if ($('.file-wrapper'))
												$('.file-wrapper').hide();
				              // reset path
				              morphEl.querySelector( 'svg > path' ).setAttribute( 'd', initialPath );
				              // animate path
				              path.stop().animate( { 'path' : steps.open }, 300, mina.easein );
				          },
				          onCloseDialog : function () {
				              path.stop();
											if ($('.dl-menuwrapper'))
												$('.dl-menuwrapper').show();
											if ($('.file-wrapper'))
												$('.file-wrapper').show();
				          }
				      } );
		      window.addEventListener('load', dlg.toggle.bind(dlg));
		      window.addEventListener('load', setTimeout(function() {
						    $('#somedialog').fadeOut('slow');
						}, 7000) );
					}
			  $('.badge').val('');
			}
			$('#closeBadge').hide();
		};
		// temporarily remove the audio
    // playAudio = function() {
    //   var audioElement = document.createElement('audio');
    //   audioElement.setAttribute('src', '/assets/audio/audio.mp3');
    //   audioElement.setAttribute('autoplay', 'autoplay');
		//
    //   audioElement.addEventListener("load", function() {
    //     audioElement.play();
    //   }, true);
		// };
		start();
	},

};
