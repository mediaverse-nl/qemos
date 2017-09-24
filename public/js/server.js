/**
 * Created by master on 9/22/2017.
 */
var app = require('express');
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();
redis.subscribe('test-channel', function(err, count) {
});
redis.on('message', function(channel, message) {
    console.log('Message Recieved: ' + message);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});
http.listen(6379, function(){
    console.log('Listening on Port 6379');
});

// var app = require('express')();
// var server = require('http').Server(app);
// var io = require('socket.io')(server);
// var redis = require('redis');
//
// server.listen(8890);
//
// io.on('connection', function (socket) {
//    console.log('client connected');
//    var redisClient = redis.createClient();
//
//    redisClient.subscribe('message');
//
//     redisClient.on("message", function (channel, message) {
//         console.log("new event" + channel + message);
//     });
//
//     redisClient.on('disconnect', function () {
//         redisClient.quit();
//     })
//
// });