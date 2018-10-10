<!doctype html>
<html lang="{{ app()->getLocale() }}" class="boxed">
    <head>
        <title>远方小镇</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="description" content="Rain的博客---远方小镇">
        <meta name="keywords" content="博客,IT,技术,php,css,js">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body class="bg9" style="overflow: hidden">
        <div id="preloader"></div>
        <div id="app" style="visibility: hidden">
        </div>
        <div id="style-switcher" style="visibility: hidden">
			<span>
				<i class="fa fa-cog"></i>
			</span>
            <section>
                <header>
                    <h6>Style selector</h6>
                    <hr>
                </header>
                <div>
                    <h6>Layout</h6>
                    <select>
                        <option selected="selected">Wide</option>
                        <option>Boxed</option>
                    </select>
                </div>
                <div>
                    <h6>Patterns</h6>
                    <img src="./custom_resources/img/patterns/1.jpg" alt="" data-background="bg1">
                    <img src="./custom_resources/img/patterns/2.jpg" alt="" data-background="bg2">
                    <img src="./custom_resources/img/patterns/3.jpg" alt="" data-background="bg3">
                    <img src="./custom_resources/img/patterns/4.jpg" alt="" data-background="bg4">
                    <img src="./custom_resources/img/patterns/5.jpg" alt="" data-background="bg5">
                    <img src="./custom_resources/img/patterns/6.jpg" alt="" data-background="bg6">
                    <img src="./custom_resources/img/patterns/7.jpg" alt="" data-background="bg7">
                    <img src="./custom_resources/img/patterns/8.jpg" alt="" data-background="bg8">
                </div>
                <div>
                    <h6>Images</h6>
                    <img src="./custom_resources/img/styleselector/1.jpg" alt="" data-background="bg9">
                    <img src="./custom_resources/img/styleselector/2.jpg" alt="" data-background="bg10">
                    <img src="./custom_resources/img/styleselector/3.jpg" alt="" data-background="bg11">
                    <img src="./custom_resources/img/styleselector/4.jpg" alt="" data-background="bg12">
                </div>
            </section>
        </div>
    </body>
    <script defer src="{{ mix('js/manifest.js') }}"></script>
    <script defer src="{{ mix('js/vendor.js') }}"></script>
    <script defer src="{{ mix('js/app.js') }}"></script>
    <script defer src="/custom_resources/js/plugins.js?v=2018"></script>
    <script defer src="/custom_resources/js/scripts.js?v=2018"></script>
</html>
