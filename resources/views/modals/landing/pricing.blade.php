<div class="modal fade" id="signup" tabindex="-1" role="dialog">
  	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">

      		<div class="modal-body">
      			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        		@if (auth()->check() && auth()->user()->isCrmCapable())
                    @include('modals.landing.pricing-crm')
                @else
                    @include('modals.landing.pricing-ehr')
                @endif
        		<div class="div-contact">
        			<a href="/home/contact" class="contact">Contact Us</a>
        		</div>
      		</div>
    	</div>
  	</div>
</div>
