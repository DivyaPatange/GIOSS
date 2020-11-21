<!-- Fonts and icons -->
<script src="{{ asset('adminAsset/assets/js/plugin/webfont/webfont.min.js') }}"></script>
<script>
    WebFont.load({
        google: {"families":["Open+Sans:300,400,600,700"]},
        custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{ asset('adminAsset/assets/css/fonts.css') }}']},
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>

<!-- CSS Files -->
<link rel="stylesheet" href="{{ asset('adminAsset/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminAsset/assets/css/azzara.min.css') }}">

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="{{ asset('adminAsset/assets/css/demo.css') }}">