      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="<?=ASSETS . THEME ?>admin/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?=$data['user_data']->name?></h5>
                
                
                  <!-- sidebar Dashboard--> 	  	
                  <li class="sub-menu">
                      <a href="<?=ROOT?>admin/index">
                          <i class="fa fa-barcode"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>         
               
                  <!-- sidebar produtos--> 	  	
                  <li class="sub-menu">
                      <a href="<?=ROOT?>admin/products">
                          <i class="fa fa-barcode"></i>
                          <span>Produtos</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?=ROOT?>admin/product/add">Novo Produto</a></li>
                          <li><a  href="<?=ROOT?>admin/product/edit">Editar Produto</a></li>
                          <li><a  href="<?=ROOT?>admin/product/delete">Excluir Produto</a></li>
                      </ul>
                  </li>

                <!-- sidebar categoria--> 	
                  <li class="sub-menu">
                      <a href="<?=ROOT?>admin/categories">
                          <i class="fa fa-desktop"></i>
                          <span>Categorias</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?=ROOT?>admin/categories/add">Novo Categoria</a></li>
                          <li><a  href="<?=ROOT?>admin/categories/edit">Editar Categoria</a></li>
                          <li><a  href="<?=ROOT?>admin/categories/delete">Excluir Categoria</a></li>
                      </ul>
                  </li>

                <!-- sidebar Orders--> 	  	
                  <li class="sub-menu">
                      <a href="<?=ROOT?>admin/orders">
                          <i class="fa fa-barcode"></i>
                          <span>Pedidos </span>
                      </a>
                  </li> 

                   <!-- sidebar Sliders--> 	  	
                  <li class="sub-menu">
                      <a href="<?=ROOT?>admin/settings">
                          <i class="fa fa-cogs"></i>
                          <span>Configurações</span>
                      </a>
                       <ul class="sub">
                          <li><a  href="<?=ROOT?>admin/settings/add">Apresentação de Imagens</a></li>
                      </ul>
                  </li> 

                <!-- sidebar Usuarios--> 	  	
                  <li class="sub-menu">
                      <a href="<?=ROOT?>admin/user">
                          <i class="fa fa-users"></i>
                          <span>Perfil Usuários</span>
                      </a>
                       <ul class="sub">
                          <li><a  href="<?=ROOT?>admin/settings/slide_images">Clientes</a></li>
                          <li><a  href="<?=ROOT?>admin/settings/slide_images">Administradoress</a></li>
                      </ul>
                  </li> 

                <!-- sidebar Backup--> 	  	
                  <li class="sub-menu">
                      <a href="<?=ROOT?>admin/backup">
                          <i class="fa fa-hdd-o"></i>
                          <span>Website Backup</span>
                      </a>
                       <ul class="sub">
                          <li><a  href="<?=ROOT?>admin/settings/slide_images">Backup</a></li>
                      </ul>
                  </li> 

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->