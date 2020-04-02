<?php 
    if($_GET["idmenu"]){
        if($_GET["idsmenu"]){
            $direction=" ACCUEIL  <i class='fa fa-chevron-right fa-x'></i> ".$titleMenu." <i class='fa fa-chevron-right fa-x'></i> ".$titleSousmenu;
            $titrePage=$titleMenu; 
        }else{ 
           $direction=" ACCUEIL <i class='fa fa-chevron-right fa-x'></i>".$titleMenu;
           $titrePage=$titleMenu; 
        } 
    } 
?>
<section id="sp-page-title">
	<div class="row">
		<div id="sp-title" class="col-sm-12 col-md-12">
			<div class="sp-column ">
				<div class="sp-page-title" data-stellar-background-ratio="0.3">
					<div class="sp-page-title-inner ">
						<div class="container text-center">
							<h3> <?php echo $titleMenu; ?> </h3>
                            <p style="color: #6BA6A6;"><?php echo $direction; ?> </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
