var mongoose = require('mongoose');
var credentials = require("../credentials.js");

var dbUrl = 'mongodb://' + credentials.host + ':27017/' + credentials.database;
var connection = null;
var model = null;

var Schema = mongoose.Schema;

mongoose.Promise = global.Promise;

var employeeSchema = new Schema({
	employeeId: String,
	employeeFirstName: String,
	employeeLastName: String
});

/*
// custom schema method
employeeSchema.methods.getEmployeeNames = 
		function() {
			return this.courseDevelopers.map(
							function (elem){
								return elem.firstName + ' ' + 
											 elem.lastName;
							}).join(',');
		};

*/

module.exports = {	
	getModel: function getModel() {
		if (connection == null) {
			console.log("Creating connection and model...");
			connection = mongoose.createConnection(dbUrl);
			model = connection.model("EmployeeModel", 
								employeeSchema);
		};
		return model;
	}
};
























