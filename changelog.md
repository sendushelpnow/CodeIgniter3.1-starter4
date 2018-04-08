# Change log
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

Group Members:
[CAPTAIN] Calvin Lai
[MATE #1] Alfred Swinton
[MATE #2] Jeremy Lee
[MATE #3] Michaela Yoon

## 0.0.23 - 2018-04-07
### Modified by Calvin
- controllers/Maintenance.php, fixed up submit function
- assets/js/modify.js, fixed up javascript

## 0.0.22 - 2018-04-04
### Modified by Calvin
- controllers/Maintenance.php, finished up submit functionality, small bug remains to be fixed
- models/Accessories.php, minor change
- views/modify.php, all attributes now modifiable
- assets/js/modify.js, added routing to maintenance
- csv/Accessories.csv, updates when submit button pressed

## 0.0.21 - 2018-03-30
### Added by Alfred
- views/thead.php. table header portion added to be called by controller 

### Modified by Aps
- views/catalog.php, changed strategy to better follow golden rules 
- controllers/Catalog.php, changed strategy to better follow golden rules

## 0.0.21 - 2018-03-30
### Added by Calvin
- views/modify.php, allows user to change values of items

### Modified by Calvin
- controllers/Maintenance.php, fixing up edit function
- views/itemlist.php, updated to match requirements
- views/oneitemeditable.php, updated for editing values
- views/oneitemnoteditable.php, updated to match requirements

## 0.0.20 - 2018-03-29
### Added by Alfred
- views/catalog.php, displays all items sorted by category with stats
- controllers/Catalog.php builds up the required tables and elements for catalog view

## 0.0.19 - 2018-03-29
### Added by Jeremy
- [Model] applications/models/Accessory.php: extends Entity
- [Model] applications/models/Category.php: extends Entity
- [Model] applications/models/Equipment_set.php: extends Entity

## 0.0.18 - 2018-03-29
### Added by Calvin
- views/add_set.php, form for adding new sets
- views/set_edit.php, editable set entry
- views/set_nonedit.php, non editable set entry
- views/settable.php, table for equipment sets

### Modified by Calvin
- controllers/Maintenance.php, added add and edit functions
- views/oneitemnoteditable.php, slight changes

## 0.0.17 - 2018-03-27
### Added by Calvin
- assets/css/ a bunch of necessary css files added
- assets/js/ javascript file necessary for the drop down menu

### Modified by Calvin
- application/views/template.php added a classname to a ul element

## 0.0.16 - 2018-03-27

### Added by Calvin
- controllers/maintenance, blank for now, needs view and functionality
- controllers/role, sets the current session role to the selected role

## 0.0.15 - 2018-03-27
### Added by Michaela
- application/controllers/Customization.php - section for mix/match accessories
- application/controllers/Roles.php - controller for roles

### Modified by Michaela
- application/config/constants.php - added constants for user roles (guest, user, admin)
- application/views/template.php - shows section linking to customization, edited role section to link to Role controller

## 0.0.14 - 2018-02-11
### Modified by Alfred Swinton
- added .travis.yml to project root

## 0.0.13 - 2018-02-11
### Modified by Alfred Swinton
- added dropdown for role to view with css
changed Template.php
changed default.css

## 0.0.12 - 2018-02-11
### Modified by Calvin
- renamed filenames to display properly on deployment server
  man_warrior.png => man_Warrior.png
  man_mage.png => man_Mage.png
  2.PNG => 2.png
  4.PNG => 4.png
  5.PNG => 5.png
  
## 0.0.11 - 2018-02-10
### Added by Michaela
- _cell.php to show information of each accessory

### Modified by Michaela
- Catalog.php controller modified to display accessories (in grid layout)
- equipment.php view to show the table made up of cells.

## 0.0.10 - 2018-02-10

### Added by Michaela
- Assets: man_mage.png, man_warrior.png (edited versions with accessories)

### Modified by Michaela
- welcome.js to show .png extensions instead of .svg

### Modified by Calvin
- Info.php controller: modified to display data in json format based on specified key or all if no key specified
  function catalog($key) to catalog($key = null)
  function category($key) to category($key = null)
  function bundle($key) to bundle($key = null)

## *Version 0.0.9*

Release Date: February 9, 2018

## 0.0.9 - 2018-02-09
### Added by Jeremy
- Assets: man_mage.svg, man_warrior.svg
- JavaScript: welcome.js (for changing stickman's image)

### Modified by Jeremy
- welcome.php view: modified to change the stickman image by the selected equipment set
- welcome.php view: modified to show a default equipment set (mage set for now)
- Welcome.php controller: modified to call welcome.js

## 0.0.8 - 2018-02-09
### Added by Jeremy
- Assets: added accessory images into public/assets/img

### Modified by Jeremy
- changelog modified: formatting & corrected names
- Code formatting: indentations
- Moved public/pics/man.svg to public/assets/img/man.svg
- Auto load: models added (accessories, categories, equipment_sets)
- Renewed all three models #1: retrieve csv data and populate arrays by field name
- Renewed all three models #2: initially populate arrays
- Changed file name: Equipment Sets.csv to Equipment_Sets.csv

### Fixed by Jeremy
- application/views/welcome.php: alt- to alt=
- MY_Model2 class in MY_MODEL.php:
  function get($key1, $key2) to function get($key1, $key2 = null),
  function delete($key1, $key2) to function delete($key1, $key2 = null),
  function delete($key1, $key2) to function delete($key1, $key2 = null),
  function exists($key1, $key2) to function exists($key1, $key2 = null)
- Resolved merging issue (0.0.7 -> 0.0.8)

## 0.0.7 - 2018-02-09
### Added by Alfred
- Added change gear form and title with some minor css changes

## 0.0.6 - 2018-02-09
### Added by Alfred
- update the css center image and beautify navbar

## 0.0.5 - 2018-02-09
### Added by Calvin
- added CSV files to project
- created the accesory, equipment set, and category models: some functionality
- created info controller: some functionality
  
## 0.0.4 - 2018-02-09
### Added by Alfred
- Created and added image to main page

## 0.0.3 - 2018-02-09
### Added by Alfred
- Created a basic navbar 

## 0.0.2 - 2018-02-09
### Added by Alfred
- Updated to default to welcome rather than welcome.message

## 0.0.1 - 2018-02-08
### Added by Alfred
- Added a changelog to the project




