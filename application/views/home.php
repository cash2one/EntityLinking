<script src="<?= base_url('js/countLike.js') ?>"></script>

<div id="loginbox">
    <form id="search-form" class="form-vertical" role="search" action="<?= site_url('search/index') ?>" method="GET">
        <div class="control-group normal_text">
            <img src="<?= base_url('images/lo.bmp')?>" alt="ELER" />
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <textarea id="q" name="q" type="text" style="height:180px; width:100%;">First documented in the 13th century, Berlin was the capital of the Kingdom of Prussia (1701–1918), the German Empire (1871–1918), the Weimar Republic (1919–33) and the Third Reich (1933–45). Berlin in the 1920s was the third largest municipality in the world. After World War II, the city became divided into East Berlin. Ayn_Rand, Allan_Dwan, Actrius,Algeria, Altruism, Alabama, Anarchism, Albedo
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

