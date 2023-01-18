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
$exibe = mysqli_fetch_array($busca);
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
                      <li class="nav-item active">
                        <a class="nav-link" href="adicionar.php">Adicionar</a>
                      </li>
                      <li class="nav-item">
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
                </nav>

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


                <!---------------------------------------------------------------------------------------------------------------------------------->
                <div class="container d-flex justify-content-center" style=" width: 100%; margin-top: -5%; ">
                  <table class="tabela-centro-disney">
                    <tbody>
                      <tr>
                        <td class="align-middle">
                          <div class="card-group">

                            <!-----------------------Card Categoria----------------------->
                            <div class="card text-white shadow-lg" style="background-color: #5271ff;">
                              <div class="card-header">Categoria</div>
                              <div class="card-body">
                                <h5 class="card-title">Adicionar uma Categoria</h5>
                                <p class="card-text">Clicando aqui você poderá criar uma categoria para incluir itens do seu estoque semelhantes que ficarão dentro desta categoria.<br/> Exemplo: "Ferramentas".</p>
                              </div>
                              <div class="card-footer text-center">
                                <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ModalCategoria">
                                  Criar
                                </button>
                              </div>
                            </div>

                            <!-------------------------------------------------Modal Categoria--------------------------------------------------->
                            <div class="modal fade" id="ModalCategoria" tabindex="-1" role="dialog" aria-labelledby="TituloModalCategoria" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="TituloModalCategoria">Adicionar uma Categoria</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="POST" action="insert_categorias.php">
                                      <div class="form-group">
                                        <label for="nome">Nome da Categoria</label>
                                        <input autocomplete="off" type="text" name="nome" class="form-control" id="nome" aria-describedby="emailHelp" placeholder="Ex.: Insumos" required="">
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                      <button type="submit" class="btn btn-success">Adicionar</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>


                            <!---------------------------------------------------------------------------------------------------------------------->

                            <!-------------------------Card Item-------------------------->
                            <div class="card text-white shadow-lg" style="background-color: #5271ff;">
                              <div class="card-header">Item</div>
                              <div class="card-body">
                                <h5 class="card-title">Adicionar um Item</h5>
                                <p class="card-text">Clicando aqui voce poderá adicionar itens a suas categorias previamente criadas. Atenção: Não será possível criar um item sem antes ter, pelo menos uma, categoria adicionada.</p>
                              </div>
                              <div class="card-footer text-center">
                                <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ModalItem">
                                  Criar
                                </button>
                              </div>
                            </div>



                            <!-------------------------------------------------Modal Item--------------------------------------------------->
                            <div class="modal fade" id="ModalItem" tabindex="-1" role="dialog" aria-labelledby="TituloModalItem" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="TituloModalItem">Adicionar um Item</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="POST" action="insert_itens.php">
                                      <div class="form-group input-group mb-3">
                                        <select name="categoria" class="shadow form-control custom-select" required="">
                                          <option selected disabled="">Escolha a categoria do item</option>
                                          <?php
                                          $result = mysqli_query($con, "SELECT nome FROM categorias WHERE idUser ='".$exibe['id']."'");
                                          while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                            <option><?php echo $row['nome']; ?></option>
                                          <?php } ?>
                                        </select>
                                      </div> 
                                      <div class="form-group">
                                        <input autocomplete="off" type="text" class="shadow form-control" name="nome" id="nom_item" placeholder="Nome do Item" required="">
                                      </div>
                                      <div class="form-group">
                                        <input autocomplete="off" type="text" class="shadow form-control" name="estoqueMin" id="est_min" placeholder="Estoque Mínimo (Ex.: 10)" required="">
                                      </div>
                                      <div class="form-group">
                                        <input autocomplete="off" type="text" class="shadow form-control" name="estoqueSeg" id="est_min" placeholder="Estoque de Segurança (Ex.: 5)" required="">
                                      </div>
                                      <div class="form-group">
                                        <input autocomplete="off" type="text" class="shadow form-control" name="estoque" id="est_atual" placeholder="Estoque Atual" required="">
                                      </div>
                                      <div class="form-group">
                                        <input autocomplete="off" type="text" class="shadow form-control" name="descProd" id="desc_item" placeholder="Descrição do Item" required="">
                                      </div>
                                      <div class="form-group">
                                        <input autocomplete="off" type="text" class="shadow form-control" name="locprod" id="loc_prod" placeholder="Localização do Produto" required="">
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                      <button type="submit" class="btn btn-success">Adicionar</button></form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div><br/>


                            <div class="card-group">
                              <!-----------------------Card Turmas----------------------->
                              <div class="card text-white shadow-lg" style="background-color: #5271ff;">
                                <div class="card-header">Turmas</div>
                                <div class="card-body">
                                  <h5 class="card-title">Adicionar uma Turma</h5>
                                  <p class="card-text">Clicando aqui é possível adicionar uma turma.</p>
                                </div>
                                <div class="card-footer text-center">
                                  <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ModalTurma">
                                    Adicionar
                                  </button>
                                </div>
                              </div>

                              <!-------------------------------------------------Modal Turmas--------------------------------------------------->
                              <div class="modal fade" id="ModalTurma" tabindex="-1" role="dialog" aria-labelledby="TituloModalTurma" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="TituloModalTurma">Adicionar uma Turma</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="POST" action="insert_turmas.php">
                                        <div class="form-group">
                                          <label for="nome">Nome da Turma</label>
                                          <input autocomplete="off" type="text" name="nome_turma" class="form-control" id="nome_turma" placeholder="Ex.: MEC19" required="">
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-success">Adicionar</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>


                              <!-----------------------Card Alunos----------------------->
                              <div class="card text-white shadow-lg" style="background-color: #5271ff;">
                                <div class="card-header">Alunos</div>
                                <div class="card-body">
                                  <h5 class="card-title">Adicionar Alunos</h5>
                                  <p class="card-text">Clique aqui para adicionar alunos a turmas previemente criadas.</p>
                                </div>
                                <div class="card-footer text-center">
                                  <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#ModalAluno">
                                    Adicionar
                                  </button>
                                </div>
                              </div>

                              <!------------------------------------------------- Modal Alunos -------------------------------------------------->
                              <div class="modal fade" id="ModalAluno" tabindex="-1" role="dialog" aria-labelledby="TituloModalAluno" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="TituloModalAluno">Adicionar um Aluno</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="POST" action="insert_alunos.php">
                                        <div class="form-group input-group mb-3">
                                          <select name="turma" class="shadow form-control custom-select" required="">
                                            <option selected>Escolha a turma do aluno</option>
                                            <?php
                                            $result = mysqli_query($con, "SELECT turma FROM turmas WHERE idUser ='".$exibe['id']."'");
                                            while($row = mysqli_fetch_assoc($result)){
                                              ?>
                                              <option><?php echo $row['turma']; ?></option>
                                            <?php } ?>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <input autocomplete="off" type="text" name="rm" class="form-control" id="rm" placeholder="RM do aluno" required="">
                                        </div> 
                                        <div class="form-group">
                                          <input autocomplete="off" type="text" name="nome" class="form-control" id="nome" aria-describedby="emailHelp" placeholder="Nome do aluno" required="">
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-success">Adicionar</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
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