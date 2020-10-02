<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="main" class="container-fluid">
     <<div id="top" class="row">
    <div class="col-md-3">
        <h2>Listagem de doadores</h2>
    </div>

    <div class="col-md-6">
    </div>

    <div class="col-md-3">
        <a href="<?php echo base_url('index.php/MainController/novoDoador'); ?>" class="btn btn-primary pull-right h2">Novo Item</a>
    </div>
</div> <!--fim do topo-->

     <hr />
     <!-- inicio da lista -->

     <!--<h1><?php print_r(count($teste)); ?></h1>-->
    <div id="list" class="row">
    <div class="table-responsive col-md-12">
        <table class="table table-striped" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>CPF</th>
                    <th>Idade</th>
                    <th class="actions">Ações</th>
                 </tr>
            </thead>
            <tbody>

                <?php
                    $totalregistros = count($registros);
                     for($i=0;$i<$totalregistros;$i++){
                        $varcpf = $registros[$i]->cpf;
                       echo "<tr>
                            <td>".$registros[$i]->nome."</td>"
                            ."<td>".$registros[$i]->email."</td>"
                            ."<td>".$varcpf."</td>"
                            ."<td>".$registros[$i]->idade."</td>
                            <td class='actions'>
                            <a class='btn btn-success btn-xs' href=".base_url('index.php/MainController/view/').$varcpf.">Visualizar</a>
                            <a class='btn btn-warning btn-xs' href=".base_url('index.php/MainController/editaDoador/').$varcpf.">Editar</a>
                            <a class='btn btn-danger btn-xs'  href=".base_url('MainController/deletaDoador/').$varcpf." data-toggle='modal' data-target='#delete-modal'>Excluir</a>
                            </td>
                        </tr>";
                    }
                 ?>

                <!--<tr>
                    <td>1001</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing</td>
                    <td>Jes</td>
                    <td>01/01/2015</td>
                    <td class="actions">
                        <a class="btn btn-success btn-xs" href="<?php echo base_url('index.php/MainController/view') ?>">Visualizar</a>
                        <a class="btn btn-warning btn-xs" href="<?php echo base_url('index.php/MainController/editaDoador')?>">Editar</a>
                        <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                    </td>
                </tr>-->

            </tbody>
         </table>

     </div>
 </div><!-- fim da lista -->

     <div id="bottom" class="row">

     </div> <!-- /#bottom -->
 </div>  <!-- /#main -->