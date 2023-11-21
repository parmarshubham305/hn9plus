const { channel } = require('diagnostics_channel');
const express = require('express');
const mysql = require('mysql');
require('dotenv').config();

const connection = mysql.createConnection({
    host: process.env.DB_HOST,
    user: process.env.DB_USERNAME,
    password: process.env.DB_PASSWORD,
    database: process.env.DB_DATABASE,
    socketPath: process.env.DB_SOCKET
});
connection.connect();

var chatChannels = [];

connection.query('SELECT * from chats', (err, rows, fields) => {
    if (err) throw err
    
    chatChannels = rows;
});

const app = express();

const server = require('http').createServer(app);

const io = require("socket.io")(server, {
    cors :{ origin: "*" }
});

io.on("connection", (socket) => {
    console.log("Socket");
    
    chatChannels.forEach((chat) => {
        socket.on(chat.channel, (message) => {
            io.sockets.emit(chat.channel, message);
        });
    
        socket.on("disconnect", (socket) => {
            console.log("Disconnected");
        });
    });
})

server.listen(3000, () => {
    console.log('Server is running');
});