//We are using express dependency
var express = require('express');
var app = express();
//set port
var port = process.env.PORT || 8080
//allowing html and css to load
app.use(express.static(__dirname));
//routes
app.get("/", function (req, res) {
    res.render("index");
})
//listen to requests
app.listen(port, function () {
    console.log("app running");
})