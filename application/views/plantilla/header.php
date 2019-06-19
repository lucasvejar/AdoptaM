<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="/AdoptaM/assets/bootstrap/css/bootstrap.css">
  <!-- La libreria de FontAwesome -->
  <link rel="stylesheet" type="text/css" href="/AdoptaM/assets/fontawesome/css/all.css">
  <!-- Datatables css -->
  <link rel="stylesheet" type="text/css" href="/AdoptaM/assets/css/datatables.min.css">
  <script type="text/javascript" src="/AdoptaM/assets/bootstrap/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="/AdoptaM/assets/bootstrap/js/bootstrap.min.js"></script>


  <!-- Cargo estilo personalizado -->
  <link rel="stylesheet" type="text/css" href="/AdoptaM/assets/bootstrap/css/style.css">
  <!-- css para el login --> 
  <link href="/AdoptaM/assets/bootstrap/css/styleLogin.css" rel="stylesheet" type="text/css" media="all" />
  


  <title>AdoptaMe! 🐾 </title>
  
  
</head>
<body class="fondo ">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="#">🐕 AdoptaMe!</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse tituloLogin" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto ">
      <?php if ($this->session->has_userdata('nombre_usuario')): ?>
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url('C_Conexion/pedirAnimales') ?>"><i class="fas fa-paw"></i> Inicio</a>
        </li>                           <!--  C_Conexion/pedirAnimales  C_Inicio -->
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url('C_Conexion/solicitarCampana') ?>"><i class="fas fa-notes-medical"></i> Campañas</a>
        </li>  <!-- C_Campanias -->
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url('C_Perfil') ?>"><i class="fas fa-user"></i> Mi Perfil</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url('C_InicioSesion/cerrarSesion') ?>"><i class="fas fa-home"></i> Cerrar Sesión</a>
        </li>
      <?php else: ?>
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url() ?>"><i class="fas fa-user"></i> Iniciar Sesión</a>
        </li>
      <?php endif ?>
      </ul>
    </div>
</nav>