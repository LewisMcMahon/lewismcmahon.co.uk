<div id="sidebar">
    
    <?php 
    	foreach ($allSections as $section){
    		
    		?> <a class="head" href="<?php print '#'.$section->getName(); ?>"><?php print $section->getName(); ?></a> <?php 
    		
    	}    
    
    ?>
    		 		
</div>