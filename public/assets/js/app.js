const E="modulepreload",_=function(s){return"/build/"+s},a={},u=function(d,i,v){let l=Promise.resolve();if(i&&i.length>0){document.getElementsByTagName("link");const e=document.querySelector("meta[property=csp-nonce]"),t=(e==null?void 0:e.nonce)||(e==null?void 0:e.getAttribute("nonce"));l=Promise.allSettled(i.map(r=>{if(r=_(r),r in a)return;a[r]=!0;const o=r.endsWith(".css"),m=o?'[rel="stylesheet"]':"";if(document.querySelector(`link[href="${r}"]${m}`))return;const n=document.createElement("link");if(n.rel=o?"stylesheet":E,o||(n.as="script"),n.crossOrigin="",n.href=r,t&&n.setAttribute("nonce",t),document.head.appendChild(n),o)return new Promise((f,h)=>{n.addEventListener("load",f),n.addEventListener("error",()=>h(new Error(`Unable to preload CSS for ${r}`)))})}))}function c(e){const t=new Event("vite:preloadError",{cancelable:!0});if(t.payload=e,window.dispatchEvent(t),!t.defaultPrevented)throw e}return l.then(e=>{for(const t of e||[])t.status==="rejected"&&c(t.reason);return d().catch(c)})};u(()=>import("./bootstrap-DNNVfxYP.js"),[]);u(()=>import("./svelteLoader-oCGy1Xpl.js"),[]);export{u as _};
