class LiteYTEmbed extends HTMLElement{connectedCallback(){this.videoId=this.getAttribute("videoid");let e=this.querySelector(".lty-playbtn");if(this.playLabel=e&&e.textContent.trim()||this.getAttribute("playlabel")||"Play",this.style.backgroundImage||(this.style.backgroundImage=`url("https://i.ytimg.com/vi/${this.videoId}/hqdefault.jpg")`),e||((e=document.createElement("button")).type="button",e.classList.add("lty-playbtn"),this.append(e)),!e.textContent){const t=document.createElement("span");t.className="lyt-visually-hidden",t.textContent=this.playLabel,e.append(t)}this.addEventListener("pointerover",LiteYTEmbed.warmConnections,{once:!0}),this.addEventListener("click",this.addIframe)}static addPrefetch(e,t,n){const a=document.createElement("link");a.rel=e,a.href=t,n&&(a.as=n),document.head.append(a)}static warmConnections(){LiteYTEmbed.preconnected||(LiteYTEmbed.addPrefetch("preconnect","https://www.youtube-nocookie.com"),LiteYTEmbed.addPrefetch("preconnect","https://www.google.com"),LiteYTEmbed.addPrefetch("preconnect","https://googleads.g.doubleclick.net"),LiteYTEmbed.addPrefetch("preconnect","https://static.doubleclick.net"),LiteYTEmbed.preconnected=!0)}addIframe(e){if(this.classList.contains("lyt-activated"))return;e.preventDefault(),this.classList.add("lyt-activated");const t=new URLSearchParams(this.getAttribute("params")||[]);t.append("autoplay","1");const n=document.createElement("iframe");n.width=338,n.height=190,n.title=this.playLabel,n.allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture",n.allowFullscreen=!0,n.src=`https://www.youtube-nocookie.com/embed/${encodeURIComponent(this.videoId)}?${t.toString()}`,this.append(n),n.focus()}}customElements.define("lite-youtube",LiteYTEmbed);