module.exports = 
	function addEmployee(req , res , next){
  	res.render('addEmployeeView', 
  		{title:"Add an Employee"});
};
