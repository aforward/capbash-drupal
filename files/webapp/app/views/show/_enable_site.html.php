<?php $site = $GLOBALS["viewables"]["locals"]["site"] ?>
<form action="index.php" method="POST" class="inline">
  <div class="medium btn btn-enable">
    <input class="input" name="name" type="hidden" value="<?php echo $site ?>" />
    <input class="input" name="enableSite" type="hidden" value="enableSite" />
    <input id="buttonEnableSite_<?php echo $site ?>" name="buttonEnableSite" type="submit" class="button" value="Enable Site" />
  </div>
</form>
<form action="index.php" method="POST" class="inline">
  <div class="medium btn btn-delete">
    <input class="input" name="name" type="hidden" value="<?php echo $site ?>" />
    <input class="input" name="deleteSite" type="hidden" value="deleteSite" />
    <input id="buttonDeleteSite_<?php echo $site ?>" name="buttonDeleteSite" type="submit" class="button" value="Delete Site" />
  </div>
</form>