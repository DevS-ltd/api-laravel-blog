<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name') }}</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

  <!-- Styles -->
  <style>
    html, body {
      background-color: #fff;
      color: #636b6f;
      font-family: 'Nunito', sans-serif;
      font-weight: 200;
      height: 100vh;
      margin: 0;
    }

    .full-height {
      height: 100vh;
    }

    .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
    }

    .position-ref {
      position: relative;
    }

    .bottom {
        position: absolute;
        right: 10px;
        bottom: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
      font-size: 84px;
    }

    .links > a,
    .links > .postman-run-button {
      color: #636b6f;
      padding: 0 25px;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
    }

    .m-b-md {
      margin-bottom: 30px;
    }

    .links > .postman-run-button {
      background: none;
      height: auto;
      width: auto;
    }
  </style>
</head>
<body>
<div class="flex-center position-ref full-height">
  <div class="content">
    <div class="title m-b-md">
      {{ config('app.name') }}
    </div>

    <div class="links">
      <div class="postman-run-button"
           data-postman-action="collection/import"
           data-postman-var-1="ffef13ba93cf8c8e77db"
           data-postman-param="env%5BBlog%20Laravel%5D=W3sidmFsdWUiOiJodHRwOi8vYmxvZy5sb2NhbCIsImtleSI6ImJhc2VfdXJsIiwiZW5hYmxlZCI6dHJ1ZX0seyJ2YWx1ZSI6IiIsImtleSI6InRva2VuIiwiZW5hYmxlZCI6dHJ1ZX1d">
        API Documentation Postman
      </div>
    </div>

    <div class="bottom version">
      v{{ config('app.version') }}
    </div>
  </div>
</div>
<script type="text/javascript">
  (function (p, o, s, t, m, a, n) {
    !p[s] && (p[s] = function () {
      (p[t] || (p[t] = [])).push(arguments);
    });
    !o.getElementById(s + t) && o.getElementsByTagName("head")[0].appendChild((
      (n = o.createElement("script")),
        (n.id = s + t), (n.async = 1), (n.src = m), n
    ));
  }(window, document, "_pm", "PostmanRunObject", "https://run.pstmn.io/button.js"));
</script>
</body>
</html>
