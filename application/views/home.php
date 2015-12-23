
<div class="container" style="padding-bottom:50px;">
	<div class="row" style="padding-bottom:30px;">
		<div class="col-md-12" style="text-align:center;">
            <img src="<?= base_url('images/logo.png') ?>" alt="EEST" />
		</div>
	</div>

    
	<div class="row">
		<form id="search-form" role="search" action="<?= site_url('search/index') ?>" method="GET">
			<div class="col-md-2">
            </div>
			<div class="col-md-8">
				<div class="input-group">
					<textarea id="q" type="text" class="form-control span8"  style="height: 10em" name="q" placeholder="Input your text here"></textarea>
					<span class="input-group-btn">
                        <button id="search-btn" type="submit" class="btn btn-default" style="height: 10em">EntityLinking</button>
                    </span>
				</div>
			</div>			
			<div class="col-md-2"></div>
		</form>
	</div>
</div>


