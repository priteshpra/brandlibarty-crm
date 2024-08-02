@extends('layouts.admin')
@section('content')
<div class="page-content">
    <div id="chat-messages">
        <!-- Chat messages will be displayed here -->
    </div>
    <form id="chat-form">
        <div class="form-group">
            <!-- <input type="text" class="form-control" id="message-input" placeholder="Type a message..."> -->
            <textarea class="form-control" id="message-input" rows="5" style="box-sizing: border-box;border: 2px solid #ccc;" placeholder="type here.."></textarea>
            <br>
            <button type="submit" id="wait" class="btn btn-primary">Send</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var a;
    var b;
    var i = 0;
    $('#chat-form').submit(function(event) {
        event.preventDefault();
        var message = $('#message-input').val();
        $('#message-input').val('');
        $.ajax({
            url: 'chat/generate',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                message: message
            },
            beforeSend: function() {
                $('#wait').html('Please Wait...');
            },
            complete: function() {
                $('#wait').html('Send');
            },
            success: function(response) {
                messagedata = response.replace(/\n/g, '<br/>');
                a = messagedata;
                i = a.length;
                while (i--) {
                    a.replace("**", '<b>');
                    b = a.replace("**", '<b>');
                    b.replace("**", '</b>')
                    a = b.replace("**", '</b>');


                }
                $('#chat-messages').append('<div><strong>You:</strong> ' + message + '</div>');
                $('#chat-messages').append('<div><strong>ChatGPT:</strong> ' + a + '</div>');
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
</script>
@endsection