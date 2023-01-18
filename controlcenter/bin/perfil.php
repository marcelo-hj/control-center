<?php
session_start(); 	
include_once("bdconfig.php");

// Verifica se existe os dados da sessão de login 
if(!isset($_SESSION["email"])){ 
// Usuário não logado! Redireciona para a página de login 
  header("Location: ..\index.php"); 
  exit; 
}

$busca = mysqli_query($con, "SELECT * FROM usuario WHERE email ='".$_SESSION['email']."'");
while($exibe = mysqli_fetch_array($busca)){
  ?>
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
              <div class="card card-principal shadow-lg">
                <div class="card-body">
                  <nav class="navbar navbar-expand-md navbar-dark shadow-lg rounded bar">
                    <a class="navbar-brand" href="#">Control Center</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#corNavbar01" aria-controls="corNavbar01" aria-expanded="false" aria-label="Alterna navegação">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="corNavbar01">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                          <a class="nav-link" href="principal.php">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="estoque.php">Estoque</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="adicionar.php">Adicionar</a>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link" href="perfil.php">Perfil</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="inventario.php">Inventário</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="historico.php">Histórico</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="emuso.php">Em uso</a>
                        </li>
                      </ul>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ExemploModalCentralizado">
                        Sair
                      </button>
                    </div>
                  </nav><br/>

                  <!-- Modal -->
                  <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="TituloModalCentralizado">Deseja mesmo sair?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Cuidado ao sair sem salvar suas alterações!!
                        </div>
                        <div class="modal-footer">
                          <form action="logout.php">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                            <button type="submit" class="btn btn-danger">Sim</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="container d-flex justify-content-center" style=" width: 100%; margin-top: -5%; ">
                    <table class="tabela-centro-disney">
                      <tbody>
                        <tr>
                          <td class="align-middle">
                            <div class="card-deck">
                              <div class="card text-white" style="background-color: #5271ff;">
                                <div class="card-header">Informações Pessoais</div>
                                <div class="card-body">
                                 <form method="POST" action="atualiza_dados.php">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Nome</label>
                                    <div class="col-sm-8 ">
                                      <input autocomplete="off" type="text" value="<?php echo $exibe['Nome']?> " name="Nomeup" class="form-control" required="">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Empresa</label>
                                    <div class="col-sm-8">
                                      <input autocomplete="off" type="text" value="<?php echo $exibe['nomEmp']?> " name="nomEmpup" class="form-control" required="">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Descrição da Empresa</label>
                                    <div class="col-sm-8 form-control-plaintext text-white">
                                      <input autocomplete="off" type="text" value="<?php echo $exibe['descEmp']?> " name="descEmpup" class="form-control" required="">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-footer text-center">
                                  <button type="submmit" class="btn btn-block btn-success">
                                    Editar
                                  </button>
                                </div>
                              </form>
                            </div>

                            <!---------------------------------------------------------------------------------------------------------------------->
                            <div class="card text-white" style="background-color: #5271ff;">
                              <div class="card-header">Informações Login</div>
                              <div class="card-body">
                               <?php
                               if(isset($_SESSION['senha_atual'])){
                                ?>
                                <span class="badge badge-pill badge-danger">Senha Atual incorreta</span>
                                <?php
                                unset($_SESSION['senha_atual']);
                              }
                              ?>
                              <form method="POST" action="atualiza_login.php">
                                <div class="form-group row">
                                  <label class="col-sm-4 col-form-label">Email</label>
                                  <div class="col-sm-8 ">
                                    <input autocomplete="off" type="text" value="<?php echo $exibe['email']?> " name="emailup" class="form-control" required="">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-sm-4 col-form-label">Senha Atual</label>
                                  <div class="col-sm-8 ">
                                    <input autocomplete="off" type="password" name="senhaatual" class="form-control" required="">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-sm-4 col-form-label">Senha Nova</label>
                                  <div class="col-sm-8 ">
                                    <input autocomplete="off" type="password" name="senhaup" class="form-control" required="">
                                  </div>
                                </div>
                                <center><span class="badge badge-pill badge-danger">Ao editar será feito o logout!</span></center>
                              </div>
                              <div class="card-footer text-center">
                                <button type="submit" class="btn btn-block btn-success">
                                  Editar
                                </button>
                              </form>
                            </div>
                          </form>
                        </div>




                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>


          </div>
        </div>
      </td>
    </tr>
  </tbody>
</table>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><!--javascript do bootstrap-->
</html>
<?php } ?>