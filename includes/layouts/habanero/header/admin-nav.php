






<?php

if($_SESSION['user'] == 'administrator'){

    echo '<div id="admin-nav">
        <div class="nav"><a href="/admin/cw_cms/?page=main-screen">Home</a></div>
		<div class="nav"><a href="/admin/cw_cms/?page=page-config">Edit/Create Pages</a></div>
		<div class="nav "><a href="/admin/cw_cms/?page=edit-content">Content Editor</a></div>
		<div class="nav "><a href="/admin/cw_cms/?page=menu-manager">Menu Manager</a></div>
		<div class="nav "><a href="/admin/cw_cms/?page=file-manger">F-Man</a></div>
		<div class="nav "><a href="/admin/cw_cms/?page=edit-blog">Blog</a></div>
		<div class="nav "><a href="/admin/cw_cms/?process&logout=true">Logout</a></div>
        <div class="last"></div>
    </div>';
	
}
elseif($_SESSION['user'] == 'betterpixels' || $_SESSION['user'] == 'test'){

    echo '<div id="admin-nav">
        <div class="nav"><a href="/admin/cw_cms/?page=main-screen">Home</a></div>
        <div class="nav"><a href="/admin/cw_cms/?page=page-config">Edit/Create Pages</a></div>
        <div class="nav "><a href="/admin/cw_cms/?page=edit-content">Content Editor</a></div>
        <div class="nav "><a href="/admin/cw_cms/?page=menu-manager">Menu Manager</a></div>
        <div class="nav "><a href="/admin/cw_cms/?process&logout=true">Logout</a></div>
        <div class="last"></div>
    </div>';
	
}
else{
    echo '<div id="admin-nav">
        <div class="nav"><a href="/admin/cw_cms/?page=main-screen">Home</a></div>
        <div class="nav "><a href="/admin/cw_cms/?page=menu-manager">Menu Manager</a></div>
        <div class="nav "><a href="/admin/cw_cms/?process&logout=true">Logout</a></div>
        <div class="last"></div>
    </div>';
	
}