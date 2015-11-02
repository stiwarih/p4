<!DOCTYPE html>
<html>
    <head>
        <title>Developer's Best Friend</title>

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
            a:link {
                color:#ea0;
                //  background-color: darkblue;
                font-size: 25px;
            }

            /* visited link */
            a:visited {
                color: #00FF00;
            }

            /* mouse over link */
            a:hover {
                color: #FF00FF;
            }

            /* selected link */
            a:active {
                color: #0000FF;
            }
            .rcorners2 {
              border: 1px solid #0000FF;
              border-radius: 25px;
              border: 2px solid #8AC007;
              padding: 20px;
              width: 200px;
              height: 150px;
              align: center;
          }

        </style>
    </head>
    <body >
      <h1 align=center>Developer's Best Friend</h1>
      @if(count($errors) > 0)
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      @endif      
      <h2>Lorem Ipsum Generator</h2>
      <div>
        <blockquote>
        <p>In publishing and graphic design, lorem ipsum (derived from Latin dolorem ipsum, translated as "pain itself") is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation. Replacing meaningful content with placeholder text allows viewers to focus on graphic aspects such as font, typography, and page layout without being distracted by the content. It also reduces the need for the designer to come up with meaningful text, as they can instead use quickly-generated lorem ipsum.

        <p>The lorem ipsum text is typically a scrambled section of De finibus bonorum et malorum, a 1st-century BC Latin text by Cicero, with words altered, added, and removed to make it nonsensical, improper Latin.

        <p>A variation of the ordinary lorem ipsum text has been used in typesetting since the 1960s or earlier, when it was popularized by advertisements for Letraset transfer sheets. It was introduced to the Information Age in the mid-1980s by Aldus Corporation, which employed it in graphics and word processing templates for its desktop publishing program, PageMaker, for the Apple Macintosh.[1]
        </blockquote>
      </div>
      <p>Use this link to create random text
      <blockquote>
      <a href='/lorem-ipsum'>Create lorem ipsum text--></a>
      </blockquote>
      <br>

      <h2>Random User Generator</h2>
      <blockquote>
      <p>Create random user data for your application. A very similar concept of Lorem Ipsum text, applied to generating people profiles.</p>
      </blockquote>
      <p>Use this link to create random users profiles
      <blockquote>
      <a href='/user-generator'>Create random users--></a>
      </blockquote>
      <p>Rest API based method to create random single users profile
      <blockquote>
      <a href='/rest-api'>Create single random user--></a>
      </blockquote>
      <br>

      <h2>Random Password Generator</h2>
      <p>Create Random Password for your application.
      <blockquote>
      <a href='/password-generator'>Create Random Password--></a>
      </blockquote>

    </body>
</html>
