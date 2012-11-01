
	
              
       
                
        
	
    <?php echo form_open('curl/ajouter',array('method'=>'post','id'=>'ajoutform'));
  
    
    $Churl=array('type'=>'text','value'=>$url,'name'=>'url');
    echo form_input($Churl);
    $Cl=array('type'=>'text','value'=>$titre,'name'=>'tr');
    echo form_input($Cl);
    $ta=array('value'=>$description,'name'=>'des');
    echo form_input($ta);?>
      <div id="check">
     <?php foreach($images as $image):?>
            
              <input type="checkbox"/>
		<img src="<?php echo $image ?>" name="img" />
	     
	 <?php endforeach ;?>
	  </div>
   <?php $Surl=array('value'=>'ajouter');
    
    echo form_submit($Surl);
    echo form_close();
    ?>