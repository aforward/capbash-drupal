<?php $all_templates = DrupalAdmin::ls_templates() ?>
<form action="index.php" method="POST">
  <h3>Add New Site</h3>
  <div class="field">
    <input class="input" name="copyDefault" type="hidden" value="copyDefault" />
    <input class="input" name="newName"  placeholder="Name Your Site (No Spaces)" />
  </div>
  <div class="field">
    <input class="input" name="newServer"  placeholder="Domain name (e.g. a4word.com)" />
  </div>

  <div class="field">
    <?php if (sizeof($all_templates) == 1) { ?>
      <?php $template = $all_templates[0]; ?>
      <input id="template_<?php echo $template ?>" name="template" value="<?php echo $template ?>" type="hidden" >
    <?php } else { ?>
      <?php foreach ($all_templates as $index => $template) { ?>
        <?php $is_checked = $index == 0 ?>
        <label class="radio<?php if ($is_checked) echo " checked" ?>" for="template">
          <input id="template_<?php echo $template ?>" name="template" value="<?php echo $template ?>" type="radio" <?php if ($is_checked) echo "checked=\"checked\"" ?> >
          <span></span> <?php echo $template ?>
        </label>
      <?php } ?>
    <?php } ?>
  </div>

  <div class="medium primary btn">
    <input id="buttonCopyDefault" name="buttonCopyDefault" type="submit" class="button" value="Create" />
  </div>
</form>

