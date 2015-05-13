<?php 

	$allSections =  section::getAllSectionsOrdered();
	
	print "<pre>";
	print_r($allSections);
	print "</pre>";

	
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
						
						<div class="grid_8">
						
							<?php 
									
								if (count ($entry->getImages()) > 0){
									
									foreach ($entry->getImages() as $filename){
										?> 
											<a data-lightbox="<?php print $entry->getName(); ?>" href="img/<?php print $filename;?>">
												<img  src="img/<?php print $filename;?>" />
											</a>
										<?php 
									}
									
								}
								else{
									print $entry->gettext();
								}
							
							
							?>
							
						</div>
						
					</div>
					
				<?php }?>
			</div>
		<?
	}
?>
