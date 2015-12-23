<script src="<?= base_url('js/jquery.min.js') ?>"></script>
<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('js/tempo.min.js') ?>"></script>
<script src="<?= base_url('js/lib/d3/d3.js') ?>"></script>
<script src="<?= base_url('js/d3.layout.cloud.js') ?>"></script>
<script type="text/javascript">
    // Global Config Path
    var tweet_api_base = "<?= site_url('api/search') ?>";
    var query = "<?= $query ?>";
	var user_api_base = "<?= site_url('api/user') ?>";
</script>
<script type="text/javascript" src="<?= base_url('js/search.js') ?>"></script>
<script src="http://echarts.baidu.com/build/dist/echarts.js"></script>

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="http://172.31.222.119/ELER/">
					<b>ELER</b>
				</a>
			</div>
			
			<div>
			  <form class="navbar-form navbar-right" role="search" action="<?= site_url('search/index') ?>" method="GET">
				<div class="input-group">
					<textarea id="q" type="text" class="form-control span8"  style="height: 10em" name="q" placeholder="Input your text here"></textarea>
					<span class="input-group-btn">
                        <button id="search-btn" type="submit" class="btn btn-default" style="height: 10em">EntityLinking</button>
                    </span>
                    
                    
                   
				</div>
			  </form>
			</div>
		</div>
	</div>
</nav>


<div id="result-container" class="container" role="main">
	<div style="position:fixed;width:1100px;">
		<div class="row">
			<div class="col-md-7">
				<div role="tabpanel">
					<!-- Nav tabs -->
					<ul id="entity-source" class="nav nav-pills nav-justified" role="tablist" style="margin-bottom:20px">
						<li role="presentation" class="active">
							<a href="#news" aria-controls="news" role="tab" data-toggle="tab" id="a1">
								新闻实体
							</a>
						</li>
						<li role="presentation">
							<a href="#twitter" aria-controls="twitter" role="tab" data-toggle="tab" id="a4">
								微博实体
							</a>
						</li>
						<li role="presentation">
							<a href="#embedding" aria-controls="embedding" role="tab" data-toggle="tab" id="a2">
								词嵌入实体
							</a>
						</li>
						<!--
						<li role="presentation">
							<a href="#freebase" aria-controls="freebase" role="tab" data-toggle="tab" id="a3">
								知识库
							</a>
						</li>
						-->
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="news">					
							<div id="loading-entity" >
								<div class="col-md-12">
									<center>
									<img width=80 src="<?= base_url('images/loading.gif') ?>" alt="loading entity" />
									</center>
								</div>
							</div>					
							<div id="newsEntity" style="height:700px;">
							</div>
						</div>
						
						<div role="tabpanel" class="tab-pane fade" id="twitter">
							<div id="twitterEntity" style="height:700px;">
							</div>
						</div>
						
						<div role="tabpanel" class="tab-pane fade" id="embedding">
							<div id="embeddingEntity" style="height:700px;">
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="freebase">
							<div id="freebaseEntity" style="height:700px">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
			</div>
		</div>
	</div>
	
	
	</div>
</div>
