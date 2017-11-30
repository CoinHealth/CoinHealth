<div class="new-reply-wrapper">
  <form id="form-send" action="/profile/messages/{{ $thread->id }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="message" value="" id="message_body">
    <input type="file" id="attachment" name="attachments[]" class="hidden" multiple="true">
    <input type="hidden" name="thread_id" value="{{ $thread->pair_id }}">
    <input type="hidden" name="to_id" value=" {{ $thread->to_id }}">
    <div class="hidden uploaded-images-container"></div>
    <div class="hidden mentioned-users-container"></div>

    <div class="message-body-wrapper">
      <div class="atwho message-content" id="message-content" placeholder="type a message.." contenteditable="true"></div>
      <span class="message-commands pull-right">
        <span class="file-notif"><span class="counter">0 file</span> attached.</span>
        <button type="button" title="Attach a file.." class="btn btn-attach-file" data-toggle="modal" data-target="#select-attachment"><i class="fa fa-file-text-o"></i></button>
        <button type="submit" title="Send" class="btn btn-send"><span class="glyphicon glyphicon-send"></span></button>
      </span>
    </div>
  </form>
</div>
