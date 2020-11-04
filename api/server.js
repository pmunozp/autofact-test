const express = require("express");
const app = express();
const bodyParser = require("body-parser");
const mongoose = require("mongoose");
const routers = require("./routers/");

const connectionString = 'mongodb://127.0.0.1/autofact';

const options = {
    useNewUrlParser: true,
    reconnectTries: Number.MAX_VALUE, // Never stop trying to reconnect
    reconnectInterval: 500, // Reconnect every 500ms
    poolSize: 10, // Maintain up to 10 socket connections
    bufferCommands: false,
    keepAlive: true,
    keepAliveInitialDelay: 300000
}

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));

app.use(routers);



(async() => {
    try {
        await mongoose.connect(connectionString, options);
        app.listen(3000, function() {
            console.log("Running on port 3000");
        });
    } catch (err) {
        console.error("Error on server StartUp", err);
        process.exit(err.code);
    }
})();