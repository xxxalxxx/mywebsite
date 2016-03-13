<?php 
header('Content-Type: text/html; charset=utf-8');

class ProjectManager
{
    private $categories;
    private $num_cats;
    public function __construct()
    {
        $this->categories = array(

            0 => array(
                'name' => "PHP/JavaScript",
                'css_class' => 'web',
                'projects' => array(
                    0 => array(
                            'name' => 'Archive Stalker',
                            'css_class' => 'php',
                            'technologies' => 'PHP (Wordpress), JavaScript (jQuery, Ajax), SQL (MySQL)',
                            'demo_url' => 'wp_plugins',
                            'github_url' =>"https://github.com/a-melnichuk/Archive-Stalker",
                            'description_url' =>'descriptions/archive_stalker.html'
                        ),
                    1 => array(
                            'name' => 'Хобот Ентерпрайзес',
                            'css_class' => 'php',
                            'technologies' => 'PHP (Yii2), JavaScript (jQuery, Ajax), SQL (MySQL), Java (<a href="https://github.com/a-melnichuk/Hobot-enterprises/tree/master/elephants-generator">создание SQL со случайными данными и thumbnail-ов</a>)',
                            'demo_url' => 'http://melnichuk-yii-advanced.hol.es/advanced/frontend/web/site/products',
                            'github_url' =>"https://github.com/a-melnichuk/Hobot-enterprises",
                            'description_url' =>'descriptions/hobot_enterprises.html'

                        ),
                    2 => array(
                            'name' => 'Plotty',
                            'css_class' => 'javascript',
                            'technologies' => 'JavaScript (jQuery)',
                            'demo_url' => 'plotty/',
                            'github_url' =>"https://github.com/a-melnichuk/Plotty",
                            'description_url' =>'descriptions/plotty.html'
                        ),
                    ),
                ),
            1 => array(
                'name' => "Android",
                'css_class' => 'android',
                'projects' => array(
                    0 => array(
                            'name' => 'Dice',
                            'css_class' => 'android_ndk',
                            'technologies' => 'C/C++ (Android NDK), OpenGL ES 2.0',
                            'play_market_url' => 'https://play.google.com/store/apps/details?id=com.melnichuk.dice',
                            'demo_url' => '',
                            'github_url' =>"https://github.com/a-melnichuk/Kommunalchik_v1",
                            'description_url' =>'descriptions/dice.html'
                        ),
                    1 => array(
                            'name' => 'Коммунальчик',
                            'css_class' => 'android_java',
                            'technologies' => 'Java (Android)',
                            'play_market_url' =>'',
                            'demo_url' => '',
                            'github_url' =>"https://github.com/a-melnichuk/Kommunalchik_v1",
                            'description_url' =>'descriptions/kommunalchik.html'
                        )

                    ),
                )
        );

        $this->num_cats = count($this->categories);
    }

    public function showHeader()
    {
        foreach ($this->categories as $i => $category) 
        {
            echo '<a id="' . $i . '" class="header-item" href="#"><div class ="' . $category['css_class'] . '"><span>' . $category['name'] . '</span></div></a>';
        }
    }

    public function showMenus($clickId)
    {
        if ($clickId < 0) $clickId = 0;
        elseif($clickId > $this->num_cats) $clickId = $this->num_cats;
        
        foreach ($this->categories as $i => $category) 
        {
            $style_str = $i != $clickId ? 'style="display:none;"' : '';

            echo  '<div ' . $style_str . ' id="' . $i. '" class="menu">';
            foreach ($category['projects'] as $j => $project) 
            {
                $name = $project['name'];
                echo '<p><a href="#' . $name . '">' . $name . '</a></p>';
            }
            echo '</div>';
        }
    }

    public function showProjects($clickId)
    {

        if ($clickId < 0) $clickId = 0;
        elseif($clickId > $this->num_cats) $clickId = $this->num_cats;

        foreach ($this->categories as $i => $category) 
        {
            $style_str = $i != $clickId ? 'style="display:none;"' : '';
            echo '<div ' . $style_str . ' id="' . $i . '">';
            foreach ($category['projects'] as $j => $project) 
            {
                $name = $project['name'];
                $technologies = $project['technologies'];
                $demo_url = $project['demo_url'];
                $play_market_url = $project['play_market_url'];
                $github_url = $project['github_url'];
                $description_url = $project['description_url'];

                echo  '<div class="content ' . $project['css_class'] . '">';

                if(!empty($name) )
                {
                    echo '<p><a name="' . $name . '"><h2>' . $name . '</h2></a></p>';
                }

                if(!empty($technologies) )
                {
                    echo "<p><h3>Технологии: </h3>$technologies</p>";
                }

                if(!empty($demo_url) )
                {
                    echo '<p><a href="' . $demo_url . '">Демо</a></p>';
                }

                if(!empty($play_market_url) )
                {
                    echo '<p><a href="' . $play_market_url . '">Play Market</a></p>';
                }

                if(!empty($github_url) )
                {
                    echo '<p><a href="' . $github_url . '">GitHub</a></p>';
                }

                if(!empty($description_url) )
                {
                    echo "<p><h3>Описание: </h3></p>";

                    include($description_url);
                }

                echo  '</div>';
            }

            echo '</div>';
        }
    }
};

$pm = new ProjectManager();
$clickId = 0;
?>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<style> #jsMath_Warning {display: none} </style>
<script>
  jsMath = {
    Controls: {
      cookie: {scale: 120},
      CheckVersion: function () {
        jsMath.Script.delayedLoad('http://www.math.union.edu/locate/jsMath/jsMath/jsMath-version-check.js');
      }
    },
    Parser: {prototype: {
      macros: {warning: ["Macro","\\color{##00CC00}{\\rm jsMath\\ appears\\ to\\ be\\  working!}",1]}
    }}
  }
</script>
<script SRC="jsMath/plugins/noImageFonts.js"></script>
<script SRC="jsMath/jsMath.js"></script>
<!--<NOSCRIPT>
  <DIV STYLE="color:#CC0000; text-align:center">
    <B>Warning: <A HREF="http://www.math.union.edu/locate/jsMath">jsMath</A>
    requires JavaScript to process the mathematics on this page.<BR>
    If your browser supports JavaScript, be sure it is enabled.</B>
  </DIV>
  <HR>
</NOSCRIPT>-->
<header>
    <div class="header-wrapper">
        <?php $pm->showHeader(); ?>
    </div>
</header>
<body>
    <?php $pm->showMenus($clickId); ?>
    <div class="wrapper">
        <?php $pm->showProjects($clickId); ?>
    </div> 
</body>

<footer>
    
</footer>
<script>
$( document ).ready(function() 
{
    jsMath.Process(document);

    $( ".header-item" ).click(function(e) 
    {
        e.preventDefault();
        let num_indices = $(this).siblings().length;
        let index = $(this).index();

        window.scrollTo(0, 0);

        $(`body div[id=${index}]`).show();
        $(this).siblings().each( (i,v) => {
            let other_index = $(v).index();
            $(`body div[id=${other_index}]`).hide();
        });
    });

    $(".menu a").click(function(e) 
    {
        e.preventDefault();
        
        var target = $(this).attr("href")
        target = target.substring(1,target.length);
        $(window).scrollTop($('a[name="'+target+'"]').offset().top - 89); 
        return false; 
    });


});

</script>