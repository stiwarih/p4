<!DOCTYPE html>
<html>
    <head>
        <title>Single User Generator</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                // font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
            .rcorners2 {
              border-radius: 25px;
              border: 2px solid #8AC007;
              padding: 20px;
            }
            .user {
			           margin-bottom:5px;
		        }
        </style>
    </head>
    <body>
        <h1>Single User Generator</h1>
        @if(count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <a href='http://p3.stiwari.me/'><---Go Home</a>
        <p>

        <div >
          @foreach($users as $user)
            <div class='rcorners2'>
              <img src={{$image}} >
            @foreach($user as $user_data)
              <div class='user'>
              {{ $user_data }}
              </div>
            @endforeach
            </div>
          @endforeach
        </div>
          <p><a href='http://p3.stiwari.me/'><---Go Home</a>
    </body>
</html>
