
<div class="new-message-wrapper">
  <form id="form-new" action="/profile/messages/new" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="message" value="" id="message_body">
    <input type="file" id="attachment" name="attachments[]" class="hidden" multiple="true">
    <input type="hidden" name="to_id" value="">
    <div class="hidden uploaded-images-container"></div>
    <div class="hidden mentioned-users-container"></div>

    <div class="form-group message-to-wrapper">
      {{-- <span class="message-to-placeholder">To:</span> --}}
      <input type="text" required placeholder="Type a name.." class="form-control members-typeahead">
    </div>
    <div class="form-group message-subject">
      <input type="text" required name="subject" placeholder="Subject" class="form-control">
    </div>

    <div class="message-body-wrapper">
      <div class="atwho message-content" id="message-content" placeholder="type a message.." contenteditable="true"></div>
      <span class="message-commands pull-right">
        <button type="button" title="Attach a file.." class="btn btn-attach-file" data-toggle="modal" data-target="#select-attachment"><i class="fa fa-file-text-o"></i></button>
        <button type="submit" title="Send" class="btn btn-send"><span class="glyphicon glyphicon-send"></span></button>
      </span>
    </div>
  </form>
</div>

<div class="thread-disclaimer alert fade in alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Heads up!</strong> <p>To avoid server congestion, we encourage that you save files and other important information on your computer or phone within 30 days from start of conversation.</p>
</div>
