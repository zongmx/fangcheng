<!DOCTYPE html>
<html class="js no-touch">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0" />
    <meta http-equiv="cleartype" content="on" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>方橙-最专业的招商选址大数据平台</title>
    <link href="/css/vendors/bootstrap.min.css" rel="stylesheet" />
    <link href="/css/common.css" rel="stylesheet" />
    <link href="/css/old/public.css" rel="stylesheet" />
    <link href="/css/old/about.css" rel="stylesheet" />
    <link href="/css/detail.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="/js/vendors/html5shiv.js"></script>
    <![endif]-->
    <!-- Fav and touch icons -->
    <!-- Fav and touch icons-->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/img/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/img/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/img/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="/img/apple-touch-icon-57-precomposed.png" />
    <link rel="shortcut icon" href="/img/favicon.png" />
</head>
<body>
<?php __slot('passport','weixinconfig');?>
<header class="nav_header">
    <div class="container">
        <nav class="navbar navbar_cus navbar-inverse">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display-->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/" class="navbar-brand about_top_log"><img alt="Brand" src="/img/top_logo.png" height="26" /></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling-->
                <?php if (!empty($_SESSION['userinfo']['passport_id'])){?>
                <div id="bs-example-navbar-collapse-1" role="navigation" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right navUser">
                        <li class="dropdown"><a href="javascript:void(0)" data-toggle="dropdown" class="dropdown-toggle"><?php echo $_SESSION['userinfo']['passport_name']?><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="/passport/loginout">退出</a></li>
                            </ul></li>
                    </ul>
                </div>
                <?php }else{?>
                	<div id="bs-example-navbar-collapse-1" role="navigation" class="collapse navbar-collapse">
                		<ul class="nav navbar-nav navbar-right navUser">
                			<!--  <li><a href="" data-toggle='modal' data-target='#Login'>登录</a></li>-->
                			<li><a href="/passport/loginjump/jump/<?php echo $jump;?>" >登录</a></li>
                			<li><a href="/passport/checklogin/jump/<?php echo $jump;?>" class="nav_reg_btn" >注册</a></li>
                		</ul>
                	</div>
                <?php }?>
            </div>
        </nav>
    </div>
</header>
<main>
<div class="about about_join">
<div class="about_content">
<div class="container">
<div class="row about_c_title">
    <div class="text-center">
        <h2>想要加入我们？</h2>
        <p>如果您的条件符合我们下列招聘需求，请将简历发送至 hr@fangcheng.cn</p>
        <p>我们会尽快与您联系！</p>
    </div>
