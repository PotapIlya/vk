const http = require('http').Server();
const io = require('socket.io')(http);

const Redis = require('ioredis');

const redis = new Redis();
redis.subscribe('new-message');
redis.on('message', function (channel, message) {

    console.log("Message" + message);
    console.log("Channel" + channel);

    message.JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
})

http.listen(3000, function () {
    console.log('Listen the port 3000')
})