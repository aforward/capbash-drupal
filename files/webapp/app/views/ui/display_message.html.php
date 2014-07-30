<?php if ( isset($GLOBALS["viewables"]['messageType']) && $GLOBALS["viewables"]['messageType'] != '') { ?>
  <div class="row">
    <div class="item twelve columns">
      <?php require_view("ui/display_" . $GLOBALS["viewables"]['messageType']); ?>
    </div>
  </div>
<?php } ?>
