<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<head>

	<link href="<?=base_url('util/bootstrap/css/')?>bootstrap.min.css" rel="stylesheet">

	<link href="<?=base_url('util/css/')?>metisMenu.min.css" rel="stylesheet">

    <link href="<?=base_url('util/css/')?>dataTables.bootstrap.css" rel="stylesheet">

    <link href="<?=base_url('util/css/')?>dataTables.responsive.css" rel="stylesheet">

</head>

    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <?php 

                	$dados = $this->session->userdata('mensagem');

					//print_r($this->session->userdata('mensagem'));
                	
                	$msg = $dados['msg'];

                    if ($msg): ?>
                    <div class="col-lg-12" id="produto_msg">
                        <div class="alert alert-<?php echo $dados['class'] ?>" role="alert" style="margin-top: 10px;">
                         <?= $msg ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    </div>
                <?php endif ?>
                        <h1 class="page-header" style="color:black">Listagem de Logon</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                        <a href="<?=base_url('logon/novo') ?>" class="btn btn-primary" style="padding-bottom: 10px;margin-bottom: 25px;">Novo</a>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           Aqui estão os logins cadastrados.
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover table-responsive table-bordered" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if (!empty($logon)): ?>
                                        <?php foreach ($logon as $l): ?>
                                            <tr class="odd gradeX" id="tr_<?=$l->id  ?>">
                                                <td><?=$l->id ?></td>
                                                <td><?=$l->nome ?></td>
                                                <td><?=$l->email ?></td>
																								
                                                <td class="center">
													
                                                	<a href="<?php echo base_url('logon/edicao/') . $l->id ?>">
                                                		<span class="glyphicon glyphicon-edit " style="margin-left: 30px;"/>
                                                	</a> 
											
                                                	<a  class="remove" remover = "<?php echo $l->id ?>" href="#" style="margin-left: 10px;"><span class="glyphicon glyphicon-trash"/></a></td>
                                            </tr>
                                            <?php endforeach ?>
                                    <?php endif ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

	<script src="<?=base_url('util/js/')?>jquery.min.js"></script>
	<script src="<?=base_url('util/js/')?>metisMenu.min.js"></script>
    <script src="<?=base_url('util/js/')?>jquery.dataTables.min.js"></script>
    <script src="<?=base_url('util/js/')?>dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url('util/js/')?>dataTables.responsive.js"></script>

    <script>
    	
    	$(function() {

    		function  mensagem(msg) {

    			alert(msg);
    		}

    		function remove_login(id) {

	    		$.ajax({
	    			url : '../remove_login',
	    			type: 'post',
	    			dateType: 'json',
	    			data: {
	    				id: id
	    			},
	    			success: function(Resp) {

	    				var resp = JSON.parse(Resp);

	    				if(resp) {

	    					mensagem("Foi removido com sucesso o Logon de id " + id);
	    					$("#tr_" + id). hide();
	    				
	    				} else {

	    					mensagem("Erro ao tentar remover o Logon de id " + id);
	    				}
	    			}

	    		});

    		}

		    $(document).ready(function() {
		        $('#dataTables-example').DataTable({
		            responsive: true
		        });

		        setTimeout(function(){

		            $("#produto_msg").hide();

		        }, 3000);


		        $(".remove").click(function(event) {

		        	event.preventDefault();

		        	var id =  $(this).attr('remover');
		        	
		        	remove_login(id);

		        	console.log(id);

		        	// Chamar o Ajax para revover o Login.
		        
		        });

		    });

    	});
    	
    </script>

</body>

</html>
