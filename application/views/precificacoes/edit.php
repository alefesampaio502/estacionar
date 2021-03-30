
          <?php $this->load->view('layout/navbar');?>

            <div class="page-wrap">
              <?php $this->load->view('layout/sidebar');?>
               
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="row">
                            
                                <div class="card">
                                    <div class="card-header"><h3><?php echo $titulo;?></h3>
                                    </div>
                                    
                                    <div class="card-body">
            <form method="post" name="form_edit" class="forms-sample">

                
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label>Categorias</label>
                            <input type="text" name="precificacao_categoria" class="form-control form-control-user" value="<?php echo $precificacoes->precificacao_categoria ?>" placeholder="Nome">
                            <?php echo form_error('precificacao_categoria','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        <div class="col-sm-2 mb-3 mb-sm-0">
                            <label>Valor da horas</label>
                            <input type="text" name="precificacao_valor_hora" class="form-control form-control-user money" value="<?php echo $precificacoes->precificacao_valor_hora ?>" placeholder="Nome">
                            <?php echo form_error('precificacao_valor_hora','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        <div class="col-sm-2 mb-3 mb-sm-0">
                            <label>Valor mensalidade</label>
                            <input type="text" name="precificacao_valor_mensalidade" class="form-control form-control-user money" value="<?php echo $precificacoes->precificacao_valor_mensalidade ?>" placeholder="Nome">
                            <?php echo form_error('precificacao_valor_mensalidade','<small class="form-text text-danger">','</small>'); ?>
                        </div>

                          <div class="col-sm-2 mb-3 mb-sm-0">
                            <label>Número vagas</label>
                            <input type="number" name="precificacao_numero_vagas" class="form-control form-control-user " value="<?php echo $precificacoes->precificacao_numero_vagas ?>" placeholder="Nome">
                            <?php echo form_error('precificacao_valor_mensalidade','<small class="form-text text-danger">','</small>'); ?>
                        </div>

                         <div class="col-sm-2">
                        <label>Situação</label>
                        <select class="form-control form-control-ativo" name="precificacao_ativa">
                          <option value="1"<?php echo($precificacoes->precificacao_ativa  == 1) ? 'selected':'' ?>>Ativo</option>
                          <option value="0"<?php echo($precificacoes->precificacao_ativa  == 0) ? 'selected':'' ?>>Inativo</option>
                      </select>
                  </div>
                    
                <input type="hidden" name="precificacoe_id" value="<?php echo $precificacoe->id ?>">
            </div>
            <div class="mt-4 mb-4">
            <button class="btn btn-success mr-2 float-right" style="border-radius: 0;">Salvar</button>
            <a href="<?php echo base_url($this->router->fetch_class()); ?>"style="border-radius: 0;" title="Voltar" class="btn btn-dark mr-2 float-right" style="border-radius: 0;><i class="fas fa-arrow-left mr-1"></i>Voltar</a>
        </div>
       
    </form>

             </div>
 </div>
            </div>
        </div>
        </div>
