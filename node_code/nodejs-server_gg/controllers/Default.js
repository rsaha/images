'use strict';

var url = require('url');

var Default = require('./DBService');


module.exports.guideGet = function guideGet (req, res, next) {
  var id = req.swagger.params['id'].value;

  res.setHeader('Content-Type', 'application/json');
  Default.guideGet(id , function(result){
    console.log(result);
    res.end(JSON.stringify(result || {}, null, 2));
  });
};

module.exports.guidesGet = function guidesGet (req, res, next) {
  var size = req.swagger.params['size'].value;
  var city = req.swagger.params['city'].value;
  var theme = req.swagger.params['theme'].value;
  

  res.setHeader('Content-Type', 'application/json');
  Default.guidesGet(size, city, theme , function(result){
    console.log(result);
    res.end(JSON.stringify(result || {}, null, 2));
  });
};

module.exports.tourGet = function tourGet (req, res, next) {
  var tourid = req.swagger.params['tourid'].value;
  
  res.setHeader('Content-Type', 'application/json');
  var tourid = req.swagger.params['tourid'].value;
  Default.tourGet(tourid, function(result){
    console.log(result);
    res.end(JSON.stringify(result || {}, null, 2));
  });
};
module.exports.toursGet = function toursGet (req, res, next) {
  var size = req.swagger.params['size'].value;
  var city = req.swagger.params['city'].value;
  var theme = req.swagger.params['theme'].value;
  
  res.setHeader('Content-Type', 'application/json');
  Default.toursGet(size, city , theme , function(result){
    console.log(result);
    res.end(JSON.stringify(result || {}, null, 2));
  });
};

module.exports.placeGet = function placeGet (req, res, next) {
  var tourid = req.swagger.params['tourid'].value;
  

  var result = Default.placeGet(tourid);

  if(typeof result !== 'undefined') {
    res.setHeader('Content-Type', 'application/json');
    res.end(JSON.stringify(result || {}, null, 2));
  }
  else
    res.end();
};

module.exports.placesGet = function placesGet (req, res, next) {
  var size = req.swagger.params['size'].value;
  var theme = req.swagger.params['theme'].value;
  

  var result = Default.placesGet(size, theme);

  if(typeof result !== 'undefined') {
    res.setHeader('Content-Type', 'application/json');
    res.end(JSON.stringify(result || {}, null, 2));
  }
  else
    res.end();
};

module.exports.searchGet = function searchGet (req, res, next) {
  var size = req.swagger.params['size'].value;
  var keyword = req.swagger.params['keyword'].value;
  var criteria = req.swagger.params['criteria'].value;
  

  var result = Default.searchGet(size, keyword, criteria);

  if(typeof result !== 'undefined') {
    res.setHeader('Content-Type', 'application/json');
    res.end(JSON.stringify(result || {}, null, 2));
  }
  else
    res.end();
};