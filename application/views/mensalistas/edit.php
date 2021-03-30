
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
                            <label>Nome</label>
                            <input type="text" name="mensalista_nome" class="form-control form-control-user" value="<?php echo $mensalistas->mensalista_nome ?>" placeholder="Nome">
                            <?php echo form_error('mensalista_nome','<small class="form-text text-danger">','</small>'); ?>
                        </div>

                         <div class="col-sm-4 mb-3 mb-sm-0">
                            <label>Sobrenome</label>
                            <input type="text" name="mensalista_sobrenome" class="form-control form-control-user" value="<?php echo $mensalistas->mensalista_sobrenome ?>" placeholder="Nome">
                            <?php echo form_error('mensalista_sobrenome','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                         <div class="col-sm-4 mb-3 mb-sm-0">
                            <label>Email</label>
                            <input type="text" name="mensalista_email" class="form-control form-control-user" value="<?php echo $mensalistas->mensalista_email ?>" placeholder="Nome">
                            <?php echo form_error('mensalista_email','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        
                      </div>
                       <div class="form-group row">

                         <div class="col-sm-4 mb-3 mb-sm-0">
                            <label>CPF</label>
                            <input type="text" name="mensalista_cpf" class="form-control form-control-user" value="<?php echo $mensalistas->mensalista_cpf ?>" placeholder="Nome">
                            <?php echo form_error('mensalista_cpf','<small class="form-text text-danger">','</small>'); ?>
                        </div>

                         <div class="col-sm-2 mb-3 mb-sm-0">
                            <label>Rg</label>
                            <input type="text" name="mensalista_rg" class="form-control form-control-user" value="<?php echo $mensalistas->mensalista_rg ?>" placeholder="Nome">
                            <?php echo form_error('mensalista_rg','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        <div class="col-sm-2 mb-3 mb-sm-0">
                            <label>Nascimento</label>
                            <input type="date" name="mensalista_data_nascimento" class="form-control form-control-user" value="<?php echo $mensalistas->mensalista_data_nascimento ?>" placeholder="Nome">
                            <?php echo form_error('mensalista_data_nascimento','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        <div class="col-sm-2 mb-3 mb-sm-0">
                            <label>Fone fixo</label>
                            <input type="text" name="mensalista_telefone_fixo" class="form-control form-control-user phone_with_ddd" value="<?php echo $mensalistas->mensalista_telefone_fixo ?>" placeholder="Nome">
                            <?php echo form_error('mensalista_telefone_fixo','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        <div class="col-sm-2 mb-3 mb-sm-0">
                            <label>Celular</label>
                            <input type="text" name="mensalista_telefone_movel" class="form-control form-control-user phone_with_ddd" value="<?php echo $mensalistas->mensalista_telefone_movel ?>" placeholder="Nome">
                            <?php echo form_error('mensalista_telefone_movel','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                       
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label>Endereço</label>
                            <input type="text" name="mensalista_endereco" class="form-control form-control-user" value="<?php echo $mensalistas->mensalista_endereco ?>" placeholder="Nome">
                            <?php echo form_error('mensalista_endereco','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        <div class="col-sm-2 mb-3 mb-sm-0">
                            <label>CEP</label>
                            <input type="text" name="mensalista_cep" class="form-control form-control-user" value="<?php echo $mensalistas->mensalista_cep ?>" placeholder="Nome">
                            <?php echo form_error('mensalista_cep','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        <div class="col-sm-2 mb-3 mb-sm-0">
                            <label>Número</label>
                            <input type="text" name="mensalista_numero_endereco" class="form-control form-control-user" value="<?php echo $mensalistas->mensalista_numero_endereco ?>" placeholder="Nome">
                            <?php echo form_error('mensalista_numero_endereco','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        <div class="col-sm-2 mb-3 mb-sm-0">
                            <label>Bairro</label>
                            <input type="text" name="mensalista_bairro" class="form-control form-control-user" value="<?php echo $mensalistas->mensalista_bairro ?>" placeholder="Nome">
                            <?php echo form_error('mensalista_bairro','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        <div class="col-sm-2 mb-3 mb-sm-0">
                            <label>Complemento</label>
                            <input type="text" name="mensalista_complemento" class="form-control form-control-user" value="<?php echo $mensalistas->mensalista_complemento ?>" placeholder="Nome">
                            <?php echo form_error('mensalista_complemento','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                      </div>
                       <div class="form-group row">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <label>Cidade</label>
                            <input type="text" name="mensalista_cidade" class="form-control form-control-user" value="<?php echo $mensalistas->mensalista_cidade ?>" placeholder="Nome">
                            <?php echo form_error('mensalista_cidade','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <label>UF</label>
                            <input type="text" name="mensalista_estado" class="form-control form-control-user" value="<?php echo $mensalistas->mensalista_estado ?>" placeholder="Nome">
                            <?php echo form_error('mensalista_estado','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <label>Dia do vencimento</label>
                            <input type="text" name="mensalista_dia_vencimento" class="form-control form-control-user" value="<?php echo $mensalistas->mensalista_dia_vencimento ?>" placeholder="Nome">
                            <?php echo form_error('mensalista_dia_vencimento','<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <label>Situação</label>
                             <select class="form-control form-control-ativo" name="mensalista_ativo">
                              <option value="1"<?php echo($mensalistas->mensalista_ativo  == 1) ? 'selected':'' ?>>Ativo</option>
                               <option value="0"<?php echo($mensalistas->mensalista_ativo  == 0) ? 'selected':'' ?>>Inativo</option>
                      </select>
                        </div>

                      </div>
                      <div class="form-group row">
                 <div class="col-sm-12 mt-2">
                    <label>Histórico do cliente</label>
                    <textarea name="mensalista_obs" class="form-control form-control-user"><?php echo $mensalistas->mensalista_obs ?></textarea>
                    <?php echo form_error('$mensalistas->mensalista_obs','<small class="form-text text-danger">','</small>'); ?>
                </div>
              </div>
                    
                <input type="hidden" name="mensalista_id" value="<?php echo $mensalistas->id ?>">
            
            <div class="mt-4 mb-4 float-right mr-5">
            <button class="btn btn-success mr-2 float-right" style="border-radius: 0;">Salvar</button>
            <a href="<?php echo base_url($this->router->fetch_class()); ?>"style="border-radius: 0;" title="Voltar" class="btn btn-dark mr-2 float-right" style="border-radius: 0;><i class="fas fa-arrow-left mr-1"></i>Voltar</a>
        </div>
        </div>
       
    </form>

             </div>
 </div>
            </div>
        </div>
        </div>
