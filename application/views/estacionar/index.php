
<?php $this->load->view('layout/navbar');?>
<div class="page-wrap">
  <?php $this->load->view('layout/sidebar');?>
  <div class="main-content">
    <div class="container-fluid">
      <?php if($message = $this->session->flashdata('error')): ?>
        <div class="alert bg-danger alert-danger text-white alert-dismissible fade show" role="alert">
          <strong><i class="ik ik-alert-triangle mr-2"></i>Atenção : </strong> <?php echo $message; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="ik ik-x"></i>
          </button>
        </div>
      <?php endif;?>
      <?php if($message = $this->session->flashdata('sucesso')): ?>
        <div class="alert bg-success alert-success text-white alert-dismissible fade show" role="alert">
          <strong><i class="ik ik-alert-triangle mr-2"></i>Atenção: </strong> <?php echo $message; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="ik ik-x"></i>
          </button>
        </div>
      <?php endif;?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
             <div class="col-md-6 d-inline mt-3 text-left page-header-title">
               <h5> <?php echo $titulo;?></h5>

             </div>
             <div class="col-md-6 text-right">
               <a href="<?php echo base_url('estacionados/add'); ?>" title="Cadastrar nova estacionados de pagamentos" class="btn btn-success btn-sm "><i class="fas fa-user-plus mr-1"></i>Nova</a></div>
             </div>
             <div class="card-body">
              <table  class="table data-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th class="">Categoria</th>
                    <th class="">Valor da hora</th>
                    <th class="">Plaça</th> 
                    <th class="">Formas de pagamento</th>
                    <th class="">Status</th>
                    <th class="nosort text-right pr-25">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($estacinados as $estacionado): ?>
                    <tr>
                      <td><?php echo $estacionado->estacionar_id ?></td>
                      <td class=""><?php echo $estacionado->precificacao_categoria?></a></td>
                      <td class=""><?php echo $estacionado->estacionar_valor_hora?></td>
                      <td class=""><?php echo $estacionado->estacionar_placa_veiculo?></td>
                      <td class=""><?php echo $estacionado->forma_pagamento_nome?></td>
                     
                      <td><?php echo ($estacionado->estacionar_status == 1 ? '<span class="badge badge-success badge-shadow btn-sm"><b><i class="ik ik-unlock mr-2"> Pagar </b></span>' : '<span class="badge badge-danger badge-shadow btn-sm"><i class="ik ik-lock mr-2"></i>Em aberto</span>'); ?></td>
                      <td> 
                        <div class="table-actions">
                          <a href="<?php echo base_url('estacionar/edit/'.$estacionado->estacionar_id); ?>"><i class="<?php echo ($estacionado->estacionar_status == 1 ?  'ik ik-eye' : 'ik ik-edit') ?>"></i></a>
                          <a href="javascript(void)" data-toggle="modal" data-target="#estacionado-<?php echo $estacionado->estacionar_id;?>"><i class=" <?php echo ($estacionado->estacionar_status == 0 ?  'ik ik-lock mr-2' : 'ik ik-trash-2') ?>"></i></a>
                        </div>
                      </td>
                    </tr>
                    <!-- começa a  Modal de exclusão-->
                    <div class="modal fade" id="estacionado-<?php echo $estacionado->estacionar_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header badge-danger">
                            <h5 class="modal-title" id="exampleModalLabel">Confirma a exclusão do registro? </h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="modal-body">Para a exclusão do registro clique em <strong>"Sim"</strong><br>
                            Para cancelar a exclusão do registro clique em <strong>"Não"</strong>

                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Não</button>
                            <a class="btn btn-danger btn-sm" href="<?php echo base_url('estacionar/del/'.$estacionado->estacionar_id); ?>">Sim</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach ;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>   
      </div>
    </div>
</div>



