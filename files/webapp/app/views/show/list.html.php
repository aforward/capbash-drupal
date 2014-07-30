<?php
if (count($GLOBALS["viewables"]["locals"]["sites"]) == 0) {
  require_view('show/none');
} else {
  require_view('show/some', array( "sites" => $GLOBALS["viewables"]["sites"] ));
}
