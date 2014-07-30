<div class="row">
  <div class="item twelve columns">
    <form action="<?php echo $GLOBALS["viewables"]["page"]?>" method="POST">
      <input name="file" value="<?php print $GLOBALS["viewables"]['file'] ?>" type="hidden" />
      <input id="key" name="key" type="hidden" value="<?php echo $GLOBALS["viewables"]['passcode']?>" />
      <div class="medium primary btn">
        <input id="buttonRefresh" name="buttonRefresh" type="submit" class="button" value="Refresh" />
      </div>
    </form>
    <form action="index.php" method="POST">
      <input name="file" value="<?php print $GLOBALS["viewables"]['file'] ?>" type="hidden" />
      <input id="key" name="key" type="hidden" value="<?php echo $GLOBALS["viewables"]['passcode']?>" />
      <div class="medium secondary btn">
        <input id="buttonSchedules" name="buttonSchedules" type="submit" class="button" value="Back To Schedules" />
      </div>
      <div class="medium default btn">
        <a href="/">Logout</a>
      </div>
    </form>
  </div>
</div>