'use strict';

exports.guideGet = function(id) {

  var examples = {};
  
  examples['application/json'] = "{}";
  

  
  if(Object.keys(examples).length > 0)
    return examples[Object.keys(examples)[0]];
  
}
exports.guidesGet = function(size, city, theme) {

  var examples = {};
  
  examples['application/json'] = [ "{}" ];
  

  
  if(Object.keys(examples).length > 0)
    return examples[Object.keys(examples)[0]];
  
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