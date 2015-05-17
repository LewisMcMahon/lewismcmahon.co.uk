<?php 

	$allSections =  section::getAllSectionsOrdered();
	
	foreach($allSections as $section){			
		?>
			<div class="container_12 section">
				<a name="<?php print $section->getName();?>"></a>
	
				<div class="grid_12">
				
					<div class="padding">			
					
						<h2><?php print $section->getName();?></h2>
						
					</div>	
				
				</div>
				<?php foreach($section->getEntrys() as $entry){?>
					<div class="container_12">	
						<div class="grid_4">
							
								<div class="padding">			
									
									<h3><?php print $entry->getName(); ?></h3>
									
									<?php 
									
										if (count ($entry->getImages()) > 0){
											print $entry->gettext();										
										}
									
									
									?>
									
								</div>						
								
								
						</div>		
						
						<?php if (count($entry->getImages()) == 1){?>
						
							<div class="grid_8">
								<a data-lightbox="<?php print $entry->getName(); ?>" href="img/entryImages/<?php print $entry->getImages()[0];?>">
									<img  src="img/entryImages/<?php print $entry->getImages()[0];?>" />
								</a>
							</div>
						
						<?php }elseif (count($entry->getImages()) == 0){?>
							
							<div class="grid_8">
							
								<?php 
										
									print $entry->getText();
									
								?>
								
							</div>	
						
						<?php }else{
							
							?><div class="grid_8"><?php 
							
								$images = $entry->getImages();
								
								$i = 0;
								while (count($images) > $i){?>
								
										
										
										<div class="grid_4 alpha">
											<a data-lightbox="<?php print $entry->getName(); ?>" href="img/entryImages/<?php print $images[$i];?>">
												<img  src="img/entryImages/<?php print $images[$i];?>" />
											</a>
										</div>
									
										
										
										<?php 
												
											if (isset($images[$i+1])){
												?> 
													<div class="grid_4 omega">
														<a data-lightbox="<?php print $entry->getName(); ?>" href="img/entryImages/<?php print $images[$i+1];?>">
															<img  src="img/entryImages/<?php print $images[$i+1];?>" />
														</a>
													</div>
												<?php 
											}
										
										?>
										
								
								<?php  $i = $i+2; } ?>
							</div>
						<?php }?>
						
					</div>
					
				<?php }?>
			</div>
		<?
	}
?>