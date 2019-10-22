<?php
   /*
   Plugin Name: Test Plugin
   Plugin URI: 
   description: This plugin create for testing task
   Version: 1.2
   Author: Mr. Rk
   Author URI: http://rakeshvadhel.com
   License: GPL2
   */
class TestPlugin {
    public function __construct()
    {
        add_shortcode('TestPluginShortcode', array($this, 'TestPluginShortcode'));
    }
     
    public function TestPluginShortcode()
    {
		date_default_timezone_set('Asia/Kolkata');
		$time_set = "";
		
		$currentTime = date("H");
		if($currentTime <= 6){
			 $time_set = "#dcaab3";
		}
		elseif($currentTime <= 12){
			 $time_set = "#ffd700";
		}
		elseif($currentTime <= 18){
			$time_set = "#de8753";
		}
		else{
			$time_set =  "#000";
		}
		$t = date("H:i");
		return "<h1 data_hours='$currentTime' style='color:$time_set'>Hello World!</h1>";
    }
}
 
$TestPlugin = new TestPlugin();
?>
