	/*
 * Mark Ryan
 * CS 602 - Assign1 B
 * Sept 9, 2017
*/

var colors = require('colors/safe');

//write the application, hw1a.js, using the functionality of employeeModule.js

var employeeInfo = require('./employeeModule');

//employeeModule.data();

//Lookup by last name, Smith, and print the results.

//employeeInfo.lookupByLastName = 'Smith';
var employeeLast = employeeInfo.lookupByLastName('Smith');
console.log(colors.red("Look up by last name Smith"));
console.log(JSON.stringify(employeeLast));

//Add a new employee with first name, William, and last name, Smith
employeeInfo.addEmployee('William', 'Smith');
console.log(colors.red("Adding employee William Smith"));
var employeeLast = employeeInfo.lookupByLastName('Smith');
console.log(colors.red("Look up by last name Smith"));
console.log(JSON.stringify(employeeLast));

//Lookup by last name, Smith, and print the results
//employeeInfo.lookupByLastName = 'Smith';
//console.log(employeeInfo.id, employeeInfo.firstName, employeeInfo.lastName);

//Lookup by id, 2, and assign the value to a variable
//Print the variable
var employeeID = employeeInfo.lookupById(2);
console.log(colors.red("Look up by id 2"));
console.log(employeeID);

//Using the above variable, change the first name to Mary.
//Lookup again by id, 2, and print the result.
//employeeInfo.lookupById = '2';
//console.log(employeeInfo.id, employeeInfo.firstName, employeeInfo.lastName);

employeeID.firstName = "Mary";
console.log(colors.red("Changing first name..."));
var employeeID = employeeInfo.lookupById(2);
console.log(colors.red("Look up by id 2"));
console.log(employeeID);

//Lookup by last name, Smith, and print the results
//employeeInfo.lookupByLastName = 'Smith';
//console.log(employeeInfo.id, employeeInfo.firstName, employeeInfo.lastName);

console.log(colors.red("Look up by last name Smith"));
console.log(JSON.stringify(employeeLast));
