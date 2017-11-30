<script>
window.Laravel = {
    csrfToken: "{{ csrf_token() }}",
    pusher: {
        key: "{{ env('PUSHER_KEY', "c5fe8cbf766162d5ae93") }}",
        cluster: "{{ env('PUSHER_CLUSTER',"mt1") }}"
    },
    salt: "{{ env('HASH_SALT', 'c@r3p@rR0t') }}",
    isAuthenticated: "{{ auth()->check() }}",
    userRole: "{{ auth()->check() ? auth()->user()->role : null }}",
    userId: "{{ auth()->check() ? auth()->user()->id : 0 }}",
    userSignature: "{{ auth()->check() ? auth()->user()->signature_path : '' }}",
    stripeKey: "{{ config("services.stripe.key") }}",
    algolia: {
        id: "{{ env('ALGOLIA_ID') }}",
        key: "{{ env('ALGOLIA_KEY') }}",
    }
};
</script>
