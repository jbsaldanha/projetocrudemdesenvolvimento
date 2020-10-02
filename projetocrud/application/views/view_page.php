<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- inicio Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
      </div>
      <div class="modal-body">
        Deseja excluir o registro?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Sim</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
      </div>
    </div>
  </div>
</div>
<!-- fim modal -->

<div id="main" class="container-fluid">
 <h3 class="page-header">Dados do doador</h3>
</div>

<div class="row">
  <div class="col-md-3">
    <p><strong>Nome</strong></p>
    <p><?php echo $registro[0]->nome; ?></p>
  </div>
  <div class="col-md-3">
    <p><strong>E-mail</strong></p>
    <p><?php echo $registro[0]->email; ?></p>
  </div>
  <div class="col-md-3">
    <p><strong>CPF</strong></p>
    <p><?php echo substr_replace($registro[0]->cpf,'-',9,0); ?></p>
  </div>
  <div class="col-md-3">
    <p><strong>Data de nascimento</strong></p>
    <p><?php
    //Formatação de data
    $data = new DateTime($registro[0]->dtnasc);
    echo $data->format('d/n/Y');
    ?></p>
  </div>
</div>
<!-- endereço -->
<div class="row">
  <div class="col-md-4">
    <p><strong>Endereço</strong></p>
    <p><?php echo $registro[0]->endereco; ?></p>
  </div>
  <div class="col-md-2">
    <p><strong>Número</strong></p>
    <p><?php echo $registro[0]->numero; ?></p>
  </div>
  <div class="col-md-2">
    <p><strong>Complemento</strong></p>
    <p><?php echo $registro[0]->complemento; ?></p>
  </div>
  <div class="col-md-2">
    <p><strong>Bairro</strong></p>
    <p><?php echo $registro[0]->bairro; ?></p>
  </div>
  <div class="col-md-2">
    <p><strong>CEP</strong></p>
    <p><?php echo substr_replace($registro[0]->cep,'-',5,0); ?></p>
  </div>
</div>
<!-- Contato -->
<div class="row">
  <div class="col-md-4">
    <p><strong>Telefone</strong></p>
    <p><?php echo $registro[0]->tel1; ?></p>
  </div>
  <div class="col-md-2">
    <p><strong>Telefone</strong></p>
    <p><?php echo $registro[0]->tel2; ?></p>
  </div>
</div>


<hr/>
<div id="actions" class="row">
  <div class="col-md-12">
    <a href="<?php echo base_url('index.php/MainController/editaDoador/').$registro[0]->cpf; ?>" class="btn btn-primary">Editar</a>
    <a href="<?php echo base_url().'MainController/deletaDoador/'.$registro[0]->cpf ?>" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Excluir</a>
    <a href="<?php echo base_url(); ?>" class="btn btn-default">Voltar</a>
  </div>
</div>