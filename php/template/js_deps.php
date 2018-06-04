<!-- jQuery -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

<!-- buttercms -->
<script src="https://cdnjs.buttercms.com/buttercms-1.1.1.min.js"></script>

<script>
  var butter = Butter('36d03d2361e593b1823870c260219ab9670128c1');

  butter.post.list({page: 1, page_size: 10}).then(function(response) {
	  console.log(response)
	})
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MDLCV8Z');</script>
<!-- End Google Tag Manager -->

<!-- Google Analytics -->
<script>
window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
ga('create', 'UA-44800877-1', 'auto');
ga('send', 'pageview');
ga('set', 'userId', 'USER_ID');
</script>
<script async src='//www.google-analytics.com/analytics.js'></script>
<!-- End Google Analytics -->

<!-- PWA -->
<script type="text/javascript">
if (navigator.serviceWorker.controller) {
  console.log('[PWA Builder] active service worker found, no need to register')
} else {
  //Register the ServiceWorker
  navigator.serviceWorker.register('sw.js', {
    scope: './'
  }).then(function(reg) {
    console.log('Service worker has been registered for scope:'+ reg.scope);
  });
}
</script>