</div>
<div class="row">
<div class="col-md-4">
    <div class="about_c_list">
        <div class="about_c_tit">
            <span>研发类职位</span>
        </div>
        <div class="about_c_info">
            <div class="about_c_info_c">
                <p class="about_c_info_c_t">Python 开发工程师</p>
                <p>岗位职责：</p>
                <p>1.从事网站后端研发工作；</p>
                <p>2.从事技术调研、大数据量挖掘、性能优化等技术开发工作。</p>
                <p>任职条件：</p>
                <p>1.三年以上 Python 语言为主的大中型软件开发经验。</p>
                <p>2.丰富的Web应用系统设计经验，有 Linux 系统管理经验者优先。</p>
                <p>3.精通MySQL或者MongoDB数据库应用。</p>
                <p>4.扎实的计算机基础，较强的软件架构或算法理解能力。</p>
            </div>
            <div class="line"></div>
            <div class="about_c_info_c">
                <p class="about_c_info_c_t">PHP工程师</p>
                <p>岗位职责：</p>
                <p>1. 负责产品数据库设计；</p>
                <p>2. 负责产品前后台功能模块开发。</p>
                <p>任职条件：</p>
                <p>1. 3年以上互联网研发经验，有独立负责大型网站功能设计开发经验；</p>
                <p>2. 对面向对象、设计模式、HTML协议、大型网站主流开发框架有较深理解，有独立设计实现PHP框架经验的优先；</p>
                <p>3. 对数据库设计性能调优有较深的理解；</p>
                <p>4. 具有模块化编程思想、良好的代码书写习惯；</p>
                <p>5. 善于分析问题和独立解决问题，有很强的沟通能力及组织能力，有团队管理经验优先；</p>
                <p>6. 能够承受工作压力，具有团队意识和良好的职业素养。</p>
            </div>
            <div class="line"></div>
            <div class="about_c_info_c">
                <p class="about_c_info_c_t">大数据工程师</p>
                <p>岗位职责：</p>
                <p>1、负责公司用户数据平台所支持业务的数据分析产品</p>
                <p>2、理解商业地产数据分析和挖掘应用场景，抽象为数据产品需求，不断完善基础数据的建设</p>
                <p>2、通过对用户、客户、产品数据在细分维度上的分布、时间序列进行分析，结合具体业务挖掘收入增长点并建立数学模型，通过机器学习手段求解优化方案，用于指导运营方法、产品优化、增值服务；</p>
                <p>3、研究机器学习/自然语言理解/数据挖掘/计算广告学等领域的前沿理论并应用于业务、技术创新，构建业务理论体系，进行算法改进、架构优化和策略研发</p>
                <p>任职条件：</p>
                <p>1、硕士及以上学历。计算机专业机器学习、数据挖掘、自然语言处理方向；数学专业统计学、应用数学方向优先；</p>
                <p>2、熟悉机器学习、自然语言理解方向的一项或多项技术；</p>
                <p>3、理解机器学习基本算法的设计思想和求解手段，如SVM, LR, RF, Boosting等。有大规模机器学习系统研发经验或机器学习算法优化理论的研究经验者优先；</p>
                <p>4、熟悉NLP/NLU领域理论知识。</p>
                <p>具有以下经验者优先：</p>
                <p>1、数据产品分析设计经验</p>
                <p>2、海量数据平台构架经验</p>
            </div>
            <div class="line"></div>
            <div class="about_c_info_c">
                <p class="about_c_info_c_t">推荐算法工程师</p>
                <p>岗位职责：</p>
                <p>1.开发和优化数据挖掘以及自然语言的处理；</p>
                <p>2.推荐系统等领域的特定算法、学习和利用state-of-the-art的算法解决大规模数据的统计、 分类、 检索、和推荐等产品问题。</p>
                <p>任职条件：</p>
                <p>1.有推荐系统，自然语言处理，数据挖掘，机器学习和搜索引擎等领域的实际项目研发经经验；</p>
                <p>2.熟悉MapReduce、HDFS、YARN的原理，熟悉分布式计算模型；</p>
                <p>3.熟悉java、hadoop相关框架，有较强的编程能力；</p>
                <p>4.有独立研究、实验的能力，优秀的分析问题和解决问题的能力，对解决具有挑战性问题充满激情。</p>
            </div>
            <div class="line"></div>
            <div class="about_c_info_c">
                <p class="about_c_info_c_t">前端高级开发工程师</p>
                <p>岗位职责：</p>
                <p>1.明确理解产品的需求和定位，根据产品设计和规范开发可交互web应用；</p>
                <p>2.负责开发网站前端页面布局样式开发；</p>
                <p>3.负责页面组件的封装；</p>
                <p>4.配合后台开发人员对网站web前端和移动端系统和功能的开发、调试和维护。</p>
                <p>5.研究web前端技术，持续改善用户体验。</p>
                <p>任职条件：</p>
                <p>1. 从事3年以上大中型互联网平台或相关工作开发经验；</p>
                <p>2. 精通HTML、CSS、JavaScript、Ajax、DOM等前端技术，熟悉主流浏览器兼容开发技巧；</p>
                <p>3. 熟练掌握Javascript编码，jQuery、Bootstrap等工具库的使用；</p>
                <p>4. 有面向对象开发经验、具有良好的审美观和UI意识；</p>
                <p>5. 有良好的算法及数据结构基础，了解设计模式；</p>
                <p>6. 有其他后端语言如php、python、java等编程经验优先；</p>
                <p>7. 有移动端主流浏览器的适配，对Android与iOS等不同平台的html页面适配了解优先。</p>
            </div>
            <div class="line"></div>
            <div class="about_c_info_c">
                <p class="about_c_info_c_t">大数据可视化工程师</p>
                <p>岗位职责：</p>
                <p>1.明确理解产品的需求和定位，根据产品设计和规范开发基于web的数据可视化应用；</p>
                <p>2.对已有数据进行分析、优化以便于可视化呈现。</p>
                <p>任职条件：</p>
                <p>1. 两年以上图形可视化或相关开发经历；</p>
                <p>2. 精通javascript及常用的前端类库，有前端开发经验,能够实现各种交互及可视化效果</p>
                <p>3. 熟悉WebGL、Canvas、svg等Web可视化技术；</p>
                <p>4. 使用过Web可视化工具包，如Three.js，D3、e-chart、HighChart等；</p>
                <p>5. 了解图形学、图像处理领域的基本概念和掌握常用设计模式；</p>
                <p>6. 学习能力强，合作沟通能力强。</p>
            </div>
            <div class="line"></div>
            <div class="about_c_info_c">
                <p class="about_c_info_c_t">运维工程师</p>
                <p>岗位职责：</p>
                <p>1. 负责互联网产品上线、部署、监控报警处理等常规运维，保证7*24小时稳定运行 ；</p>
                <p>2. 为各项目搭建服务器开发环境、测试环境、准线上环境（Subversion, FTP及LAMP等）、服务器系统性能调优与日常维护、程序代码发布系统开发、数据热备、服务器运行数据采集系统开发等；</p>
                <p>3. 负责系统运维的知识管理体系、流程与文档建设；</p>
                <p>4. 开发相关运维工具，提高运维效率。</p>
                <p>任职条件：</p>
                <p>1. 计算机或相关专业本科以上学历，两年以上Linux/Unix领域全职工作经验，具备较强英文阅读能力；</p>
                <p>2. 有较丰富的WEB开发及系统脚本编写经验，能够熟练掌握Perl、Python、PHP、Shell编程；</p>
                <p>3. 熟悉Linux/Unix系统及相应的配置及管理，具有数据接口开发经验者优先；</p>
                <p>4. 掌握Nginx、Squid、Memcached等互联网应用服务的配置与管理；</p>
                <p>5. 熟悉MYSQL数据库的配置、维护、性能优化 ；</p>
                <p>6. 熟悉hadoop生态系统，mongodb 等nosql数据库的维护、性能优化 ；</p>
                <p>7. 具有较强的文档编写能力。</p>
            </div>
            <div class="line"></div>
            <div class="about_c_info_c">
                <p class="about_c_info_c_t">测试工程师</p>
                <p>岗位职责：</p>
                <p>1. 负责编写软件测试计划，测试详细用例等测试文档。</p>
                <p>2. 负责测试环境的搭建、测试用例的执行，并按照要求发布测试报告。</p>
                <p>3. 分析测试中遇到的问题，配合相关开发工程师找出解决方案。</p>
                <p>4. 不断完善测试方法，发掘新的测试工具。</p>
                <p>5. 总结测试经验，进行内部交流。</p>
                <p>任职条件：</p>
                <p>1. 大学本科及以上学历，计算机相关专业，3年以上测试相关经验；</p>
                <p>2. 熟悉软件测试流程和规范，掌握多种软件测试手段；熟悉至少一种脚本语言，并能使用该语言进行相关的单元测试。</p>
                <p>3. 具备独立分析需求文档并编写测试用例的能力。</p>
                <p>4. 熟悉oracle、mysql、sqlserver数据库的基本原理和结构；熟悉Linux命令操作。</p>
                <p>5. 对软件测试有浓厚的兴趣，能脱离测试用例，理解需求进行整体测试，善于发现、提出问题。</p>
                <p>6. 做事认真严谨，有良好的工作计划与记录习惯。</p>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="about_c_list">
        <div class="about_c_tit">
            <span>运营类职位</span>
        </div>
        <div class="about_c_info">
            <div class="about_c_info_c">
                <p class="about_c_info_c_t">国际品牌拓展专员（日韩欧美港系）</p>
                <p>岗位职责：</p>
                <p>1.通过线上拓展日韩欧美香港品牌及购物中心，涉及亲子、丽人、服饰、休闲、娱乐；</p>
                <p>2.挖掘品牌及购物中心需求，推广线上产品及服务；</p>
                <p>3.市场调研，整合相关数据，为公司线上产品开拓提供市场数据支持。</p>
                <p>任职条件：</p>
                <p>1.日语/韩语/英语读写熟练；</p>
                <p>2.熟练应用电脑，熟悉互联网及前沿APP操作；</p>
                <p>3.爱好时尚，关注流行趋势；</p>
                <p>4.性格活泼，有激情。</p>
            </div>
            <div class="line"></div>
            <div class="about_c_info_c">
                <p class="about_c_info_c_t">品牌拓展专员（购物中心）</p>
                <p>岗位职责：</p>
                <p>1.通过公司提供的资源，发掘并追踪潜在客户，完善客户资料库，积累客户资源；</p>
                <p>2.通过电话、会面与客户进行有效沟通,在了解客户需求的同时，进行产品的营销推广；</p>
                <p>3.通过线下走访购物中心，对每层的落位图进行详细确认，并进行修改标注；</p>
                <p>4.树立公司的良好形象， 对公司商业秘密做到保密。</p>
                <p>任职条件：</p>
                <p>1.热爱商业地产、品牌、互联网；</p>
                <p>2.具备良好的口头表达能力以及沟通说服技巧；</p>
                <p>3.性格开朗、工作积极热情、踏实肯干；</p>
                <p>4.具备有良好的沟通能力与团队协作能力，执行能力强 ；</p>
                <p>5.能够快速准确的采集品牌内容并且能够整合。</p>
            </div>
            <div class="line"></div>
            <div class="about_c_info_c">
                <p class="about_c_info_c_t">品牌拓展专员（品牌商家）</p>
                <p>岗位职责：</p>
                <p>1.负责与品牌建立联系，信息收集、编辑、发布；</p>
                <p>2.负责网站品牌内容维护、数据对接；</p>
                <p>3.负责提高网站在品牌行业的知名度。</p>
                <p>任职条件：</p>
                <p>1.热爱商业地产、品牌、互联网；</p>
                <p>2.具备良好的口头表达能力以及沟通说服技巧；</p>
                <p>3.性格开朗、工作积极热情、踏实肯干；</p>
                <p>4.具备有良好的沟通能力与团队协作能力，执行能力强 ；</p>
                <p>5.能够快速准确的采集品牌内容并且能够整合。</p>
            </div>
            <div class="line"></div>
            <div class="about_c_info_c">
                <p class="about_c_info_c_t">品牌拓展经理（购物中心）</p>
                <p>岗位职责：</p>
                <p>1.负责与商业地产购物中心，百货商场品牌拓展负责方及入驻品牌建立联系，确保高质量的数据收集和分析；</p>
                <p>2.深度研究购物中心百货商场品牌拓展招商策略；</p>
                <p>3.拓展维护行业人脉；</p>
                <p>4.敏锐捕捉新型品牌，并进行深度研究；</p>
                <p>5.负责网站购物中心内容维护、数据对接；</p>
                <p>6.负责提高网站在商业地产行业的知名度；</p>
                <p>7.带领拓展团队，完成业务。</p>
                <p>任职条件：</p>
                <p>1.热爱商业地产、品牌、互联网领域；</p>
                <p>2.能够快速准确的采集品牌内容并且能够整合；</p>
                <p>3.具备有良好的沟通能力与团队协作能力，执行能力强；</p>
                <p>4.在知名的房地产公司的商业部门工作优先考虑,或者在零售/餐饮公司的开发部门或商业房地产开发商等部门；</p>
                <p>5.在商业地产上有丰富经验，拥有良好的人脉和关系发展。</p>
            </div>
            <div class="line"></div>
            <div class="about_c_info_c">
                <p class="about_c_info_c_t">品牌拓展经理（品牌商家）</p>
                <p>岗位职责：</p>
                <p>1、负责与商业地产入驻品牌建立联系，确保高质量的数据收集和分析；</p>
                <p>2、深度研究品牌的开店计划和选址策略研究；</p>
                <p>3、拓展维护品牌选址行业人脉；；</p>
                <p>4、敏锐捕捉新型品牌，并进行深度研究；</p>
                <p>5、负责网站品牌内容维护、数据对接；</p>
                <p>6、负责提高网站在商业地产行业的知名度；</p>
                <p>7、带领拓展团队，完成业务。</p>
                <p>任职条件：</p>
                <p>1.热爱商业地产、品牌、互联网领域；</p>
                <p>2.能够快速准确的采集品牌内容并且能够整合；</p>
                <p>3.具备有良好的沟通能力与团队协作能力，执行能力强；</p>
                <p>4.在知名的房地产公司的商业部门工作优先考虑，或者在零售/餐饮公司的开发部门或商业房地产开发商等部门；</p>
                <p>5.在商业地产上有丰富经验,拥有良好的人脉和关系发展。</p>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="about_c_list">
        <div class="about_c_tit">
            <span>市场类职位</span>
        </div>
        <div class="about_c_info">
            <div class="about_c_info_c">
                <p class="about_c_info_c_t">媒体推广专员</p>
                <p>岗位职责：</p>
                <p>1.运营微信公众号，为粉丝策划与提供优质、有高度传播性的内容；</p>
                <p>2.紧跟微信发展趋势，积极探索微信运营模式；</p>
                <p>3.研究微信推广模式与渠道，进行品牌的推广；</p>
                <p>4.分析公司微信运营数据，并根据运营数据及时调整与运营策略、方案；</p>
                <p>5.挖掘和分析网友使用习惯，即时掌握新闻热点。</p>
                <p>任职条件：</p>
                <p>1.至少1年以上营销推广、微博微信运营、活动策划等相关工作经验，具有一定的文字功底和表现力；了解并能熟练使用各类设计软件；</p>
                <p>2.熟悉微信运营、口碑营销、PR炒作、论坛SNS营销，了解互联网、移动互联网行业；</p>
                <p>3.文字功底扎实，有写作基础及文案策划能力；</p>
                <p>4.具备良好的沟通能力及团队合作意识。</p>
            </div>
            <div class="line"></div>
            <div class="about_c_info_c">
                <p class="about_c_info_c_t">媒体推广主管</p>
                <p>岗位职责：</p>
                <p>1.负责公司新媒体（微信、微博、APP等）策划、内容创意、推广工作；</p>
                <p>2.负责公司产品整合营销活动，主要针对线上的策划、推动及统筹工作；</p>
                <p>3.通过各种推广手段，实现最优的品牌、使新媒体营销效果最大化；</p>
                <p>4.负责商业地产版块新闻编辑策划，人物专访等。</p>
                <p>任职条件：</p>
                <p>1.大学本科（含）以上学历，新闻学、传播学、计算机类相关专业；</p>
                <p>2.具有三年以上媒体推广的工作经验，商业地产背景优先考虑；</p>
                <p>3.对新媒体营销及信息有深入研究能力和敏锐的洞察力，擅于学习与研究行业案例；</p>
                <p>4.关注新事物，创新能力强，具有投入到网络新媒体领域的激情和兴趣；</p>
                <p>5.具有较强沟通、协调、分析能力和执行力，擅于发现问题和解决问题。</p>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<div class="new_foot">
				<div class="layout">
					<div class="foot-log text-left"><img src="/img/top_logo.png"></div>
					<div class="flex layout layout-align-end-center"><span class="topBtn">回到顶部</span></div>
				</div>
				<div class="foot_b layout">
					<div class="flex"><span class="detail_foot_copy">©方橙 京ICP备案 15010926号-1</span></div>
					<div class="">
						<a href="/passport/joinus" class="">加入我们</a>&nbsp;&nbsp;|&nbsp;&nbsp;
						<a data-toggle="modal" data-target="#contanct" class="">联系我们</a>
					</div>
				</div>
			</div>
