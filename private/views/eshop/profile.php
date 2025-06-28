<?php $this->view('header',$data); ?>

<section id="main-content">
<section class="wrapper">

<div style="min-height: 300px;">

    <div class="col-md-4 mb">
        <!--WHITE PANEL - TOP USER -->
        <div class="card-title d-flex align-items-start justify-content-between mb-4">
            <div class="white-header">
                <h5>TOP USER</h5>
            </div>
            <p><img src="<?=ASSETS . THEME ?>admin/img/icons/unicons/chart-success.png" alt="chart success"  class="rounded"></p>
            <p><b>Zac Snider</b></p>
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-1">Payments</p>
                       <P>2021</p>
                </div>
                <div class="col-md-6">
                    <p class="small mt">TOTAL SPEND</p>
                    <p>$ 47,5</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</section>

<?php $this->view('footer',$data); ?>