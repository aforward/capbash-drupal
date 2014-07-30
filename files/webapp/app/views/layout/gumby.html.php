  <!--
  Include gumby.js followed by UI modules followed by gumby.init.js
  Or concatenate and minify into a single file 
  -->
  <script gumby-touch="/scripts/gumby" src="/scripts/gumby/gumby.min.js"></script>
  <script src="/scripts/gumby/ui/gumby.retina.js"></script>
  <script src="/scripts/gumby/ui/gumby.fixed.js"></script>
  <script src="/scripts/gumby/ui/gumby.skiplink.js"></script>
  <script src="/scripts/gumby/ui/gumby.toggleswitch.js"></script>
  <script src="/scripts/gumby/ui/gumby.checkbox.js"></script>
  <script src="/scripts/gumby/ui/gumby.radiobtn.js"></script>
  <script src="/scripts/gumby/ui/gumby.tabs.js"></script>
  <script src="/scripts/gumby/ui/gumby.navbar.js"></script>
  <script src="/scripts/gumby/ui/jquery.validation.js"></script>
  <script src="/scripts/gumby/gumby.init.js"></script>

  <!--
  Google's recommended deferred loading of JS
  gumby.min.js contains gumby.js, all UI modules and gumby.init.js

  Note: If you opt to use this method of defered loading,
  ensure that any javascript essential to the initial
  display of the page is included separately in a normal
  script tag.
  <script type="text/javascript">
  function downloadJSAtOnload() {
  var element = document.createElement("script");
  element.src = "/scripts/gumby/gumby.min.js";
  document.body.appendChild(element);
  }
  if (window.addEventListener)
  window.addEventListener("load", downloadJSAtOnload, false);
  else if (window.attachEvent)
  window.attachEvent("onload", downloadJSAtOnload);
  else window.onload = downloadJSAtOnload;
  </script>
  -->