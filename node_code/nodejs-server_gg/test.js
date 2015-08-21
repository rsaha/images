var http = require('http');

// Start the server
http.createServer().listen(8080, function () {
    console.log('Your server is listening on port %d (http://localhost:%d)', 8080, 8080);
    var result = require("./controllers/data/guide.json");
    var str = JSON.stringify(result || {}, null, 2);
    console.log(str);
});
