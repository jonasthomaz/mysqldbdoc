<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>MysqlDbDoc</title>

    <!-- Bootstrap -->
    <link href="<?php echo APP_URI; ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo APP_URI; ?>public/css/sticky-footer-navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo APP_URI;  ?>public/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo APP_URI;  ?>">MysqlDbDoc [<?php echo $this->data['current_host'] ?>]</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Conexões <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <?php
                foreach($this->data['lstServidores'] as $servidor){
                ?>
                  <li><a href="connections/change/<?php echo $servidor['id'] ?>"><?php echo $servidor['alias'] ?></a></li>
                <?php
                  }
                ?>
                <li role="separator" class="divider"></li>
                <li><a href="<?php echo APP_URI;  ?>connections">Gerenciar conexões</a></li>
              </ul>
            </li>
            <!--
            <li><a href="#">Menu 1</a></li>
            <li><a href="#">Menu 2</a></li>
            <li><a href="#">Sobre</a></li>
            -->
          </ul>
          <form class="navbar-form navbar-right" method="post" action="<?php echo APP_URI;  ?>busca">
            <div class="form-group">
              <input name="txtargumentobusca" id="txtargumentobusca" type="text" class="form-control" placeholder="Procurando alguma coisa?">
            </div>
            <button id="btnBusca" type="submit" class="btn btn-default">Buscar</button>
          </form>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">