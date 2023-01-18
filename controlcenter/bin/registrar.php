<html>
<head>
  <title>Control Center</title>
  <link rel="shortcut icon" href="https://img.icons8.com/cotton/50/000000/open-box--v1.png" type="image/x-png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"><!--css do bootstrap-->
  <link rel="stylesheet" type="text/css" href="../estilo.css">
</head>
<body style="background-color: #1d1d45;">


  <div class="container d-flex justify-content-center" style=" width: 100vh; ">
   <table class="tabela-centro">
    <tbody>
      <tr>
        <td class="align-middle">
         <div class="card card-registrar shadow-lg">
          <div class="card-body">
            <h3 class="card-title text-center">Registrar</h3><br/>
            <form method="POST" action="insert.php">
              <?php
              if(isset($_SESSION['erro_registro'])){
                ?>
                <div class="alert alert-danger text-center" role="alert">
                  <strong>Erro ao registrar conta</strong>
                </div>
                <?php
                unset($_SESSION['erro_registro']);
              }
              ?>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input name="email" type="email" class="form-control shadow-lg" placeholder="Email" required="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Senha</label>
                <div class="col-sm-9">
                  <input name="senha" type="password" class="form-control shadow-lg" placeholder="Senha" required="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Empresa</label>
                <div class="col-sm-9">
                  <input name="nomEmp" type="text" class="form-control shadow-lg" placeholder="Nome do estabelecimento" required="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nome</label>
                <div class="col-sm-9">
                  <input name="nome" type="text" class="form-control shadow-lg" placeholder="Seu nome" required="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Descrição</label>
                <div class="col-sm-9">
                  <textarea name="desc" class="form-control shadow-lg" placeholder="Breve descrição do seu local de trabalho" rows="3" required=""></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-block text-white shadow-lg" style="background-color: #5271ff;">Registrar-se</button><br/>
                </div>
                <div class="col-sm-12">
                  <a href="../index.php" role="button" class="btn btn-danger btn-block shadow-lg">Voltar</a>
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



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><!--javascript do bootstrap-->
</body>
</html>