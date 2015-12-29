
$(function(){
    var highlightWords = new Array();
    var query = $("#q").val();

    var getEntities = function(query){
		$.ajax({
            //here should modify url according to jianmin's url
            url: "http://172.31.19.37/test.php?q=" + query + "&callback=?",
			type: "GET",
			dataType: "jsonp",			
			success: function(data) {
                //here is data from jianmin
                //here should figure out highlightWords value
                var highlight = new Array();
                for(var property in data)
                {
                    highlight.push(property);
                    highlightWords[property] = data[property];
                }
                
                $('#q').highlightTextarea({
                    words: {
                        color: '#ADF0FF',
                        words: highlight,
                    },
                });
            },
            error: function(data){
				var output = '';
				for(var property in data){
					output += property + ':' + data[property] + ';';
				}
				console.log('[log] getEntities error information is:' + output);	
			}
        });
    }
    getEntities(query);
    
    
    $('#q').bind("updateInfo click", function(event) {
		if (document.activeElement !== $(this)[0]) {
			return;
		}
		var range = $(this).textrange();
		$('#info .property').each(function() {
			if (typeof range[$(this).attr('id')] !== 'undefined') {
				if ($(this).attr('id') === 'text') {
					range[$(this).attr('id')] = range[$(this).attr('id')].replace(/\n/g, "\\n").replace(/\r/g, "\\r");
				}

				$(this).children('.value').html(range[$(this).attr('id')]);
			}
            
		});        
        var obj = {};
		$('#info .property').each(function() {
			var value = $(this).children('.value').html();
			obj[$(this).attr('id')] = isNaN(value) || value == '' ? value : parseInt(value);
            
		});
        var output;
        if(obj["text"] in highlightWords)
        {
            for(var property in obj){
                output += property + ':' + obj[property] + ';';
            }
            console.log(output);
            
            //here to get specific entity related info
            var words = highlightWords[obj["text"]];
            console.log("words: " + words);
            $.ajax({
                url: "http://172.31.19.37:1234?q=" + words + "&callback=?",
                type: "GET",
                dataType: "jsonp",			
                success: function(data) {
                    /*
                    //here is data from luo
                    console.log("data: " + data);
                    for(var property in data)
                    {
                        console.log("property: " + property + "\n");
                        console.log(data[property]);
                    }
                    */
                    //here to add echart
                    require.config({
                        paths: {
                            //echarts: '../build/dist'
                            echarts: 'http://echarts.baidu.com/build/dist'
                        }
                    });
                    
                    require(
                        [
                            'echarts',
                            'echarts/chart/force', 
                            'echarts/chart/chord',
                        ],
                        function (ec) {
                            var myChart = ec.init(document.getElementById('main'));
                            
                            var option = {                               
                                tooltip: {
                                    trigger: 'item',
                                    borderColor : '#f50',
                                    borderRadius : 8,
                                    borderWidth: 2,
                                    padding: 10,    // [5, 10, 15, 20]*/
                                    textStyle : {
                                        color: 'white',
                                        decoration: 'none',
                                        align: 'left',
                                        fontSize: 5,
                                        fontWeight: 'normal'
                                    }, 

                                    formatter: function (params,ticket,callback) {
                                        //for(var property in params)								
                                            //console.log("params  property is:" + property + ", value is:" + params[property]);
                                        for(var property in params["data"])								
                                            console.log("params->data property is:" + property + ", value is:" + params["data"][property]);
                                        if(params["data"]["content"]){
                                            //entity node
                                            
                                            var content = params["data"]["content"];
                                            var res = "<div style=\"width:300px; white-space:normal; line-height:15px;\">";
                                            for(var i = 0; i < content.length; i++)
                                            {
                                                //console.log("tooltips content[i]: " + content[i]);
                                                if(content[i]["Predicate"])
                                                {
                                                    res += "<span style=\"color:#ff0000;font-weight:bold;\">" + "Predicate: "+ "</span><span>" + content[i]["Predicate"] + "</span><br>"
                                                }
                                                
                                                if(content[i]["IRI"])
                                                {
                                                    res += "<span style=\"color:#ff0000;font-weight:bold;\">" + "IRI: "+ "</span><span>" + content[i]["IRI"] + "</span><br>"
                                                }
                                                for(var property in content[i]){
                                                    if(property !== "IRI" && property !== "Predicate")
                                                    {
                                                        res += "<span style=\"color:#ff0000;font-weight:bold;\">"+ property + ": </span><span>" + content[i][property] + "</span><br>";
                                                    }
                                                }
                                            }
                                            
                                            res += "</div>";
                                                            
                                        }
                                        else if(params["data"]["name"]){
                                            //center node
                                            var res = params["data"]["name"];
                                        }
                                        else{
                                            //edge
                                            var res = params["data"]["target"] + " - " + params["data"]["source"];
                                        }
                                        setTimeout(function (){
                                            // 仅为了模拟异步回调
                                            callback(ticket, res);
                                        }, 1)
                                        return 'loading'; 
                                    }
                                },

                                toolbox: {
                                    show : true,
                                    feature : {
                                        restore : {show: true},
                                        magicType: {show: true, type: ['force', 'chord']},
                                        saveAsImage : {show: true}
                                    }
                                },
                                legend: {
                                    x: 'left',
                                    data:['focus_word','query_entity','rdf-schema#seeAlso','others']
                                },
                                series : [
                                    {
                                        type:'force',
                                        ribbonType: false,
                                        categories : [
                                            {
                                                name: 'focus_word'
                                            },
                                            {
                                                name: 'query_entity'
                                            },
                                            {
                                                name: 'rdf-schema#seeAlso'
                                            },
                                            {
                                                name:'others'
                                            }
                                        ],
                                        itemStyle: {
                                            normal: {
                                                label: {
                                                    show: true,
                                                    textStyle: {
                                                        color: '#333'
                                                    }
                                                },
                                                nodeStyle : {
                                                    brushType : 'both',
                                                    borderColor : 'rgba(255,215,0,0.4)',
                                                    borderWidth : 1
                                                },
                                                linkStyle: {
                                                    type: 'curve'
                                                }
                                            },
                                            emphasis: {
                                                label: {
                                                    show: false
                                                    // textStyle: null      // 默认使用全局文本样式，详见TEXTSTYLE
                                                },
                                                nodeStyle : {
                                                    //r: 30
                                                },
                                                linkStyle : {}
                                            }
                                        },
                                        useWorker: false,
                                        minRadius : 15,
                                        maxRadius : 25,
                                        gravity: 1.1,
                                        scaling: 1.1,
                                        roam: 'move',
                                        nodes:[
                                            {category:0, name: obj["text"], value : 10, label: obj["text"]},
                                        ],
                                        links:[
                                       
                                        ]
                                    }
                                ]
                            };
                            var ecConfig = require('echarts/config');
                            

                            myChart.on(ecConfig.EVENT.FORCE_LAYOUT_END, function () {
                                console.log(myChart.chart.force.getPosition());
                            });
                            
                            
                            for(var property in data){	
                                //console.log("property in data from luo: " + property);
                                if(property == "query_entity")
                                {
                                    var arr = new Array();
                                    var tips = {};
                                    tips["Predicate"] = property;
                                    for (var key in data["query_entity"])
                                    {
                                        if(key !== "name")
                                        {
                                            tips[key] = data["query_entity"][key]; 
                                        }
                                            
                                    }
                                    arr.push(tips);
                                    //console.log("query_entity arr: " + arr);
                                    
                                    option.series[0].nodes.push({
                                        category: 1, 
                                        name: "Official: " + data["query_entity"]["name"],
                                        content: arr,
                                        symbolSize: 20
                                    });
                                    option.series[0].links.push({source: "Official: " + data["query_entity"]["name"], target: obj["text"]});
                                    
                                }
                                else
                                {
                                    switch(property){
                                        case "rdf-schema#seeAlso":
                                            var style = 2;
                                            break;
                                        default:
                                            var style = 3;
                                    }	
                                    //console.log("data[property]  is:" + property);
                                    
                                    for(var content in data[property]){
                                        var arr = new Array();
                                        var tips = {};
                                        tips["Predicate"] = property;
                                        for(var key in data[property][content])
                                        {
                                            
                                            if(key !== "name")
                                            {
                                                tips[key] = data[property][content][key];
                                            }
                                        }  
                                        arr.push(tips);
                                        //console.log("not query_entity arr: " + arr);
                                        option.series[0].nodes.push({
                                            category: style, 
                                            name: data[property][content]["name"], 
                                            content: arr,
                                            symbolSize: 20
                                        });
                                        option.series[0].links.push({source: data[property][content]["name"], target: obj["text"]});
                                        
                                    }		
                                }
                                															
                            }		
                        
                            myChart.setOption(option);
                            
                            function focus(param) {
                                var data = param.data;
                                var links = option.series[0].links;
                                var nodes = option.series[0].nodes;
                                if (
                                    data.source !== undefined
                                    && data.target !== undefined
                                ) { //点击的是边
                                    var sourceNode = nodes.filter(function (n) {return n.name == data.source})[0];
                                    var targetNode = nodes.filter(function (n) {return n.name == data.target})[0];
                                    console.log("click edge" + sourceNode.name + ' -> ' + targetNode.name + ' (' + data.weight + ')');
                                } else { // 点击的是点
                                    console.log("click node" + data.name);
                                    if(data.category)
                                    {
                                        //console.log("url: " + data.content[0]["IRI"]);
                                        window.open(data.content[0]["IRI"]);
                                    }
                                }
                            }
                            myChart.on(ecConfig.EVENT.CLICK, focus)
                            
                        }
                    );

                    
                    
                },
                error: function(data){
                    var output = '';
                    for(var property in data){
                        output += property + ':' + data[property] + ';\n';
                    }
                    console.log('[log] get specific entity error information is:' + output);	
                }
            });
            
                       
        }
        
	});
    
});