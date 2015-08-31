'use strict';

var marklogic = require('marklogic');
var conn = require('./my-ml-connection.js').connInfo; // Host and auth details
var db = marklogic.createDatabaseClient(conn);
var qb = marklogic.queryBuilder;

exports.guideGet = function(id,callback) {

  db.documents.read("/tmp/guide.json").
    result(function(documents){
      documents.forEach(function(document) {
        callback(document.content);
      });
    });
}
exports.guidesGet = function(size, city, theme,callback) {
  db.documents.read("/tmp/guides.json").
    result(function(documents){
      documents.forEach(function(document) {
        callback(document.content);
      });
    });
}
exports.tourGet = function(tourid,callback) {
  db.documents.read("/tmp/tour.json").
    result(function(documents){
      documents.forEach(function(document) {
        callback(document.content);
      });
    });
  
}
exports.toursGet = function(size, city, theme, callback) {
  
  db.documents.read("/tmp/tours.json").
    result(function(documents){
      documents.forEach(function(document) {
        callback(document.content);
      });
    });
}

exports.placesGet = function(size, city, theme, callback) {
  
  db.documents.read("/tmp/places.json").
    result(function(documents){
      documents.forEach(function(document) {
        callback(document.content);
      });
    });
}

exports.tourGet = function(placeid, callback) {
  
  db.documents.read("/tmp/place.json").
    result(function(documents){
      documents.forEach(function(document) {
        callback(document.content);
      });
    });
}

exports.searchGet = function(size, keyword, criteria, callback) {
  
  db.documents.read("/tmp/search.json").
    result(function(documents){
      documents.forEach(function(document) {
        callback(document.content);
      });
    });
}