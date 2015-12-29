<body style="margin-top:2%;">

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
                        <!-- here to add navigation if you like-->
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
                <div class="col-md-3">
                    <form id="search-form" role="search" action="<?= site_url('search/index') ?>" method="GET">

                        <article class="main_input_box">
                            <textarea id="q" name="q" type="text" style="height:566px;width:100%"><?=$query ?>
                            </textarea>
                        </article>
                        <button class="btn btn-success" style="width:100%" type="submit">Search</button> 

                    </form> 
                </div>
                <div id="allResult" class="col-md-7" style="background:white; height:600px">
                    <div id="info" style="height:50px">
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
                <div class="col-md-2" style="color:#666; height:600px">
                    <div style="height: 45px; width:200px">
                        <strong><font color="white">Our Team</font> </strong><br>
                        <p style="color:white;font-size:8px">(Ordered by last name)</p>
                    </div>
                       
                    <div style="height:190px">
                        <img width="150" title="Email: bingfeng_luo@qq.com" src="<?= base_url('images/1.png') ?>" alt="Bingfeng Luo" />
                        <p style="color:white; margin-top:7px">Bingfeng Luo</p>                    
                    </div> 
                    <div style="height:190px">
                        <img width="150" title="Email: yaolili@pku.edu.cn" src="<?= base_url('images/2.png') ?>" alt="Lili Yao" />
                        <p style="color:white; margin-top:7px">Lili Yao</p>
                    </div>
                    <div style="height:190px">
                        <img width="150" title="Email: zhangjianmin2015@pku.edu.cn" src="<?= base_url('images/3.png') ?>" alt="Jianmin Zhang" />
                        <p style="color:white; margin-top:7px">Jianmin Zhang</p>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
            </div>
        </div>
    </div>
	
</body>	
