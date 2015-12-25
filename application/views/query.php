<script src="<?= base_url('js/jquery.min.js') ?>"></script>
<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('js/tempo.min.js') ?>"></script>
<script src="<?= base_url('js/lib/d3/d3.js') ?>"></script>
<script src="<?= base_url('js/d3.layout.cloud.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('js/search.js') ?>"></script>
<script src="http://echarts.baidu.com/build/dist/echarts.js"></script>
<script type="text/javascript">
    var query = "<?= $query ?>";
</script>



<!--top-Header-menu-->



<div id="result-container" class="container" role="main">	
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
            <div class="col-md-4">
                <a href="<?= site_url('welcome/index') ?>"><img src="<?= base_url('images/lo.bmp')?>" alt="ELER" /></a>
            </div>
            <div class="col-md-8">
                <div style="text-align:right">
                    <ul>
                        <li class=""><a title="" href="#"><span class="text">系统设置</span></a></li>
                        <li class=""><a title="" href="login.html"><span class="text">退出</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-1">
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10"> 
            <div class="col-md-4">
                <form id="search-form" role="search" action="<?= site_url('search/index') ?>" method="GET">

                    <div class="main_input_box">
                        <textarea id="q" name="q" type="text" style="height:500px;width:100%"><? echo $query ?>
                        </textarea>
                    </div>
                    <button class="btn btn-success" style="width:100%" type="submit">Search</button> 

                </form> 
            </div>
            <div class="col-md-8" style="background:white; height:500px">
            </div>
        </div>
        <div class="col-md-1">
        </div>
    </div>
</div>
	
	
