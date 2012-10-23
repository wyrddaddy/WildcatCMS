<?php
Cwdc::loadClass('Model_Front');
class View_Plugin_Crumbs {

	var $crumbs;
	var $segments;

	function View_Plugin_Crumbs($uri){
		$this->processSegments($uri);
	}
	
	function processSegments($uri){
		$tempSegments = explode('/', $uri);
		foreach($tempSegments as $path){
			if($path == '' || $path == NULL){			
			}
			else {
				$this->segments[] = $path; 
			}
		}
		if(empty($this->segments) ){
		}
		else{
			$this->buildCrumbs();
		}
		//print_r($this->segments);
	}
	function buildCrumbs(){
		$builder = HOME_URL;
		$this->crumbs = '<div id="crumbs">';
		$crumb = $this->getCrumbInfo($builder);
		$this->crumbs .= '<a href="' . $builder . '">' . $crumb . '</a>';
		foreach($this->segments as $name){
			$builder .= $name . '/';
			$crumb = $this->getCrumbInfo($builder);
			if (end($this->segments) == $name){
				$this->crumbs .= ' &gt; ' . $crumb . '</div>';
			}
			else{
				$this->crumbs .= ' &gt; <a href="' . $builder . '"> ' . $crumb . '</a>';
			}
		}
	}
	
	function getCrumbInfo($uri){
		$model = new Model_Front;
		return $model->getCrumbs($uri);
	}


}