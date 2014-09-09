<div class="row">
<?php foreach ($GLOBALS["viewables"]["locals"]["sites"] as $site) { ?>
  <?php $url = DrupalAdmin::site_url_href($site) ?>
  <?php $is_enabled = DrupalAdmin::is_enabled($site) ?>
  <?php $site_class = $is_enabled ? "site-enabled" : "site-disabled" ?>
  <div class="item four columns">
    <div class="drupal-site <?php echo $site_class ?>">
      <h2><?php echo $site ?></h2>
      <p>
        <?php if ($url == null) { ?>
          Unknown url (<?php echo DrupalAdmin::site_url_file($site) ?>)
        <?php } elseif ($is_enabled) { ?>
          <a href="http://<?php echo $url ?>"><?php echo $url ?></a>
        <?php } else { ?>
          <?php echo $url ?> (disabled)
        <?php } ?>
      </p>

      <?php
        if ($is_enabled) {
          require_view('show/_disable_site', array( "site" => $site ));
        } else {
          require_view('show/_enable_site', array( "site" => $site ));
        }
      ?>
    </div>
  </div>
<?php } ?>
</div>
<?php require_view("show/_add_new") ?>