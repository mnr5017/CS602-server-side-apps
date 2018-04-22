//employeesDb.js
var mongoose = require('mongoose');
var Schema = mongoose.Schema;

mongoose.Promise = global.Promise;

var employeeSchema = new Schema({
	employeeId: String,
	employeeFirstName: String,
	employeeLastName: String
});

module.exports = {
	getModel: function getModel(connection) {
		return connection.model("EmployeeModel", 
							employeeSchema);
	}
}

