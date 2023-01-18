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
                        <li class="nav-item">
                          <a class="nav-link" href="perfil.php">Perfil</a>
                        </li>
                        <li class="nav-item active">
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
                  <ul class="list-group">

                    <?php

                   //Receber o número da página
                    $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);   
                    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

                    //Setar a quantidade de itens por pagina
                    $qnt_result_pg = 10;

                    //calcular o inicio visualização
                    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

                    $result_usuarios = "SELECT * FROM produtos ORDER BY nome LIMIT $inicio, $qnt_result_pg";
                    $resultado_usuarios = mysqli_query($con, $result_usuarios);
                    while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                      ?>
                      <li href="#<?php echo $row_usuario['nome']; ?>" data-toggle="modal" data-target="#<?php echo $row_usuario['nome']; ?>" style='font-size: 16px; margin-top: 1px;' class='shadow rounded list-group-item list-group-item-action list-group-item-primary'>
                        <strong> <?php echo $row_usuario['nome'];  ?>  <span class="badge badge-primary badge-pill float-right"><?php echo $row_usuario['estoque'] ?></span></strong>
                      </li>



                      <!-- Modal Excluir-->
                      <div class="modal fade" id="<?php echo $row_usuario['nome']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Excluir Item</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="POST" action="exclui_produtos.php">
                              <div class="modal-body">
                                Deseja mesmo excluir este item de seu estoque permanentemente?<br/><br/>
                                <li style="font-size: 16px; margin-top: 1px;" class="shadow rounded list-group-item list-group-item-primary">
                                  <strong> <?php echo $row_usuario['nome'];  ?> <span class="badge badge-primary badge-pill float-right"><?php echo $row_usuario['estoque']?></span></strong>
                                </li>
                                <div class="form-group row d-none">
                                  <label class="col-sm-3 col-form-label">Código</label>
                                  <div class="col-sm-9">
                                    <input readonly="" type="text" value=" <?php echo $row_usuario['id']?> " name="id" class="form-control-plaintext" required="">
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Não</button>
                                <button type="submit" class="btn btn-danger">Sim</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>



                      <?php
                    }

                //Paginção - Somar a quantidade de produtos
                    $result_pg = "SELECT COUNT(id) AS num_result FROM produtos";
                    $resultado_pg = mysqli_query($con, $result_pg);
                    $row_pg = mysqli_fetch_assoc($resultado_pg);
                //Quantidade de pagina 
                    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

                //Limitar os link antes depois
                    $max_links = 1; ?>
                  </ul>
                </div>
                <div class="card-footer text-center">

                  <nav aria-label="Navegação de página exemplo">
                    <ul class="pagination justify-content-center pagination-sm">
                      <li class="page-item shadow-lg rounded"><?php echo "<a class='page-link text-white' style='background-color:#5271ff;' href='inventario.php?pagina=1'>Primeira</a> ";?></li>
                      <?php
                      for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                        if($pag_ant >= 1){?>
                          <li class="page-item shadow-lg rounded"><?php echo "<a style='background-color:#5271ff;' class='page-link text-white' style='font-color:#5271ff;' href='inventario.php?pagina=$pag_ant'>$pag_ant</a> ";?></li>
                          <?php
                        }
                      }?>
                      <li class="page-item shadow-lg rounded"><a class="page-link text-white" style="background-color:#1d1d45;"><?php echo "$pagina";?></a></li>
                      <?php

                      for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                        if($pag_dep <= $quantidade_pg){?>
                          <li class="page-item shadow-lg rounded"><?php echo "<a style='background-color:#5271ff;' class='page-link text-white' href='inventario.php?pagina=$pag_dep'>$pag_dep</a> ";?></li>
                          <?php
                        }
                      }
                      ?>
                      <li class="page-item shadow-lg rounded"><?php echo "<a style='background-color:#5271ff;' class='page-link text-white' href='inventario.php?pagina=$quantidade_pg'>Ultima</a>";?></li>
                    </ul>
                  </nav>
                </div>
              </td>
            </tr>
          </tbody>
        </table>


      </body>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><!--javascript do bootstrap-->
      </html>
      <?php } ?>