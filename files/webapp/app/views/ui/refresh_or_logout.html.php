<div class="row">
  <div class="item twelve columns">
    <form action="<?php echo $GLOBALS["viewables"]["page"]?>" method="POST">
      <?php if (isset($GLOBALS["viewables"]['file'])) { ?>
        <input name="file" value="<?php print $GLOBALS["viewables"]['file'] ?>" type="hidden" />
      <?php } ?>
      <input id="key" name="key" type="hidden" value="<?php echo $GLOBALS["viewables"]['passcode']?>" />
      <div class="medium primary btn">
        <input id="buttonRefresh" name="buttonRefresh" type="submit" class="button" value="Refresh" />
      </div>
      <div class="medium default btn">
        <a href="/">Logout</a>
      </div>
    </form>
  </div>
</div>