var server = require('ws').Server
var s = new server({ port:5001})

s.on('connection',function(ws) {
    ws.on('message',function(message){
        var data = JSON.parse(message)

        s.clients.forEach(function e(client) {
            client.send(JSON.stringify(data));
        });
    })
})



