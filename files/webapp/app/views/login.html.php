
<div class="header wrapper">

  <div class="row">
    <div class="item twelve columns">
      <h1>Drupal Admin</h1>
    </div>
  </div>

</div>

<div class="login wrapper">

  <?php require_view("ui/display_message") ?>
  <div class="row">
    <div class="item twelve columns">
      <form action="index.php" method="POST">
        <div class="field">
          <input class="input" id="inputCode" name="inputCode" type="password" placeholder="Enter your access code" />
        </div>
        <div class="medium primary btn">
          <input id="buttonLogin" name="buttonLogin" type="submit" class="button" value="Go" />
        </div>
      </form>
    </div>
  </div>

</div>

