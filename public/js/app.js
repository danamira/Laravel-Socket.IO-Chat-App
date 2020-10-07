$(document).ready(function(){
    let socket = io('127.0.0.1:3000')
    socket.on('welcome',function(data) {
        $('.server_error').hide();
        $('.pending_msg').hide();
        console.log(socket.disconnected);
        $('.server_msg').text(data);
        $('.server_msg').fadeIn();
    })
    socket.on('disconnect',function(data) {
        $('.server_msg').hide();
        $('.pending_msg').hide();
        $('.server_error').text('Connection lost.');
        $('.server_error').fadeIn();
    })
    socket.on('newMsg',function(data) {
        data = data.data;
        if(data.user.id==me) {
        $('#messages').append(`
        
        <div style="margin-bottom:10px;">
        <span class="badge badge-primary">`+data.user.name+ `:</span> `+data.body+`
        </div>
                `);
        }
        else {
            $('#messages').append(`
        
            <div style="margin-bottom:10px;">
            <span class="badge badge-dark">`+data.user.name+ `:</span> `+data.body+`
            </div>
                    `)
        }
    });
    
    socket.on('left',function(data) {
        data = data.data;
        $('#messages').append(`
        
        <div style="margin-bottom:10px;">
        <span class="badge badge-gray">`+data.user.name+ ` left the chat .</span>         </div>
                `)    });

    
    $('#toSend').keypress(function(e) {
        if(e.which==13) {
            let text = $('#toSend').val();
            $.ajax({
                url: "/",
                method:"post",
                data : {
                    body : text
                }
              }).done(function(response) {
                  console.log(response)
                  if(response=='OK') {
                    $('#toSend').val('');
                  }
              }).fail(function(r) {
                  console.log(r)
              });       
        }
    })
});