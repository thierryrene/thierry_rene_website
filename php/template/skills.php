<section id="skills">

	<div class="container">

		<div class="row">

			<center>

				<div class="col-sm-4 col-md-4 col-lg-4">
					<span>
		              <i class="fa fa-desktop fa-5x"></i>         
		              <h3>Design</h3>
		            </span>
				</div>

				<div class="col-sm-4 col-md-4 col-lg-4">
					<span>
		              <i class="fa fa-thumbs-o-up fa-5x"></i>
		              <h3>UI & UX</h3>
		            </span>
				</div>

				<div class="col-sm-4 col-md-4 col-lg-4">
					<span>
		              <i class="fa fa-code fa-5x"></i>
		              <h3>Code</h3>
		            </span>
				</div>

			</center>

		</div>

	</div>

</section>

<!-- <section id="">
		
		<div class="row">
			
			<?php
	
				$lasfmApiKey = "2f6af24843eea696c30ffcb0bb425bde";
				$secret = "2dd6c019e21201dfac20a227bb66131f";
				
				$url = "http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=thiiiii&api_key=2f6af24843eea696c30ffcb0bb425bde&format=json&limit=6";
				
				$result = file_get_contents($url);
				
				$json = json_decode($result, true);
				
				$tracks = $json['recenttracks']['track'];
				
				foreach($tracks as $data) {
				    echo "<div class='col-md-2 col-xs-6 text-center'>";
				    
				    	echo "<div class='well'><img class='img-responsive' style='border:solid 1px #424242;' src='{$data['image'][2]['#text']}'></div>";
				        echo "<p>" . $data['name'] . '</p>';
				        echo "<p>" . $data['artist']['#text'] . "</p>";
				        
				    echo "</div>";    
				}
			
			?>
			
			
		</div>
		
</section> -->