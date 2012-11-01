
		
		
    <?php echo form_open('curl/afficher',array('method'=>'post','id'=>'formulaire'));
    
    $Churl=array('id'=>'ct','name'=>'liens');
    echo form_input($Churl);
    $Surl=array('id'=>'btnf','value'=>'ajouter');
    echo form_submit($Surl);
    echo form_close();
    ?>
    
		
	
<ul id="liensli">
	<?php foreach($liens as $lien):?>
		<li>
                       
			<a href="<?php echo $lien->url;?>" id="titreliens"> <?php echo $lien->title;?></a>
			<img src="<?php echo $lien->images;?>"/>
			<?php echo form_open('curl/supprimer',array('method'=>'post'));?>
			<p><?php echo $lien->meta;?></p>
			
			  <?php $idlien=array('id'=>'hid','type'=>'text','value'=> $lien->lien_id,'name'=>'id_lien');
				echo form_input($idlien);
				
			
			 $Surl=array('value'=>'supprimer');
    
			echo form_submit($Surl);
			 echo form_close();?>
			 
                         
                        
		</li>
	<?php endforeach;?>
	</ul>