var server = require('ws').Server
var s = new server({ port:5001})

//add pages
var cardPages = {}
var vitalPages = {}
var consultationPages = {}
var specialPages = {}
var screenPages = {}

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
        }else if(data.action==='registerConsultationPage'){
            consultationPages[data.userId] = ws
            console.log(data.userId + ' registered!')
        }else if(data.action==='registerSpecialPage'){
            specialPages[data.userId] = ws
            console.log(data.userId + ' registered!')
        }else if(data.action==='registerScreenPage'){
            screenPages[data.userId] = ws
            console.log(data.userId + ' registered to screen!')
        }

        if(data.action === 'sendToCardPage'){
            clients = cardPages
        }else if(data.action === 'sendToVitalPage'){
            clients = vitalPages
        }else if(data.action === 'sendToConsultationPage'){
            clients = consultationPages
        }else if(data.action === 'sendToSpecialPage'){
            clients = specialPages
        }else if(data.action === 'sendToScreenPage'){
            clients = screenPages
            // s.clients.forEach(function e(client) {
            //     client.send(JSON.stringify({
            //         section: data.section,
            //         number: data.number,
            //         priority: data.priority
            //     }))
            // })
        }

        try {
            Object.keys(clients).forEach(function (key) {
                clients[key].send(JSON.stringify(data))
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
    })
})



