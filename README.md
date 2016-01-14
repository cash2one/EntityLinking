使用PHP框架codeigniter构建网站，MVC模式，即Model-View-Controller；

application/
    controllers/
        Search.php: 检索控制器
        Welcome.php: 首页样式控制器
    views/
    home.php: 定义首页样式
        query.php: 定义查询后界面
        inc/
            header.php: 定义页面头部样式
            footer.php: 定义页面尾部样式

css/
    存放相关的css文件，定义网站的样式

js/
    存放相关的js文件，捕捉用户动作、动态展示图形化界面等

ner/
    利用Standford ner接口: http://nlp.stanford.edu:8080/ner/process来识别实体,再与DBPedia中的数据进行比较。其中使用共享内存加快速度。
