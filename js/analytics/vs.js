// JavaScript Document
var vs = {};
var query = '';
$(document).ready(function(){
	query = '?';
	$('body').delegate('a', 'click', function(){
		buildQueryString();
		appendString($(this));
	});						   
});

function buildQueryString(){
	for (i in vs){
		for (j in vs[i]){
			if(vs[i][j] != '' || vs[i][j] != null){
				
				// removes filename so its only folder based url
				filenameTest = vs[i][j].indexOf('index.php')
				if(filenameTest != -1){
					vs[i][j] = vs[i][j].substring(0, filenameTest);
				}
				
				// Builds Query String to add to href of hovered element
				query += j + '=' + vs[i][j] + '&';
			}
		}
	}
	query += 'vs=1';
	
}

function getItemValue(element ,type){
	eid = $(element).attr('id');
	name = $(element).attr('name');
	title = $(element).attr('title');
	clas = $(element).attr('class');
	
	if(eid != undefined){
		query += '&id=' + encodeURIComponent(eid);
	}
	if(name != undefined){
		query += '&name=' + encodeURIComponent(name);
	}
	if(title != undefined){
		query += '&title=' + encodeURIComponent(title);
	}
	if(clas != undefined){
		query += '&class=' + encodeURIComponent(clas);
	}
	
	if(type == 'text'){	
		text = $(element).text();
		query += '&actual=' + encodeURIComponent(text);
	}
	if(type == 'image'){		
		altTxt = encodeURIComponent($(element).children('img').attr('alt'));
		query += '&actual=' + altTxt;
	}	
}

function dynamicQueryOptions(element){
	var found = $(element).find("img");
	if (found.length == 0) {
		query += '&type=text';
		getItemValue(element, 'text');
	}	
	else{
		query += '&type=image';
		getItemValue(element, 'image');
	}
}

function appendString(element){	
	dynamicQueryOptions(element);
	qString = element.attr("href") + query;
	element.attr("href", qString);	
}