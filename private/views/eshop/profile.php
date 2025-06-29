<?php $this->view('header',$data); ?>

<section id="main-content">
<section class="wrapper">

<div style="min-height: 300px; max-width:1000px; margin:auto;">
    <style type="text/css">
        .white-panel {
            border: 2px solid #444;       /* Borda mais visível */
            border-radius: 8px;
            padding: 20px;
            background-color: #f9f9f9;    /* Contraste de fundo */
            box-shadow: 0 2px 10px rgba(0,0,0,0.1); /* Sombra leve opcional */
        }
        .col-md-6 {
            color: #293444;
        }
        #user_text{
            color: #6e93ce;
        }
        p{
             color: #6e93ce;
        }
    </style>

    <div class="col-md-4 mb">

        <!--WHITE PANEL - TOP USER -->
       <div class="white-panel" style="text-align: center; text-align:center;">
            <div class="white-header" style="color:grey">
                <h5 >MINHA CONTA</h5>
            </div>
            <p><img src="<?=ASSETS . THEME ?>admin/img/icons/unicons/chart-success.png" class="img-circle" width="70" alt="chart success"></p>
            <p><b><?=$data['user_data']->name?></b></p>
            <div class="row">
                <div class="col-md-6">
                    <p id="user_text" class="small mt">MEMBRO DESDE</p>
                       <P><?=date("jS M Y",strtotime($data['user_data']->date))?></p>
                </div>
                <div class="col-md-6">
                    <p id="user_text" class="small mt">Gasto total</p>
                    <p>$ 47,5</p>
                </div>
            </div>
         <!---->
            <div class="row">
                <div class="col-md-6">
                    <p id="user_text" class="small mt"><i class="fa fa-edit"> EDITAR</i></p>
                </div>
                <div class="col-md-6">
                    <p id="user_text" class="small mt"><i class="fa fa-delet"> DELETAR</i></p>
                </div>
            </div>
            
        </div>
    </div>
</div>
</section>
</section>

<?php $this->view('footer',$data); ?>