<section id="about">

	<div class="container">

		<div class="row">

			<article>

				<div class="col-md-12 text-center">

					<p class="lead">Hello!</p>

					<p class="lead">My name is <strong>Thierry Rene</strong>.
						<br>I'm a web developer, from <strong>São Paulo - SP</strong>.</p>

				</div>


				<!--<div class="col-md-4 text-justify">-->

				<!--  <p>Trabalho com TI a quase 10 anos e desde 2009 atuo com desenvolvimento web, quando percebi que a área seria engolida pelo universo online.</p>-->
				<!--  <p>Hoje atuo em desenvolvimento de projetos web profissionais, e me mantenho atualizado na área para sempre oferecer a melhor solução.</p>-->

				<!--</div>-->

				<!--<div class="col-md-4 text-justify">-->
				<!--  <p>Tenho alguns projetos paralelos que trato com muito carinho, um deles é o blog <a href="//websocialdev.com"><strong>Web Social Dev</strong></a>, onde compartilho tudo que aprendo em relação a desenvolvimento web e marketing digital. E o <strong>Expurgando Devaneios</strong>,-->
				<!--    onde me expresso livremente sobre qualquer assunto.</p>-->
				<!--  <p>Recentemente comecei a traduzir posts para os blog da Envato, <strong><a href="//webdesign.tutsplus.com">Webdesigntuts+</a></strong> e <strong><a href="//code.tutsplus.com">Nettuts+</a></strong>.</p>-->
				<!--</div>-->

				<!--<div class="col-md-4 text-justify">-->
				<!--  <p>Além disso tento manter a participação ativa em comunidades de desenvolvimento como <a href="//github.com/thierryrene"><strong>GitHub</strong></a>, StackOverflow, Bitbucket ou qualquer outra rede onde possam surgir discussões interessantes.</p>-->
				<!--  <p>Também bato carteirinha em eventos de tecnologia e desenvolvimento web.</p>-->
				<!--</div>-->

				<div class="col-md-4 text-justify">
					<p>my name is <a target="_blank" href="//thierryrenewebdev.com" style="text-decoration:none;"><b>thierry rene</b></a>, and I work with IT solutions for almost 10 years. Most of the time, I acted as a support analyst, but since 2009 I started working
						with webdevelopment in freelance projects.</p>
				</div>
				<div class="col-md-4 text-justify">
					<p>I'm currently studying IT management in anhembi morumbi with full scholarship PROUNI. Previously I studied information systems, giving up because of the curriculum of thecourse grade.</p>
				</div>
				<div class="col-md-4 text-justify">
					<p>I made two technicians in Senac, all with full scholarship, computer technician and technical development of web applications.</p>
					<!--<p>I have a <a href="//websocialdev.com" target="_blank" class="hvr-underline-fro-left"><b>blog</b></a> where i share everything i know about web development.</p>-->
				</div>

			</article>

		</div>


		
		<?php if ($lastFmStatus['status'] == 0) : ?>
		
			<hr>
			
			<div class="row">
				
				<div class="col-md-12 text-center">
					<p class="lead">More information</p>
				</div>
				
				<div class="col-md-12 text-center">
					<p class="lead">Music Habits <small>(from Last.fm API)</small></p>
					<p>Recent Tracks</p>
					<br>
				</div>
				
				<style type="text/css">
				  	.swiper-container {
				      width: 100%;
				      height: 200px;
				    }
				    .swiper-wrapper{
				    	-webkit-transition-timing-function:linear!important;
						-o-transition-timing-function:linear!important;
						transition-timing-function:linear!important;
					}
				    .swiper-slide {
				      text-align: center;
				      font-size: 18px;
				      width: 180px !important;
				      height: 180px !important;
				      background-size: cover;
				      display: flex;
				      justify-content: center;
				      align-items: center;
				    }
				  </style>
			
				<div class="col-md-12">
					<div class="swiper-container">
						<div class="swiper-wrapper">

							<?php
						
								$tracks = getLastFmSongs(20);
								
								$imgSize = '200px';
								foreach($tracks as $key => $data) : 

							?>
							
								<div class="swiper-slide" style="background:url(<?php echo $data['image'][3]['#text']; ?>); background-size: cover;">
									
									<div style="width: 100%;
											    position: absolute;
											    padding: 5px 0px;
											    bottom: 0%;
											    background-color: #00000042;
											    font-weight: bold;
											    
									">
										<p style="z-index: 9999;color: white; text-shadow: -5px 5px 10px #333333;"><?php echo $data['artist']['#text']; ?></p>
										<p><a style="-index: 9999; color: white; text-shadow: -5px 5px 10px #333333;" class='music-link' href='<?php echo $data['url']; ?>' target='_blank'><?php echo $data['name']; ?></a></p>
									</div>

								</div>

							<?php endforeach; ?>
							
						</div>
						<div class="swiper-pagination"></div>
					</div>

					<script>
					    var swiper = new Swiper('.swiper-container', {
					      slidesPerView: 6,
					      spaceBetween: 10,
					      loop: true,
					      mousewheel: true,
					      loopFillGroupWithBlank: true,
					      freeMode: true,
					      // effect: 'coverflow',
					      grabCursor: true,
					      centeredSlides: true,
					      slidesPerView: 'auto',
					      speed: 6000,
					      // coverflowEffect: {
					      //   rotate: 50,
					      //   stretch: 0,
					      //   depth: 100,
					      //   modifier: 1,
					      //   slideShadows : true,
					      // },
					      autoplay: {
						    delay: 1,
						  },
					      navigation: {
					        nextEl: '.swiper-button-next',
					        prevEl: '.swiper-button-prev',
					      },
					    });
					  </script>

				  
				
				</div>

				
				
				<style type="text/css">
					.flex-container {
						display: grid;
						
					}
				</style>
				
				<?php
					
					$photos = getInsta(5);
					
					foreach($photos as $photo) {
						
					    echo "<div class='flex-container'>";
					    
					    	echo "<div class='well'><img class='img-responsive' src='{$photo['url']}'></div>";
					        
					    echo "</div>";    
					}
				?>
				
			</div>
		
		<?php endif; ?>

	</div>
		
		

</section>

<section>



		</section>

