<?php
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
{
  // Set up the tests for Accessory model
  public function setUp()
  {
    $this->CI = &get_instance();
    $this->CI->load->model('Accessory');
    $this->CI->load->model('Equipment_set');
    $this->CI->load->model('Category');
    $this->Accessory = new Accessory();
    $this->Equip = new Equipment_set();
    $this->Category = new Category();
  }

  //
  // Below are a series of tests that test the Accessory model
  //

  // The following tests deal with setting the ID
  public function testIDUnder()
  {
    // Test and make sure values less than zero fail
    $this->expectException(Exception::class);
    $this->Accessory->setEquipmentId(-1);
  }
  public function testIDOver()
  {
  
    // Test and make sure that values greater than 100 fail
    $this->expectException(Exception::class);
    $this->Accessory->setEquipmentId(101);
  }
  public function testIDCorrect()
  {

    // Test a known good value succeeds and is correct
    $this->Accessory->setEquipmentId(10);
    $this->assertEquals(10,$this->Accessory->equipmentId);
  }
  public function testIDNone()
  {
    $this->expectException(Exception::class);
    $this->Accessory->setEquipmentId(NULL);
  }

  // The following tests deal with setting the Name
  public function testNameNone()
  {
    // Test empty name
    $this->expectException(Exception::class);
    $this->Accessory->setName(NULL);
  }
  public function testNameLonger()
  {
    // Test name longer than 30 fails
    $this->expectException(Exception::class);
    $this->Accessory->setName("I am a string longer than 30 characters");
  }
  public function testNameCorrect()
  {
    // Test the entry of a valid name
    $this->Accessory->setName("Valid");
    $this->assertEquals("Valid",$this->Accessory->name);
  }

  // The following tests deal with setting the category
  public function testCategoryNone()
  {
    // Test category empty fails
    $this->expectException(Exception::class);
    $this->Accessory->setCategory(NULL);
  }
  public function testCategoryInvalid()
  {
    // Test category empty fails
    $this->expectException(Exception::class);
    $this->Accessory->setCategory("f");
  }
  public function testCategoryValid()
  {
    // Test that is able to accept a valid value
    $this->Accessory->setCategory("w");
    $this->assertEquals("w",$this->Accessory->category);
  }

  // The following tests deal with setting the Mobility stat
  public function testMobilityNone()
  {
    // Test that there must be a mobility value
    $this->expectException(Exception::class);
    $this->Accessory->setMobility(NULL);
  }
  public function testMobilityLess()
  {
    // Test that values under 0 are rejected
    $this->expectException(Exception::class);
    $this->Accessory->setMobility(-1);
  }
  public function testMobilityMore()
  {
    // Test that values more than 10 invalid
    $this->expectException(Exception::class);
    $this->Accessory->setMobility(11);
  }
  public function testMobilityValid()
  {
    // Test a valid value
    $this->Accessory->setMobility(10);
    $this->assertEquals(10,$this->Accessory->mobility);
  }
  
  // The following tests deal with setting the range stat
  public function testRangeNone()
  {
    // Test that there must be a value
    $this->expectException(Exception::class);
    $this->Accessory->setRange(NULL);
  }
  public function testRangeLess()
  {
    // Test that values under 0 are rejected
    $this->expectException(Exception::class);
    $this->Accessory->setRange(-1);
  }
  public function testRangeMore()
  {
    // Test that values more than 10 invalid
    $this->expectException(Exception::class);
    $this->Accessory->setRange(11);
  }
  public function testRangeValid()
  {
    // Test a valid value
    $this->Accessory->setRange(10);
    $this->assertEquals(10,$this->Accessory->range);
  }
  
  // The following tests deal with setting the power stat
  public function testPowerNone()
  {
    // Test that there must be a value
    $this->expectException(Exception::class);
    $this->Accessory->setPower(NULL);
  }
  public function testPowerLess()
  {
    // Test that values under 0 are rejected
    $this->expectException(Exception::class);
    $this->Accessory->setPower(-1);
  }
  public function testPowerMore()
  {
    // Test that values more than 10 invalid
    $this->expectException(Exception::class);
    $this->Accessory->setPower(11);
  }
  public function testPowerValid()
  {
    // Test a valid value
    $this->Accessory->setPower(10);
    $this->assertEquals(10,$this->Accessory->power);
  }
  
  // The following tests deal with setting the protection stat
  public function testProtectionNone()
  {
    // Test that there must be a value
    $this->expectException(Exception::class);
    $this->Accessory->setProtection(NULL);
  }
  public function testProtectionLess()
  {
    // Test that values under 0 are rejected
    $this->expectException(Exception::class);
    $this->Accessory->setProtection(-1);
  }
  public function testProtectionMore()
  {
    // Test that values more than 10 invalid
    $this->expectException(Exception::class);
    $this->Accessory->setProtection(11);
  }
  public function testProtectionValid()
  {
    // Test a valid value
    $this->Accessory->setProtection(10);
    $this->assertEquals(10,$this->Accessory->protection);
  }

  //
  //Below are a series of tests that test the equipment set model
  //

  // These tests test the set id for equipment sets
  public function testIDEqNone()
  {
    // Test null value
    $this->expectException(Exception::class);
    $this->Equip->setSetId(NULL);
  }
  public function testIDEqMore()
  {
    // Test that value over 100 is no good
    $this->expectException(Exception::class);
    $this->Equip->setSetId(101);
  }
  public function testIDEqLess()
  {
    // Test that id less than 0 no good
    $this->expectException(Exception::class);
    $this->Equip->setSetId(-1);
  }
  public function testIDEqGood()
  {
    // Test with good values confirm works
    $this->Equip->setSetId(10);
    $this->assertEquals(10,$this->Equip->setId);
  }

  // These test check the equipment set name
  public function testEqNameNone()
  {
    // Test that a none is invalid for setting name
    $this->expectException(Exception::class);
    $this->Equip->setName(NULL);
  }
  public function testEqNameLong()
  {
    // Test that a name cannot be longer than 30 chars
    $this->expectException(Exception::class);
    $this->Equip->setName("I am a name longer than 30 characters");
  }
  public function testEqNameValid()
  {
    // Test that valid values are entered    
    $this->Equip->setName("valid");
    $this->assertEquals("valid",$this->Equip->name);
  }

  // These tests are for equipment set headwear
  public function testEqHeadNone()
  {
    // Test empty value fails
    $this->expectException(Exception::class);
    $this->Equip->setHeadwear(NULL);
  }
  public function testEqHeadLonger()
  {
    //Test values longer than 30 chars fail
    $this->expectException(Exception::class);
    $this->Equip->setHeadwear("I am a name longer than 30 characters");
  }
  public function testEqHeadValid()
  {
    // Test valid input make sure it works
    $this->Equip->setHeadwear("valid");
    $this->assertEquals("valid",$this->Equip->headwear);
  }

  // These tests are for equipment set armor
  public function testEqArmorNone()
  {
    // Test empty value fails
    $this->expectException(Exception::class);
    $this->Equip->setArmor(NULL);
  }
  public function testEqArmorLonger()
  {
    //Test values longer than 30 chars fail
    $this->expectException(Exception::class);
    $this->Equip->setArmor("I am a name longer than 30 characters");
  }
  public function testEqArmorValid()
  {
    // Test valid inputs make sure they work
    $this->Equip->setArmor("valid");
    $this->assertEquals("valid",$this->Equip->armor);
  }

  //These tests test weapon equipment set
  public function testEqWeaponNone()
  {
    // Test empty value fails
    $this->expectException(Exception::class);
    $this->Equip->setWeapon(NULL);
  }
  public function testEqWeaponLonger()
  {
    //Test values longer than 30 chars fail
    $this->expectException(Exception::class);
    $this->Equip->setWeapon("I am a name longer than 30 characters");
  }
  public function testEqWeaponValid()
  {
    // Test valid inputs make sure they work
    $this->Equip->setWeapon("valid");
    $this->assertEquals("valid",$this->Equip->weapon);
  }
  
  //These tests test the footwear equipment set
  public function testEqFootNone()
  {
    // Test empty value fails
    $this->expectException(Exception::class);
    $this->Equip->setFootwear(NULL);
  }
  public function testEqFootLonger()
  {
    //Test values longer than 30 chars fail
    $this->expectException(Exception::class);
    $this->Equip->setFootwear("I am a name longer than 30 characters");
  }
  public function testEqFootValid()
  {
    // Test valid inputs make sure they work
    $this->Equip->setFootwear("valid");
    $this->assertEquals("valid",$this->Equip->footwear);
  }


  // 
  // Below are a series of tests that test the Category Model
  //

  // Tests the setCategoryId
  public function testCatIdNone()
  {
    // Tests that an empty value for the category id is invalid
    $this->expectException(Exception::class);
    $this->Category->setCategoryId(NULL);
  }
  public function testCatIdOver()
  {
    // Tests that a category Id cannot be greater than 100
    $this->expectException(Exception::class);
    $this->Category->setCategoryId(101);
  }
  public function testCatIdBelow()
  {
    // Tests that a category Id cannot be less than 0
    $this->expectException(Exception::class);
    $this->Category->setCategoryId(-1);
  }
  public function setCatIdValid()
  {
    // Test a valid category Id
    $this->Category->setCategoryId(10);
    $this->assertEquals(10,$this->Category->categoryId);
  }

  // Tests the setName for the category model
  public function setCatNameNone()
  {
    // Tests that the name cannot be none
    $this->expectException(Exception::class);
    $this->Category->setName(NULL);
  }
  public function setCatNameLong()
  {
    // Tests that the name cannot be longer than 30 characters
    $this->expectException(Exception::class);
    $this->Category->setName("I am a value longer than 30 characters");
  }
  public function setCatNameValid()
  {
    // Test a valid value
    $this->Category->setName("valid");
    $this->assertEquals("valid",$this->Category->name); 
  }
}
