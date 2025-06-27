<?php $this->view('header',$data); ?>

	<section id="form" style="margin-top: 5px;"><!--form-->
		<div class="container">
			<div class="row" style="text-align: center;">

				<span style="font-size:18px;color:rede;"><?php check_error() ?></span>
				
				<div class="col-sm-4 col-sm-offset-1" style="float: none;display: inline-block;">
					<div class="login-form"><!--login form-->
						<h2>Login de acesso</h2>
						<form method="post">
							<input type="email" name="email" placeholder="Endereço de email" />
							<input type="password" name="password" placeholder="Palavra passe" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Mantenha-me conectado
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
                        <br>
                          <a href="<?=ROOT?>signup">Não tem conta ? Cadastre aqui</a>      
					</div><!--/login form-->
				</div>
            </div>
		</div>
	</section><!--/form-->
	
<?php $this->view('footer',$data); ?>	
  
