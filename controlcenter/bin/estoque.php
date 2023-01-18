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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><!--javascript do bootstrap-->
    <title>Control Center</title>
    <link rel="shortcut icon" href="https://img.icons8.com/cotton/50/000000/open-box--v1.png" type="image/x-png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"><!--css do bootstrap-->
    <link rel="stylesheet" type="text/css" href="../estilo.css">
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style type="text/css">
      a:link, a:visited, a:active {
        text-decoration: none;
        color:#5271ff;
      }
      a:hover {text-decoration: none;  
        color:#5271ff; 
      }
    </style>
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
                        <li class="nav-item active">
                          <a class="nav-link" href="estoque.php">Estoque</a>
                        </li>
                        <li class="nav-item">
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
                  </nav><br/>

                  <!--------------------------------------------------------Modal---------------------------------------------------------->
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


                  <form action="estoque.php" method="POST">
                    <div class="input-group">
                      <div class="input-group-append">                        
                        <button class="shadow-lg btn btn-primary" data-toggle="modal" data-target="#categorias" type="button">Editar</button>
                      </div>
                      <select name="categoria" class="shadow-lg custom-select" id="categoria">
                        <option selected disabled="">Escolha uma categoria...</option>
                        <?php
                        $result = mysqli_query($con, "SELECT nome,id FROM categorias WHERE idUser ='".$exibe['id']."'");
                        while($row = mysqli_fetch_assoc($result)){
                          ?>
                          <option><?php echo $row['nome']; ?></option>
                        <?php } ?>
                      </select>
                      <div class="input-group-append">
                        <button class="shadow-lg btn btn-success " type="submit">Selecionar</button>
                        <button class="shadow-lg btn btn-danger " data-toggle="modal" data-target="#urgencias" type="button">Urgências</button>
                      </div>
                    </div>
                  </form>

                  <!-- Modal Categorias-->
                  <div class="modal fade" id="categorias" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="TituloModalCentralizado">Editar Categorias</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <?php
                          
                          $categorias = "SELECT * FROM categorias WHERE idUser ='".$exibe['id']."' ORDER BY nome";
                          $resultado_categorias = mysqli_query($con, $categorias);

                          if(mysqli_num_rows($resultado_categorias) <= 0){
                          echo "<li style='font-size:16px;' class='shadow text-center list-group-item list-group-item-action list-group-item-primary'>Não há categorias criadas</li>"; //caso não tenha encontrado produtos na categoria
                        }else{
                          while($row22 = mysqli_fetch_assoc($resultado_categorias)){
                            ?>
                            <form method="POST" action="exclui_categoria.php">
                              <div class="form-row">
                                <div class="col-9">
                                  <input type="text" class="form-control d-none" name="id" value="<?php echo $row22['id']; ?>">
                                  <input type="text" readonly class="form-control-plaintext rounded shadow-sm" name="nome" value="<?php echo $row22['nome']; ?>">
                                </div>
                                <div class="col-3">
                                  <button class="shadow btn btn-block btn-danger" type="submit">Excluir</button>
                                </div>
                              </div>
                            </form>
                            <?php
                          }
                        } 
                        ?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal Urgências-->
                <div class="modal fade" id="urgencias" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="TituloModalCentralizado">Lista de Urgências</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <?php

                        $produtos = "SELECT * FROM produtos ORDER BY estoque DESC";
                        $result = mysqli_query($con, $produtos);

                        if(mysqli_num_rows($result) <= 0){
                          echo "<li style='font-size:16px;' class='shadow text-center list-group-item list-group-item-action list-group-item-primary'>Nenhum produto com estoque no minimo ou nulo</li>"; //caso não tenha encontrado produtos na categoria
                        }else{
                          while($roww = mysqli_fetch_assoc($result)){

                            if(($roww['estoque']>0) && ($roww['estoque'] <= $roww['estoqueMin']) || ($roww['estoque']<=0)){
                              if (($roww['estoque']>0) && ($roww['estoque'] <= $roww['estoqueMin'])){
                                $classe = "'shadow rounded list-group-item list-group-item-action list-group-item-warning'";
                                $badge = "'badge badge-warning badge-pill float-right'";
                              }else{
                                $classe = "'shadow rounded list-group-item list-group-item-action list-group-item-danger'";
                                $badge = "'badge badge-danger badge-pill float-right'";
                              }
                              ?>
                              <li style='font-size: 16px; margin-top: 1px;' class=<?php echo $classe; ?>>
                                <strong> <?php echo $roww['nome'];  ?> <span class=<?php echo $badge; ?>><?php echo $roww['estoque']?></span></strong>
                              </li>
                              <?php
                            }else{
                              echo "";
                            }
                          }
                        } 
                        ?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-success">Mandar por e-mail</button>
                      </div>
                    </div>
                  </div>
                </div>


                <ul class="list-group">
                  <?php
                  if(isset($_POST['categoria'])){
                    $palavra = $_POST['categoria'];
                        //busca a categoria
                    $categoria = "SELECT * FROM categorias WHERE nome LIKE '%$palavra%'";
                        $resultado_categoria = mysqli_query($con, $categoria); // executa a query acima
                        $row1 = mysqli_fetch_assoc($resultado_categoria); // agrupa o resultado

                        // busca o item com o id da categoria previamente selecionado
                        $produto = "SELECT * FROM produtos WHERE categoria ='".$row1['id']."' ORDER BY estoque DESC";
                        $resultado_produto = mysqli_query($con, $produto); // executa a query


                        if(mysqli_num_rows($resultado_produto) <= 0){
                          echo "<li style='font-size:16px;' class='shadow text-center list-group-item list-group-item-action list-group-item-primary'>Nenhum produto nesta categoria</li>"; //caso não tenha encontrado produtos na categoria
                        }else{

                          while($rows = mysqli_fetch_assoc($resultado_produto)){

                            if(($rows['estoque']>0) && ($rows['estoque'] <= $rows['estoqueMin'])){
                              $classe = "'shadow rounded list-group-item list-group-item-action list-group-item-warning'";
                              $badge = "'badge badge-warning badge-pill float-right'";
                            }else if($rows['estoque']<=0){
                              $classe = "'shadow rounded list-group-item list-group-item-action list-group-item-danger'";
                              $badge = "'badge badge-danger badge-pill float-right'";
                            }else{
                             $classe = "'shadow rounded list-group-item list-group-item-action list-group-item-primary'";
                             $badge = "'badge badge-primary badge-pill float-right'";
                           }


                           if($rows['estoque'] <= $rows['estoqueSeg']){
                            $badge1 = "'badge badge-danger badge-pill'";
                            $exc = "!";
                          }else{
                            $badge1 = "";
                            $exc = "";
                          }

                          ?>


                          <li href="#<?php echo $rows['nome']; ?>" data-toggle="modal" data-target="#<?php echo $rows['nome']; ?>" style="font-size: 16px; margin-top: 1px;" class=<?php echo $classe; ?>>
                            <strong>
                              <?php echo $rows['nome'];  ?>
                              <span class=<?php echo $badge; ?>><?php echo $rows['estoque']; ?></span>
                              <span class=<?php echo $badge1; ?>><?php echo $exc; ?></span>
                            </strong>
                          </li>

                          <!--Modal com Detalhes do item selecionado-->
                          <div class="modal fade" id="<?php echo $rows['nome']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="TituloModalCentralizado"><?php echo $rows['nome'];?></h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="edita_item.php" method="POST">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Código</label>
                                      <div class="col-sm-9 ">
                                        <input readonly="" type="text" value=" <?php echo $rows['id']?> " name="id" class="form-control-plaintext" required>
                                      </div>
                                    </div>
                                    <div class="form-group row d-none">
                                      <label class="col-sm-3 col-form-label">Categoria</label>
                                      <div class="col-sm-9 ">
                                        <input readonly="" type="text" value=" <?php echo $rows['categoria']?> " name="categoria" class="form-control-plaintext" required>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Nome</label>
                                      <div class="col-sm-9 ">
                                        <input autocomplete="off" type="text" value="<?php echo $rows['nome']?> " name="nome" class="shadow form-control" required>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Estoque</label>
                                      <div class="col-sm-9 ">
                                        <input autocomplete="off" type="text" value="<?php echo $rows['estoque']?> " name="estatual" class="shadow form-control" required>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Estoque Mínimo</label>
                                      <div class="col-sm-9 ">
                                        <input autocomplete="off" type="text" value="<?php echo $rows['estoqueMin']?> " name="estmin" class="shadow form-control" required>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Estoque Segurança</label>
                                      <div class="col-sm-9 ">
                                        <input autocomplete="off" type="text" value="<?php echo $rows['estoqueSeg']?> " name="estseg" class="shadow form-control" required>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Descrição</label>
                                      <div class="col-sm-9 ">
                                        <input autocomplete="off" type="text" value="<?php echo $rows['descProd']?> " name="desc" class="shadow form-control" required>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Localização</label>
                                      <div class="col-sm-9 ">
                                        <input autocomplete="off" type="text" value="<?php echo $rows['locprod']?> " name="loc" class="shadow form-control" required>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="shadow-lg btn btn-danger" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="shadow-lg btn btn-success">Salvar mudanças</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        <?php }
                      }
                    }?>
                  </ul>
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
  <?php 
}
?>

  <!-- https://www.youtube.com/watch?v=wFfwt_Rbp1o -->