</div>
<!-- 登录 -->
<div id="Login" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" aria-hidden="true" class="modal fade login">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 id="myModalLabel" class="modal-title">方橙会员登录</h4>
            </div>
            <div class="modal-body">
                <form id="loginForm" role="form" action="/passport/login" method="post">
                    <input type="hidden" name="_csrf" />
                    <div validate-item="username" class="form-group user_name">
                        <div validate-ok="username" class="username">
                            <input validate-blur validate-field="username" validate-type="required,mobileEmail"id="username" type="text" name="username" placeholder="注册邮箱/手机号" class="form-control error" />
                        </div>
                        <div validate-msg="username" class="tip user_err hide">
                            <span class="left">请输入有效的手机号或者邮箱</span>
                            <span class="right"><a href="/signup1">立即注册&raquo;</a></span>
                        </div>
                    </div>
                    <div validate-item="password" class="form-group user_pass">
                        <div validate-ok="password" class="pass">
                            <input validate-blur validate-field="password" validate-type="required,password" id="pass" type="password" name="password" placeholder="密码" class="form-control" />
                        </div>
                        <div validate-msg="password" class="tip pass_err hide">
                            <span class="left">密码输入错误</span>
                        </div>
						<div id="submitInfo" class="tip pass_err hide">
                            <span class="left"></span>
                        </div>
                    </div>
                    <div class="form-group clearfix check">
                        <div class="col-sm-9">
                            <div class="checkbox check_auto">
                                <label><span class="checked">下次自动登录</span><input type="hidden" name="checkme" value="1" /></label>
                            </div>
                        </div>
                        <div class="col-ms-3 text-right find_pass">
                            <a href="/forgot">忘记密码？</a>
                        </div>
                    </div>
                    <div class="form-group clearfix btn-login">
                        <div class="col-sm-12 btn-login-c">
                            <button id="submitForm" type="button" class="btn btn-primary">登录</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- 联系我们 -->
