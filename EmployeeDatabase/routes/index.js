//Mark Ryan
//CS 602 - Module 3
//Sept 26, 2017

//index.js

var express = require('express');
var router = express.Router();

// other modules
var displayEmployee = require("./displayEmployee");
var addEmployee = require("./addEmployee");
var saveEmployee = require("./saveEmployee");
var editEmployee = require("./editEmployee");
var saveAfterEdit = require("./saveAfterEdit");
var deleteEmployee = require("./deleteEmployee");

// router specs
router.get('/', function(req, res, next) {
  res.redirect('/employees');
});

router.get('/employees', displayEmployee);

router.get('/employees/add', addEmployee);
router.post('/employees/add', saveEmployee);

router.get('/employees/edit/:id', editEmployee);
router.post('/employees/edit/:id', saveAfterEdit);

router.get('/employees/delete/:id', deleteEmployee);

module.exports = router;
