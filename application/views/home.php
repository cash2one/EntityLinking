<script src="<?= base_url('js/countLike.js') ?>"></script>

<!-- OLD VERSION
<div class="container" style="padding-bottom:50px;">
	<div class="row" style="padding-bottom:30px;">
        <div class="col-md-12" style="text-align:center;" >
            <img src="images/logo.png" alt="ELER" />
        </div>
        <div class="col-md-12" style="text-align:center;" >
            <img src="images/wa.jpg" alt="ELER" />
            <textarea style="position: absolute; top:150px; width:570px; left: 250px; height:200px;" id="q" type="text"  name="q" placeholder="Input your text here"></textarea>
            <span >
                <button id="search-btn" type="submit" class="btn btn-default" style="position: absolute; top:150px; left: 820px; height:200px;" >EntityLinking</button>
            </span>
		</div>
	</div>
</div>
-->


<div id="loginbox">
    <form id="search-form" class="form-vertical" role="search" action="<?= site_url('search/index') ?>" method="GET">
        <div class="control-group normal_text">
            <img src="<?= base_url('images/lo.bmp')?>" alt="ELER" />
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <textarea id="q" name="q" type="text" style="height:150px; width:100%;">First documented in the 13th century, Berlin was the capital of the Kingdom of Prussia (1701–1918), the German Empire (1871–1918), the Weimar Republic (1919–33) and the Third Reich (1933–45). Berlin in the 1920s was the third largest municipality in the world. After World War II, the city became divided into East Berlin -- the capital of East Germany -- and West Berlin, a West German exclave surrounded by the Berlin Wall from 1961–89. Following German reunification in 1990, the city regained its status as the capital of Germany, hosting 147 foreign embassies.
                    Ayn_Rand, Allan_Dwan, Actrius,Algeria, Altruism, Alabama, Anarchism, Albedo

                    </textarea>
                </div>
            </div>
        </div>
        <div class="form-actions">  
            <span id="CountedClicks" class="flip-link btn btn-info" onclick="AddClick()">Like: +0</span>
            <button class="btn btn-success" style="float: right;" type="submit">Search</button>         
        </div>
    </form> 
</div>

