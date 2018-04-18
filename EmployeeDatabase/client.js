//Mark Ryan
//CS602 - Module 3
//Sept 26, 2017

var mongoose = require('mongoose');
var credentials = require("./credentials.js");

var dbUrl = 'mongodb://' + credentials.host + ':27017/' + credentials.database;
var connection = mongoose.createConnection(dbUrl);

var EmployeeDb = require('./employeesDb.js');
var Employee = EmployeeDb.getModel(connection);

connection.on("open", function(){
	
	// create and save document objects
	var employee;

	employee = new Employee({
		employeeId: '1',
		employeeFirstName: 'John',
		employeeLastName: 'Smith'
	}); 
	employee.save();

	employee = new Employee({
		employeeId: '2',
		employeeFirstName: 'Jane',
		employeeLastName: 'Smith'
	}); 
	employee.save();

	employee = new Employee({
		employeeId: '3',
		employeeFirstName: 'John',
		employeeLastName: 'Doe'
	}); 
	employee.save(function(err) {
		connection.close();
		if (err) throw err;
		console.log("Success!");
	});
	
});