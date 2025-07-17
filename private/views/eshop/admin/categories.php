<?php $this->view('admin/header',$data); ?>      
  <?php $this->view('admin/sidebar',$data); ?>  

  
  <style type="text/css">

  </style>
   <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Categoria dos Produtos <button class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add Novo</button></h4>
	                  	  	  
                              <!--add nova categoria-->
                              <div class="add_new"></div>
                              <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> Categoria</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Descrição</th>
                                  <th><i class="fa fa-bookmark"></i> Preço</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th><i class=" fa fa-edit"></i> Ação</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td><a href="basic_table.html#">Company Ltd</a></td>
                                  <td class="hidden-phone">Lorem Ipsum dolor</td>
                                  <td>12000.00$ </td>
                                  <td><span class="label label-info label-mini">Habilitado</span></td>
                                  <td>
                                      <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                      <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                  </td>
                              </tr>
                            
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->


<?php $this->view('admin/footer',$data); ?>