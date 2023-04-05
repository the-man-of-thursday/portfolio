(function(c){String.prototype.format=function(){var d=arguments;return this.replace(/{(\d+)}/g,function(e,f){return typeof d[f]!="undefined"?d[f]:e})};var a=c("<ul class='sm-slider'></ul>"),b={init:function(f){var d={src:[],scaling:1.17,rotating:3,duration:6,fade:2,overlay:"images/pattern.png"};c.extend(d,f);this.options=d;var e=this.mkcss(d.src.length,d.duration,d.fade);c('<style type="text/css"></style>').html(e).appendTo("head");a.html(this.mkhtml(d.src)).prependTo("body")},mkhtml:function(j){var f="",d="<li> <span></span> <div> <h3>%title%</h3> </div> </li>";for(var e=0,g=j.length;e<g;e++){var h=j[e].title?j[e].title:"";f+=d.replace("%title%",h)}return f},mkcss:function(r,g,f){var q=g*r,e=(f/q)*100,h=(g/q)*100,p=(h+(e*0.6)),n=(h+(e*0.3)),m="@keyframes imageAnimation {0% {opacity: 0;animation-timing-function: ease-in;}{0}% {opacity: 1;}{1}% {opacity: 1;}{2}% {opacity: 0; animation-timing-function: ease-out;transform: scale(1.17) translateY(-4%) rotateZ(3deg);}100% { opacity: 0;transform: scale(1.17) translateY(-4%) rotateZ(3deg); }} @keyframes titleAnimation {0% { opacity: 0;transform: translateY(-200px); }{0}% { opacity: 1;transform: translateY(0%); }{1}% { opacity: 1;transform: translateY(0%); }{3}% { opacity: 0; transform: scale(0.4) translateY(100%); }100% { opacity: 0; }}".format(e,h,p,n),l=".sm-slider,.sm-slider:after { margin: 0;padding: 0;list-style: none;position: fixed;width: 100%;height: 100%;top: 0px;left: 0px;z-index: -1; }.sm-slider:after { content: '';background: transparent url({0}) repeat top left;z-index: 0; }.sm-slider li span { width: 100%;height: 100%;position: absolute;top: 0px;left: 0px;color: transparent;background-size: cover;background-position: 50% 50%;background-repeat: none;opacity: 0;z-index: 0;animation: imageAnimation {1}s linear infinite 0s; }.sm-slider li div { z-index: 1000;position: absolute;bottom: 30px;left: 0px;width: 100%;text-align: center;opacity: 0;color: #fff;animation: titleAnimation {1}s linear infinite 0s; }".format(this.options.overlay,q),o=m+l,d=this.options.src;for(var k=0;k<r;k++){var j=d[k];o+=".sm-slider li:nth-child({0}) span { background-image: url('{1}');animation-delay: {2}s; } .sm-slider li:nth-child({0}) div { animation-delay: {2}s; }".format(k+1,j.url,g*k)}if(this.options.rotating===false&&this.options.scaling===false){o=o.replace(/transform.*?;/g,"")}else{if(this.options.rotating===false){o=o.replace(/rotateZ\(.*?deg\)/g,"")}else{if(this.options.scaling===false){o=o.replace(/scale\(.*?\)/g,"")}}}if(this.options.rotating){o=o.replace(/rotateZ\(.*?\)/g,"rotateZ({0}deg)".format(this.options.rotating))}if(this.options.scaling){o=o.replace(/scale\(.*?\)/g,"scale({0})".format(this.options.scaling))}o=this.addPrefix(o);return o},addPrefix:function(e){var f=/@(keyframes[\s\S]*?100%.*?\{[\s\S]*?\}[\s\S]*?\})/g,d=/(?:animation|transform)[:-].*?;/g;e=e.replace(f,"@-webkit-$1 @-moz-$1 @-ms-$1 @-o-$1 @$1").replace(d,"-webkit-$& -moz-$& -ms-$& -o-$& $&");return e}};c.sublime_slideshow=function(d){b.init(d)}})(jQuery);