
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
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Forma de pagamento</label>
                            <input type="text" name="forma_pagamento_nome" class="form-control form-control-user" value="<?php echo $formas->forma_pagamento_nome ?>" placeholder="Nome">
                            <?php echo form_error('forma_pagamento_nome','<small class="form-text text-danger">','</small>'); ?>
                        </div>

                         <div class="col-sm-6">
                        <label>Situação</label>
                        <select class="form-control form-control-ativo" name="forma_pagamento_ativa">
                          <option value="1"<?php echo($formas->forma_pagamento_ativa  == 1) ? 'selected':'' ?>>Ativo</option>
                          <option value="2"<?php echo($formas->forma_pagamento_ativa  == 0) ? 'selected':'' ?>>Inativo</option>
                      </select>
                  </div>
                    
                <input type="hidden" name="forma_pagamento_id" value="<?php echo $formas->id ?>">
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
