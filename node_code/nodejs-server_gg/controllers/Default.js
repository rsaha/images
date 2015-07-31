'use strict';

var url = require('url');


var Default = require('./DefaultService');


module.exports.guideGet = function guideGet (req, res, next) {
  var id = req.swagger.params['id'].value;
  

  var result = Default.guideGet(id);

  if(typeof result !== 'undefined') {
    res.setHeader('Content-Type', 'application/json');
    res.end(JSON.stringify(result || {}, null, 2));
  }
  else
    res.end();
};

module.exports.guidesGet = function guidesGet (req, res, next) {
  var size = req.swagger.params['size'].value;
  var city = req.swagger.params['city'].value;
  var theme = req.swagger.params['theme'].value;
  

  var result = Default.guidesGet(size, city, theme);

  if(typeof result !== 'undefined') {
    res.setHeader('Content-Type', 'application/json');
    res.end(JSON.stringify(result || {}, null, 2));
  }
  else
    res.end();
};

module.exports.tourGet = function tourGet (req, res, next) {
  var tourid = req.swagger.params['tourid'].value;
  

  var result = Default.tourGet(tourid);

  if(typeof result !== 'undefined') {
    res.setHeader('Content-Type', 'application/json');
    res.end(JSON.stringify(result || {}, null, 2));
  }
  else
    res.end();
};

module.exports.toursGet = function toursGet (req, res, next) {
  var size = req.swagger.params['size'].value;
  var city = req.swagger.params['city'].value;
  var theme = req.swagger.params['theme'].value;
  

  var result = Default.toursGet(size, city, theme);

  if(typeof result !== 'undefined') {
    res.setHeader('Content-Type', 'application/json');
    res.end(JSON.stringify(result || {}, null, 2));
  }
  else
    res.end();
};
