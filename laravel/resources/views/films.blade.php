<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class=" position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                            Logout
                        </a>    
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="col-sm-8 col-sm-offset-2">
                    <h3>Films <a class="btn btn-primary" style="float: right; margin-bottom: 10px;" href="<?php echo url('/film/create');?>">Create New</a></h3>
                    <table class="table table-bordered filmstb">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>Realease Date</th>
                          <th>Rating</th>
                          <th>Ticket Price</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                </div>      
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="{{ asset('js/paginathing.js') }}" defer></script>
        <script type="text/javascript">
          jQuery(document).ready(function($){
            var siteurl = "<?php echo url('/');?>";
            var url = siteurl+'/api/get_films';
            $.ajax({
                url: url, 
                success: function(result){
                    dataobj = JSON.parse(result);
                    if(dataobj.status_code == 200){
                        var i = 1;
                        dataobj.result.forEach(function(element) {                          
                          $(".filmstb tbody").append("<tr><td>"+i+"</td><td><a href='"+siteurl+"/films/"+element.slug+"'>"+element.name+"</a></td><td>"+element.description+"</td><td>"+element.realease_date+"</td><td>"+element.rating+"/5</td><td>$"+element.ticket_price+"</td></tr>")
                          i++;   
                        });
                        
                        $('.table tbody').paginathing({
                          perPage: 1,
                          insertAfter: '.table',
                          pageNumbers: true
                        });
                    }else{
                        alert("No Result");
                    }
                    //$("#div1").html(result);
                }
            });

            
          });
        </script>

    </body>
</html>
