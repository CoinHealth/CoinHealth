<div class="container-fluid fixed-button">
	<div class="row">
		<div class="col-xs-6 no-padding">
			<a href="/profile" class="btn-yellow {{ $view!='timeline' ?:'active' }}">Timeline</a>
		</div>
		<div class="col-xs-6 no-padding">
			<a href="/profile/messages" class="btn-yellow {{ $view!='messages' ?:'active' }}">Chat</a>
		</div>
		<div class="col-xs-6 no-padding">
			<a href="/profile/documents" class="btn-yellow {{ $view!='documents' ?:'active' }}">Documents</a>
		</div>
		<div class="col-xs-6 no-padding">
			<a href="/community" class="btn-yellow">CareCommunity</a>
		</div>
	</div>
</div>
