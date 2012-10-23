<?php
Cwcms::loadClass('Model_Admin');
 Cwcms::loadClass('Utilities_File');

/* 
************************************************************************************
View_Plugin_CmsForms Class
    Description:
		The Form Handler for all of the pages in the Content Management System
	Author: Ryan Erb / Creative Wildcat
	Version: 1.0
	Date: 8/2011
	
	Methods:
		View_Plugin_CmsForms() - Checks for process get query being set if so, calls createEventListeners()
		createEventListeners() - Checks Page Name and calls page handlers method
		editContent() - handles the Edit Content Page
		pageConfigs() - handles the Page Configs Page
		userLogout() - handles user logout
		userLogin($name, $pass) - handles the Login Page
************************************************************************************
*/ 
class Controller_Plugin_CmsForms{

	function Controller_Plugin_CmsForms(){
		if(isset($_GET['process'])){
			$this->createEventListeners();	
		}
	}

	function createEventListeners(){
		if($_GET['page'] == 'login'){
			$this->userLogin($_POST['user'], md5($_POST['pass']));		
		}
		if($_GET['logout'] == 'true'){
			$this->userLogout();
		}
		if($_GET['page'] == 'page-config'){
			$this->pageConfigs();		
		}
		if($_GET['page'] == 'edit-content'){
			$this->editContent();		
		}
		if($_GET['page'] == 'edit-blog'){
			$this->editBlog();		
		}
		if($_GET['page'] == 'menu-manager'){
			$this->editMenuManager();		
		}
	}
	
	function editContent(){
		$model = new Model_Admin;
		if($_POST['stage'] == 'insert'){
			$model->insertContent($_POST['description'], $_POST['txtBody']);
		}
		if($_POST['stage'] == 'update'){ 
			$model->updateContent($_POST['content'],$_POST['description'], $_POST['txtBody']);
		}
		header('Location: ?page=edit-content');
	}
	
	function editBlog(){
		$model = new Model_Admin;
		if(!empty($_FILES['imageUpload']['tmp_name'])){
			$imgname = 'img_' . date('Y-m-d', time()) . '_' . rand(1, 100) . '.jpg';
			Controller::loadClass('Utilities_SimpleImage');
		    $simpleimage = new Utilities_SimpleImage();
     		$simpleimage->load($_FILES['imageUpload']['tmp_name']);
     		$simpleimage->resizeToWidth(BLOG_IMG_LG_SZ);
     		$simpleimage->save(SERVER_ROOT . 'images/blog/full/' . $imgname);
     		$simpleimage->resizeToWidth(BLOG_IMG_SM_SZ);
     		$simpleimage->save(SERVER_ROOT . 'images/blog/thumbs/' . $imgname);
		}else{$imgname = $_POST['imagename'];}
		if($_POST['stage'] == 'insert'){
			$model->insertBlogPost($_POST['date'], $_POST['title'], $_POST['description'], $_POST['txtBody'], $imgname, $_POST['topic']);
		}
		if($_POST['stage'] == 'update'){ 
			$model->updateBlogPost($_POST['id'], $_POST['title'], $_POST['description'], $_POST['txtBody'], $imgname, $_POST['topic']);
		}
		header('Location: ?page=edit-blog');
	}
	
	function editMenuManager(){
		$model = new Model_Admin;
		if(!empty($_FILES['imageUpload']['tmp_name'])){
			$imgname = 'img_' . preg_replace( '/\s+/', '', $_POST['name'] ) . '_' . rand(1, 100) . '.jpg';
			Controller::loadClass('Utilities_SimpleImage');
		    $simpleimage = new Utilities_SimpleImage();
     		$simpleimage->load($_FILES['imageUpload']['tmp_name']);
     		$simpleimage->resizeToWidth(MENU_IMG_LG_SZ);
     		$simpleimage->save(SERVER_ROOT . 'images/menu-manager/full/' . $imgname);
     		$simpleimage->resizeToWidth(MENU_IMG_SM_SZ);
     		$simpleimage->save(SERVER_ROOT . 'images/menu-manager/thumbs/' . $imgname);
		}else{$imgname = $_POST['imagename'];}
		if($_POST['stage'] == 'insert'){
			$model->insertMenuManager($_POST['name'], $_POST['description'], $_POST['price'], $imgname, $_POST['category']);
		}
		if($_POST['stage'] == 'update'){ 
			$model->updateMenuManager($_POST['item'], $_POST['name'], $_POST['description'], $_POST['price'], $imgname, $_POST['category']);
		}
		header('Location: ?page=menu-manager');
	}
	
	
	function pageConfigs(){
		$model = new Model_Admin;
		if($_POST['stage'] == 'insert'){
			$model->insertConfigs($_POST['uri'], $_POST['name'], $_POST['description'], $_POST['layout'], $_POST['section1'], $_POST['section2'], $_POST['section3'], $_POST['section4'], $_POST['section5'], $_POST['crumb'], $_POST['section6'],$_POST['section7'],$_POST['section8']);

			if(!is_file($_POST['uri'] . 'index.php')){
				$subUrlBuilder = '';
				$dirSplit = explode('/', $_POST['uri']);
				$fileObject = new Utilities_File;
				$fileObject->buildBootStrapUrlAndFile($_POST['uri']);
			}

		}
		// $uri, $name, $description, $layout, $section1, $section2, $section3, $section4, $section5
		if($_POST['stage'] == 'update'){ 
			$model->updateConfigs($_POST['uri'], $_POST['name'], $_POST['description'], $_POST['layout'], $_POST['section1'], $_POST['section2'], $_POST['section3'], $_POST['section4'], $_POST['section5'], $_POST['crumb'], $_POST['section6'], $_POST['section7'], $_POST['section8']);
		}
		header('Location: ?page=page-config');
	}
	
	function userLogout(){
		session_destroy();	
		header('Location: ' . AFTER_LOGIN . '');	
	}
	
	function userLogin($name, $pass){
		$model = new Model_Admin;
		$login = $model->checkUser($name, $pass);	
		//echo($login);	
		if($login == 1){
			$_SESSION['valid'] = 'true';
			$_SESSION['user'] = $name;
			$_SESSION['pass'] = $pass;
		 	 header('Location: ' . AFTER_LOGIN . '');
		}
		
	}


}