<?php 
	
 ?>



 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Logon</title>
 	<link rel="stylesheet" href="<?=base_url('util/bootstrap/css/')?>bootstrap.min.css">
 </head>
 <body>

 		<div class="container" style="margin-top: 100px;">
 			<h1 style="margin-left: 70px;">Cadastro de Logon</h1>
 			<div class="row col-md-12">
 				<form action="<?=base_url()?>logon/cadastro" method="post">
 					<div class="form-group col-md-12" style="margin-top: 15px;">
		 				<div class="col-md-5">
		 					<label for="nome">Nome:</label>
		 					<input type="text" class="form-control" id="nome"  name="nome"  required />
		 				</div> 						
 					</div>
 					<div class="form-group col-md-12"">
		 				<div class="col-md-5">
		 					<label for="nome">Email:</label>
		 					<input type="email" class="form-control" id="email"  name="email"  required />
		 				</div> 						
 					</div>
 					<div class="form-group col-md-12"">
		 				<div class="col-md-5">
		 					<label for="senha">Senha:</label>
		 					<input type="password" class="form-control"  id="senha"  name="senha"  required />
		 				</div> 						
 					</div>

 					<div class="form-group col-md-12"">
		 				<div class="col-md-5">
		 					<button type="submit" name="btnCadastrar" class="btn btn-primary btn-block" style="padding-bottom: 15px; margin-top: 10px;" >Cadastrar</button>	
		 				</div>		 										
 					</div>
 					<div class="form-group col-md-12"">
		 				<div class="col-md-5">
		 					<button type="button" name="btnCancelar" id="cancelar" class="btn btn-danger btn-block" style="padding-bottom: 5px; margin-top: 0px;" >Cancelar</button>	
		 				</div> 						
 					</div>
	 								
 				</form>
 			</div>
 		</div>

 		<script src="<?=base_url('util/js/')?>jquery.min.js"></script>
 		<script>
 			$(document).ready(function(){
 				
 				$("#cancelar").click(function(){

 					window.location.href = "listagem";
 				});
 			});
 		</script>
 		
 </body>
 </html>