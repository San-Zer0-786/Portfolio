
var express = require('express');
var app = express();



// --> 7)  Mount the Logger middleware here
app.get("/json",function(req,res,next){
     console.log(req.method + " " + req.path + " - " + req.ip)
     next()
 })

// --> 11)  Mount the body-parser middleware  here
var bodyParser = require('body-parser')
app.use(bodyParser.json());       // to support JSON-encoded bodies
app.use(bodyParser.urlencoded({     // to support URL-encoded bodies
  extended: true
})); 

/** 1) Meet the node console. */
console.log("Hello World")

/** 2) A first working Express Server */
app.get("/" , function(req,res){
  res.send("Hello Express")
})

/** 3) Serve an HTML file */
app.get("/",function(req,res){
  res.sendFile(__dirname + "/views/index.html")
})

/** 4) Serve static assets  */
//app.use(express.static(__dirname+ "/public"))

/** 5) serve JSON on a specific route */
 app.get('/json' , function(req,res) {
  res.json({"message":"Hello json"})
}) 


/** 6) Use the .env file to configure the app */
 app.get("/json",function(req,res){
  let message = "Hello json"
  if (process.env.MESSAGE_STYLE == "uppercase"){
      
      res.json({message:message.toUpperCase()})
        
      }
  
  res.json({message:message})
}) 
 
/** 7) Root-level Middleware - A logger */
//  place it before all the routes !
  app.get("/json",function(req,res,next){
     console.log(req.method + " " + req.path + " - " + req.ip)
     next()
 }) 





/** 8) Chaining middleware. A Time server */
 app.get("/now" , function(req,res,next){
  req.time = new Date().toString()
  next()
}, function(req,res){
  res.json({time:req.time})
}) 




/** 9)  Get input from client - Route parameters */
 app.get("/:word/echo", function(req,res) {
    res.json({echo:req.params.word})
  }) 



/** 10) Get input from client - Query parameters */
// /name?first=<firstname>&last=<lastname>
 app.get("/name",function(req,res){
  res.json({name: req.query.first + " " + req.query.last})
})
/* Alternative: app.route('/name').get((req, res) => {
   var first = req.query.first;
   var last = req.query.last;
   var jsonObj = {name: first + ' ' + last};
   res.send(jsonObj);
 }).post();  */

  
/** 11) Get ready for POST Requests - the `body-parser` */
// place it before all the routes !
// app.use(bodyParser.urlencoded({extended:false})) //

/** 12) Get data form POST  */
app.post('/name' , function(req,res){
  let first = req.body.first
  let last = req.body.last
  res.json({name: first + " " + last})
})


// This would be part of the basic setup of an Express app
/** app.listen(process.env.PORT || 3000 ); */

 module.exports = app;
