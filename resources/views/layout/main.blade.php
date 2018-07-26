<html>
    <head>
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/custom.css" rel="stylesheet">
        <title>Controle de estoque</title>
    </head>
    <body>

    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">      
                  <a class="navbar-brand" href="{{action('ProductController@list')}}">Estoque Laravel</a>
                </div>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/">Home</a></li>
                    <li><a href="{{action('ProductController@list')}}">Listagem</a></li>
                    <li><a href="{{action('ProductController@new')}}">Adicionar</a></li>
                    <li><a href="{{action('ProductController@json')}}">Download</a></li>
                </ul>
            </div>
        </nav>
    
     @yield('content')

        <footer class="footer">
            <p>
                © Estoque em Laravel.
            </p>
        </footer>

    </div>
    </body>
</html>
