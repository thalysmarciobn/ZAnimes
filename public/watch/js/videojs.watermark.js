console.log('watermark: Start');(function(){console.log('watermark: Init defaults');var defaults={file:'https://www.rpghost.com.br/img/versti-logo.png',xpos:0,ypos:0,xrepeat:0,opacity:100,clickable:false,url:"",className:'vjs-watermark',text:false,debug:false},extend=function(){var args,target,i,object,property;args=Array.prototype.slice.call(arguments);target=args.shift()||{};for(i in args){object=args[i];for(property in object){if(object.hasOwnProperty(property)){if(typeof object[property]==='object'){target[property]=extend(target[property],object[property]);}else{target[property]=object[property];}}}}
return target;};var div;videojs.plugin('watermark',function(settings){if(settings.debug)console.log('watermark: Register init');var options,player,video,img,link;options=extend(defaults,settings);player=this.el();video=this.el().getElementsByTagName('video')[0];if(!div){div=document.createElement('div');div.className=options.className;}
else{div.innerHTML='';}
if(options.text)
div.textContent=options.text;if(options.file){img=document.createElement('img');div.appendChild(img);img.src=options.file;}
if((options.ypos===0)&&(options.xpos===0))
{div.style.top="0";div.style.left="0";}
else if((options.ypos===0)&&(options.xpos===100))
{div.style.top="0";div.style.right="0";}
else if((options.ypos===100)&&(options.xpos===100))
{div.style.bottom="0";div.style.right="0";}
else if((options.ypos===100)&&(options.xpos===0))
{div.style.bottom="0";div.style.left="0";}
else if((options.ypos===50)&&(options.xpos===50))
{if(options.debug)console.log('watermark: player:'+player.width+'x'+player.height);if(options.debug)console.log('watermark: video:'+video.videoWidth+'x'+video.videoHeight);if(options.debug)console.log('watermark: image:'+img.width+'x'+img.height);div.style.top=(this.height()/2)+"px";div.style.left=(this.width()/2)+"px";}
div.style.opacity=options.opacity;if(options.clickable&&options.url!==""){link=document.createElement("a");link.href=options.url;link.target="_blank";link.appendChild(div);player.appendChild(link);}else{player.appendChild(div);}
if(options.debug)console.log('watermark: Register end');});})();