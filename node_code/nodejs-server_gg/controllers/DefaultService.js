'use strict';

exports.guideGet = function(id) {

  var examples = require("./data/guides.json");
  
  //examples['application/json'] = "{}";
  

  
  if(Object.keys(examples).length > 0)
    return examples[Object.keys(examples)[0]];
  
}
exports.guidesGet = function(size, city, theme) {

  var examples = require("./data/guides.json");
  
  //examples['application/json'] = [ "{}" ];
  

  
  //if(Object.keys(examples).length > 0)
    //return examples[Object.keys(examples)[0]];
  return examples;
  
}
exports.tourGet = function(tourid) {

  var examples = {};
  
  examples['application/json'] = "{}";
  

  
  if(Object.keys(examples).length > 0)
    return examples[Object.keys(examples)[0]];
  
}
exports.toursGet = function(size, city, theme) {

  var examples = {};
  
  examples['application/json'] = [ "{}" ];
  

  
  if(Object.keys(examples).length > 0)
    return examples[Object.keys(examples)[0]];
  
}
exports.placesGet = function(size, city, theme) {

  var examples = require("./data/places.json");
  
  //examples['application/json'] = [ "{}" ];
  

  
  //if(Object.keys(examples).length > 0)
    //return examples[Object.keys(examples)[0]];
  return examples;
  
}
exports.placeGet = function(placeid) {

  var examples = require("./data/place.json");
  
  //examples['application/json'] = [ "{}" ];
  

  
  //if(Object.keys(examples).length > 0)
    //return examples[Object.keys(examples)[0]];
  return examples;
  
}
exports.searchGet = function(size, keyword, criteria) {

  var examples = require("./data/search.json");
  
  //examples['application/json'] = [ "{}" ];
  

  
  //if(Object.keys(examples).length > 0)
    //return examples[Object.keys(examples)[0]];
  return examples;
  
}
