<!--slider section start-->
<div class="hero-section section position-relative">
        <div class="hero-slider">
            <!--Hero Item start-->
            <img src="<?php echo site_url('assets/images/banner/fff.jpg'); ?>" class="slider-image">
            <!--Hero Item end-->
            <!--Hero Item start-->
            <img src="<?php echo site_url('assets/images/banner/fff2.jpg'); ?>" class="slider-image">
            <!--Hero Item end-->
        </div>
    </div>
    <!--slider section end-->
    
    <!--Featured section start-->
    <div class="featured-section section pb-95 pb-lg-75 pb-md-65 pb-sm-55 pb-xs-45 d-none">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-12">
                    <!--Featured Title Start-->
                    <div class="  text-center" style="margin: 5% 0;">
                        <h2><span class="color-blue" style="color: red;">ALL</span> GAMES</h2>
                    </div>
                    <!--Featured Title End-->
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="featured-slide">
                        
                        <?php foreach($all_games as $game): ?>
                        <div class="single-featured img-full">
                            <a href="<?php echo site_url('game-details/'.$game['slug']); ?>"><img src="<?php echo site_url('assets/images/game_featured_images/'.$game['featured_image']); ?>"></a>
                        </div>
                        <?php endforeach; ?>
                        
                    </div>
                </div>
            </div>
            <div class="text-center d-none" style="">
                <a href="#" style="text-decoration: underline; margin-top: 2%;">VIEW ALL GAMES</a>
            </div>
        </div>
    </div>
    <!--Featured section end-->

    <section class="featured-section section pb-95 pb-lg-75 pb-md-65 pb-sm-55 pb-xs-45">
    
        <div class="container">
            <!--Featured Title Start-->
            <div class="  text-center" style="margin: 5% 0;">
                <h2><span class="color-blue" style="color: red;">ALL</span> GAMES</h2>
            </div>
                    <!--Featured Title End-->
            <div class="row">
                                
                <?php foreach($all_games as $game): ?>
                    <div class="single-featured img-full col-lg-4 col-md-12 col-sm-12">
                        <a href="<?php echo site_url('game-details/'.$game['slug']); ?>"><img src="<?php echo site_url('assets/images/game_featured_images/'.$game['featured_image']); ?>">
                        <h2 class="game-title" style="margin: 10px 0;"><?php echo $game['title']; ?></h2>
                        </a>
                    </div>
                <?php endforeach; ?>
            
            </div>
        </div>
    
    </section>
    
    
    <!--New Game Area Start-->
    <div class="new-game-area section pb-50 pb-lg-30 pb-md-20 pb-sm-10 pb-xs-0 d-none">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--Section Title Start-->
                    <div class="section-title">
                        <h2><span class="color-blue">new</span> games</h2>
                    </div>
                    <!--Section Title End-->
                </div>
            </div>
            <div class="row game-slide">
                <div class="col-4">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="<?php echo site_url('assets/images/game/game1.jpg'); ?>" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">the elder scroll</a></h4>
                             
                        </div>
                    </div>
                    <!--Single Game End-->
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="<?php echo site_url('assets/images/game/game1.jpg'); ?>" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">the elder scroll</a></h4>
                             
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
                <div class="col-4">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="<?php echo site_url('assets/images/game/game1.jpg'); ?>" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">the elder scroll</a></h4>
                             
                        </div>
                    </div>
                    <!--Single Game End-->
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="<?php echo site_url('assets/images/game/game1.jpg'); ?>" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">the elder scroll</a></h4>
                             
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
                <div class="col-4">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="<?php echo site_url('assets/images/game/game1.jpg'); ?>" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">the elder scroll</a></h4>
                             
                        </div>
                    </div>
                    <!--Single Game End-->
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="<?php echo site_url('assets/images/game/game1.jpg'); ?>" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">the elder scroll</a></h4>
                             
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
                <div class="col-4">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="<?php echo site_url('assets/images/game/game1.jpg'); ?>" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">the elder scroll</a></h4>
                             
                        </div>
                    </div>
                    <!--Single Game End-->
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="<?php echo site_url('assets/images/game/game1.jpg'); ?>" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">the elder scroll</a></h4>
                             
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
                <div class="col-4">
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="<?php echo site_url('assets/images/game/game1.jpg'); ?>" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">the elder scroll</a></h4>
                             
                        </div>
                    </div>
                    <!--Single Game End-->
                    <!--Single Game Start-->
                    <div class="single-game mb-50">
                        <div class="game-img">
                            <a href="games-details.html"><img src="<?php echo site_url('assets/images/game/game1.jpg'); ?>" alt=""></a>
                        </div>
                        <div class="game-content">
                            <h4><a href="games-details.html">the elder scroll</a></h4>
                             
                        </div>
                    </div>
                    <!--Single Game End-->
                </div>
            </div>
        </div>
    </div>
    <!--New Game Area End-->
    
    <!--Video section start-->
    <div class="video-section section pb-135 pb-lg-115 pb-md-105 pb-sm-95 pb-xs-85 d-none">
        <div class="container-fluid p-0">
            <div class="container">
                <div class="section-title">
                    <h2><span class="color-blue">Games</span> review</h2>
                </div>
            </div>
            
            <div class="row no-gutters align-items-end">
                <div class="col-12">
                    <div class="video-slider-active">
                        <div class="single-video">
                            <div class="video-img video-img-2">
                                <img src="assets/images/video/video-front1.jpg" alt="">
                                <div class="video-content content-center">
                                <h3>The Magician 3</h3>
                                    <a class="video-popup" href="https://www.youtube.com/watch?v=BjiaMBk6rHk"><i class="icofont-play-alt-2"></i> view demo</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-video">
                            <div class="video-img video-img-2">
                                <img src="assets/images/video/video-front3.jpg" alt="">
                                <div class="video-content content-center">
                                <h3>The Magician 3</h3>
                                    <a class="video-popup" href="https://www.youtube.com/watch?v=BjiaMBk6rHk"><i class="icofont-play-alt-2"></i> view demo</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-video">
                            <div class="video-img video-img-2">
                                <img src="assets/images/video/video-front2.jpg" alt="">
                                <div class="video-content content-center">
                                <h3>The Magician 3</h3>
                                    <a class="video-popup" href="https://www.youtube.com/watch?v=BjiaMBk6rHk"><i class="icofont-play-alt-2"></i> view demo</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-video">
                            <div class="video-img video-img-2">
                                <img src="assets/images/video/video-front4.jpg" alt="">
                                <div class="video-content content-center">
                                <h3>The Magician 3</h3>
                                    <a class="video-popup" href="https://www.youtube.com/watch?v=BjiaMBk6rHk"><i class="icofont-play-alt-2"></i> view demo</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-video">
                            <div class="video-img video-img-2">
                                <img src="assets/images/video/video-front1.jpg" alt="">
                                <div class="video-content content-center">
                                <h3>The Magician 3</h3>
                                    <a class="video-popup" href="https://www.youtube.com/watch?v=BjiaMBk6rHk"><i class="icofont-play-alt-2"></i> view demo</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-video">
                            <div class="video-img video-img-2">
                                <img src="assets/images/video/video-front4.jpg" alt="">
                                <div class="video-content content-center">
                                <h3>The Magician 3</h3>
                                    <a class="video-popup" href="https://www.youtube.com/watch?v=BjiaMBk6rHk"><i class="icofont-play-alt-2"></i> view demo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Video section start-->
    
    