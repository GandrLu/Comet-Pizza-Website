<div class="startpage-greeter"><h4><i class="fas fa-star"></i> <span id="segment1">Außerirdischer Genuss! <i class="fas fa-star"></i></span> <span id="segment2">Comet Pizza in Erfurt eingeschlagen! <i class="fas fa-star"></i></span></h4></div>
<br>
<div class="startpage-container">
    <!-- Standard Bootstrap Carousel -->
    <div id="demo" class="carousel slide" data-ride="carousel">

        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
        </ul>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="<?=$_SERVER['SCRIPT_NAME']?>?p=produkt&id=2">
                    <img src="./assets/images/slide01.jpg" alt="Besuch Planet Salami">
                    <div class="carousel-caption">
                        <p>Besuch Planet Salami!</p>
                    </div>
                </a>
            </div>                
            <div class="carousel-item">
                <a href="<?=$_SERVER['SCRIPT_NAME']?>?p=Pizza">
                    <img src="./assets/images/slide02.jpg" alt="Galaktische Angebote">
                    <div class="carousel-caption">
                        <p>Galaktische Pizza Angebote</p>
                    </div>
                </a>
            </div>
        </div>
        
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

    <div class="startpage-info">
        <a class="startpage-element" href="<?=$_SERVER['SCRIPT_NAME']?>?p=jobs">
            <p>Jobs</p>
        </a>
        <a class="startpage-element" href="<?=$_SERVER['SCRIPT_NAME']?>?p=franchise">
            <p>Unser Franchise</p>
        </a>
    </div>
</div>

