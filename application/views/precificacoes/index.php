
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
               <a href="<?php echo base_url('precificacoes/add'); ?>" title="Cadastrar nova precificacoes" class="btn btn-success btn-sm "><i class="fas fa-user-plus mr-1"></i>Nova</a></div>
             </div>
             <div class="card-body">
              <table  class="table data-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th class="">Categoria</th>
                    <th class="">Valor da hora</th>
                    <th class="">Mensalidade</th>
                    <th class="text-center">Qtde Vagas</th>
                    <th>Situação</th>
                    <th class="nosort text-right pr-25">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($precificacoes as $precificacoe): ?>
                    <tr>
                      <td><?php echo $precificacoe->precificacao_id ?></td>
                      <td class=""><?php echo $precificacoe->precificacao_categoria ?></td>
                      <td>R$ <?php echo $precificacoe->precificacao_valor_hora?></td>
                      <td>R$ <?php echo $precificacoe->precificacao_valor_mensalidade ?></td>
                      <td class="text-center"><?php echo $precificacoe->precificacao_numero_vagas ?></td>
                      <td><?php echo ($precificacoe->precificacao_ativa == 1 ? '<span class="badge badge-success badge-shadow btn-sm"><b><i class="ik ik-unlock mr-2"> Ativo </b></span>' : '<span class="badge badge-danger badge-shadow btn-sm"><i class="ik ik-lock mr-2"></i>Inativo</span>'); ?></td>
                      <td> 
                        <div class="table-actions text-right">
                          <a href="#"><i class="ik ik-eye"></i></a>
                          <a href="<?php echo base_url('precificacoes/edit/'.$precificacoe->precificacao_id); ?>"><i class="ik ik-edit-2"></i></a>
                          <a href="javascript(void)" data-toggle="modal" data-target="#precificacoe-<?php echo $precificacoe->precificacao_id;?>"><i class="ik ik-trash-2"></i></a>
                        </div>
                      </td>
                    </tr>
                    <!-- começa a  Modal de exclusão-->
                    <div class="modal fade" id="precificacoe-<?php echo $precificacoe->precificacao_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            <a class="btn btn-danger btn-sm" href="<?php echo base_url('precificacoes/del/'.$precificacoe->precificacao_id); ?>">Sim</a>
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



