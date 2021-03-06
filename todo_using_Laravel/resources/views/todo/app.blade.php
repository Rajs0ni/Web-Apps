<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ToDo List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" >
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href=/css/mystyle.css >
    <link rel="stylesheet" type="text/css" href=/css/offcanvas.css >
    <link rel="stylesheet" type="text/scss" href=/css/offcanvas.scss >
    </head>
<body>
    <div class="page">
    <span class="menu_toggle">
        <i class="menu_open fa fa-bars fa-lg"></i>
        <i class="menu_close fa fa-times fa-lg"></i>
    </span>
    <ul class="menu_items">
        <li><a href="/"><i class="icon fa fa-home fa-2x"></i>Home</a></li>
        <li><a href={{action('TodosController@create') }}><i class="icon fa fa-plus-square fa-2x"></i>Create</a></li>
        <li><a href={{action('TodosController@search') }}><i class="icon fa fa-search fa-2x"></i>Search</a></li>
    </ul>
    <main class="content">
        <div class="content_inner">
        @yield('content')
        </div>
        @yield('footer')
    </main>
</div>

<script>
	// elements
var $page = $('.page');

$('.menu_toggle').on('click', function(){
  $page.toggleClass('shazam');
});
$('.content').on('click', function(){
  $page.removeClass('shazam');
});
</script>

<script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <script>
    $('div.alert').not('.alert-important').delay(2000).slideUp(300);
 </script>

</body>
</html>