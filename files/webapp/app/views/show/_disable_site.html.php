<?php $site = $GLOBALS["viewables"]["locals"]["site"] ?>
<form action="index.php" method="POST">
  <div class="medium primary btn">
    <input class="input" name="name" type="hidden" value="<?php echo $site ?>" />
    <input class="input" name="disableSite" type="hidden" value="disableSite" />
    <input id="buttonDisableSite_<?php echo $site ?>" name="buttonDisableSite" type="submit" class="button" value="Disable Site" />
  </div>
</form>
