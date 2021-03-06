<html>
  <!--BEGIN HEAD-->
  <head>
    <meta charset="utf-8">
		<title>Dashboard Management Asset | Responsive Bootstrap Tables</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<meta content="Preview page of Metronic Admin Theme #5 for responsive bootstrap table demos" name="description" />
		<meta content="" name="author" />
    <!--INCLUDE CSS-->
    @include('include.include-css')
  </head>
  <!--END HEAD-->
  <!--BEGIN BODY-->
  <body>
    <div class="wrapper" id="app">
    	@include('include.header-menu')
    	<div class="container-fluid">
        @yield('content')
        @include('include.footer')
      </div>
    </div>
  <!--INCLUDE JS-->
  @include('include.include-js')
  </body>
  <!--END BODY-->
</html>
