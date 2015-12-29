<script src="<?= base_url('js/jquery.min.js') ?>"></script>
<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('js/jquery-ui.min.js') ?>"></script>
<script src="<?= base_url('js/jquery.highlighttextarea.js') ?>"></script>
<script src="<?= base_url('js/jquery-textrange.js') ?>"></script>
<script src="<?= base_url('js/jquery-ui.min.js') ?>"></script>
<script src="<?= base_url('build/dist/echarts.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('js/search.js') ?>"></script>

<script type="text/javascript">
    var query = "<?php $query ?>";
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

                    <article class="main_input_box">
                        <textarea id="q" name="q" type="text" style="height:600px;width:100%"><?=$query ?>
                        </textarea>
                    </article>
                    <button class="btn btn-success" style="width:100%" type="submit">Search</button> 

                </form> 
            </div>
            <div id="allResult" class="col-md-8" style="background:white; height:600px">
                <div id="info" style="height:30px">
                    <strong>Click Info:</strong>
                    <code>
                    <span class="line">{</span>
                    <span id="position" class="property line">position: <span class="value">0</span>,</span>
                    <span id="start" class="property line">start: <span class="value">0</span>,</span>
                    <span id="end" class="property line">end: <span class="value">0</span>,</span>
                    <span id="length" class="property line">length: <span class="value">0</span>,</span>
                    <span id="text" class="property line">text: "<span class="value"></span>"</span>
                    <span class="line">}</span>
                    </code>
                </div>
                <div id="main" style="height:570px;">
                </div>
            </div>
        </div>
        <div class="col-md-1">
        </div>
    </div>
</div>
	
	
