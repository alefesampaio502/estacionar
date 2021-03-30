<?php //if(!$this->router->fetch_class() == 'login'):?>
                <footer class="footer">
                    <div class="w-100 clearfix">
                        <span class="text-center text-sm-left d-md-inline-block">Copyright © <?php echo date('Y');?> Estacionar v2.0. todos os direitos reservados.</span>
                        <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Sistema <i class="fa fa-heart text-danger mr-1"></i><a href="http://lavalite.org/" class="text-dark" target="_blank">Code status</a></span>
                    </div>
                </footer>
                <?php //endif ;?>
            </div>
        </div>
     <!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header badge-danger">
            <h5 class="modal-title" id="exampleModalLabel">Deseja realmente sair do sistema?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Para sair do registro clique em <strong>"Sim"</strong><br>
            Para cancelar a saída clique em <strong>"Não"</strong></div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Não</button>
                <a class="btn btn-danger" href="<?php echo base_url('login/logout')?>">Sair</a>
            </div>
        </div>
    </div>
</div>
        
       <script src="<?php echo base_url();?>public/src/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="<?php echo base_url();?>public/src/js/vendor/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url();?>public/plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?php echo base_url();?>public/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>public/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="<?php echo base_url();?>public/plugins/screenfull/dist/screenfull.js"></script>
<?php if(isset($scripts)) : ?>
    <?php foreach ($scripts as $script) : ?>
        <script src="<?php echo base_url('public/' .$script); ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>
<!-- 
        <script src="<?php echo base_url();?>public/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>public/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url();?>public/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url();?>public/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="<?php echo base_url();?>public/plugins/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="<?php echo base_url();?>public/plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js"></script>
        <script src="<?php echo base_url();?>public/plugins/moment/moment.js"></script>
        <script src="<?php echo base_url();?>public/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="<?php echo base_url();?>public/plugins/d3/dist/d3.min.js"></script>
        <script src="<?php echo base_url();?>public/plugins/c3/c3.min.js"></script>
        <script src="<?php echo base_url();?>public/js/tables.js"></script>
        <script src="<?php echo base_url();?>public/js/widgets.js"></script>
        <script src="<?php echo base_url();?>public/js/charts.js"></script>
 -->
        
        <script src="<?php echo base_url();?>public/dist/js/theme.min.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
