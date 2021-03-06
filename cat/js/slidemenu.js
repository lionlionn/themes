﻿/*
Author : Audi
http://audi.tw
Date:Sep 2008, v0.2
歡迎應用於無償用途散播，並請勿移除本版權宣告
*/
var bVer=parseInt(navigator.appVersion);
var bName=navigator.appName.toLowerCase();
var _agent=navigator.userAgent.toLowerCase();

_slideMenu_ie6  	= (_agent.indexOf("msie 6.0") != -1);
_slideMenu_ie7  	= (_agent.indexOf("msie 7.0") != -1);

_slideMenu_isIE = (_slideMenu_ie6 || _slideMenu_ie7);

function slideMenu(id){
	this.id=id;
	this.menu=document.getElementById(id);
	this.submenu=this.menu.getElementsByTagName("span");
	this.submenus=document.getElementById("lion");
	
	this.speed=3;
	this.delay=30;
	this.onloadFuns=window.onload;
}

slideMenu.prototype.init=function(){
	//alert("init--->"+this.submenu.length);
	//alert(this.menu);
	
	var pointer=this, a, c;

	for(var i=0; i<this.submenu.length; i++) {
		eval('this.submenu['+i+'].'+this.handler+'=function(){pointer.collapseOther(this.parentNode);pointer.slide(this.parentNode);}');
	}

	if (this.autoexpand){
		window.onload=function(){
			if(pointer.onloadFuns!=null && typeof pointer.onloadFuns=='function') {
				pointer.onloadFuns();
			}
			pointer.highlight();
		}
    }
}

slideMenu.prototype.highlight=function(){
	var currentLink=(_slideMenu_isIE)?window.location.toString().toLowerCase():window.location.pathname.toString().toLowerCase();
	var alink=document.getElementById(this.id).getElementsByTagName('a');
	for (var i=0;i<alink.length;i++){
		var path=alink[i].getAttribute('href').toLowerCase();
		if (!/\//.test(path)){
			var currentLink=currentLink.substring(currentLink.lastIndexOf('/')+1,currentLink.length);
		}
		if (path==currentLink){
			alink[i].className=this.currentStyle;
			alink[i].parentNode.className=this.currentStyle;
			this.expandMenu(alink[i].parentNode.parentNode);
			break;
		}
	}
}


slideMenu.prototype.slide=function(submenu){
	var smenu=submenu.getElementsByTagName('ul')[0];
	//alert(smenu);
	if (typeof smenu=='undefined'){
		this.collapseOther();
	}else{
		if (smenu.className=='collapsed'){
			this.expandMenu(smenu);
		}
		if (smenu.className=='expand'){
			this.collapseMenu(smenu);
		}
	}
	
}

slideMenu.prototype.expandMenu=function(submenu){
	//alert("expandMenu");
	var cHeight=0;
	var cHeight_pre=cHeight;
	var li=submenu.getElementsByTagName("li");
	for (var i=0;i<li.length;i++){
		cHeight+=li[i].offsetHeight;
	}

	var slideBy=Math.round(this.speed*li.length);

	var pointer=this;
	var interval=setInterval(function() {
		var newHeight=submenu.offsetHeight+slideBy;
		if (newHeight<cHeight){
			submenu.style.height=newHeight+'px';
		}else {
			clearInterval(interval);
			submenu.style.height=cHeight+'px';
			submenu.className='expand';
			pointer.collapseOther(submenu);
		}
	}, pointer.delay);
}


slideMenu.prototype.collapseMenu=function(submenu){
	//alert("collapseMenu");
	var cHeight=0;
	var li=submenu.getElementsByTagName("li");
	
	//alert("submenu.style.height->"+submenu.style.height);
	var slideBy=Math.round(this.speed*li.length);	
	var tempNewHeight=submenu.offsetHeight-slideBy;
	
	if(parseInt(submenu.style.height) == parseInt(tempNewHeight)){
		//alert("2424");
		slideBy=6;
	}
	
	var delay=Math.max(Math.round(this.delay/li.length),1);

	var pointer=this;
	var interval=setInterval(function() {
		//alert("submenu.style.height->"+submenu.style.height);
		//alert("submenu.offsetHeight->"+submenu.offsetHeight+"--slideBy->"+slideBy);
		var newHeight=submenu.offsetHeight-slideBy;
			
		//alert("submenu.offsetHeight->"+submenu.offsetHeight+"--slideBy->"+slideBy);
		//alert("newHeight->"+newHeight+"--cHeight->"+cHeight);
		if (newHeight>cHeight){
			//alert("newHeight>cHeight");
			submenu.style.height=newHeight+'px';
		}else {
			//alert("else");
			clearInterval(interval);
			submenu.style.height=cHeight+'px';
			submenu.className='collapsed';
		}
	}, delay);
}

slideMenu.prototype.collapseOther=function(submenu){
	//alert("collapseOther");
	var smenu;
	for (var i=0;i< this.submenu.length;i++){
		smenu=this.submenu[i].parentNode.getElementsByTagName('ul')[0];

		if (typeof smenu!='undefined'){
			if (smenu!=submenu && smenu.className=='expand'){
				this.collapseMenu(smenu);
			}
		}
	}
}


function expandCurrentLink(){
	var currentLink=(_slideMenu_isIE)?window.location.toString().toLowerCase():window.location.pathname.toString().toLowerCase();
	var alink=document.getElementById(_slideMenu_ID).getElementsByTagName('a');
	for (var i=0;i<alink.length;i++){
		if (alink[i].getAttribute('href').toLowerCase()==currentLink){
			alink[i].parentNode.className='current';
			_slideMenu_ID.expandMenu(alink[i].parentNode.parentNode);
			break;
		}
	}
}

// JavaScript Document
function addEvent(obj, evType, fn){
	if (obj.addEventListener){
		obj.addEventListener(evType, fn, false);
		return true;
	} else if (obj.attachEvent){
		var r = obj.attachEvent("on"+evType, fn);
		return r;
	} else {
		return false;
	}
}
