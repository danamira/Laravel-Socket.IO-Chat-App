let server = require('http').Server();
let socket = require('socket.io')(server);
redis = new require('ioredis')();
server.listen(3000)
console.log('fuck');
socket.on('connection',function(io) {
	io.emit('welcome','You are now successfully connected to the socket .');
	console.log('fuck');
	redis.subscribe('danaChat:channel')
	redis.on('message',function(channel,message) {
		data = JSON.parse(message);
		if(data.event=='newMsg') {
			console.log(data);
			io.emit('newMsg',data);
		}
		data = JSON.parse(message);
		if(data.event=='left') {
			// console.log('left');
			io.emit('left',data);
		}
	})
})