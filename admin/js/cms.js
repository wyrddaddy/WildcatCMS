// JavaScript Document
var dataPrimary = {};
var dataSecondary = {};
var fileGrid = {};
var targetValue;
$(document).ready(function(){
	// **********************************
	// Event Listeners
	// **********************************
	//For page-config pages
	$('.configs').change(function(event){		
		configAction();
	 });
	// Changes the image if the layout is changed in the dropdown.
	// Should change to a table that highlights the cell you are working with (table looks like the image thats there now)
	$('#layout').change(function(event){
		$('#ref').attr("src", "/images/section-ref/" + $('#layout').val() + ".jpg");	 		
	});
	//For edit-content pages
	$('.content').change(function(event){		
		contentAction();
	 });
	 // For edit-blog pages
	 $('.blog').change(function(event){		
		blogAction();
	 });
	 // For menu-manager pages
	 $('.menu-manager').change(function(event){		
		menuManagerAction();
	 });
	
	//Cancel Button Reset
	$('#cancel').click(function(event){
		if ($('#cancel').hasClass('config') ){
			configAction();
		}
		if ($('#cancel').hasClass('content') ){
			contentAction();
		}
	});
	$("#loader-bar").bind("ajaxSend", function() {
			$('#folder-grid').hide();
            $(this).show();
        }).bind("ajaxComplete", function() {
            $(this).hide();
			$('#folder-grid').show();
        });


	$(document).delegate('.folder-nav', 'click', function(){
		
		if($(this).parent().hasClass('closed')){
			itemClass = 'closed';
		}
		if($(this).parent().hasClass('open')){
			itemClass = 'open';
		}
		
		if(itemClass == 'closed'){
			$(this).parent().removeClass('closed').addClass('open').children('ul').removeClass('closed').addClass('open');
		}
		if(itemClass == 'open'){
			$(this).parent().removeClass('open').addClass('closed').children('ul').removeClass('open').addClass('closed');
		}
		
		if($(this).parent().hasClass('file') || $(this).hasClass('file')){
			$('#folder-grid').hide();
			clickedObj = $(this).attr('id');
			$("#file-results").empty();
			$("#file-preview").empty();
			if(dataPrimary[clickedObj]['fileType'] == 'img'){
				$("#file-preview").append('<img src="' + dataPrimary[clickedObj]['url'] + '" alt="preview of image" style="max-width:100%" />');
			}
			$.each(dataPrimary[clickedObj], function(key, value){
				$("#file-results").append('<tr><td><strong>' + key + '</storng></td><td>' + value + '</td></tr>');
				
			});
			$('#file-grid').show();
		}
		if($(this).parent().hasClass('dir') || $(this).hasClass('dir')){
			$('#file-grid').hide();
			clickedObj = $(this).attr('id');
			clickedItem = dataPrimary[clickedObj]['url'];	
			$('#folder-name').html(clickedItem);
			$("#folder-results").empty();
			rawData = $.getJSON('http://creativewildcat.com/admin/adminData.php?call=filelist&dir=' + clickedItem, function(data){
				$.each(data, function() {
                    $("#folder-results").append('<tr><td id="' + this.id.substr(1) + '" class="false-href folder-nav ' + this.type + '">' + this.name + '</td><td>' + this.type + '</td><td>' + this.modified + '</td><td>' + this.size + '</td><td><input type="checkbox" value="' + this.id + '" /></td></tr>');
                });
			});
			
		}
	});
});
function configAction(){
	targetValue = parseInt($('[name=data-set]:checked').val());
	$('#uri').val(dataPrimary[targetValue][0]);
	$('#name').val(dataPrimary[targetValue][1]);
	$('#description').text(dataPrimary[targetValue][2]);
	$('#layout').val(dataPrimary[targetValue][5]);
	$('#ref').attr("src", "/images/section-ref/" + dataPrimary[targetValue][5] + ".jpg");
	$('#section1').val(dataPrimary[targetValue][6]);
	$('#section2').val(dataPrimary[targetValue][7]);
	$('#section3').val(dataPrimary[targetValue][8]);
	$('#section4').val(dataPrimary[targetValue][9]);
	$('#section5').val(dataPrimary[targetValue][10]);
	$('#section6').val(dataPrimary[targetValue][14]);
	$('#section7').val(dataPrimary[targetValue][15]);
	$('#section8').val(dataPrimary[targetValue][16]);
	$('#crumb').val(dataPrimary[targetValue][12]);
	updateInsert();	
}
function blogAction(){
	targetValue = parseInt($('#blog').val());
	$('#id').val(dataPrimary[targetValue][0]);
	$('#date').val(dataPrimary[targetValue][1]);
	$('#title').val(dataPrimary[targetValue][2]);
	$('#description').val(dataPrimary[targetValue][3]);
	$('#text-editor').val(dataPrimary[targetValue][4]);
	$('#imagename').val(dataPrimary[targetValue][5]);
	$('#topic').val(dataPrimary[targetValue][6]);
	uploadImagePreview(dataPrimary[targetValue][5], 'blog');
	updateInsert();	
}
function menuManagerAction(){
	targetValue = parseInt($('#item').val());
	$('#id').val(dataPrimary[targetValue][0]);
	$('#name').val(dataPrimary[targetValue][1]);
	$('#description').val(dataPrimary[targetValue][2]);
	$('#price').val(dataPrimary[targetValue][3]);
	$('#category').val(dataPrimary[targetValue][5]);
	$('#imagename').val(dataPrimary[targetValue][4]);
	uploadImagePreview(dataPrimary[targetValue][4], 'menu-manager');
	updateInsert();	
}
function contentAction(){
	targetValue = parseInt($('#content').val());
	$('#text-editor').val(dataPrimary[targetValue][1].replace(/{SCRIPT}/g, 'script'))
	//startEditor(dataPrimary[targetValue][1].replace(/{SCRIPT}/g, 'script'));	
	$('#description').val(dataPrimary[targetValue][2]);
	updateInsert();	
}
function uploadImagePreview(img, type){
	if(img != null && img != ''){		
		$('#imagethumb').empty().append('<br />Preview Existing Image:<br /><img src="/images/' + type + '/thumbs/' + img + '" alt="Uploaded Image Preview" /><br />Upload New Image:');
	}
	else{
		$('#imagethumb').empty();
	}
}
function updateInsert(val){
	if(dataPrimary[targetValue][0] != ''){
			$('#stage').val('update');
		}
		else {
			$('#stage').val('insert');
		}
}
function startEditor(content){
	//startRTE(content);
}