<!DOCTYPE html>
<html>
    <head>
        <title>Lorem Ipsum Generator</title>

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
            .para {
			           margin-bottom:5px;
		        }
        </style>

        <script>
        function validateForm() {
            var x = document.forms["ipsum"]["paragraphs"].value;
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
      <h1>Lorem Ipsum Generator</h1>
      @if(count($errors) > 0)
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      @endif
      <a href='http://p3.stiwari.me/'><---Go Home</a>

      <p>How many paragraphs do you want?

      	<form method='POST' name='ipsum' action='/lorem-ipsum' onsubmit="return validateForm()"  accept-charset="UTF-8">
          <input type='hidden' name='_token' value='{{ csrf_token() }}'>
          <label for="paragraphs">Paragraphs</label>

      		<input name="paragraphs" type="number" value={{(isset($num_para))?$num_para:2}} id="paragraphs"> (Max: 99)

      		<br><br>

      		<input type="submit" value="Generate paragraphs">
          </form>
          <section>
          @foreach($paragraphs as $paragraph)
          <p><div class='rcorners2'>
           {{ $paragraph }}
          </div>
          @endforeach
          </section>

          <p><a href='http://p3.stiwari.me/'><---Go Home</a>

    </body>
</html>
