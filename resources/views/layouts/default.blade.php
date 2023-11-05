<html>
  <head>
  	<title>@yeald('title')</title>
    @stack('addtional-CSS')
  </head>
  <body>
  	@include('layouts.navbar')
 
  		<div class="container">@yield('content')</div>
 
  	@include('layouts.footer')

    @stack('additional-js')

  </body>
</html>