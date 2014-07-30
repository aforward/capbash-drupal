<?php
require_once('_config.php');
require_once($GLOBALS["vendor"] . '/simpletest/autorun.php');

class AllTests extends TestSuite {
  function AllTests() {
    $this->TestSuite('All tests');

    if ($handle = opendir($GLOBALS["appDir"] . "/tests")) 
    {
      while (false !== ($file = readdir($handle))) 
      {
        if (!FileHelper::endsWith($file,"Test.php"))
        {
          continue;
        }
        
        $this->addFile($GLOBALS["appDir"] . "/tests/{$file}");
      }
      closedir($handle);
    }
  }
}

// $test->run(new HtmlReporter());
