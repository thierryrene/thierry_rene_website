<?php

require_once 'php/testando_composer/vendor/autoload.php';

require_once 'env.php';

// r($GLOBALS);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    
    <title>Document</title>

    <style type="text/css">

        @import url('https://fonts.googleapis.com/css?family=Montserrat');
        
        @media (min-width: 768px) {
            
            main {
                display: grid;
                grid-template-columns: 20% 1fr; 
                /*border: 1px solid #424242;*/
            }
            
        }
        
        body {
            margin: 0px;
            padding: 0px;
        }
        sidebar {
            padding: 10px;
            background: #FC235F;
            color: #FFFFFF; 
            font-family: 'Montserrat', sans-serif; 
            text-shadow: -.02em .02em #FC235F, -.09em .09em #000000;
        }
        sidebar a {
            color: #E0E1E5;
            text-decoration: none;
            text-transform: uppercase;
        }
        section {
            padding: 30px;
            background-color: snow;
        }
        hr {
            margin: 20px auto;
        }
        
        .resume {
            margin: 20px auto;
        }
    </style>

</head>

<body>
    
    <header>
        
    </header>
        
    <div class="container">
        
        <main>
            
            <sidebar>
                
                <div class="title" id="title">
                    <h1><a href="./">thierry rene matos</a><br>
                        <small>blog</small></h1>
                </div>
                
            </sidebar>
            
            <section>
                
                <?php for ($a = 1; $a < 10; $a++) : ?>
                
                    <h2><a href="">primeiro post</a></h2>
                
                    <span>Data: 00/00/0000</span> <span>by <a href="">thierry rene</a></span>
                
                    <div class="resume">Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                    sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                    magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                    quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                    ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                    dolor in hendrerit in vulputate velit esse molestie consequat,
                    vel illum dolore eu feugiat nulla facilisis at vero eros et
                    accumsan et iusto odio dignissim qui blandit praesent luptatum
                    zzril delenit augue duis dolore te feugait nulla facilisi.
                    Nam liber tempor cum soluta nobis eleifend option congue
                    nihil imperdiet doming id quod mazim placerat facer possim
                    assum. Typi non habent claritatem insitam; est usus legentis
                    in iis qui facit eorum claritatem. Investigationes
                    demonstraverunt lectores legere me lius quod ii legunt saepius.
                    Claritas est etiam processus dynamicus, qui sequitur mutationem
                    consuetudium lectorum. Mirum est notare quam littera gothica,
                    quam nunc putamus parum claram, anteposuerit litterarum formas
                    humanitatis per seacula quarta decima et quinta decima. Eodem
                    modo typi, qui nunc nobis videntur parum clari, fiant sollemnes
                    in futurum.</div>
                    
                    <a href="#">read more</a>
                
                    <hr>
                
                <?php endfor; ?>
            
            </section>
            
            <script type="text/javascript">
                var app = new Vue({
                  el: '#app',
                  data: {
                    message: 'Hello Vue!'
                  }
                })
            </script>
            
            <div id="app">
              {{ message }}
            </div>
            
                
        
        </main>
        
    </div>
    
    <footer>
        copys
    </footer>
        
    
</body>

</html>