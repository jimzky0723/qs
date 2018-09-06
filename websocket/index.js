var server = require('ws').Server;
var s = new server({ port:5001});

s.on('connection',function(ws) {
    ws.on('message',function(message){
        var data = JSON.parse(message);
        s.clients.forEach(function e(client) {
            if(data.channel=='addNumber')
            {
                client.send(JSON.stringify({
                    section: data.section,
                    channel: data.channel
                }));
            }else if(data.channel=='pending')
            {
                client.send(JSON.stringify({
                    channel: data.channel
                }));
            }else{
                client.send(JSON.stringify({
                    section: data.section,
                    number: data.number,
                    priority: data.priority
                }));
            }

        });

    });
});