  <!-- Grab Google CDN's jQuery, fall back to local if offline -->
  <!-- 2.0 for modern browsers, 1.10 for .oldie -->
  <script>
  var oldieCheck = Boolean(document.getElementsByTagName('html')[0].className.match(/\soldie\s/g));
  if(!oldieCheck) {
  document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"><\/script>');
  } else {
  document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"><\/script>');
  }
  </script>
  <script>
  if(!window.jQuery) {
  if(!oldieCheck) {
    document.write('<script src="/scripts/jquery-2.1.1.min.js"><\/script>');
  } else {
    document.write('<script src="/scripts/jquery-1.11.1.min.js"><\/script>');
  }
  }
  </script>