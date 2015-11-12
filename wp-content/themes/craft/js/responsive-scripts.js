/*! Responsive JS Library v1.1.0 */
/*! matchMedia() polyfill - Test a CSS media type/query in JS. Authors & copyright (c) 2012: Scott Jehl, Paul Irish, Nicholas Zakas. Dual MIT/BSD license */
/*! NOTE: If you're already including a window.matchMedia polyfill via Modernizr or otherwise, you don't need this part */
window.matchMedia=window.matchMedia||(function(doc,undefined){var bool,docElem=doc.documentElement,refNode=docElem.firstElementChild||docElem.firstChild,fakeBody=doc.createElement("body"),div=doc.createElement("div");div.id="mq-test-1";div.style.cssText="position:absolute;top:-100em";fakeBody.style.background="none";fakeBody.appendChild(div);return function(q){div.innerHTML='&shy;<style media="'+q+'"> #mq-test-1 { width: 42px; }</style>';docElem.insertBefore(fakeBody,refNode);bool=div.offsetWidth==42;docElem.removeChild(fakeBody);return{matches:bool,media:q}}})(document);
/*! Respond.js v1.1.0: min/max-width media query polyfill. (c) Scott Jehl. MIT/GPLv2 Lic. j.mp/respondjs  */
(function(win){win.respond={};respond.update=function(){};respond.mediaQueriesSupported=win.matchMedia&&win.matchMedia("only all").matches;if(respond.mediaQueriesSupported){return}var doc=win.document,docElem=doc.documentElement,mediastyles=[],rules=[],appendedEls=[],parsedSheets={},resizeThrottle=30,head=doc.getElementsByTagName("head")[0]||docElem,base=doc.getElementsByTagName("base")[0],links=head.getElementsByTagName("link"),requestQueue=[],ripCSS=function(){var sheets=links,sl=sheets.length,i=0,sheet,href,media,isCSS;for(;i<sl;i++){sheet=sheets[i],href=sheet.href,media=sheet.media,isCSS=sheet.rel&&sheet.rel.toLowerCase()==="stylesheet";if(!!href&&isCSS&&!parsedSheets[href]){if(sheet.styleSheet&&sheet.styleSheet.rawCssText){translate(sheet.styleSheet.rawCssText,href,media);parsedSheets[href]=true}else{if((!/^([a-zA-Z:]*\/\/)/.test(href)&&!base)||href.replace(RegExp.$1,"").split("/")[0]===win.location.host){requestQueue.push({href:href,media:media})}}}}makeRequests()},makeRequests=function(){if(requestQueue.length){var thisRequest=requestQueue.shift();ajax(thisRequest.href,function(styles){translate(styles,thisRequest.href,thisRequest.media);parsedSheets[thisRequest.href]=true;makeRequests()})}},translate=function(styles,href,media){var qs=styles.match(/@media[^\{]+\{([^\{\}]*\{[^\}\{]*\})+/gi),ql=qs&&qs.length||0,href=href.substring(0,href.lastIndexOf("/")),repUrls=function(css){return css.replace(/(url\()['"]?([^\/\)'"][^:\)'"]+)['"]?(\))/g,"$1"+href+"$2$3")},useMedia=!ql&&media,i=0,j,fullq,thisq,eachq,eql;if(href.length){href+="/"}if(useMedia){ql=1}for(;i<ql;i++){j=0;if(useMedia){fullq=media;rules.push(repUrls(styles))}else{fullq=qs[i].match(/@media *([^\{]+)\{([\S\s]+?)$/)&&RegExp.$1;rules.push(RegExp.$2&&repUrls(RegExp.$2))}eachq=fullq.split(",");eql=eachq.length;for(;j<eql;j++){thisq=eachq[j];mediastyles.push({media:thisq.split("(")[0].match(/(only\s+)?([a-zA-Z]+)\s?/)&&RegExp.$2||"all",rules:rules.length-1,hasquery:thisq.indexOf("(")>-1,minw:thisq.match(/\(min\-width:[\s]*([\s]*[0-9\.]+)(px|em)[\s]*\)/)&&parseFloat(RegExp.$1)+(RegExp.$2||""),maxw:thisq.match(/\(max\-width:[\s]*([\s]*[0-9\.]+)(px|em)[\s]*\)/)&&parseFloat(RegExp.$1)+(RegExp.$2||"")})}}applyMedia()},lastCall,resizeDefer,getEmValue=function(){var ret,div=doc.createElement("div"),body=doc.body,fakeUsed=false;div.style.cssText="position:absolute;font-size:1em;width:1em";if(!body){body=fakeUsed=doc.createElement("body");body.style.background="none"}body.appendChild(div);docElem.insertBefore(body,docElem.firstChild);ret=div.offsetWidth;if(fakeUsed){docElem.removeChild(body)}else{body.removeChild(div)}ret=eminpx=parseFloat(ret);return ret},eminpx,applyMedia=function(fromResize){var name="clientWidth",docElemProp=docElem[name],currWidth=doc.compatMode==="CSS1Compat"&&docElemProp||doc.body[name]||docElemProp,styleBlocks={},lastLink=links[links.length-1],now=(new Date()).getTime();if(fromResize&&lastCall&&now-lastCall<resizeThrottle){clearTimeout(resizeDefer);resizeDefer=setTimeout(applyMedia,resizeThrottle);return}else{lastCall=now}for(var i in mediastyles){var thisstyle=mediastyles[i],min=thisstyle.minw,max=thisstyle.maxw,minnull=min===null,maxnull=max===null,em="em";if(!!min){min=parseFloat(min)*(min.indexOf(em)>-1?(eminpx||getEmValue()):1)}if(!!max){max=parseFloat(max)*(max.indexOf(em)>-1?(eminpx||getEmValue()):1)}if(!thisstyle.hasquery||(!minnull||!maxnull)&&(minnull||currWidth>=min)&&(maxnull||currWidth<=max)){if(!styleBlocks[thisstyle.media]){styleBlocks[thisstyle.media]=[]}styleBlocks[thisstyle.media].push(rules[thisstyle.rules])}}for(var i in appendedEls){if(appendedEls[i]&&appendedEls[i].parentNode===head){head.removeChild(appendedEls[i])}}for(var i in styleBlocks){var ss=doc.createElement("style"),css=styleBlocks[i].join("\n");ss.type="text/css";ss.media=i;head.insertBefore(ss,lastLink.nextSibling);if(ss.styleSheet){ss.styleSheet.cssText=css}else{ss.appendChild(doc.createTextNode(css))}appendedEls.push(ss)}},ajax=function(url,callback){var req=xmlHttp();if(!req){return}req.open("GET",url,true);req.onreadystatechange=function(){if(req.readyState!=4||req.status!=200&&req.status!=304){return}callback(req.responseText)};if(req.readyState==4){return}req.send(null)},xmlHttp=(function(){var xmlhttpmethod=false;try{xmlhttpmethod=new XMLHttpRequest()}catch(e){xmlhttpmethod=new ActiveXObject("Microsoft.XMLHTTP")}return function(){return xmlhttpmethod}})();ripCSS();respond.update=ripCSS;function callMedia(){applyMedia(true)}if(win.addEventListener){win.addEventListener("resize",callMedia,false)}else{if(win.attachEvent){win.attachEvent("onresize",callMedia)}}})(this);if(jQuery.browser.msie&&jQuery.browser.version<=6){jQuery('<div class="msie-box"><a href="http://browsehappy.com/" title="Click here to update" target="_blank">  Your browser is no longer supported. Click here to update...</a> </div>').appendTo("#container")}jQuery(document).ready(function($){$("a[href=#scroll-top]").click(function(){$("html, body").animate({scrollTop:0},"slow");return false})});(function($){function Placeholder(input){this.input=input;if(input.attr("type")=="password"){this.handlePassword()}$(input[0].form).submit(function(){if(input.hasClass("placeholder")&&input[0].value==input.attr("placeholder")){input[0].value=""}})}Placeholder.prototype={show:function(loading){if(this.input[0].value===""||(loading&&this.valueIsPlaceholder())){if(this.isPassword){try{this.input[0].setAttribute("type","text")}catch(e){this.input.before(this.fakePassword.show()).hide()}}this.input.addClass("placeholder");this.input[0].value=this.input.attr("placeholder")}},hide:function(){if(this.valueIsPlaceholder()&&this.input.hasClass("placeholder")){this.input.removeClass("placeholder");this.input[0].value="";if(this.isPassword){try{this.input[0].setAttribute("type","password")}catch(e){}this.input.show();this.input[0].focus()}}},valueIsPlaceholder:function(){return this.input[0].value==this.input.attr("placeholder")},handlePassword:function(){var input=this.input;input.attr("realType","password");this.isPassword=true;if($.browser.msie&&input[0].outerHTML){var fakeHTML=$(input[0].outerHTML.replace(/type=(['"])?password\1/gi,"type=$1text$1"));this.fakePassword=fakeHTML.val(input.attr("placeholder")).addClass("placeholder").focus(function(){input.trigger("focus");$(this).hide()});$(input[0].form).submit(function(){fakeHTML.remove();input.show()})}}};var NATIVE_SUPPORT=!!("placeholder" in document.createElement("input"));$.fn.placeholder=function(){return NATIVE_SUPPORT?this:this.each(function(){var input=$(this);var placeholder=new Placeholder(input);placeholder.show(true);input.focus(function(){placeholder.hide()});input.blur(function(){placeholder.show(false)});if($.browser.msie){$(window).load(function(){if(input.val()){input.removeClass("placeholder")}placeholder.show(true)});input.focus(function(){if(this.value==""){var range=this.createTextRange();range.collapse(true);range.moveStart("character",0);range.select()}})}})}})(jQuery);