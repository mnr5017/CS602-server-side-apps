/*
 * Mark Ryan
 * CS 602 - Assign1 B
 * Sept 9, 2017
*/

var colors = require('colors/safe');

//write the application, hw1b.js, using the functionality of the
//above module. 

var EmployeeEmitter = require('./employeeEmitter').EmployeeEmitter;

//Using the same array data as in Part1, create the
//EmployeeEmitter object using the array data as its
//argument.

var data = [

    {id: 1, firstName:'John', lastName:'Smith'},
    {id: 2, firstName:'Jane', lastName:'Smith'},
    {id: 3, firstName:'John', lastName:'Doe'}

];

var employeeEmitter = new EmployeeEmitter(data);

//Write three event handlers for the three events that could be
//emitted by the three functions. See the sample output for the
//behavior of these handlers. Now, using the EmployeeEmitter
//object, do the following operations.

employeeEmitter.on('lookupById', function(data){
	console.log(colors.blue("Event lookupById raised! " + data));
});

employeeEmitter.on('lookupByLastName', function(data){
	console.log(colors.blue("Event lookupByLastName raised! " + data));
});

employeeEmitter.on('addEmployee', function(first, last){
	console.log(colors.blue("Event addEmployee raised! " + last + "," + first));
});

//Lookup by last name, Smith, and print the results.
//Add a new employee with first name, William, and last name,
//Smith.

console.log(colors.red("Look up by last name Smith"));
var employeeLast = employeeEmitter.lookupByLastName('Smith');
console.log((JSON.stringify(employeeLast)));

//Lookup by last name, Smith, and print the results.

//Lookup by id, 2, and print the result.

console.log(colors.red("Adding employee William Smith"));
employeeEmitter.addEmployee('William', 'Smith');
console.log(colors.red("Look up by last name Smith"));
var employeeLast = employeeEmitter.lookupByLastName('Smith');
console.log((JSON.stringify(employeeLast)));

console.log(colors.red("Look up by id 2"));
var employeeID = employeeEmitter.lookupById(2);
console.log(employeeID);