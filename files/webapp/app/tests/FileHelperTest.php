<?php

class FileHelperTest extends UnitTestCase 
{

  public function tearDown()
  {
    FileHelper::rmdirr('../tmp/testdata');
  }

  public function testEndsWith()
  {
    $this->assertEqual(false,FileHelper::endsWith(null,null));
    $this->assertEqual(false,FileHelper::endsWith(null,""));
    $this->assertEqual(false,FileHelper::endsWith("",null));
    $this->assertEqual(false,FileHelper::endsWith("blah","null"));
    $this->assertEqual(true,FileHelper::endsWith("blah","ah"));
    $this->assertEqual(false,FileHelper::endsWith("blah","blah2"));
  }

  public function testStartWith()
  {
    $this->assertEqual(false,FileHelper::startsWith(null,null));
    $this->assertEqual(false,FileHelper::startsWith(null,""));
    $this->assertEqual(false,FileHelper::startsWith("",null));
    $this->assertEqual(false,FileHelper::startsWith("blah","null"));
    $this->assertEqual(true,FileHelper::startsWith("blah","bla"));
    $this->assertEqual(false,FileHelper::startsWith("blah","blah2"));
  }

  public function testRmdirr_invalid()
  {
    $this->assertEqual(false,FileHelper::rmdirr(null));
    $this->assertEqual(false,FileHelper::rmdirr(''));
    $this->assertEqual(false,FileHelper::rmdirr('blah'));
  }

  public function testRmdirr_file()
  {  
    mkdir('../tmp/testdata');
    $handle = fopen("../tmp/testdata/deleteme.txt",'w');
    fclose($handle);
    $this->assertEqual(true,file_exists('../tmp/testdata/deleteme.txt'));
    $this->assertEqual(true,FileHelper::rmdirr('../tmp/testdata/deleteme.txt'));
    $this->assertEqual(false,file_exists('../tmp/testdata/deleteme.txt'));
  }  

  public function testRmdirr_dir()
  {
    mkdir('../tmp/testdata');
    mkdir('../tmp/testdata/blah');
    $handle = fopen("../tmp/testdata/deleteme.txt",'w'); fclose($handle);
    $handle = fopen("../tmp/testdata/blah/deleteme2.txt",'w'); fclose($handle);
    
    $this->assertEqual(true,file_exists('../tmp/testdata/'));
    $this->assertEqual(true,FileHelper::rmdirr('../tmp/testdata/'));
    $this->assertEqual(false,file_exists('../tmp/testdata/'));


  }

}
?>
