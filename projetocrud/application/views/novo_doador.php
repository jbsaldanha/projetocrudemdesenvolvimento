<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="main" class="container-fluid">
 <h3 class="page-header">Adicionar novo doador</h3>

  <!-- Início form CI-->
  <?php
    if($errosform)
      echo $errosform;

    $attfrom = array();
    echo form_open(base_url().'MainController/novoDoador');

      echo form_label('Nome','campo1');
      $attnome = array('type'=>'text','class'=>'form-control','id'=>'nome','name'=>'nome');
      echo form_input($attnome,set_value('nome'));

      echo form_label('E-mail','campo2');
      $attemail = array('type'=>'text','class'=>'form-control','id'=>'email','name'=>'email');
      echo form_input($attemail,set_value('email'));

      echo form_label('Contato','campo3');
      $attcontato = array('type'=>'text','class'=>'form-control cel-sp-mask','id'=>'tel1','name'=>'tel1','placeholder'=>'Ex.: (00) 0000-0000');
      echo form_input($attcontato,set_value('tel1'));

      echo form_label('Outro contato','campo4');
      $attcontato2 = array('type'=>'text','class'=>'form-control cel-sp-mask','id'=>'tel2','name'=>'tel2','placeholder'=>'Ex.: (00) 0000-0000');
      echo form_input($attcontato2,set_value('tel2'));

      echo form_label('Data de nascimento','campo5');
      $attdtnasc = array('type'=>'text','class'=>'form-control date-mask','id'=>'dtnasc','name'=>'dtnasc','placeholder'=>'Ex.: dd/mm/aaaa');
      echo form_input($attdtnasc,set_value('dtnasc'));

      echo form_label('CPF','campo6');
      $attcpf = array('type'=>'text','class'=>'form-control cep-mask','id'=>'cpf','name'=>'cpf','placeholder'=>'Ex.: 000000000-00');
      echo form_input($attcpf,set_value('cpf'));

      echo form_label('Valor','campo7');
      $attvalor = array('type'=>'text','class'=>'form-control mixed-mask','id'=>'valor','name'=>'doacao','placeholder'=>'Ex.: R$ 0,00');
      echo form_input($attvalor,set_value('doacao'));

      echo form_label('Intervalo de doação','campo8');
      $doacoes = array('0'=>'--SELECIONE--','1'=>'único','2'=>'bimestral','3'=>'semestral','4'=>'Anual');
      $attintdoacao = array('class'=>'form-control','id'=>'intdoacao','name'=>'tipo_doacao');
      echo form_dropdown('tipo_doacao',$doacoes,'',$attintdoacao);

      echo form_label('Forma de pagamento','campo9');
      $pagamentos = array('0'=>'--SELECIONE--','1'=>'Débito','2'=>'Crédito');
      $attformapagamento = array('class'=>'form-control','id'=>'formapagamento','name'=>'forma_pagamento');
      echo form_dropdown('forma_pagamento',$pagamentos,'',$attformapagamento,set_value('forma_pagamento'));

      echo form_label('CEP','campo10');
      $attcep = array('type'=>'text','class'=>'form-control cep-mask','id'=>'cep','name'=>'cep','placeholder'=>'Ex.: 00000-000');
      echo form_input($attcep,set_value('cep'));

      echo form_label('Endereço','campo11');
      $attendereco = array('type'=>'text','class'=>'form-control','id'=>'endereco','name'=>'endereco');
      echo form_input($attendereco,set_value('endereco'));

      echo form_label('Número','campo12');
      $attnumero = array('type'=>'text','class'=>'form-control','id'=>'numero','name'=>'numero');
      echo form_input($attnumero,set_value('numero'));

      echo form_label('Complemento','campo13');
      $attcompl = array('type'=>'text','class'=>'form-control','id'=>'compl','name'=>'complemento');
      echo form_input($attcompl,set_value('complemento'));

      echo form_label('Bairro','campo14');
      $attbairro = array('type'=>'text','class'=>'form-control','id'=>'bairro','name'=>'bairro');
      echo form_input($attbairro,set_value('bairro'));

      echo '<hr>';

      $attbuttonsalvar = array('type'=>'submit','class'=>'btn btn-primary');
      $attbuttoncancelar = array('type'=>'submit','class'=>'btn btn-default','onClick'=>"location.href='".base_url()."'" );
      echo form_submit( 'btn_salvar','Salvar',$attbuttonsalvar);
      echo form_button( 'btn_cancel','Cancelar',$attbuttoncancelar);

     echo form_close();
  ?>

<!-- exemplo sem CI -->
  <!--<div class="row">
 <div class="form-group col-md-4">
   <label for="campo1">Nome</label>
   <input type="text" class="form-control" id="nome">
 </div>-->