# Change log
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

Group Members:
[CAPTAIN] Calvin Lai
[MATE #1] Alfred Swinton
[MATE #2] Jeremy Lee
[MATE #3] Michaela Yoon

## 0.0.13 - 2018-03-27

### Added by Calvin
- controllers/maintenance, blank for now, needs view and functionality
- controllers/role, sets the current session role to the selected role


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




