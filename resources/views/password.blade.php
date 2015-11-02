<!DOCTYPE html>
<html>
    <head>
        <title>Randowm Password Generator</title>
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
        		.password {
        			color:#ea0;
              //border: 2px solid #8AC007;
        		}
        </style>
        <script>
        function validateForm() {
            var x = document.forms["pass"]["passwords"].value;
            if (x == null || x == "") {
                alert("Number must be filled out");
                return false;
            }
            if (x > 9 || x < 1) {
                alert("Number must be filled out between [1-9]");
                return false;
            }

        }
      </script>
  </head>

    <body>
      <h1>Random Password Generator</h1>
      @if(count($errors) > 0)
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      @endif

        <a href='http://p3.stiwari.me/'><---Go Home</a>
        <h2> <p class='password'> {{$password_str}} </p></h2>


        <form method='POST' name='pass' action='/password-generator' onsubmit="return validateForm()"  accept-charset="UTF-8">
          <input type='hidden' name='_token' value='{{ csrf_token() }}'>
          <label for="passwords"># of words</label>
      		<input name="passwords" type="number" value={{(isset($num_pass))?$num_pass:1}} id="passwords"> (Max: 9)
      		<br><br>

    			<input type="checkbox" name="use_spl_chards" value="splChars" <?php if($use_spl == 1){echo("checked");}?> >
          <label for="use_spl_chards">Use special charatcers</label>
          <br>
    			<input type="checkbox" name="use_number" value="useNumber" <?php if($use_num == 1){echo("checked");}?> >
          <label for="use_number">Use Numbers</label>
          <br>
      		<input type="submit" value="Generate Password"">
          </form>

          <p class='details'>
          			<a href='http://xkcd.com/936/'>xkcd password strength</a><br>

          			<a href='http://xkcd.com/936/'>
          				<img class='comic' src='http://imgs.xkcd.com/comics/password_strength.png' alt='xkcd style passwords'>
          			</a>
          			<br>

          <p><a href='http://p3.stiwari.me/'><---Go Home</a>
    </body>
</html>
