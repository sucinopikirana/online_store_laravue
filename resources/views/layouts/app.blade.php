<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Larashop @yield('title')</title>
    <link rel="stylesheet" href="{{asset('polished/polished.min.css')}}">
    <link rel="stylesheet" href="{{asset('polished/iconic/css/open-iconic-bootstrap.min.css')}}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style>
        .grid-highlight{
            padding-top: 1rem;
            padding-bottom: 1rem;
            background-color: #5c6ac4;
            border: 1px solid #202e78;
            color: #fff;
        }

        hr{
            margin: 6rem 0;
        }

        hr+.display-3,
        hr+.display-2+.display-3{
            margin-bottom: 2rem;
        }

        .navbar-brand{
            color: #fff !important;
        }
    </style>

    <script type="text/javascript">
        document.documentElement.className =
        document.documentElement.className.replace('no-js', 'js') +
        (document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#BasicStructure", "1.1") ? ' svg' : ' no-svg');
    </script>
</head>
<body>
    
    <nav class="navbar navbar-expand p-0">
        <a class="navbar-brand text-center col-xs-12 col-md-3 col-lg-2 mr-0" class="index.html">Larashop</a>
        <button class="btn btn-link d-block d-md-none" data-toggle="collapse" data-target="#sidebar-nav" role="button">
            <span class="oi oi-menu"></span>
        </button>
    </nav>


    <div class="container-fluid h-100 p-0">
        <div class="flex-row d-flex align-items-stretch m-0">
            <div class="col-lg-12 col-md-12 p-4">
                @yield("content")
            </div>
        </div>
    </div>

    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>

    <script src="{{asset('js/popper.min.js')}}"></script>
    
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

</body>
</html>
