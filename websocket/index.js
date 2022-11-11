var server = require('ws').Server
var s = new server({ port:5001})

//add pages
var cardPages = {}
var vitalPages = {}

s.on('connection',function(ws) {
    ws.on('message',function(message){
        var data = JSON.parse(message)
        console.log(data)
        var clients = {}
        if(data.action==='registerCardPage'){
            cardPages[data.userId] = ws
            console.log(data.userId + ' registered!')
        }else if(data.action==='registerVitalPage'){
            vitalPages[data.userId] = ws
            console.log(data.userId + ' registered!')
        }

        if(data.action === 'sendToCardPage'){
            clients = cardPages

        }else if(data.action === 'sendToVitalPage'){
            clients = vitalPages
        }

        try {
            Object.keys(clients).forEach(function (key) {
                clients[key].send(JSON.stringify(data))
                console.log('sending to card page...')
            })
        }catch(e){

        }
        // s.clients.forEach(function e(client) {
        //     if(data.channel=='addNumber'){
        //         client.send(JSON.stringify({
        //             section: data.section,
        //             channel: data.channel
        //         }));
        //         console.log('sending to card issuance page')
        //     }else if(data.channel=='pending'){
        //         client.send(JSON.stringify({
        //             channel: data.channel
        //         }));
        //         console.log('sending to pending page')
        //     }else{
        //         client.send(JSON.stringify({
        //             section: data.section,
        //             number: data.number,
        //             priority: data.priority
        //         }));
        //         console.log('sending to '+ data.section)
        //     }
        //
        // });

        function registerCardPage(id,ws){
            if(!cardPages.hasOwnProperty(id)){
                cardPages[id] = ws;
                console.log('registered: ',id)
            }
        }

        function sendData(data){
            try {
                Object.keys(cardPages).forEach(function (key) {
                    console.log(Object.keys(cardPages).length)
                    cardPages[key].send(JSON.stringify(data))
                })
            }catch (e){

            }
        }
    })
})



