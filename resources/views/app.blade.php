<html>
	<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AAUUSS - 澳洲資訊收集器</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link href="/css/app.css" rel="stylesheet">
        <style>
          body { padding-top: 70px; }
          .show-grid { margin-bottom: 15px; }
        </style>
	</head>
	<body>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-56421171-2', 'auto');
      ga('send', 'pageview');

    </script>
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- <a class="navbar-brand" href="#">Brand</a> -->
              <span class="navbar-brand" style="color:white">
                AAUUSS - 澳洲資訊收集器
              </span>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
				@yield('nav_left')
              </ul>
              <ul class="nav navbar-nav navbar-right">
				@yield('nav_right')
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
		<div class="container">
			<div class="content">
		      @yield('content')
			</div>
		</div>    
    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	</body>
</html>
