 <div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="index.html">
                            <div class="logo-img">
                               <img src="<?php echo base_url();?>public/src/img/brand-white.svg" class="header-brand-img" alt="lavalite"> 
                            </div>
                            <span class="text">ThemeKit</span>
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>
                    
                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">
                                <div class="nav-lavel">Módulos</div>
<div class="nav-item <?php echo ($this->router->fetch_class() == 'home' && $this->router->fetch_method() == 'index' ? 'active' : '');?>">
                                    <a href="<?php echo base_url();?>"><i class="ik ik-home"></i><span>Dashboard</span></a>
                                </div>
                                <div class="nav-item">
                                    <a href="pages/navbar.html"><i class="ik ik-menu"></i><span>Navigation</span> <span class="badge badge-success">New</span></a>
                                </div>

                                 <div class="nav-lavel">Módulo Finaceiro</div>
                                 <div class="nav-item <?php echo ($this->router->fetch_class() == 'mensalistas' && $this->router->fetch_method() == 'index' ? 'active' : '');?>">
                                    <a href="<?php echo base_url()?>mensalidades"><i class="ik ik-user"></i><span>Mensalidades</span></a>

                                    <a href="<?php echo base_url()?>mensalistas"><i class="ik ik-users"></i><span>Mensalistas</span></a>
                                </div>

                                <div class="nav-item <?php echo ($this->router->fetch_class() == 'estacionar' && $this->router->fetch_method() == 'index' ? 'active' : '');?>">
                                    <a href="<?php echo base_url()?>estacionar"><i class="ik ik-truck"></i><span>Estacionar</span></a>
                                </div>
                                
                                <div class="nav-lavel">Módulo  administração</div>
                                <div class="nav-item <?php echo ($this->router->fetch_class() == 'precificacoes' && $this->router->fetch_method() == 'index' ? 'active' : '');?>">
                                   
                                    <a href="<?php echo base_url()?>precificacoes"><i class="ik ik-user"></i><span>Precificacões</span></a></div>
                                   <div class="nav-item <?php echo ($this->router->fetch_class() == 'formas' && $this->router->fetch_method() == 'index' ? 'active' : '');?>">
                                    
                                       
                                   </div>
                                   <div class="nav-item <?php echo ($this->router->fetch_class() == 'mensalidades' && $this->router->fetch_method() == 'index' ? 'active' : '');?>">
                                    
                                       <a href="<?php echo base_url()?>formas"><i class="ik ik-dollar-sign"></i><span>Formas de pagamentos</span></a>
                                </div>

                               
                                 <div class="nav-item <?php echo ($this->router->fetch_class() == 'usuarios' && $this->router->fetch_method() == 'index' ? 'active' : '');?>">
                                    <a href="<?php echo base_url()?>usuarios"><i class="ik ik-user"></i><span>Usuários</span></a>
                                </div>
                                
                                
                                
                                <div class="nav-item <?php echo ($this->router->fetch_class() == 'sistema' && $this->router->fetch_method() == 'index' ? 'active' : '');?>">
                                    <a href="<?php echo base_url()?>sistema"><i class="ik ik-settings"></i><span>Sistema</span></a>
                                </div>
                                
                            </nav>
                        </div>
                    </div>
                </div>