	</div>

	<script src="/assets/js/vendor/jquery/jquery.min.js"></script>
	<script src="/assets/js/vendor/bootstrap/bootstrap.min.js"></script>
	<script src="/assets/js/cp.js"></script>
	<script src="https://js.stripe.com/v2/"></script>
	<script type="text/javascript">
		Stripe.setPublishableKey(Laravel.stripeKey);
	</script>
	<script src="/assets/js/zoom.js"></script>
	<script type="text/javascript" src="/js/gamification.js"></script>

	@yield('scripts')

	@stack('scripts2')
</body>
</html>
