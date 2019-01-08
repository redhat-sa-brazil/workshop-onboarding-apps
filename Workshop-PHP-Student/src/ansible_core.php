<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Red Hat Cloud Demo </title>

 <style>
        #wrapper {width: 960px; margin: 0 auto;}
        /* Asciidoctor default stylesheet | MIT License | http://asciidoctor.org */
/* Remove comment around @import statement below when using as a custom stylesheet */
/*@import "https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic%7CNoto+Serif:400,400italic,700,700italic%7CDroid+Sans+Mono:400,700";*/
article,aside,details,figcaption,figure,footer,header,hgroup,main,nav,section,summary{display:block}
audio,canvas,video{display:inline-block}
audio:not([controls]){display:none;height:0}
[hidden],template{display:none}
script{display:none!important}
html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}
body{margin:0}
a{background:transparent}
a:focus{outline:thin dotted}
a:active,a:hover{outline:0}
h1{font-size:2em;margin:.67em 0}
abbr[title]{border-bottom:1px dotted}
b,strong{font-weight:bold}
dfn{font-style:italic}
hr{-moz-box-sizing:content-box;box-sizing:content-box;height:0}
mark{background:#ff0;color:#000}
code,kbd,pre,samp{font-family:monospace;font-size:1em}
pre{white-space:pre-wrap}
q{quotes:"\201C" "\201D" "\2018" "\2019"}
small{font-size:80%}
sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}
sup{top:-.5em}
sub{bottom:-.25em}
img{border:0}
svg:not(:root){overflow:hidden}
figure{margin:0}
fieldset{border:1px solid silver;margin:0 2px;padding:.35em .625em .75em}
legend{border:0;padding:0}
button,input,select,textarea{font-family:inherit;font-size:100%;margin:0}
button,input{line-height:normal}
button,select{text-transform:none}
button,html input[type="button"],input[type="reset"],input[type="submit"]{-webkit-appearance:button;cursor:pointer}
button[disabled],html input[disabled]{cursor:default}
input[type="checkbox"],input[type="radio"]{box-sizing:border-box;padding:0}
input[type="search"]{-webkit-appearance:textfield;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box}
input[type="search"]::-webkit-search-cancel-button,input[type="search"]::-webkit-search-decoration{-webkit-appearance:none}
button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}
textarea{overflow:auto;vertical-align:top}
table{border-collapse:collapse;border-spacing:0}
*,*:before,*:after{-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box}
html,body{font-size:100%}
body{background:#fff;color:rgba(0,0,0,.8);padding:0;margin:0;font-family:"Noto Serif","DejaVu Serif",serif;font-weight:400;font-style:normal;line-height:1;position:relative;cursor:auto}
a:hover{cursor:pointer}
img,object,embed{max-width:100%;height:auto}
object,embed{height:100%}
img{-ms-interpolation-mode:bicubic}
.left{float:left!important}
.right{float:right!important}
.text-left{text-align:left!important}
.text-right{text-align:right!important}
.text-center{text-align:center!important}
.text-justify{text-align:justify!important}
.hide{display:none}
body{-webkit-font-smoothing:antialiased}
img,object,svg{display:inline-block;vertical-align:middle}
textarea{height:auto;min-height:50px}
select{width:100%}
.center{margin-left:auto;margin-right:auto}
.spread{width:100%}
p.lead,.paragraph.lead>p,#preamble>.sectionbody>.paragraph:first-of-type p{font-size:1.21875em;line-height:1.6}
.subheader,.admonitionblock td.content>.title,.audioblock>.title,.exampleblock>.title,.imageblock>.title,.listingblock>.title,.literalblock>.title,.stemblock>.title,.openblock>.title,.paragraph>.title,.quoteblock>.title,table.tableblock>.title,.verseblock>.title,.videoblock>.title,.dlist>.title,.olist>.title,.ulist>.title,.qlist>.title,.hdlist>.title{line-height:1.45;color:#7a2518;font-weight:400;margin-top:0;margin-bottom:.25em}
div,dl,dt,dd,ul,ol,li,h1,h2,h3,#toctitle,.sidebarblock>.content>.title,h4,h5,h6,pre,form,p,blockquote,th,td{margin:0;padding:0;direction:ltr}
a{color:#2156a5;text-decoration:underline;line-height:inherit}
a:hover,a:focus{color:#1d4b8f}
a img{border:none}
p{font-family:inherit;font-weight:400;font-size:1em;line-height:1.6;margin-bottom:1.25em;text-rendering:optimizeLegibility}
p aside{font-size:.875em;line-height:1.35;font-style:italic}
h1,h2,h3,#toctitle,.sidebarblock>.content>.title,h4,h5,h6{font-family:"Open Sans","DejaVu Sans",sans-serif;font-weight:300;font-style:normal;color:#ba3925;text-rendering:optimizeLegibility;margin-top:1em;margin-bottom:.5em;line-height:1.0125em}
h1 small,h2 small,h3 small,#toctitle small,.sidebarblock>.content>.title small,h4 small,h5 small,h6 small{font-size:60%;color:#e99b8f;line-height:0}
h1{font-size:2.125em}
h2{font-size:1.6875em}
h3,#toctitle,.sidebarblock>.content>.title{font-size:1.375em}
h4,h5{font-size:1.125em}
h6{font-size:1em}
hr{border:solid #ddddd8;border-width:1px 0 0;clear:both;margin:1.25em 0 1.1875em;height:0}
em,i{font-style:italic;line-height:inherit}
strong,b{font-weight:bold;line-height:inherit}
small{font-size:60%;line-height:inherit}
code{font-family:"Droid Sans Mono","DejaVu Sans Mono",monospace;font-weight:400;color:rgba(0,0,0,.9)}
ul,ol,dl{font-size:1em;line-height:1.6;margin-bottom:1.25em;list-style-position:outside;font-family:inherit}
ul,ol,ul.no-bullet,ol.no-bullet{margin-left:1.5em}
ul li ul,ul li ol{margin-left:1.25em;margin-bottom:0;font-size:1em}
ul.square li ul,ul.circle li ul,ul.disc li ul{list-style:inherit}
ul.square{list-style-type:square}
ul.circle{list-style-type:circle}
ul.disc{list-style-type:disc}
ul.no-bullet{list-style:none}
ol li ul,ol li ol{margin-left:1.25em;margin-bottom:0}
dl dt{margin-bottom:.3125em;font-weight:bold}
dl dd{margin-bottom:1.25em}
abbr,acronym{text-transform:uppercase;font-size:90%;color:rgba(0,0,0,.8);border-bottom:1px dotted #ddd;cursor:help}
abbr{text-transform:none}
blockquote{margin:0 0 1.25em;padding:.5625em 1.25em 0 1.1875em;border-left:1px solid #ddd}
blockquote cite{display:block;font-size:.9375em;color:rgba(0,0,0,.6)}
blockquote cite:before{content:"\2014 \0020"}
blockquote cite a,blockquote cite a:visited{color:rgba(0,0,0,.6)}
blockquote,blockquote p{line-height:1.6;color:rgba(0,0,0,.85)}
@media only screen and (min-width:768px){h1,h2,h3,#toctitle,.sidebarblock>.content>.title,h4,h5,h6{line-height:1.2}
h1{font-size:2.75em}
h2{font-size:2.3125em}
h3,#toctitle,.sidebarblock>.content>.title{font-size:1.6875em}
h4{font-size:1.4375em}}
table{background:#fff;margin-bottom:1.25em;border:solid 1px #dedede}
table thead,table tfoot{background:#f7f8f7;font-weight:bold}
table thead tr th,table thead tr td,table tfoot tr th,table tfoot tr td{padding:.5em .625em .625em;font-size:inherit;color:rgba(0,0,0,.8);text-align:left}
table tr th,table tr td{padding:.5625em .625em;font-size:inherit;color:rgba(0,0,0,.8)}
table tr.even,table tr.alt,table tr:nth-of-type(even){background:#f8f8f7}
table thead tr th,table tfoot tr th,table tbody tr td,table tr td,table tfoot tr td{display:table-cell;line-height:1.6}
body{tab-size:4}
h1,h2,h3,#toctitle,.sidebarblock>.content>.title,h4,h5,h6{line-height:1.2;word-spacing:-.05em}
h1 strong,h2 strong,h3 strong,#toctitle strong,.sidebarblock>.content>.title strong,h4 strong,h5 strong,h6 strong{font-weight:400}
.clearfix:before,.clearfix:after,.float-group:before,.float-group:after{content:" ";display:table}
.clearfix:after,.float-group:after{clear:both}
*:not(pre)>code{font-size:.9375em;font-style:normal!important;letter-spacing:0;padding:.1em .5ex;word-spacing:-.15em;background-color:#f7f7f8;-webkit-border-radius:4px;border-radius:4px;line-height:1.45;text-rendering:optimizeSpeed}
pre,pre>code{line-height:1.45;color:rgba(0,0,0,.9);font-family:"Droid Sans Mono","DejaVu Sans Mono",monospace;font-weight:400;text-rendering:optimizeSpeed}
.keyseq{color:rgba(51,51,51,.8)}
kbd{font-family:"Droid Sans Mono","DejaVu Sans Mono",monospace;display:inline-block;color:rgba(0,0,0,.8);font-size:.65em;line-height:1.45;background-color:#f7f7f7;border:1px solid #ccc;-webkit-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 0 rgba(0,0,0,.2),0 0 0 .1em white inset;box-shadow:0 1px 0 rgba(0,0,0,.2),0 0 0 .1em #fff inset;margin:0 .15em;padding:.2em .5em;vertical-align:middle;position:relative;top:-.1em;white-space:nowrap}
.keyseq kbd:first-child{margin-left:0}
.keyseq kbd:last-child{margin-right:0}
.menuseq,.menu{color:rgba(0,0,0,.8)}
b.button:before,b.button:after{position:relative;top:-1px;font-weight:400}
b.button:before{content:"[";padding:0 3px 0 2px}
b.button:after{content:"]";padding:0 2px 0 3px}
p a>code:hover{color:rgba(0,0,0,.9)}
#header,#content,#footnotes,#footer{width:100%;margin-left:auto;margin-right:auto;margin-top:0;margin-bottom:0;max-width:62.5em;*zoom:1;position:relative;padding-left:.9375em;padding-right:.9375em}
#header:before,#header:after,#content:before,#content:after,#footnotes:before,#footnotes:after,#footer:before,#footer:after{content:" ";display:table}
#header:after,#content:after,#footnotes:after,#footer:after{clear:both}
#content{margin-top:1.25em}
#content:before{content:none}
#header>h1:first-child{color:rgba(0,0,0,.85);margin-top:2.25rem;margin-bottom:0}
#header>h1:first-child+#toc{margin-top:8px;border-top:1px solid #ddddd8}
#header>h1:only-child,body.toc2 #header>h1:nth-last-child(2){border-bottom:1px solid #ddddd8;padding-bottom:8px}
#header .details{border-bottom:1px solid #ddddd8;line-height:1.45;padding-top:.25em;padding-bottom:.25em;padding-left:.25em;color:rgba(0,0,0,.6);display:-ms-flexbox;display:-webkit-flex;display:flex;-ms-flex-flow:row wrap;-webkit-flex-flow:row wrap;flex-flow:row wrap}
#header .details span:first-child{margin-left:-.125em}
#header .details span.email a{color:rgba(0,0,0,.85)}
#header .details br{display:none}
#header .details br+span:before{content:"\00a0\2013\00a0"}
#header .details br+span.author:before{content:"\00a0\22c5\00a0";color:rgba(0,0,0,.85)}
#header .details br+span#revremark:before{content:"\00a0|\00a0"}
#header #revnumber{text-transform:capitalize}
#header #revnumber:after{content:"\00a0"}
#content>h1:first-child:not([class]){color:rgba(0,0,0,.85);border-bottom:1px solid #ddddd8;padding-bottom:8px;margin-top:0;padding-top:1rem;margin-bottom:1.25rem}
#toc{border-bottom:1px solid #efefed;padding-bottom:.5em}
#toc>ul{margin-left:.125em}
#toc ul.sectlevel0>li>a{font-style:italic}
#toc ul.sectlevel0 ul.sectlevel1{margin:.5em 0}
#toc ul{font-family:"Open Sans","DejaVu Sans",sans-serif;list-style-type:none}
#toc li{line-height:1.3334;margin-top:.3334em}
#toc a{text-decoration:none}
#toc a:active{text-decoration:underline}
#toctitle{color:#7a2518;font-size:1.2em}
@media only screen and (min-width:768px){#toctitle{font-size:1.375em}
body.toc2{padding-left:15em;padding-right:0}
#toc.toc2{margin-top:0!important;background-color:#f8f8f7;position:fixed;width:15em;left:0;top:0;border-right:1px solid #efefed;border-top-width:0!important;border-bottom-width:0!important;z-index:1000;padding:1.25em 1em;height:100%;overflow:auto}
#toc.toc2 #toctitle{margin-top:0;margin-bottom:.8rem;font-size:1.2em}
#toc.toc2>ul{font-size:.9em;margin-bottom:0}
#toc.toc2 ul ul{margin-left:0;padding-left:1em}
#toc.toc2 ul.sectlevel0 ul.sectlevel1{padding-left:0;margin-top:.5em;margin-bottom:.5em}
body.toc2.toc-right{padding-left:0;padding-right:15em}
body.toc2.toc-right #toc.toc2{border-right-width:0;border-left:1px solid #efefed;left:auto;right:0}}
@media only screen and (min-width:1280px){body.toc2{padding-left:20em;padding-right:0}
#toc.toc2{width:20em}
#toc.toc2 #toctitle{font-size:1.375em}
#toc.toc2>ul{font-size:.95em}
#toc.toc2 ul ul{padding-left:1.25em}
body.toc2.toc-right{padding-left:0;padding-right:20em}}
#content #toc{border-style:solid;border-width:1px;border-color:#e0e0dc;margin-bottom:1.25em;padding:1.25em;background:#f8f8f7;-webkit-border-radius:4px;border-radius:4px}
#content #toc>:first-child{margin-top:0}
#content #toc>:last-child{margin-bottom:0}
#footer{max-width:100%;background-color:rgba(0,0,0,.8);padding:1.25em}
#footer-text{color:rgba(255,255,255,.8);line-height:1.44}
.sect1{padding-bottom:.625em}
@media only screen and (min-width:768px){.sect1{padding-bottom:1.25em}}
.sect1+.sect1{border-top:1px solid #efefed}
#content h1>a.anchor,h2>a.anchor,h3>a.anchor,#toctitle>a.anchor,.sidebarblock>.content>.title>a.anchor,h4>a.anchor,h5>a.anchor,h6>a.anchor{position:absolute;z-index:1001;width:1.5ex;margin-left:-1.5ex;display:block;text-decoration:none!important;visibility:hidden;text-align:center;font-weight:400}
#content h1>a.anchor:before,h2>a.anchor:before,h3>a.anchor:before,#toctitle>a.anchor:before,.sidebarblock>.content>.title>a.anchor:before,h4>a.anchor:before,h5>a.anchor:before,h6>a.anchor:before{content:"\00A7";font-size:.85em;display:block;padding-top:.1em}
#content h1:hover>a.anchor,#content h1>a.anchor:hover,h2:hover>a.anchor,h2>a.anchor:hover,h3:hover>a.anchor,#toctitle:hover>a.anchor,.sidebarblock>.content>.title:hover>a.anchor,h3>a.anchor:hover,#toctitle>a.anchor:hover,.sidebarblock>.content>.title>a.anchor:hover,h4:hover>a.anchor,h4>a.anchor:hover,h5:hover>a.anchor,h5>a.anchor:hover,h6:hover>a.anchor,h6>a.anchor:hover{visibility:visible}
#content h1>a.link,h2>a.link,h3>a.link,#toctitle>a.link,.sidebarblock>.content>.title>a.link,h4>a.link,h5>a.link,h6>a.link{color:#ba3925;text-decoration:none}
#content h1>a.link:hover,h2>a.link:hover,h3>a.link:hover,#toctitle>a.link:hover,.sidebarblock>.content>.title>a.link:hover,h4>a.link:hover,h5>a.link:hover,h6>a.link:hover{color:#a53221}
.audioblock,.imageblock,.literalblock,.listingblock,.stemblock,.videoblock{margin-bottom:1.25em}
.admonitionblock td.content>.title,.audioblock>.title,.exampleblock>.title,.imageblock>.title,.listingblock>.title,.literalblock>.title,.stemblock>.title,.openblock>.title,.paragraph>.title,.quoteblock>.title,table.tableblock>.title,.verseblock>.title,.videoblock>.title,.dlist>.title,.olist>.title,.ulist>.title,.qlist>.title,.hdlist>.title{text-rendering:optimizeLegibility;text-align:left;font-family:"Noto Serif","DejaVu Serif",serif;font-size:1rem;font-style:italic}
table.tableblock>caption.title{white-space:nowrap;overflow:visible;max-width:0}
.paragraph.lead>p,#preamble>.sectionbody>.paragraph:first-of-type p{color:rgba(0,0,0,.85)}
table.tableblock #preamble>.sectionbody>.paragraph:first-of-type p{font-size:inherit}
.admonitionblock>table{border-collapse:separate;border:0;background:none;width:100%}
.admonitionblock>table td.icon{text-align:center;width:80px}
.admonitionblock>table td.icon img{max-width:none}
.admonitionblock>table td.icon .title{font-weight:bold;font-family:"Open Sans","DejaVu Sans",sans-serif;text-transform:uppercase}
.admonitionblock>table td.content{padding-left:1.125em;padding-right:1.25em;border-left:1px solid #ddddd8;color:rgba(0,0,0,.6)}
.admonitionblock>table td.content>:last-child>:last-child{margin-bottom:0}
.exampleblock>.content{border-style:solid;border-width:1px;border-color:#e6e6e6;margin-bottom:1.25em;padding:1.25em;background:#fff;-webkit-border-radius:4px;border-radius:4px}
.exampleblock>.content>:first-child{margin-top:0}
.exampleblock>.content>:last-child{margin-bottom:0}
.sidebarblock{border-style:solid;border-width:1px;border-color:#e0e0dc;margin-bottom:1.25em;padding:1.25em;background:#f8f8f7;-webkit-border-radius:4px;border-radius:4px}
.sidebarblock>:first-child{margin-top:0}
.sidebarblock>:last-child{margin-bottom:0}
.sidebarblock>.content>.title{color:#7a2518;margin-top:0;text-align:center}
.exampleblock>.content>:last-child>:last-child,.exampleblock>.content .olist>ol>li:last-child>:last-child,.exampleblock>.content .ulist>ul>li:last-child>:last-child,.exampleblock>.content .qlist>ol>li:last-child>:last-child,.sidebarblock>.content>:last-child>:last-child,.sidebarblock>.content .olist>ol>li:last-child>:last-child,.sidebarblock>.content .ulist>ul>li:last-child>:last-child,.sidebarblock>.content .qlist>ol>li:last-child>:last-child{margin-bottom:0}
.literalblock pre,.listingblock pre:not(.highlight),.listingblock pre[class="highlight"],.listingblock pre[class^="highlight "],.listingblock pre.CodeRay,.listingblock pre.prettyprint{background:#f7f7f8}
.sidebarblock .literalblock pre,.sidebarblock .listingblock pre:not(.highlight),.sidebarblock .listingblock pre[class="highlight"],.sidebarblock .listingblock pre[class^="highlight "],.sidebarblock .listingblock pre.CodeRay,.sidebarblock .listingblock pre.prettyprint{background:#f2f1f1}
.literalblock pre,.literalblock pre[class],.listingblock pre,.listingblock pre[class]{-webkit-border-radius:4px;border-radius:4px;word-wrap:break-word;padding:1em;font-size:.8125em}
.literalblock pre.nowrap,.literalblock pre[class].nowrap,.listingblock pre.nowrap,.listingblock pre[class].nowrap{overflow-x:auto;white-space:pre;word-wrap:normal}
@media only screen and (min-width:768px){.literalblock pre,.literalblock pre[class],.listingblock pre,.listingblock pre[class]{font-size:.90625em}}
@media only screen and (min-width:1280px){.literalblock pre,.literalblock pre[class],.listingblock pre,.listingblock pre[class]{font-size:1em}}
.literalblock.output pre{color:#f7f7f8;background-color:rgba(0,0,0,.9)}
.listingblock pre.highlightjs{padding:0}
.listingblock pre.highlightjs>code{padding:1em;-webkit-border-radius:4px;border-radius:4px}
.listingblock pre.prettyprint{border-width:0}
.listingblock>.content{position:relative}
.listingblock code[data-lang]:before{display:none;content:attr(data-lang);position:absolute;font-size:.75em;top:.425rem;right:.5rem;line-height:1;text-transform:uppercase;color:#999}
.listingblock:hover code[data-lang]:before{display:block}
.listingblock.terminal pre .command:before{content:attr(data-prompt);padding-right:.5em;color:#999}
.listingblock.terminal pre .command:not([data-prompt]):before{content:"$"}
table.pyhltable{border-collapse:separate;border:0;margin-bottom:0;background:none}
table.pyhltable td{vertical-align:top;padding-top:0;padding-bottom:0;line-height:1.45}
table.pyhltable td.code{padding-left:.75em;padding-right:0}
pre.pygments .lineno,table.pyhltable td:not(.code){color:#999;padding-left:0;padding-right:.5em;border-right:1px solid #ddddd8}
pre.pygments .lineno{display:inline-block;margin-right:.25em}
table.pyhltable .linenodiv{background:none!important;padding-right:0!important}
.quoteblock{margin:0 1em 1.25em 1.5em;display:table}
.quoteblock>.title{margin-left:-1.5em;margin-bottom:.75em}
.quoteblock blockquote,.quoteblock blockquote p{color:rgba(0,0,0,.85);font-size:1.15rem;line-height:1.75;word-spacing:.1em;letter-spacing:0;font-style:italic;text-align:justify}
.quoteblock blockquote{margin:0;padding:0;border:0}
.quoteblock blockquote:before{content:"\201c";float:left;font-size:2.75em;font-weight:bold;line-height:.6em;margin-left:-.6em;color:#7a2518;text-shadow:0 1px 2px rgba(0,0,0,.1)}
.quoteblock blockquote>.paragraph:last-child p{margin-bottom:0}
.quoteblock .attribution{margin-top:.5em;margin-right:.5ex;text-align:right}
.quoteblock .quoteblock{margin-left:0;margin-right:0;padding:.5em 0;border-left:3px solid rgba(0,0,0,.6)}
.quoteblock .quoteblock blockquote{padding:0 0 0 .75em}
.quoteblock .quoteblock blockquote:before{display:none}
.verseblock{margin:0 1em 1.25em 1em}
.verseblock pre{font-family:"Open Sans","DejaVu Sans",sans;font-size:1.15rem;color:rgba(0,0,0,.85);font-weight:300;text-rendering:optimizeLegibility}
.verseblock pre strong{font-weight:400}
.verseblock .attribution{margin-top:1.25rem;margin-left:.5ex}
.quoteblock .attribution,.verseblock .attribution{font-size:.9375em;line-height:1.45;font-style:italic}
.quoteblock .attribution br,.verseblock .attribution br{display:none}
.quoteblock .attribution cite,.verseblock .attribution cite{display:block;letter-spacing:-.025em;color:rgba(0,0,0,.6)}
.quoteblock.abstract{margin:0 0 1.25em 0;display:block}
.quoteblock.abstract blockquote,.quoteblock.abstract blockquote p{text-align:left;word-spacing:0}
.quoteblock.abstract blockquote:before,.quoteblock.abstract blockquote p:first-of-type:before{display:none}
table.tableblock{max-width:100%;border-collapse:separate}
table.tableblock td>.paragraph:last-child p>p:last-child,table.tableblock th>p:last-child,table.tableblock td>p:last-child{margin-bottom:0}
table.tableblock,th.tableblock,td.tableblock{border:0 solid #dedede}
table.grid-all th.tableblock,table.grid-all td.tableblock{border-width:0 1px 1px 0}
table.grid-all tfoot>tr>th.tableblock,table.grid-all tfoot>tr>td.tableblock{border-width:1px 1px 0 0}
table.grid-cols th.tableblock,table.grid-cols td.tableblock{border-width:0 1px 0 0}
table.grid-all *>tr>.tableblock:last-child,table.grid-cols *>tr>.tableblock:last-child{border-right-width:0}
table.grid-rows th.tableblock,table.grid-rows td.tableblock{border-width:0 0 1px 0}
table.grid-all tbody>tr:last-child>th.tableblock,table.grid-all tbody>tr:last-child>td.tableblock,table.grid-all thead:last-child>tr>th.tableblock,table.grid-rows tbody>tr:last-child>th.tableblock,table.grid-rows tbody>tr:last-child>td.tableblock,table.grid-rows thead:last-child>tr>th.tableblock{border-bottom-width:0}
table.grid-rows tfoot>tr>th.tableblock,table.grid-rows tfoot>tr>td.tableblock{border-width:1px 0 0 0}
table.frame-all{border-width:1px}
table.frame-sides{border-width:0 1px}
table.frame-topbot{border-width:1px 0}
th.halign-left,td.halign-left{text-align:left}
th.halign-right,td.halign-right{text-align:right}
th.halign-center,td.halign-center{text-align:center}
th.valign-top,td.valign-top{vertical-align:top}
th.valign-bottom,td.valign-bottom{vertical-align:bottom}
th.valign-middle,td.valign-middle{vertical-align:middle}
table thead th,table tfoot th{font-weight:bold}
tbody tr th{display:table-cell;line-height:1.6;background:#f7f8f7}
tbody tr th,tbody tr th p,tfoot tr th,tfoot tr th p{color:rgba(0,0,0,.8);font-weight:bold}
p.tableblock>code:only-child{background:none;padding:0}
p.tableblock{font-size:1em}
td>div.verse{white-space:pre}
ol{margin-left:1.75em}
ul li ol{margin-left:1.5em}
dl dd{margin-left:1.125em}
dl dd:last-child,dl dd:last-child>:last-child{margin-bottom:0}
ol>li p,ul>li p,ul dd,ol dd,.olist .olist,.ulist .ulist,.ulist .olist,.olist .ulist{margin-bottom:.625em}
ul.unstyled,ol.unnumbered,ul.checklist,ul.none{list-style-type:none}
ul.unstyled,ol.unnumbered,ul.checklist{margin-left:.625em}
ul.checklist li>p:first-child>.fa-square-o:first-child,ul.checklist li>p:first-child>.fa-check-square-o:first-child{width:1em;font-size:.85em}
ul.checklist li>p:first-child>input[type="checkbox"]:first-child{width:1em;position:relative;top:1px}
ul.inline{margin:0 auto .625em auto;margin-left:-1.375em;margin-right:0;padding:0;list-style:none;overflow:hidden}
ul.inline>li{list-style:none;float:left;margin-left:1.375em;display:block}
ul.inline>li>*{display:block}
.unstyled dl dt{font-weight:400;font-style:normal}
ol.arabic{list-style-type:decimal}
ol.decimal{list-style-type:decimal-leading-zero}
ol.loweralpha{list-style-type:lower-alpha}
ol.upperalpha{list-style-type:upper-alpha}
ol.lowerroman{list-style-type:lower-roman}
ol.upperroman{list-style-type:upper-roman}
ol.lowergreek{list-style-type:lower-greek}
.hdlist>table,.colist>table{border:0;background:none}
.hdlist>table>tbody>tr,.colist>table>tbody>tr{background:none}
td.hdlist1,td.hdlist2{vertical-align:top;padding:0 .625em}
td.hdlist1{font-weight:bold;padding-bottom:1.25em}
.literalblock+.colist,.listingblock+.colist{margin-top:-.5em}
.colist>table tr>td:first-of-type{padding:0 .75em;line-height:1}
.colist>table tr>td:last-of-type{padding:.25em 0}
.thumb,.th{line-height:0;display:inline-block;border:solid 4px #fff;-webkit-box-shadow:0 0 0 1px #ddd;box-shadow:0 0 0 1px #ddd}
.imageblock.left,.imageblock[style*="float: left"]{margin:.25em .625em 1.25em 0}
.imageblock.right,.imageblock[style*="float: right"]{margin:.25em 0 1.25em .625em}
.imageblock>.title{margin-bottom:0}
.imageblock.thumb,.imageblock.th{border-width:6px}
.imageblock.thumb>.title,.imageblock.th>.title{padding:0 .125em}
.image.left,.image.right{margin-top:.25em;margin-bottom:.25em;display:inline-block;line-height:0}
.image.left{margin-right:.625em}
.image.right{margin-left:.625em}
a.image{text-decoration:none;display:inline-block}
a.image object{pointer-events:none}
sup.footnote,sup.footnoteref{font-size:.875em;position:static;vertical-align:super}
sup.footnote a,sup.footnoteref a{text-decoration:none}
sup.footnote a:active,sup.footnoteref a:active{text-decoration:underline}
#footnotes{padding-top:.75em;padding-bottom:.75em;margin-bottom:.625em}
#footnotes hr{width:20%;min-width:6.25em;margin:-.25em 0 .75em 0;border-width:1px 0 0 0}
#footnotes .footnote{padding:0 .375em 0 .225em;line-height:1.3334;font-size:.875em;margin-left:1.2em;text-indent:-1.05em;margin-bottom:.2em}
#footnotes .footnote a:first-of-type{font-weight:bold;text-decoration:none}
#footnotes .footnote:last-of-type{margin-bottom:0}
#content #footnotes{margin-top:-.625em;margin-bottom:0;padding:.75em 0}
.gist .file-data>table{border:0;background:#fff;width:100%;margin-bottom:0}
.gist .file-data>table td.line-data{width:99%}
div.unbreakable{page-break-inside:avoid}
.big{font-size:larger}
.small{font-size:smaller}
.underline{text-decoration:underline}
.overline{text-decoration:overline}
.line-through{text-decoration:line-through}
.aqua{color:#00bfbf}
.aqua-background{background-color:#00fafa}
.black{color:#000}
.black-background{background-color:#000}
.blue{color:#0000bf}
.blue-background{background-color:#0000fa}
.fuchsia{color:#bf00bf}
.fuchsia-background{background-color:#fa00fa}
.gray{color:#606060}
.gray-background{background-color:#7d7d7d}
.green{color:#006000}
.green-background{background-color:#007d00}
.lime{color:#00bf00}
.lime-background{background-color:#00fa00}
.maroon{color:#600000}
.maroon-background{background-color:#7d0000}
.navy{color:#000060}
.navy-background{background-color:#00007d}
.olive{color:#606000}
.olive-background{background-color:#7d7d00}
.purple{color:#600060}
.purple-background{background-color:#7d007d}
.red{color:#bf0000}
.red-background{background-color:#fa0000}
.silver{color:#909090}
.silver-background{background-color:#bcbcbc}
.teal{color:#006060}
.teal-background{background-color:#007d7d}
.white{color:#bfbfbf}
.white-background{background-color:#fafafa}
.yellow{color:#bfbf00}
.yellow-background{background-color:#fafa00}
span.icon>.fa{cursor:default}
.admonitionblock td.icon [class^="fa icon-"]{font-size:2.5em;text-shadow:1px 1px 2px rgba(0,0,0,.5);cursor:default}
.admonitionblock td.icon .icon-note:before{content:"\f05a";color:#19407c}
.admonitionblock td.icon .icon-tip:before{content:"\f0eb";text-shadow:1px 1px 2px rgba(155,155,0,.8);color:#111}
.admonitionblock td.icon .icon-warning:before{content:"\f071";color:#bf6900}
.admonitionblock td.icon .icon-caution:before{content:"\f06d";color:#bf3400}
.admonitionblock td.icon .icon-important:before{content:"\f06a";color:#bf0000}
.conum[data-value]{display:inline-block;color:#fff!important;background-color:rgba(0,0,0,.8);-webkit-border-radius:100px;border-radius:100px;text-align:center;font-size:.75em;width:1.67em;height:1.67em;line-height:1.67em;font-family:"Open Sans","DejaVu Sans",sans-serif;font-style:normal;font-weight:bold}
.conum[data-value] *{color:#fff!important}
.conum[data-value]+b{display:none}
.conum[data-value]:after{content:attr(data-value)}
pre .conum[data-value]{position:relative;top:-.125em}
b.conum *{color:inherit!important}
.conum:not([data-value]):empty{display:none}
dt,th.tableblock,td.content,div.footnote{text-rendering:optimizeLegibility}
h1,h2,p,td.content,span.alt{letter-spacing:-.01em}
p strong,td.content strong,div.footnote strong{letter-spacing:-.005em}
p,blockquote,dt,td.content,span.alt{font-size:1.0625rem}
p{margin-bottom:1.25rem}
.sidebarblock p,.sidebarblock dt,.sidebarblock td.content,p.tableblock{font-size:1em}
.exampleblock>.content{background-color:#fffef7;border-color:#e0e0dc;-webkit-box-shadow:0 1px 4px #e0e0dc;box-shadow:0 1px 4px #e0e0dc}
.print-only{display:none!important}
@media print{@page{margin:1.25cm .75cm}
*{-webkit-box-shadow:none!important;box-shadow:none!important;text-shadow:none!important}
a{color:inherit!important;text-decoration:underline!important}
a.bare,a[href^="#"],a[href^="mailto:"]{text-decoration:none!important}
a[href^="http:"]:not(.bare):after,a[href^="https:"]:not(.bare):after{content:"(" attr(href) ")";display:inline-block;font-size:.875em;padding-left:.25em}
abbr[title]:after{content:" (" attr(title) ")"}
pre,blockquote,tr,img,object,svg{page-break-inside:avoid}
thead{display:table-header-group}
svg{max-width:100%}
p,blockquote,dt,td.content{font-size:1em;orphans:3;widows:3}
h2,h3,#toctitle,.sidebarblock>.content>.title{page-break-after:avoid}
#toc,.sidebarblock,.exampleblock>.content{background:none!important}
#toc{border-bottom:1px solid #ddddd8!important;padding-bottom:0!important}
.sect1{padding-bottom:0!important}
.sect1+.sect1{border:0!important}
#header>h1:first-child{margin-top:1.25rem}
body.book #header{text-align:center}
body.book #header>h1:first-child{border:0!important;margin:2.5em 0 1em 0}
body.book #header .details{border:0!important;display:block;padding:0!important}
body.book #header .details span:first-child{margin-left:0!important}
body.book #header .details br{display:block}
body.book #header .details br+span:before{content:none!important}
body.book #toc{border:0!important;text-align:left!important;padding:0!important;margin:0!important}
body.book #toc,body.book #preamble,body.book h1.sect0,body.book .sect1>h2{page-break-before:always}
.listingblock code[data-lang]:before{display:block}
#footer{background:none!important;padding:0 .9375em}
#footer-text{color:rgba(0,0,0,.6)!important;font-size:.9em}
.hide-on-print{display:none!important}
.print-only{display:block!important}
.hide-for-print{display:none!important}
.show-for-print{display:inherit!important}}

      </style>
      <link href='https://fonts.googleapis.com/css?family=Noto+Serif' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/default.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/highlight.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/languages/asciidoc.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/languages/yaml.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/languages/dockerfile.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/languages/makefile.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/languages/go.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/languages/rust.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/languages/haskell.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/languages/typescript.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/languages/scss.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/languages/less.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/languages/handlebars.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/languages/groovy.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/languages/scala.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/languages/bash.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/languages/ini.min.js"></script>
      <script>hljs.initHighlightingOnLoad();</script>


    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
<?php 
require_once("menu_esquerdo_completo.php");
?>

<?php
require_once("top_navigation.php");
?>
        <!-- page content -->
        <div class="right_col" role="main">

<div id="wrapper">
        <div class="article">
          <h1 id="__asciidoctor-preview-440__">Workshop Ansible Core and Tower</h1>
<h1 id="_introdu_o" class="sect0">Introdução</h1>
<div id="__asciidoctor-preview-488__" class="paragraph">
<p>Bem-vindo ao nosso laboratório de Ansible-Core. Você deve ter recebido um e-mail nosso com dados de acesso ao laborátorio.</p>
</div>
<div id="__asciidoctor-preview-492__" class="paragraph">
<p>Abra esse e-mail e siga os passos a seguir.</p>
</div>
<div class="sect3">
<h4 id="_antes_de_acessar_o_laborat_rio_verifique_os_itens_abaixo">Antes de acessar o laboratório verifique os itens abaixo:</h4>
<div id="__asciidoctor-preview-526__" class="ulist">
<ul>
<li>
<p>Notebook com acesso à Internet</p>
</li>
<li>
<p>Navagador de Internet com Firefox ou Google Chrome</p>
</li>
<li>
<p>4 GB de memória RAM</p>
</li>
<li>
<p>Linux: Centos ou RHEL (virtualizado ou físico)</p>
</li>
</ul>
</div>
</div>
<div class="sect3">
<h4 id="_testando_tudo">Testando tudo</h4>
<div id="__asciidoctor-preview-580__" class="paragraph">
<p>Agora você tem os dados do ambiente e notebook funcionando. Faça um teste e tente logar em cada servidor usando putty ou ssh (linux nativo)</p>
</div>
</div>
<div class="sect2">
<h3 id="_topologia_do_laborat_rio">Topologia do laboratório</h3>
<table id="__asciidoctor-preview-608__" class="tableblock frame-all grid-all spread">
<caption class="title">Table 1. Tabela dos servidores e funcionalidades</caption>
<colgroup>
<col style="width: 33.3333%;">
<col style="width: 33.3333%;">
<col style="width: 33.3334%;">
</colgroup>
<tbody>
<tr>
<td class="tableblock halign-left valign-top"><p class="tableblock">Servidor</p></td>
<td class="tableblock halign-left valign-top"><p class="tableblock">Função</p></td>
<td class="tableblock halign-left valign-top"><p class="tableblock">S.O</p></td>
</tr>
<tr>
<td class="tableblock halign-left valign-top"><p class="tableblock"><?php echo getenv("IP_INSTANCIA");?></p></td>
<td class="tableblock halign-left valign-top"><p class="tableblock">Ansible engine e Servidor de aplicação</p></td>
<td class="tableblock halign-left valign-top"><p class="tableblock">Centos 7</p></td>
</tr>
<tr>
<td class="tableblock halign-left valign-top"><p class="tableblock"><?php echo getenv("SERVER1");?></p></td>
<td class="tableblock halign-left valign-top"><p class="tableblock">Servidor 1 para automacao</p></td>
<td class="tableblock halign-left valign-top"><p class="tableblock">Centos 7</p></td>
</tr>
<tr>
<td class="tableblock halign-left valign-top"><p class="tableblock"><?php echo getenv("SERVER2");?></p></td>
<td class="tableblock halign-left valign-top"><p class="tableblock">Servidor 2 para automacao</p></td>
<td class="tableblock halign-left valign-top"><p class="tableblock">Centos 7</p></td>
</tr>
</tbody>
</table>
<table id="__asciidoctor-preview-698__" class="tableblock frame-all grid-all spread">
<caption class="title">Table 2. Tabela de usuários e senhas</caption>
<colgroup>
<col style="width: 33.3333%;">
<col style="width: 33.3333%;">
<col style="width: 33.3334%;">
</colgroup>
<tbody>
<tr>
<td class="tableblock halign-left valign-top"><p class="tableblock">Usuário</p></td>
<td class="tableblock halign-left valign-top"><p class="tableblock">Senha</p></td>
<td class="tableblock halign-left valign-top"><p class="tableblock">Função</p></td>
</tr>
<tr>
<td class="tableblock halign-left valign-top"><p class="tableblock">workshop</p></td>
<td class="tableblock halign-left valign-top"><p class="tableblock">&lt;chave privada&gt;</p></td>
<td class="tableblock halign-left valign-top"><p class="tableblock">usuario que roda playbooks</p></td>
</tr>
<tr>
<td class="tableblock halign-left valign-top"><p class="tableblock"><?php echo getenv("IP_INSTANCIA");?></p></td>
<td class="tableblock halign-left valign-top"><p class="tableblock">redhat</p></td>
<td class="tableblock halign-left valign-top"><p class="tableblock">Ansible Tower</p></td>
</tr>
</tbody>
</table>
</div>
<div class="sect1">
<h2 id="_let_s_rock_on_ansible_core">Let&#8217;s Rock on Ansible Core!!</h2>
<div class="sectionbody">
<div class="sect3">
<h4 id="_lab01_instala_o_ansible_core">LAB01 - Instalação Ansible-Core</h4>
<div id="__asciidoctor-preview-828__" class="paragraph">
<p>Primeiro passo é acessar o servidor Ansible-Engine e instale os pacotes relacionados ao Ansible-Core.</p>
</div>
<div class="sect4">
<h5 id="_conectando_ao_servidor">Conectando ao Servidor (caso nao possua o terminal web)</h5>
<div id="__asciidoctor-preview-846__" class="literalblock">
<div class="content">
<pre>ssh -i &lt;chave privada&gt; workshop@<?php echo getenv("IP_INSTANCIA");?></pre>
</div>
</div>
</div>
<div class="sect4">
<h5 id="_instala_o_do_ansible_core_passo_passo">Instalação do Ansible Core passo - passo</h5>
<div id="__asciidoctor-preview-880__" class="literalblock">
<div class="content">
<pre>
sudo yum install -y ansible  <i class="conum" data-value="2"></i><b>(2)</b></pre>
</div>
</div>
<div id="__asciidoctor-preview-890__" class="colist arabic">
<table>
<tr>
<td><i class="conum" data-value="2"></i><b>2</b></td>
<td>Instalação do Ansible Core</td>
</tr>
</table>
</div>
</div>
</div>
<div class="sect3">
<h4 id="_lab02_configurando_um_invent_rio_manualmente">LAB02 - Configurando um inventário manualmente</h4>
<div id="__asciidoctor-preview-936__" class="paragraph">
<p>Neste laborátorio iremos criar um inventário para nosso laboratório</p>
</div>
<div class="sect4">
<h5 id="_usando_usuario_ansible_core">Usando usuario <?php echo getenv("USUARIOSSH");?></h5>
<div id="__asciidoctor-preview-956__" class="literalblock">
<div class="content">
<pre>sudo su - <?php echo getenv("USUARIOSSH");?><br>
cd /workshop</pre>
</div>
</div>
</div>
<div class="sect4">
<h5 id="_criando_invent_rio">Criando inventário</h5>
<div id="__asciidoctor-preview-976__" class="literalblock">
<div class="content">
<pre>vi inventario.ini</pre>
</div>
</div>
</div>
<div class="sect4">
<h5 id="_exemplo_de_invent_rio_para_este_laborat_rio">Exemplo de inventário para este laboratório</h5>
<div id="__asciidoctor-preview-1006__" class="literalblock">
<div class="content">
<pre>[all:vars]
 ansible_ssh_user=<?php echo getenv("USUARIOSSH");?><br>
 ansible_ssh_private_key_file=/workshop/chave
[web]
<?php echo getenv("SERVER1");?><br>
[banco]
<?php echo getenv("SERVER2");?></pre>
</div>
</div>
</div>
</div>

<div class="sect4">
<h5 id="_criando_invent_rio">Testando acesso as instancias</h5>
<div id="__asciidoctor-preview-976__" class="literalblock">
<div class="content">
<pre>ssh -i chave <?php echo getenv("SERVER1");?></pre>
<pre>ssh -i chave <?php echo getenv("SERVER2");?></pre>
</div>
</div>
</div>


<div class="sect3">
<h4 id="_lab03_m_dulos_para_execu_o_de_comandos">LAB03 - Módulos para execução de comandos</h4>


<div class="sect4">
<h5 id="_usando_o_m_dulo_ping">Usando o módulo ping</h5>
<div id="__asciidoctor-preview-1190__" class="literalblock">
<div class="content">
<pre>ansible -i inventario.ini all -m ping <i class="conum" data-value="1"></i><b>(1)</b></pre>
</div>
</div>
<div id="__asciidoctor-preview-1198__" class="colist arabic">
<table>
<tr>
<td><i class="conum" data-value="1"></i><b>1</b></td>
<td>É possível testar se todos os servidores registrados dentro do inventário estão funcionais a nível de rede</td>
</tr>
</table>
</div>
</div>


<div class="sect4">
<h5 id="_utilizando_o_comando_externo_uptime">Utilizando o comando externo - uptime</h5>
<div id="__asciidoctor-preview-1064__" class="literalblock">
<div class="content">
<pre>ansible all -i inventario.ini -m command -a "uptime"</pre>
</div>
</div>
</div>

<div class="sect4">
<h5 id="_instalando_um_pacote_diretamente_num_grupo_de_hosts">Instalando um pacote diretamente num grupo de hosts (vai apresentar problema)</h5>
<div id="__asciidoctor-preview-1094__" class="literalblock">
<div class="content">
<pre>ansible web -s -i inventario.ini -m yum -a "name=httpd state=present"</pre>
</div>
</div>
</div>

<div class="sect4">
<h5 id="_repete_comando_de_instalacao">Repete comando de instalacao</h5>
<div id="__asciidoctor-preview-1140__" class="literalblock">
<div class="content">
<pre>ansible web -s -i inventario.ini -m yum -a "name=httpd state=present"</pre>
</div>
</div>
</div>
<div class="sect4">
<h5 id="_inicializando_servi_o_http_via_comando">Inicializando serviço http via comando</h5>
<div id="__asciidoctor-preview-1166__" class="literalblock">
<div class="content">
<pre>ansible web -s -i inventario.ini -m service -a "name=httpd enabled=yes state=started"</pre>
</div>
</div>
</div>



<div class="sect4">
<h5 id="_validando_o_n_vel_de_privil_gio_do_usu_rio_login_fornecido">Validando  o nível de privilégio do usuário <?php echo getenv("ALUNO");?></h5>
<div id="__asciidoctor-preview-1252__" class="literalblock">
<div class="content">
<pre>ansible -i inventario.ini all -m command -a id -b <i class="conum" data-value="1"></i><b>(1)</b></pre>
</div>
</div>
<div id="__asciidoctor-preview-1260__" class="colist arabic">
<table>
<tr>
<td><i class="conum" data-value="1"></i><b>1</b></td>
<td>O resultado da ação do comando Ansible terá como saída qual nível de privilégio</td>
</tr>
</table>
</div>
</div>
</div>
<div class="sect2">
<h3 id="_desafio">Desafio</h3>
<div id="__asciidoctor-preview-1284__" class="olist arabic">
<ol class="arabic">
<li>
<p>Utilize o modulo ping para pingar todos os servidores</p>
</li>
<li>
<p>Instale o telnet apenas nos servidores web</p>
</li>
<li>
<p>Defina o Selinux para permissive:</p>
</li>
</ol>
</div>
</div>
<div class="sect2">
<h3 id="_resposta_do_desafio">Resposta do desafio</h3>
<div id="__asciidoctor-preview-1350__" class="olist arabic">
<ol class="arabic">
<li>
<p>Utilize o modulo ping para pingar todos os servidores: <strong><em>ansible -i inventario.ini all -m ping</em></strong></p>
</li>
<li>
<p>Instale o telnet apenas nos servidores web: <strong><em>ansible web -s -i inventario.ini -m yum -a "name=telnet state=present"</em></strong></p>
</li>
<li>
<p>Defina o Selinux para permissive: <strong><em>ansible all -s -i inventario.ini -m command -a  "setenforce permissive"</em></strong></p>
</li>
<li>
<p>Comando para listar todos os serviços:  <strong><em>ansible all -i inventario.ini -m command -a "systemctl status"</em></strong></p>
</li>
</ol>
</div>
<div class="sect3">
<h4 id="_lab04_construindo_primeiro_playbook">LAB04 - Construindo primeiro playbook</h4>
<div class="sect4">
<h5 id="_criando_o_primeiro_playbook">Criando o primeiro playbook</h5>
<div id="__asciidoctor-preview-1450__" class="literalblock">
<div class="content">
<pre>vi /workshop/primeiroplaybook.yaml <i class="conum" data-value="1"></i><b>(1)</b></pre>
</div>
</div>
<div id="__asciidoctor-preview-1458__" class="colist arabic">
<table>
<tr>
<td><i class="conum" data-value="1"></i><b>1</b></td>
<td>Crie o arquivo utilizando vim que será utilizado como ferramenta para escrever os playbook</td>
</tr>
</table>
</div>
</div>
<div class="sect4">
<h5 id="_utilize_o_modelo_abaixo_como_padr_o">Utilize o modelo abaixo como padrão</h5>
<div id="__asciidoctor-preview-1492__" class="listingblock">
<div class="content">
<pre>---     <i class="conum" data-value="6"></i><b>(6)</b>
- name: Primeiro playbook
  hosts: web <i class="conum" data-value="1"></i><b>(1)</b>
  become: yes
  vars:
  remote_user: <?php echo getenv("USUARIOSSH");?> <i class="conum" data-value="2"></i><b>(2)</b>

  tasks:
  - name: Instala a ferramenta net-tools <i class="conum" data-value="3"></i><b>(3)</b>
    yum: name=net-tools state=latest <i class="conum" data-value="4"></i><b>(4)</b> <i class="conum" data-value="5"></i><b>(5)</b></pre>
</div>
</div>
<div id="__asciidoctor-preview-1510__" class="colist arabic">
<table>
<tr>
<td><i class="conum" data-value="1"></i><b>1</b></td>
<td>Nome do grupo de hosts</td>
</tr>
<tr>
<td><i class="conum" data-value="2"></i><b>2</b></td>
<td>Usuário que irá realizar a operação</td>
</tr>
<tr>
<td><i class="conum" data-value="3"></i><b>3</b></td>
<td>Nome da tarefa</td>
</tr>
<tr>
<td><i class="conum" data-value="4"></i><b>4</b></td>
<td>Modulo yum sendo utilizado para instalalação do pacote net-tools na última versão</td>
</tr>
<tr>
<td><i class="conum" data-value="5"></i><b>5</b></td>
<td>Nunca utilize TAB apenas espaço</td>
</tr>
<tr>
<td><i class="conum" data-value="6"></i><b>6</b></td>
<td>Sempre inicie o seu script ansible com ---</td>
</tr>
</table>
</div>
</div>
<div class="sect4">
<h5 id="_salve_o_seu_playbook">Salve o seu playbook</h5>
<div id="__asciidoctor-preview-1586__" class="paragraph">
<p>Utilizando o vim salve todas as alterações do script ansible e execute a sequencia de comandos para salvar e  sair do vim ':wq!'</p>
</div>
</div>
<div class="sect4">
<h5 id="_valide_se_seu_playbook_tem_alguma_erro">Valide se seu playbook tem alguma erro</h5>
<div id="__asciidoctor-preview-1614__" class="literalblock">
<div class="content">
<pre>ansible-playbook -C -i inventario.ini  primeiroplaybook.yaml</pre>
</div>
</div>
</div>
<div class="sect4">
<h5 id="_execute_o_playbook">Execute o playbook</h5>
<div id="__asciidoctor-preview-1634__" class="literalblock">
<div class="content">
<pre>ansible-playbook -i inventario.ini  primeiroplaybook.yaml</pre>
</div>
</div>
</div>
<div class="sect4">
<h5 id="_utilizando_loop">Utilizando loop</h5>
<div id="__asciidoctor-preview-1650__" class="paragraph">
<p>Utilizando o vim crie o  segundo playbook com o nome <em>segundoplaybook.yaml</em></p>
</div>
<div id="__asciidoctor-preview-1660__" class="literalblock">
<div class="content">
<pre>vi /workshop/segundoplaybook.yaml</pre>
</div>
</div>
<div id="__asciidoctor-preview-1668__" class="listingblock">
<div class="content">
<pre>---
- name: Segundo Playbook - trabalhando com loop
  hosts: web
  remote_user: <?php echo getenv("USUARIOSSH");?><br>
  become: yes
  gather_facts: no
  vars:
   state: latest

  tasks:
  - name: Instalando Apache e PHP
    yum: name={{ item }} state={{ state }}
    with_items:
      - httpd
      - php</pre>
</div>
</div>
<div class="sect5">
<h6 id="_execute_o_playbook_2">Execute o playbook</h6>
<div id="__asciidoctor-preview-1686__" class="literalblock">
<div class="content">
<pre>ansible-playbook -i inventario.ini  segundoplaybook.yaml</pre>
</div>
</div>
</div>
</div>
</div>
<div class="sect3">
<h4 id="_lab05_trabalhando_com_handlers_manipuladores">LAB05 - Trabalhando com Handlers "Manipuladores"</h4>
<div id="__asciidoctor-preview-1720__" class="paragraph">
<p><strong>O que são  Handlers ? Qual é sua importância ?</strong></p>
</div>
<div id="__asciidoctor-preview-1724__" class="paragraph">
<p>Semelhante a uma tarefa, exceto que os handlers executam somente em resposta a uma tarefa configurada para notificar o handler na mudança de estado.</p>
</div>
<div class="sect4">
<h5 id="_exemplo_de_um_playbook_que_utiliza_handlers_para_gerenciar_o_servi_o_do_apache">Exemplo de um playbook que utiliza handlers para gerenciar o serviço do Apache</h5>
<div id="__asciidoctor-preview-1764__" class="literalblock">
<div class="content">
<pre>vi /workshop/terceiroplaybook.yaml</pre>
</div>
</div>
<div id="__asciidoctor-preview-1772__" class="listingblock">
<div class="content">
<pre>---
- name: Trabalhando com Handlers
  hosts: web
  remote_user: <?php echo getenv("USUARIOSSH");?><br>
  become: yes

  tasks:
   - name: Testando handlers do Apache
     yum: name={{ item }} state=installed
     with_items:
       - httpd
       - memcached
     notify: Restart Apache

   - template: src=templates/httpd.conf.j2 dest=/etc/httpd/conf/httpd.conf
     notify: Restart Apache

  handlers:
   - name: Restart Apache
     service: name=httpd state=restarted</pre>
</div>
</div>
<div id="__asciidoctor-preview-1776__" class="paragraph">
<p>Utilizando o vim crie o  terceiro playbook utilizando o modelo acima e  com o nome <strong><em>terceiroplaybook.yaml</em></strong></p>
</div>
<div class="sect5">
<h6 id="_execute_o_playbook_3">Execute o playbook</h6>
<div id="__asciidoctor-preview-1794__" class="literalblock">
<div class="content">
<pre>ansible-playbook -i inventario.ini  terceiroplaybook.yaml</pre>
</div>
</div>
</div>
</div>
</div>
<div class="sect3">
<h4 id="_lab06_trabalhando_com_tags">LAB06 - Trabalhando com TAGS</h4>
<div id="__asciidoctor-preview-1822__" class="paragraph">
<p><strong>Por que devo usar Tags ?</strong></p>
</div>
<div id="__asciidoctor-preview-1826__" class="paragraph">
<p>Se você tiver um grande playbook, o uso de TAGs tornar-se útil para executar uma parte específica do playbook, sem executar todo o playbook.</p>
</div>
<div id="__asciidoctor-preview-1832__" class="literalblock">
<div class="content">
<pre>vi /workshop/quartoplaybook.yaml</pre>
</div>
</div>
<div id="__asciidoctor-preview-1838__" class="listingblock">
<div class="content">
<pre>---
- name: Trabalhando com tags
  hosts: web
  remote_user: <?php echo getenv("USUARIOSSH");?><br>
  become: yes

  tasks:
  - name: Executando tag packages
    yum: name={{ item }} state=installed
    with_items:
      - httpd
      - memcached
    tags:
      - packages

  - name: "Executando Tag Configuration"
    template: src=templates/httpd.conf.j2 dest=/etc/foo.conf
    tags:
      - configuration</pre>
</div>
</div>
<div class="sect4">
<h5 id="_executando_playbook_com_tags">Executando playbook com tags</h5>
<div id="__asciidoctor-preview-1856__" class="paragraph">
<p>Executando apenas a tag configuration</p>
</div>
<div id="__asciidoctor-preview-1862__" class="literalblock">
<div class="content">
<pre>ansible-playbook -i inventario.ini  quartoplaybook.yaml --tags “configuration”</pre>
</div>
</div>
<div id="__asciidoctor-preview-1866__" class="paragraph">
<p>Executando apenas a tag notification</p>
</div>
<div id="__asciidoctor-preview-1872__" class="literalblock">
<div class="content">
<pre>ansible-playbook -i inventario.ini  quartoplaybook.yaml --skip-tags "notification"</pre>
</div>
</div>
</div>
<div class="sect4">
<h5 id="_executando_tags_padr_o_do_ansible">Executando tags padrão do Ansible</h5>
<div id="__asciidoctor-preview-1898__" class="literalblock">
<div class="content">
<pre>ansible-playbook example.yaml --tags “tagged” <i class="conum" data-value="1"></i><b>(1)</b>
ansible-playbook example.yaml --tags “untagged” <i class="conum" data-value="2"></i><b>(2)</b>
ansible-playbook example.yaml --tags “all” <i class="conum" data-value="2"></i><b>(2)</b></pre>
</div>
</div>
<div id="__asciidoctor-preview-1910__" class="colist arabic">
<table>
<tr>
<td><i class="conum" data-value="1"></i><b>1</b></td>
<td>Será executada todas as tarefas que tenham uma tag amarrada</td>
</tr>
<tr>
<td><i class="conum" data-value="2"></i><b>2</b></td>
<td>Será executada todas as tarefas sem tag</td>
</tr>
<tr>
<td><i class="conum" data-value="3"></i><b>3</b></td>
<td>Executa todas as tarefas independente da tag</td>
</tr>
</table>
</div>
</div>
</div>
<div class="sect3">
<h4 id="_lab07_trabalhando_com_condicional">LAB07 - Trabalhando com condicional</h4>
<div id="__asciidoctor-preview-1962__" class="paragraph">
<p><strong>Quando devo utilizar condicional ?</strong></p>
</div>
<div id="__asciidoctor-preview-1966__" class="paragraph">
<p>O uso de condicionais se da quando temos situações onde não sabemos exatamente qual sistema ou condicação exata que será encontrada.<br></p>
</div>
<div id="__asciidoctor-preview-1970__" class="paragraph">
<p>Neste caso o condicacional consegue aplicar uma condicação para validar se o alvo condiz com contexto do playbook e se combinar, executar o restante do playbook.</p>
</div>
<div id="__asciidoctor-preview-1976__" class="literalblock">
<div class="content">
<pre>vi /workshop/quintoplaybook.yaml</pre>
</div>
</div>
<div id="__asciidoctor-preview-1984__" class="listingblock">
<div class="content">
<pre>---
- name: Trabalhando com Condicional
  hosts: web
  remote_user: <?php echo getenv("USUARIOSSH");?><br>
  become: yes

  tasks:
  - name: Remove Apache
    yum: name=httpd state=removed
    when: ansible_os_family == "RedHat"</pre>
</div>
</div>
<div id="__asciidoctor-preview-1992__" class="literalblock">
<div class="title">Valide com comando</div>
<div class="content">
<pre>ansible-playbook -i inventario.ini  quintoplaybook.yaml</pre>
</div>
</div>
<div id="__asciidoctor-preview-1996__" class="paragraph">
<p>Desafio: Execute um playbook que rode apenas em Centos. Dica:
<a href="http://docs.ansible.com/ansible/latest/playbooks_conditionals.html" class="bare">http://docs.ansible.com/ansible/latest/playbooks_conditionals.html</a></p>
</div>
</div>
<div class="sect3">
<h4 id="_lab08_trabalhando_com_com_sa_da_de_comandos">LAB08 - Trabalhando com com saída de comandos</h4>
<div id="__asciidoctor-preview-2030__" class="literalblock">
<div class="content">
<pre>vi /workshop/sextoplaybook.yaml</pre>
</div>
</div>
<div id="__asciidoctor-preview-2038__" class="listingblock">
<div class="content">
<pre>---
- name: Trabalhando com  saida de comandos
  hosts: web
  remote_user: <?php echo getenv("USUARIOSSH");?><br>
  become: yes

  tasks:
  - name: Saida do comando httpd
    shell: httpd -v|grep version|awk '{print $3}'|cut -f2 -d'/'
    register: result

  - debug: var=result</pre>
</div>
</div>
<div class="sect4">
<h5 id="_testando_sa_da_de_comando">Testando saída de comando</h5>
<div class="sect5">
<h6 id="_execute_o_playbook_4">Execute o playbook</h6>
<div id="__asciidoctor-preview-2072__" class="literalblock">
<div class="content">
<pre>ansible-playbook -i inventario.ini  sextoplaybook.yaml</pre>
</div>
</div>
</div>
</div>
</div>
<div class="sect3">
<h4 id="_lab09_ignorando_erros">LAB09 - Ignorando erros</h4>
<div id="__asciidoctor-preview-2100__" class="literalblock">
<div class="content">
<pre>vi /workshop/setimoplaybook.yaml</pre>
</div>
</div>
<div id="__asciidoctor-preview-2108__" class="listingblock">
<div class="content">
<pre>---
- name: Ignorando errors
  hosts: web
  remote_user: <?php echo getenv("USUARIOSSH");?><br>
  become: yes

  tasks:

  - name: ping host
    command: ping -c1 www.uolbbb.com.jp
    ignore_errors: yes

  - name: remove apache mesmo depois do uolbbb.com.jp nao pingar
    yum: name=httpd state=absent</pre>
</div>
</div>
<div class="sect5">
<h6 id="_execute_o_playbook_5">Execute o playbook</h6>
<div id="__asciidoctor-preview-2126__" class="literalblock">
<div class="content">
<pre>ansible-playbook -i inventario.ini  setimoplaybook.yaml</pre>
</div>
</div>
</div>
</div>
<div class="sect3">
<h4 id="_lab10_tratando_arquivos">LAB10 - Tratando arquivos</h4>
<div id="__asciidoctor-preview-2150__" class="paragraph">
<p>Imagine uma situação onde você precisa alterar uma única linha de um arquivo de configuração em mais de 100 servidores, complicado ?  </p>
</div>
<div id="__asciidoctor-preview-2156__" class="literalblock">
<div class="content">
<pre>vi /workshop/oitavoplaybook.yaml</pre>
</div>
</div>
<div id="__asciidoctor-preview-2164__" class="listingblock">
<div class="content">
<pre>---
- name: Tratando arquivos Selinux e HTTPD
  hosts: web
  remote_user: <?php echo getenv("USUARIOSSH");?><br>
  become: yes

  tasks:
  - name: Tratando o arquivo de configuração selinux
    lineinfile:
     dest: /etc/selinux/config
     regexp: "^SELINUX="  <i class="conum" data-value="1"></i><b>(1)</b>
     line: "SELINUX=enforcing"

  - name: Tratando o arquivo de configuração httpd
    lineinfile:
     dest: /etc/httpd/conf/httpd.conf
     regexp: "^Listen " <i class="conum" data-value="2"></i><b>(2)</b>
     insertafter: "^#Listen "
     line: "Listen 8080"</pre>
</div>
</div>
<div id="__asciidoctor-preview-2174__" class="colist arabic">
<table>
<tr>
<td><i class="conum" data-value="1"></i><b>1</b></td>
<td>Abre o arquivo  /etc/selinux/config e altera a linha para SELINUX=enforcing</td>
</tr>
<tr>
<td><i class="conum" data-value="2"></i><b>2</b></td>
<td>Abre o arquivo  /etc/http/conf/httpd.conf e altera a linha para Listen 8080</td>
</tr>
</table>
</div>
<div class="sect5">
<h6 id="_execute_o_playbook_6">Execute o playbook</h6>
<div id="__asciidoctor-preview-2208__" class="literalblock">
<div class="content">
<pre>ansible-playbook -i inventario.ini  oitavoplaybook.yaml</pre>
</div>
</div>
</div>
</div>
<div class="sect3">
<h4 id="_lab11_trabalhando_com_vari_veis">LAB11 - Trabalhando com variáveis</h4>
<div id="__asciidoctor-preview-2236__" class="paragraph">
<p>Ansible não é uma linguagem de programação, mas possui vários recursos de linguagem de programação, e uma das mais importantes é o uso variáveis.</p>
</div>
<div class="sect4">
<h5 id="_exemplo_no_uso_de_vari_veis_no_ansible">Exemplo no uso de variáveis no Ansible</h5>
<div id="__asciidoctor-preview-2264__" class="literalblock">
<div class="content">
<pre>vi /workshop/nonoplaybook.yaml</pre>
</div>
</div>
<div id="__asciidoctor-preview-2272__" class="listingblock">
<div class="content">
<pre>---
- name: Trabalhando com variaveis
  hosts: web
  remote_user: <?php echo getenv("USUARIOSSH");?><br>
  become: yes

  tasks:
  - name: Show hostvars[inventory_hostname]
    debug: var=hostvars[inventory_hostname]

  - name: Show ansible_ssh_host variable in hostvars
    debug: var=hostvars[inventory_hostname].ansible_ssh_host

  - name: Show group_names
    debug: var=group_names

  - name: Show groups
    debug: var=groups</pre>
</div>
</div>
<div class="sect5">
<h6 id="_execute_o_playbook_7">Execute o playbook</h6>
<div id="__asciidoctor-preview-2290__" class="literalblock">
<div class="content">
<pre>ansible-playbook -i inventario.ini  nonoplaybook.yaml</pre>
</div>
</div>
</div>
</div>
</div>
<div class="sect3">
<h4 id="_lab12_trabalhando_com_templates">LAB12 - Trabalhando com templates</h4>
<div id="__asciidoctor-preview-2318__" class="paragraph">
<p>Se você fez a programação na Web, provavelmente usou um sistema de modelo para gerar HTML. Caso não tenha, um modelo é apenas um arquivo de texto que possui sintaxe especial para especificar variáveis que devem ser substituídas por valores.<br></p>
</div>
<div id="__asciidoctor-preview-2322__" class="paragraph">
<p>Se você já recebeu um email automatizado de uma empresa, provavelmente está usando um modelo de e-mail. </p>
</div>
<div id="__asciidoctor-preview-2326__" class="paragraph">
<p>Ansible usa o mecanismo de modelo <strong><em>Jinja2</em></strong> para implementar modelos<br></p>
</div>
<div id="__asciidoctor-preview-2332__" class="literalblock">
<div class="content">
<pre>vi /workshop/decimoplaybook.yaml</pre>
</div>
</div>
<div id="__asciidoctor-preview-2340__" class="listingblock">
<div class="content">
<pre>---
- name: Trabalhando com template jinja2
  hosts: web
  remote_user: <?php echo getenv("USUARIOSSH");?><br>
  become: yes
  vars: <i class="conum" data-value="4"></i><b>(4)</b>
    http_port: 80
    max_clients: 200
  remote_user: root

  tasks:
  - name: Valida que o Apache esteja na última versão
    yum: name=httpd state=latest <i class="conum" data-value="3"></i><b>(3)</b>

  - name: Substituia o arquivo de configuração httd.conf <i class="conum" data-value="2"></i><b>(2)</b>
    template: src=/workshop/templates/httpd.conf.j2 dest=/etc/httpd/httpd.conf <i class="conum" data-value="1"></i><b>(1)</b>
    notify:
    - restart apache

  - name: ensure apache is running (and enable it at boot)
    service: name=httpd state=started enabled=yes

  handlers:
    - name: restart apache
      service: name=httpd state=restarted <i class="conum" data-value="5"></i><b>(5)</b></pre>
</div>
</div>
<div id="__asciidoctor-preview-2356__" class="colist arabic">
<table>
<tr>
<td><i class="conum" data-value="1"></i><b>1</b></td>
<td>Ansible copia arquivo /srv/httpd.j2 para /etc/httpd.conf</td>
</tr>
<tr>
<td><i class="conum" data-value="2"></i><b>2</b></td>
<td>Utilize as variaveis substituindo o arquivo de configuração /etc/http/httpd.conf</td>
</tr>
<tr>
<td><i class="conum" data-value="3"></i><b>3</b></td>
<td>Valida que o pacote httpd na última versão</td>
</tr>
<tr>
<td><i class="conum" data-value="4"></i><b>4</b></td>
<td>Variáveis que serão utilizada na substituição de vários parametros do arquivo de configuração "httpd.conf"</td>
</tr>
<tr>
<td><i class="conum" data-value="5"></i><b>5</b></td>
<td>Este handlers garante que o serviço httpd será reinciado</td>
</tr>
</table>
</div>
<div class="sect5">
<h6 id="_execute_o_playbook_8">Execute o playbook</h6>
<div id="__asciidoctor-preview-2420__" class="literalblock">
<div class="content">
<pre>ansible-playbook -i inventario.ini  decimoplaybook.yaml</pre>
</div>
</div>
</div>
</div>
</div>
</div>
</div>



</div>
</div>
</div>
</div>
</div>
        </div>
      </div>

</div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
