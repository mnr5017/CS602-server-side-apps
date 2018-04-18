var DB = require('./dbConnection.js');
var Employee = DB.getModel();

module.exports = 
  function saveEmployee(req , res , next){
    var id = req.params.id;

    Employee.findById(id, function (err, employee){
      if(err)
        console.log("Error Selecting : %s ", err); 
      if (!employee)
        return res.render('404');
      
        employee.employeeId = req.body.cnumber
        employee.employeeFirstName = req.body.cfirst;
        employee.employeeLastName = req.body.clast;
        
        employee.save(function (err) {
          if (err)
            console.log("Error updating : %s ",err );
          res.redirect('/employees');
        });
    });
  };
