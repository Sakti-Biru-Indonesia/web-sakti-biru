@if (env('APP_DEBUG'))
<!-- Google tag (gtag.js) -->

<script async src="https://www.googletagmanager.com/gtag/js?id=G-{{ env('GOOGLE_ANALYTICS_TRACKING_ID') }}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-{{env("GOOGLE_ANALYTICS_TRACKING_ID")}}');
</script>
@endif
