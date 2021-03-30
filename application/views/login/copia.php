
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center" style="margin-top:7rem">

        <div class="col-xl-6 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                     
                        <div class="col-lg-12">

                            <div class="p-5">
                                <div class="text-center">
                                  <?php if($message = $this->session->flashdata('error')): ?>

                                  <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                          <strong class="text-white"><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?php echo $message; ?></strong>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>            
                                </div>                          
                            </div>
                            <?php endif;?>
                            <?php if($message = $this->session->flashdata('info')): ?>
                                  <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                          <strong class="text-white"><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?php echo $message; ?></strong>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>            
                                </div>                          
                            </div>
                            <?php endif;?>
                       
                       <img src="<?php echo base_url();?>public/img/logo.png" width="250" height="100">
                        </div>
                        <form name="form_auth" method="POST" action="<?php echo base_url('login/auth')?>">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control form-control-user"  
                                placeholder="Entrer com seu email">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-user"
                                placeholder="Entrer com sua senha">
                            </div>
                            <div class="text-center">
                                <button class="btn btn-danger btn-sm btn-sm  text-uppercase mt-3" type="submit" style="padding: 25 0px;">Entrar no sistema</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
