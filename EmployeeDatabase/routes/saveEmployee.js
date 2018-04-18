var DB = require('./dbConnection.js');
var Employee = DB.getModel();

module.exports = 
  function saveEmployee(req , res , next){
 
    /*
    var developers = req.body.cdev;
    // create an array of objects
    if (developers.length > 0) {
      developers = 
        developers.split(',').map(function (elem){
          var names = elem.trim().split(' ');
          return {firstName: names[0], 
                  lastName: names[1]};
        });
    } else
      developers = [];
    */
  
    var employee = new Employee({
      employeeId:     req.body.cnumber,
      employeeFirstName:       req.body.cfirst,
      employeeLastName: req.body.clast
    }); 
 
    employee.save(function (err){
      if(err)
        console.log("Error : %s ",err);
      res.redirect('/employees');
    });

  };
