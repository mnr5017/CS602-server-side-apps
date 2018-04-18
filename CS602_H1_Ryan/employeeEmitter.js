/*
 * Mark Ryan
 * CS 602 - Assign1 B
 * Sept 9, 2017
*/

var _ = require('underscore');
var util = require('util');
var EventEmitter = require('events');

//Provide the EmployeeEmitter class inheriting from
//the EventEmitter.

//The constructor function takes one argument
//and saves it as the instance variable data.
function EmployeeEmitter(data) {
	this.data = data;
};

util.inherits(EmployeeEmitter, EventEmitter);

//Provide the functions lookupById, lookupByLastName, and addEmployee for the
//EmployeeEmitter prototype. The first line in these methods should
//emit the respective event (same name as the function) along with
//the arguments supplied for the function. The rest of the code in each
//of the functions should be the same as in Part1.

EmployeeEmitter.prototype.lookupById = function(id) {
	this.emit('lookupById', id);
	return _.findWhere(this.data, {id: id});
};

EmployeeEmitter.prototype.lookupByLastName = function(last) {
	this.emit('lookupByLastName', last);
	return _.where(this.data, {lastName: last});
};

EmployeeEmitter.prototype.addEmployee = function(first, last) {
	this.emit('addEmployee', first, last);
	var employee = {};
	var employeeMax = _.max(this.data, function(e) {
      return e.id
  	});
  	employee.id = employeeMax.id + 1;
	employee.firstName = first;
	employee.lastName = last;
  	this.data.push(employee);
};

/*
From the module, export one property EmployeeEmitter referencing the constructor
function.
*/

exports.EmployeeEmitter = EmployeeEmitter;