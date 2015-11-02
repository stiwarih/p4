<!DOCTYPE html>
<html>
    <head>
        <title>User Generator</title>

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
              //width: 300px;
              //height: 250px;
              //height: auto;
            }
            .user {
			           margin-bottom:5px;
		        }
        </style>
        <script>
        function validateForm() {
            var x = document.forms["user-gen"]["users"].value;
            if (x == null || x == "") {
                alert("Number must be filled out");
                return false;
            }
            if (x > 99 || x < 1) {
                alert("Number must be filled out between [1-99]");
                return false;
            }

        }
        </script>
    </head>
    <body>
        <h1>User Generator</h1>
        @if(count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <a href='http://p3.stiwari.me/'><---Go Home</a>

        <p><br>
      	<form method="POST" name="user-gen" action="/user-generator" onsubmit="return validateForm()" accept-charset="UTF-8" >
          <input type='hidden' name='_token' value='{{ csrf_token() }}'>
      		<label for="users">How many users?</label>
          <input maxlength="2" name="users" type="number" value={{(isset($num_users))?$num_users:2}} id="users"> (Max: 99)
      		<br>

      		Include...
      		<br>
      		<input name="email" type="checkbox" {{ ($use_email ==1) ?  'checked' :  'unchecked' }}>
          <label for="email">Email</label>		<br>
          <input name="address" type="checkbox" {{ ($use_address ==1) ?  'checked' :  'unchecked' }}>
          <label for="address">Address</label>		<br>
          <input name="phoneNumber" type="checkbox" {{ ($use_phoneNumber ==1) ?  'checked' :  'unchecked' }}>
          <label for="phoneNumber">Phone Number</label>		<br>

      		<input type="submit" value="Generate!">
          </form>
          <section>

          @foreach($users as $user)
            <p><div class='rcorners2'>
            @foreach($user as $user_data)
              <div class='user'>
              {{ $user_data }}
              </div>
            @endforeach
            </div>

          @endforeach
          </section>

          <section class='users'>

	    	    @if(isset($data))

            @foreach ($data as $user)
            <p>This is user $user->name </p>
            @endforeach

            @for ($i = 0; $i < 10; $i++)
              The current value is {{ $i }}
            @endfor
            <div class='user'>
    		    	<div class='name'>
                {{ $data['name'] }}
              </div>
              <div class='email'>
                1941-08-29
              </div>
            </div>
            @endif

	        </section>
          <p><a href='http://p3.stiwari.me/'><---Go Home</a>
    </body>
</html>
