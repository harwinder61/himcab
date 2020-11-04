<html>
<head>
  	@include('includes.web_header')
	
  		
  			@yield('content')
  		@if(Request::path() != 'book')
  			@include('includes.web_footer')
  		@endif
</body>
</html>