<div id="contanct" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="false" class="modal fade login guide">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" data-dismiss="modal" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<h4 id="myModalLabel" class="modal-title">联系我们</h4>
			</div>
			<div class="modal-body">
			<p>微信扫一扫关注“方橙科技”公众号：</p>
			<p class="text-center">
				<img src="/img/qrcode_fangcheng.jpg" class="qrcode_sao">
			</p>
			<p class="clearfix cMesg">
				<span class="labelCum">电话：</span>
				<span class="messageCum">400-0038-150</span>
			</p>
			<p class="clearfix cMesg">
				<span class="labelCum">邮箱：</span>
				<span class="messageCum">hi@fangcheng.cn</span>
			</p>
			<p class="clearfix cMesg">
				<span class="labelCum">地址：</span>
				<span class="messageCum">北京市朝阳区建国路89号华贸公寓4号商务楼2305室</span>
			</p>
			</div>
		</div>
	</div>
</div>
</main>
<?php /* __slot('passport','footer'); */?>
<script type="text/javascript" src="/js/vendors/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/js/vendors/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/jquery.form.js"></script>
<script type="text/javascript" src="/js/util/common.js"></script>
<script type="text/javascript" src="/js/widget/validate.form.js"></script>
<script type="text/javascript">
	$(function(){
		/*返回顶部*/
		  $(".topBtn").click(function () {
		      $("html,body").animate({
		          scrollTop: 0
		      }, 300);
		  });
	});
	$('[validate-field="password"]').on('focus',function(){
		$('#submitInfo').addClass('hide');
	});
	$('#loginForm').validate();
	$('#submitForm').click(function() {
		if($('#loginForm').doValidate()) {
			$('#loginForm').ajaxSubmit({
				success: function(data){
					if(data.result == 1) window.location.href = "/";
					else {
						$('#submitInfo').removeClass('hide').children('span').html(data.resultMsg);
					}
				},
				error: function(XmlHttpRequest, textStatus, errorThrown){
					console.log( "error");
				}
			});
			
		}
	})
</script>
<!-- 微信分享-->
<div class="hide" weixin-share-detail wxTitle="加入方橙，一起做点激动人心的事业吧" wxDesc="我们在这里，等你来" wxLink="<?php echo C('WEB_URL').'/passport/joinus';?>" wxImgUrl="<?php echo C('WEB_URL').'/img/apple-touch-icon-144-precomposed.png';?>" class="hide"></div>
<script type='text/javascript'>
	var weixinShareDetail = $('[weixin-share-detail]');
	commonUtilInstance.forwardneed_weixin(weixinShareDetail.attr('wxTitle'),weixinShareDetail.attr('wxDesc'),weixinShareDetail.attr('wxLink'),weixinShareDetail.attr('wxImgUrl'));
</script>

</body>
</html>