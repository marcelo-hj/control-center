<?php
session_start();
?>
<html>
<head>
  <title>Control Center</title>
  <link rel="shortcut icon" href="https://img.icons8.com/cotton/50/000000/open-box--v1.png" type="image/x-png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"><!--css do bootstrap-->
  <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body style="background-color: #1d1d45;">

  <div class="container d-flex justify-content-center" style=" width: 100vh; ">
    <table class="tabela-centro">
      <tbody>
        <tr>
          <td class="align-middle">
            <div class="card text-white" style="background-color: #1d1d45;">
              <img class="card-img" src="img/logo.jpeg" alt="Imagem do card" style="width: 22rem; height: 22rem;">
            </td>
            <td class="align-middle">
              <div class="shadow-lg card" style="padding-top: 20px; width: 23rem;">
                <div class="card-body">
                  <h4 class="text-center">Faça login</h4><br/>
                  <?php
                  if(isset($_SESSION['nao_autenticado'])){
                    ?>
                    <div class="alert alert-danger text-center" role="alert">
                      <strong>Email ou senha incorretos!</strong>
                    </div>
                    <?php
                    unset($_SESSION['nao_autenticado']);
                  }
                  ?>
                  <form action="bin\login.php" method="POST">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"><b>Email</b></label>
                      <div class="col-sm-9">
                        <input name="email" type="email" class="form-control" placeholder="Email" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"><b>Senha</b></label>
                      <div class="col-sm-9">
                        <input name="senha" type="password" class="form-control shadow-lg" placeholder="Senha" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <button type="submit" class="btn btn-block shadow-lg text-white botao" style="background-color: #5271ff;"><b>Login</b></button><br/>
                      </div>
                      <div class="col-sm-12">
                        <p class="text-center">Ainda não tem uma conta? <a href="bin/registrar.php" style="color: #5271ff">clique aqui</a> para se registrar</p>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>


  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script><!--javascript do bootstrap-->
  </html>