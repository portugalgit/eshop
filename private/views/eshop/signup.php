<?php $this->view('header',$data); ?>

	<section id="form" style="margin-top: 5px;"><!--form-->
		<div class="container">
			<div class="row" style="text-align: center;">

			<span style="font-size:18px;color:red;"><?php check_error() ?></span>
	
				<div class="col-sm-4" style="float: none;display: inline-block;">
					<div class="signup-form"><!--sign up form-->
						<h2>Cadastro de novo usuario!</h2>
						<form method="post">
							<input name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : '';?>" type="text" placeholder="Nome"/>
							<input name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '';?>" type="email" placeholder="Endereço de Email"/>
							<input name="password" type="password" placeholder="Password"/>
                            <input name="password2" type="password" placeholder="Repete Password"/>
							<button type="submit" class="btn btn-default">Cadastro</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

<?php $this->view('footer',$data); ?>	