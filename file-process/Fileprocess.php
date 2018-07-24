<?php
Class Fileprocess{
                $path = $_SERVER['DOCUMENT_ROOT'];   
	function getThemeDirectory(){                         
		return this->$path ."/wp-content/themes";
	}
	function getPluginDirectory(){              
		return this->$path."/wp-content/plugins";
	}
	function rename($directroy, $old_name,$new_name){
		//rename plugin name/theme name with "_"
		// woo_theme to be woo_theme_  
        rename($directroy."/".$old_name,$directroy."/".$new_name);
	}

	function index(){
		return 'Hello test';
	}

	function form($submitData){
	//print_r($submitData); 
        $this->rename($this->getThemeDirectory(),$submitData['oldfoldername'],$submitData['newfoldername']);		
        $this->rename($this->getPluginDirectory(),$submitData['oldfoldername'],$submitData['newfoldername']);
	}


}