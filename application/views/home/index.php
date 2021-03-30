
          <?php $this->load->view('layout/navbar');?>

            <div class="page-wrap">
            	<?php $this->load->view('layout/sidebar');?>
               
                <div class="main-content">
                    <div class="container-fluid">
                        			<?php if($message = $this->session->flashdata('sucesso')): ?>
                                        <div class="alert bg-success alert-success text-white alert-dismissible fade show" role="alert">
                                            <strong><i class="ik ik-alert-triangle mr-2"></i>Ola: </strong> <?php echo $message; ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="ik ik-x"></i>
                                            </button>
                                        </div>

                                      <?php endif;?>

                    </div>

                </div>
               


                

