<?php $site = $GLOBALS["viewables"]["locals"]["site"] ?>
<form action="index.php" method="POST">
  <div class="medium primary btn">
    <input class="input" name="name" type="hidden" value="<?php echo $site ?>" />
    <input class="input" name="enableSite" type="hidden" value="enableSite" />
    <input id="buttonEnableSite_<?php echo $site ?>" name="buttonEnableSite" type="submit" class="button" value="Enable Site" />
  </div>
</form>
