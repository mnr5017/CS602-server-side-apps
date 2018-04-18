/*
 * Mark Ryan
 * CS 602 - Assign1 B
 * Sept 9, 2017
*/
 
//Write a Node.js module, employeeModule.js, with the following
//functionality 

var _ = require('underscore');

//The module maintains an array of JavaScript objects, each with the property 
//firstName, lastName, and a unique id value. 

var data = [

    {id: 1, firstName:'John', lastName:'Smith'},
    {id: 2, firstName:'Jane', lastName:'Smith'},
    {id: 3, firstName:'John', lastName:'Doe'}

];

//export the functions lookupById,lookupByLastName, and addEmployee
//use the underscore module (imported above) and use the functions findWhere, 
//where, pluck, and max in the implementation

//function lookupById should return the JavaScript object from the 
//data whose id matches the specified argument.

exports.lookupById = function(id) {
	return _.findWhere(data, {id: id});
};

//function lookupByLastName should return the array of JavaScript objects 
//from the data whose lastName matches the specified argument.

exports.lookupByLastName = function(value) {
	return _.where(data, {lastName: value});
};


//function addEmployee only takes two arguments, the firstName and lastName 
//of the employee being added. The id value should be calculated as one more 
//than the current maximum id.

exports.addEmployee = function(first, last) {
  var employee = {};
	var employeeMax = _.max(data, function(e) {
      return e.id
  });
  employee.id = employeeMax.id + 1;
	employee.firstName = first;
	employee.lastName = last;
  data.push(employee);
};	
