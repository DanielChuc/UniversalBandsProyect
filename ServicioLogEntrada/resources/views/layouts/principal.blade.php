<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Title goes here</title>
  <meta name="description" content="Description of your site goes here">
  <meta name="keywords" content="keyword1, keyword2, keyword3">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <script type="javascript" src="/js/jquery-3.5.1.min.js"></script>
</head>
<body>
<div id="main-wraper">

@include("partials.header")



@include("partials.left")



<!-- solo es el nombre del espacio lo que esta dentro del parentesis en resumen se crea un campo-->
@yield("contenidoprincipal")



@include("partials.footer")

</div>
</body>
</html>
