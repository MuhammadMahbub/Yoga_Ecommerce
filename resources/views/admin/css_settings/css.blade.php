<style>
/* * * Resets and base styles * * */
@charset "utf-8";

@import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800;900&display=swap');
@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css");
@import url("{{ asset('frontend_assets') }}/css/sprite.css");
:root {
    --bg_color: {{ colorSettings()->bg_color }};
    --secondary_bg_color: {{ colorSettings()->secondary_bg_color }};
    --button_color: {{ colorSettings()->button_color }};
    --button_hover_color: {{ colorSettings()->button_hover_color }};
    --theme_color: {{ colorSettings()->menu_text_color }};
    --body_title_color: {{ colorSettings()->body_title_color }};
    --body_text_color: {{ colorSettings()->body_text_color }};
    --cookies-hover: {{ colorSettings()->button_color }};
}
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s,
samp,small, strike, strong, sub, sup,
tt, var,b, u, i, center,
dl, dt, dd, ol, ul, li,fieldset,
form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,time, mark, audio, video
{margin: 0;padding: 0;border: 0;font-size: 100%;font: inherit;vertical-align: baseline;background:transparent;}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure,
footer, header, hgroup, menu, nav, section
{display: block;}
body {line-height: 1;}
ol, ul {list-style: none;}
blockquote, q {quotes: none;}
blockquote:before, blockquote:after,
q:before, q:after {content: '';content: none;}
:focus {outline:0px;}
table {border-collapse: collapse;border-spacing: 0;}
button, input, select, textarea {margin:0;font-size:100%;vertical-align:middle;}
button, input {*overflow:visible;line-height:normal;}
button::-moz-focus-inner, input::-moz-focus-inner {padding:0;border:0;}
button, html input[type="button"], input[type="reset"], input[type="submit"] {-webkit-appearance:button;cursor:pointer;}
label, select, button, input[type="button"], input[type="reset"], input[type="submit"], input[type="radio"], input[type="checkbox"] {cursor:pointer;}
input[type="search"] {-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing: content-box;-webkit-appearance: textfield;}
input[type="search"]::-webkit-search-decoration, input[type="search"]::-webkit-search-cancel-button {-webkit-appearance: none;}
input {-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;text-rendering: optimizeLegibility;}
textarea {overflow:auto;vertical-align:top;}
fieldset {margin:0;padding:0;border:none;}
/* * * End of Resets and base styles * * */

/* * * Master template styles * * */
/*font-family: 'Montserrat', sans-serif;*/
html {height:100%;}
body, table, input, textarea, select, li, button, p, blockquote, ol, dl, form, pre, th, td, a {
font-family: 'Lato', sans-serif;font-size: 16px;color:var(--body_text_color);}
body {position:relative;left: 0; min-height:100%;_height:100%;min-width: 1170px;
-webkit-transition: left 0.6s ease;-moz-transition: left 0.6s ease;-o-transition: left 0.6s ease;transition: left 0.6s ease;
-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;text-rendering: optimizeLegibility;}
.wrapper {margin:0 auto;width:1170px;text-align:left;position:relative;}
.clear, #sbi_images {clear: none!important;}
.clear:after, #sbi_images:after {display: block;height: 0;visibility: hidden;clear: both;content: ".";}

/* 1 Typography */
h1, h2, h3, h4, h5, h6 {font-weight:normal;}
h1 {line-height:40px;}h2 {line-height:30px;}h3 {line-height:20px;}h4 {line-height:18px;}h5, h6 {line-height:15px;}
em {font-style: italic;}
strong {font-weight: bold;}
a:hover {text-decoration:none;}

/* Header */
#header {height: 90px;}
#header .headerWrap {width: 100%;position: fixed!important;left: 0!important;z-index: 99999; border-bottom: 1px solid var(--theme_color);background: var(--theme_color);-webkit-backface-visibility: hidden;-webkit-transform: translate3d(0, 0, 0);  background-clip: padding-box;
-webkit-transition: background 0.3s ease, border 0.3s ease, box-shadow 0.3s ease, left 0.6s ease;
-moz-transition: background 0.3s ease, border 0.3s ease, box-shadow 0.3s ease,left 0.6s ease;
-o-transition: background 0.3s ease, border 0.3s ease, box-shadow 0.3s ease,left 0.6s ease;
transition: background 0.3s ease, border 0.3s ease, box-shadow 0.3s ease,left 0.6s ease;}
.classes #header, .single-product #header, .cart #header, .single-event #header, .events #header, .catalog #header,  .contact #header,
.about #header, .home #header {position: absolute;left: 0;top: 0;width: 100%; z-index: 9999;}
.classes #header .headerWrap, .single-product #header .headerWrap, .cart #header .headerWrap, .single-event #header .headerWrap, .events #header .headerWrap, .catalog #header .headerWrap,
.contact #header .headerWrap, .about #header .headerWrap, .home #header .headerWrap {background: rgba(0,0,0,0);border-bottom-color: rgba(255,255,255,0.2);}

#header .headerWrap.is-sticky {background: var(--theme_color)!important;border-bottom-color: rgba(0,0,0,0)!important;z-index: 99999; -webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.06)!important;-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.06)!important;box-shadow: 0 1px 3px rgba(0,0,0,0.06)!important;}

.logo {display: block;float: left;margin: 29px 0 0 40px;-webkit-transition: margin 0.3s ease;-moz-transition: margin 0.3s ease;-o-transition: margin 0.3s ease;transition: margin 0.3s ease;}
.logo path {-webkit-transition: fill 0.3s ease;-moz-transition: fill 0.3s ease;-o-transition: fill 0.3s ease;transition: fill 0.3s ease;}
.classes .logo path, .single-product .logo path,  .cart .logo path, .single-event .logo path, .events .logo path, .catalog .logo path, .contact .logo path,
.about .logo path, .home .logo path {fill:var(--theme_color);}
#header .is-sticky .logo {margin-top: 14px;}
#header .is-sticky .logo path {fill:var(--body_title_color)!important;}

.logo img {-webkit-transition: opacity 0.3s ease;-moz-transition: opacity 0.3s ease;-o-transition: opacity 0.3s ease;transition: opacity 0.3s ease;}
.logo .logo-black {display: none;opacity: 0;}
#header .is-sticky .logo .logo-white {display: none; opacity: 0;}
#header .is-sticky .logo .logo-black {display: block; opacity: 1;}

#header .is-sticky .logo .logo-black,
#header .is-sticky .logo .logo-white
{
  max-height: 40px !important;
}

.single-post #header .logo .logo-white,
.blog #header .logo .logo-white,
.error404 #header .logo .logo-white {display: none!important; opacity: 0!important;}
.single-post #header .logo .logo-black,
.blog #header .logo .logo-black,
.error404 #header .logo .logo-black {display: block!important; opacity: 1!important;}

/* Menu */
.mainMenu {float: right;margin: 37px 36px 0px 0;-webkit-transition: margin 0.3s ease;-moz-transition: margin 0.3s ease;-o-transition: margin 0.3s ease;transition: margin 0.3s ease;}
.mainMenu ul {list-style: none;}
.mainMenu > ul > li {position: relative; float: left;padding-bottom: 36px; margin: 0 0 0 40px;}
.mainMenu > ul > li:first-child {margin-left: 0;}
.mainMenu > ul > li a, .mainMenu > ul > li a:visited {display: block;line-height: 16px;padding: 0 5px;white-space: nowrap;word-wrap: normal; color: var(--body_text_color);font-size: 12px;font-family: 'Montserrat', sans-serif;font-weight: bold; text-transform: uppercase;text-decoration: none;-webkit-transition: color 0.3s ease;-moz-transition: color 0.3s ease;-o-transition: color 0.3s ease;transition: color 0.3s ease;}
.mainMenu > ul > li.current-menu-item a, .mainMenu > ul > li a:hover {color: var(--body_title_color);}
.classes .mainMenu > ul > li a, .single-product .mainMenu > ul > li a, .cart .mainMenu > ul > li a, .single-event .mainMenu > ul > li a, .events .mainMenu > ul > li a,
.catalog .mainMenu > ul > li a, .contact .mainMenu > ul > li a, .about .mainMenu > ul > li a,  .home .mainMenu > ul > li a {color: var(--theme_color);opacity: 0.7;-webkit-transition: opacity 0.3s ease;-moz-transition: opacity 0.3s ease;-o-transition: opacity 0.3s ease;transition: opacity 0.3s ease;}

.classes .mainMenu > ul > li.current-menu-item a, .single-product .mainMenu > ul > li.current-menu-item a,  .cart .mainMenu > ul > li.current-menu-item a, .single-event .mainMenu > ul > li.current-menu-item a,
.events .mainMenu > ul > li.current-menu-item a, .catalog .mainMenu > ul > li.current-menu-item a, .contact .mainMenu > ul > li.current-menu-item a, .about .mainMenu > ul > li.current-menu-item a, .home .mainMenu > ul > li.current-menu-item a,
.classes .mainMenu > ul > li a:hover, .single-product .mainMenu > ul > li a:hover,  .cart .mainMenu > ul > li a:hover, .single-event .mainMenu > ul > li a:hover,
.events .mainMenu > ul > li a:hover, .catalog .mainMenu > ul > li a:hover, .contact .mainMenu > ul > li a:hover, .about .mainMenu > ul > li a:hover, .home .mainMenu > ul > li a:hover {opacity: 1;}
.showMobileMenu {display: none;}
.mobileMenu {display: none;}

.mainMenu ul li ul {display: none; position: absolute;left: 0;top: 52px;padding: 10px 0; background: #333;}
.mainMenu ul li:hover ul {display: block;}
.mainMenu ul li ul li {position: relative;}
.mainMenu ul li ul li a {position: relative; line-height: 32px; padding: 0 78px 0 20px;color: var(--body_text_color)!important;font-size: 12px;font-family: 'Lato', sans-serif;font-weight: 400;text-decoration: none;text-transform: uppercase;-webkit-transition: color 0.3s ease!important;-moz-transition: color 0.3s ease!important;-o-transition: color 0.3s ease!important;transition: color 0.3s ease!important; }
.mainMenu ul li ul li a:hover {color: var(--body_title_color)!important;}
.mainMenu ul li ul li.menu-item-has-children > a:before {position: absolute;top: 13px;right: 20px;width: 4px;height: 7px;background-position: -140px -50px;content: "";}
.mainMenu ul li ul li.menu-item-has-children:hover > a:before {background-position: -150px -50px;}
.mainMenu ul li ul li.menu-item-has-children > ul {display: none; position: absolute;left: 100%;top: -10px;}
.mainMenu ul li ul li.menu-item-has-children:hover ul {display: block;}

#header .is-sticky .mainMenu {margin-top: 22px;}
#header .is-sticky .mainMenu > ul > li {padding-bottom: 21px;}
#header .is-sticky .mainMenu ul li a {color: var(--body_text_color);}
#header .is-sticky .mainMenu ul li ul {top: 37px;}
#header .is-sticky .mainMenu ul li ul li ul {top: -10px;}

/* Container */
.container {padding-bottom:247px;width:100%; overflow:hidden;}

/* Home slider */
.homeBxSliderWrap {width: 100%; overflow: hidden;}
.homeBxSlider {width: 100%;height: 100%;opacity: 0;-webkit-transition: opacity 0.7s ease;-moz-transition: opacity 0.7s ease;-o-transition: opacity 0.7s ease;transition: opacity 0.7s ease;}
.homeBxSlider.ready {opacity: 1;}
.homeBxSlider .slide {position: relative; width: 100%; background-repeat: no-repeat;background-position: center center;background-size: cover;}
.slideDesc {position: absolute;left: 0;top: 55%;width: 100%;text-align: center;opacity: 0;-webkit-transition: opacity 0.4s ease, top 0.4s linear;-moz-transition: opacity 0.4s ease, top 0.4s linear;-o-transition: opacity 0.4s ease, top 0.4s linear;transition: opacity 0.4s ease, top 0.4s linear;}
.slide.active .slideDesc {top: 50%;opacity: 1;}
.slideDesc h2 {line-height: 70px;margin-bottom: 38px; color: var(--theme_color);font-size: 60px;font-weight: 300;text-transform: uppercase;}
.learnMore, .learnMore:visited {display: inline-block;line-height: 46px;padding: 0 40px;background: var(--button_color); color: var(--theme_color);font-size: 12px;font-family: 'Montserrat', sans-serif;text-decoration: none;text-transform: uppercase;-webkit-border-radius: 23px;-moz-border-radius: 23px;border-radius: 23px;-webkit-transition: background 0.3s ease;-moz-transition: background 0.3s ease;-o-transition: background 0.3s ease;transition: background 0.3s ease; border: 0;}
.learnMore:focus-visible,
.learnMore:hover
{background: var(--button_hover_color);}
.bx-wrapper .bx-pager {bottom: 33px;}
.bx-wrapper .bx-pager.bx-default-pager a {width: 10px;height: 10px;margin: 0 5px; border: 1px solid rgba(0,0,0,0);background: rgba(255,255,255,0.6);-webkit-transition: all 0.3s ease;-moz-transition: all 0.3s ease;-o-transition: all 0.3s ease;transition: all 0.3s ease;background-clip: padding-box; -webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.bx-wrapper .bx-pager.bx-default-pager a.active, .bx-wrapper .bx-pager.bx-default-pager a:hover {background: rgba(0,0,0,0);border-color: rgba(255,255,255,0.8);}
.bx-wrapper .bx-controls-direction a {width: 18px;height: 42px;margin-top: -21px;opacity: 0.8;-webkit-transition: opacity 0.3s ease;-moz-transition: opacity 0.3s ease;-o-transition: opacity 0.3s ease;transition: opacity 0.3s ease;}
.bx-wrapper .bx-controls-direction a:hover {opacity: 1;}
.bx-wrapper .bx-controls-direction a.bx-prev {left: 40px; background-position: 0 0;}
.bx-wrapper .bx-controls-direction a.bx-next {right: 40px; background-position: -20px 0;}

/* Home grid */
.mainItem {position: relative;}
.mainItemImg {position: relative; float: left;width: 50%;}
.mainItemImg img {display: block;width: 100%;max-width: 100%;height: auto;}
.mainItemDesc {position: absolute;right: 0;top: 0;width: 50%;height: 100%;padding: 130px 50px 0; background: var(--button_color); text-align: center;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.mainItemDesc h3 {position: relative; line-height: 56px;margin-bottom: 70px; color: var(--theme_color);font-size: 42px;font-weight: 300;text-transform: uppercase;}
.mainItemDesc h3:before {position: absolute;left: 50%;bottom: -37px;width: 46px;height: 1px; margin: 0 0 0 -23px;background: #96e9d5;content: "";}
.mainItemDesc p {line-height: 32px;margin-bottom: 72px; color: #c1f4e8;font-size: 22px;font-weight: 400;}
.mainItemDesc .viewMore, .mainItemDesc .viewMore:visited {display: inline-block;line-height: 42px;width: 160px;border: 2px solid #96e9d5;color: #96e9d5;font-size: 12px;font-family: 'Montserrat', sans-serif;text-decoration: none;text-transform: uppercase;-webkit-transition: background 0.3s ease, color 0.3s ease;-moz-transition: background 0.3s ease, color 0.3s ease;-o-transition: background 0.3s ease, color 0.3s ease;transition: background 0.3s ease, color 0.3s ease;-webkit-border-radius: 23px;-moz-border-radius: 23px;border-radius: 23px;}
.mainItemDesc .viewMore:hover {background: #96e9d5;color: var(--button_color);}

.mainItemRight .mainItemImg {float: right;}
.mainItemRight .mainItemDesc {left: 0;right: auto;}

.gridItem {position: relative;display: block; float: left;width: 50%;}
.gridItemImg {float: left;width: 50%;}
.gridItemImg img {display: block;width: 100%;max-width: 100%;height: auto;}
@media (min-width: 768px){
    .gridItemImg img {min-height: 375px; object-fit: cover;}
}
.gridItemDesc {position: absolute;right: 0;top: 0;width: 50%;height: 100%;padding: 50px 30px 0 40px; background: var(--bg_color);-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.gridItemDesc h3 {position: relative; line-height: 30px;margin-bottom: 48px; color: var(--body_title_color);font-size: 22px;font-weight: 300;text-transform: uppercase;}
.gridItem.gridItemWhite .gridItemDesc h2 {color: var(--theme_color)}
.gridItemDesc h3:before {position: absolute;left: 0;bottom: -27px;width: 46px;height: 1px;background: var(--body_title_color);content: "";}
.gridItemWhite .gridItemDesc h3:before {background: var(--theme_color);}
.gridItemDesc p {line-height: 24px;margin-bottom: 20px;  color: var(--body_text_color);font-size: 16px;font-weight: 300;}
.gridItemDesc .viewMore {position: absolute;left: 40px;bottom: 27px; width: calc(100% - 70px); line-height: 14px; color: var(--button_color);font-size: 12px;font-family: 'Montserrat', sans-serif;text-decoration: none;text-transform: uppercase;-webkit-transition: color 0.3s ease;-moz-transition: color 0.3s ease;-o-transition: color 0.3s ease;transition: color 0.3s ease;}
.gridItem2:hover .gridItemDesc .viewMore,
.gridItem:hover .gridItemDesc .viewMore {color: var(--body_title_color);}
.gridItemDesc .viewMore i {position: absolute;right: 0;top: -1px;}
.gridItemDesc .viewMore i path {-webkit-transition: fill 0.3s ease;-moz-transition: fill 0.3s ease;-o-transition: fill 0.3s ease;transition: fill 0.3s ease;}
.gridItem2:hover .gridItemDesc .viewMore i path,
.gridItem:hover .gridItemDesc .viewMore i path {fill:var(--body_title_color);}

.gridItemWhite .gridItemDesc {background: var(--button_color);}
.gridItemWhite .gridItemDesc h3 {color: var(--theme_color);}
.gridItemWhite .gridItemDesc p {color: var(--theme_color);}
.gridItemWhite .gridItemDesc .viewMore {color: var(--body_title_color);}
.gridItemWhite .gridItemDesc .viewMore i path {fill:var(--body_title_color);}
.gridItemWhite:hover .gridItemDesc .viewMore {color: var(--theme_color);}
.gridItemWhite:hover .gridItemDesc .viewMore i path {fill:var(--theme_color);}

.gridItemWrapLeft {float: left;width: 50%;}
.gridItemWrapLeft .gridItem {width: 100%;}
.gridItemVideo {position: relative; display: block; width: 100%;}
.gridItemVideo .gridItemImg {float: none;width: 100%;}
.gridItemVideo i {position: absolute;left: 50%;top: 50%;width: 72px;height: 72px; margin: -36px 0 0 -36px;background: #6dcbb5;overflow: hidden;padding-left: 2px;opacity: 0.9; -webkit-transition: opacity 0.3s ease;-moz-transition: opacity 0.3s ease;-o-transition: opacity 0.3s ease;transition: opacity 0.3s ease;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.gridItemVideo:hover i {opacity: 1;}

.gridItemWrapRight {float: right;width: 50%;}
.gridItem2 {position: relative;display: block; width: 100%;}
.gridItem2 img {display: block; width: 100%;max-width: 100%;height: auto;}
.gridItem2 .gridItemDesc {height: 50%;top: auto;bottom: 0;background: rgba(95,199,175,0.9);}

/* Home shop */
.shopItems {background: var(--secondary_bg_color);}
.blockTitle {line-height: 190px;padding: 20px 0 0 0;color: var(--body_title_color);font-size: 42px;font-weight: 300;text-transform: uppercase;text-align: center;}
.shopItemsWrap {margin-bottom: 48px; text-align: center;}
.shopItem {position: relative; display: inline-block;width: 300px;height: 300px;margin: 0 13px 30px;}
.shopItem img {display: block; width: 100%;max-width: 100%;height: auto;}
.shopItem .overlay {position: absolute;left: 0;top: 0;width: 100%;height: 100%;background: rgba(95,199,174,0.8);opacity: 0;-webkit-transition: opacity 0.3s ease;-moz-transition: opacity 0.3s ease;-o-transition: opacity 0.3s ease;transition: opacity 0.3s ease;}
.shopItem:hover .overlay {opacity: 1;}
.shopItemTextWrap {position: relative; width: 100%;height: 158px;margin-bottom: 36px; overflow: hidden;text-align: center;}
.shopItemTextWrap:before {position: absolute;left: 50%;bottom: 0;width: 46px;height: 1px;margin-left: -23px; background: var(--theme_color);content: "";}
.shopItemTextWrap p {line-height: 24px;padding: 160px 40px 0; color: var(--theme_color);font-size: 20px;font-weight: 400;-webkit-transition: padding 0.4s ease;-moz-transition: padding 0.4s ease;-o-transition: padding 0.4s ease;transition: padding 0.4s ease;}
.shopItem:hover .shopItemTextWrap p {padding-top: 70px;}

.blogPosts {}
.blogPosts .blockTitle {line-height: 198px;}
.blogPostWrap {text-align: center;}
.postItem {display: inline-block;width: 408px;height: 460px; margin: 0 13px 20px;text-align: center;vertical-align: top;}
.postItemImg {display: block;margin-bottom: 29px;}
.postItemImg img {display: block;width: 100%;height: auto;max-width: 100%;-webkit-transition: opacity 0.3s ease;-moz-transition: opacity 0.3s ease;-o-transition: opacity 0.3s ease;transition: opacity 0.3s ease;}
.postItem:hover .postItemImg img {opacity: 0.7;}
.postItemTime {display: block;margin-bottom: 22px; color: var(--button_color);font-size: 12px;font-family: 'Montserrat', sans-serif;text-transform: uppercase; text-align: center;}
.postItem h4 {line-height: 26px; padding: 0 20px;margin-bottom: 15px;}
.postItem h4 a, .postItem h4 a:visited {color: var(--body_title_color);font-size: 24px;font-weight: 300;text-decoration: none; -webkit-transition: color 0.3s ease;-moz-transition: color 0.3s ease;-o-transition: color 0.3s ease;transition: color 0.3s ease;}
.postItem:hover h4 a {color: var(--button_color);}
.postItem p {line-height: 24px;padding: 0 36px; color: var(--body_text_color);font-size: 16px;font-weight: 400;}

.classesBox {height: 560px;width: 100%;padding-top: 157px; background-attachment: fixed;background-repeat: no-repeat;background-size: cover; background-position: 50% 0;text-align: center;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.classesCategory {display: inline-block;margin-bottom: 25px; line-height: 25px;padding: 0 10px;background: var(--button_color); color: var(--theme_color);font-size: 12px;font-family: 'Montserrat', sans-serif;text-transform: uppercase;text-decoration: none;}
.classesBox h3 {line-height: 56px;margin-bottom: 39px; color: var(--theme_color);font-size: 42px;font-weight: 300;text-transform: uppercase;}

.viewClasses, .viewClasses:visited {display: inline-block;line-height: 42px;width: 160px;border: 2px solid var(--theme_color);color: var(--theme_color);font-size: 12px;font-family: 'Montserrat', sans-serif;text-transform: uppercase;text-decoration: none;-webkit-transition: background 0.3s ease, color 0.3s ease;-moz-transition: background 0.3s ease, color 0.3s ease;-o-transition: background 0.3s ease, color 0.3s ease;transition: background 0.3s ease, color 0.3s ease; -webkit-border-radius: 23px;-moz-border-radius: 23px;border-radius: 23px; -webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.viewClasses:hover {border: 2px solid var(--button_hover_color);background: var(--button_hover_color);color: var(--button_color);}

span.price {display: block;color: var(--theme_color);font-size: 30px;font-weight: 400; text-align: center;}
span.price span {position: relative;top: -11px;left: -2px; font-size: 14px;}

.loadMoreItems, .loadMoreItems:visited,
.showAllItems, .showAllItems:visited {display: block;line-height: 72px;border-top: 1px solid #e5e5e5;border-bottom: 1px solid #e5e5e5;color: var(--body_text_color);font-size: 12px;font-family: 'Montserrat', sans-serif;text-decoration: none;text-transform: uppercase;text-align: center;
-webkit-transition: background 0.3s ease, color 0.3s ease, border 0.3s ease;-moz-transition: background 0.3s ease, color 0.3s ease, border 0.3s ease;-o-transition: background 0.3s ease, color 0.3s ease, border 0.3s ease;transition: background 0.3s ease, color 0.3s ease, border 0.3s ease;}
.loadMoreItems:hover,
.showAllItems:hover {background: var(--button_color);border-color: var(--button_color);color: var(--theme_color);}

/* Footer */
#footer {position: absolute;bottom: 0;clear:both;display:block;width:100%;height: 154px;padding: 108px 0 0 0; margin:0px auto;background-color:var(--theme_color);}
.footerSocial {float: left;margin-left: 40px;}
.footerSocial a {display: block;float: left;width: 44px;height: 44px;line-height: 44px;margin-left: 16px; border: 1px solid var(--body_text_color);color: var(--body_text_color);font-size: 18px; text-decoration: none;text-align: center;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;-webkit-transition: background 0.3s ease, color 0.3s ease, border-color 0.3s ease;-moz-transition: background 0.3s ease, color 0.3s ease, border-color 0.3s ease;-o-transition: background 0.3s ease, color 0.3s ease, border-color 0.3s ease;transition: background 0.3s ease, color 0.3s ease, border-color 0.3s ease;}
.footerSocial a:hover {border-color: var(--button_color); background: var(--button_color);color: var(--theme_color);}
.footerSocial a:first-child {margin-left: 0;}

.footerSubscribe {float: right;margin-right: 40px;}
.footerSubscribe form {position: relative;width: 240px;height: 46px;}
.footerSubscribe input[type="text"] {width: 100%;height: 100%;padding: 0 62px 0 22px; border: 1px solid var(--body_text_color);color: var(--body_text_color);font-size: 12px;font-family: 'Lato', sans-serif;-webkit-border-radius: 23px;-moz-border-radius: 23px;border-radius: 23px; -webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.footerSubscribe input[type="text"]::-moz-placeholder {opacity: 1;color: var(--body_text_color);}
.footerSubscribe input[type="text"]:-ms-input-placeholder {color: var(--body_text_color);}
.footerSubscribe input[type="text"]::-webkit-input-placeholder {color: var(--body_text_color);}
.footerSubscribe .btnSubscribe {position: absolute;top: 16px;right: 23px;width: 19px;height: 14px;border: 0;padding: 0; background-position: -40px 0;text-indent: -99999px;}
.footerSubscribe .btnSubscribe:hover {background-position: -60px 0;}
.copyright {padding-top: 26px; clear: both;text-align: center;}
.copyright p {color: var(--body_text_color);font-size: 12px;}

.footerMenu {position: absolute;left: 50%;top: 122px;width: 570px;margin-left: -285px;text-align: center;}
.footerMenu li {display: inline-block;margin: 0 13px;}
.footerMenu li a, .footerMenu li a:visited {display: block;line-height: 16px;padding: 0 5px;color: var(--body_text_color);font-size: 12px;font-family: 'Montserrat', sans-serif;font-weight: bold; text-transform: uppercase;text-decoration: none;-webkit-transition: color 0.3s ease;-moz-transition: color 0.3s ease;-o-transition: color 0.3s ease;transition: color 0.3s ease;}
.footerMenu li a:hover {color: var(--button_color);}

/* About */
.pageHeader {position: relative; width: 100%;height: 560px; background-repeat: no-repeat;background-position: center center;background-size: cover; background-color: #4e4e4e; background-blend-mode: overlay;}
.pageHeader h1 {position: absolute;left: 0;top: 300px;width: 100%; color: var(--theme_color);font-size: 60px;font-family: 'Lato', sans-serif;font-weight: 300;text-transform: uppercase;text-align: center;}

/* Our story */
.ourStory {padding: 140px 0;}
.storyImg { display: block; text-align: center;  margin-bottom: 50px}
.storyImg img {width: 100%;height: 100%; max-height: 450px; object-fit: cover}
/* .storyDesc {float: right;width: 500px;} */
.contactInfo h3,
.storyDesc h3 {position: relative; line-height: 36px;margin-bottom: 106px; color: var(--body_title_color);font-size: 56px;font-family: 'Lato', sans-serif;font-weight: 300;}
.contactInfo h3:before,
.storyDesc h3:before {position: absolute;left: 3px;bottom: -51px;width: 46px;height: 1px;background: var(--button_color);content: "";}
.contactInfo p,
.storyDesc p {line-height: 30px;margin-bottom: 30px; color: var(--body_text_color);font-size: 16px;font-family: 'Lato', sans-serif;font-weight: 300;}
.contactInfo p {line-height: 26px;}
.storyDesc p:last-child {margin-bottom: 0;}

/* Our team */
.ourTeam {background: var(--secondary_bg_color);}
.ourValues .blockTitle,
.ourTeam .blockTitle {padding-top: 0;}
.teamItemWrap {position: relative;}
.teamItem {position: relative; float: left;width: 25%;cursor: pointer;}
.teamItem img {display: block;width: 100%;height: 100%;max-width: 100%;}
.teamItem .overlay {position: absolute;left: 0;top: 0;width: 100%;height: 100%;background: rgba(95,199,174,0.8);opacity: 0;-webkit-transition: opacity 0.3s ease;-moz-transition: opacity 0.3s ease;-o-transition: opacity 0.3s ease;transition: opacity 0.3s ease;}
.teamItem:hover .overlay {opacity: 1;}
.teamItemNameWrap {position: relative; width: 100%;height: calc(50% + 10px);margin-bottom: 34px;overflow: hidden; }
.teamItemNameWrap:before {position: absolute;left: 50%;bottom: 0;width: 46px;height: 1px;margin-left: -23px; background: var(--theme_color);content: "";}
.teamItemNameWrap h3 {padding-top: 170px; color: var(--theme_color);font-size: 20px;font-family: 'Lato', sans-serif;font-weight: 400;text-transform: uppercase;text-align: center;-webkit-transition: padding 0.4s ease;-moz-transition: padding 0.4s ease;-o-transition: padding 0.4s ease;transition: padding 0.4s ease;}
.teamItem:hover .teamItemNameWrap h3 {padding-top: 110px;}
.teamItem .overlay p {color: var(--theme_color);font-size: 20px;font-family: 'Lato', sans-serif;font-weight: 400;text-align: center;}

.teamItemDesc {position: fixed;left: 0;top: 0;width: 100%;height: 100%;padding: 60px 20px;background: var(--theme_color); text-align: center;z-index: -1;opacity: 0;-webkit-transition: opacity 0.3s ease, z-index 0.3s ease;-moz-transition: opacity 0.3s ease, z-index 0.3s ease;-o-transition: opacity 0.3s ease, z-index 0.3s ease;transition: opacity 0.3s ease, z-index 0.3s ease; -webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.teamItemDesc.show {z-index: 999999;opacity: 1;}
.teamItemDescWrap {width: 630px;height: 100%; margin: 0 auto;}
.teamItemDescWrap .jspVerticalBar {width: 1px;right: 2px;}
.teamItemDescWrap .jspTrack {background: #c1f4e8;}
.teamItemDescWrap .jspDrag {width: 5px;left: -2px; background: #c1f4e8;}

.teamItemDesc img {margin-bottom: 33px; -webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;}
.teamItemDesc h3 {margin-bottom: 6px; color: var(--body_title_color);font-size: 16px;font-family: 'Lato', sans-serif;font-weight: 400;text-transform: uppercase;}
.teamItemDesc p {width: 630px;margin: 0 auto 48px; line-height: 30px;padding: 0 30px; color: var(--body_title_color);font-size: 16px;font-family: 'Lato', sans-serif;font-weight: 400;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.teamItemDescText1 {position: relative;}
.teamItemDescText1:before {position: absolute;left: 50%;bottom: -22px;margin-left: -23px;width: 46px;height: 1px;background: var(--theme_color);content: "";}
.teamItemDesc p.teamItemDescText {margin-bottom: 55px; color: var(--body_text_color);}

.teamItemSocial {width: 100%;text-align: center;}
.teamItemSocial a {display: inline-block; width: 44px;height: 44px;line-height: 44px;margin: 0 6px; border: 1px solid #c1f4e8;color: #c1f4e8;font-size: 18px; text-decoration: none;text-align: center;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;-webkit-transition: background 0.3s ease, color 0.3s ease;-moz-transition: background 0.3s ease, color 0.3s ease;-o-transition: background 0.3s ease, color 0.3s ease;transition: background 0.3s ease, color 0.3s ease;}
.teamItemSocial a:hover {background: var(--button_color);color: var(--bg_color);}

.closeTeamDesc {position: absolute;top: 40px;right: 40px; width: 16px;height: 16px;cursor: pointer;}

/* Our values */
.ourValues {}
.parallaxBox {position: relative; height: 560px;width: 100%;padding-top: 157px; background-attachment: fixed;background-repeat: no-repeat;background-size: cover;background-position: center center;text-align: center;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.parallaxBox h3 {position: absolute;top: 50%;left: 0;width: 100%; line-height: 56px;margin-top: -28px; color: var(--theme_color);font-size: 42px;font-weight: 300;text-transform: uppercase;}
.ourValues .wrapper {width: 570px;padding: 65px 0;}
.ourValues .wrapper p {line-height: 30px;color: var(--body_text_color);font-size: 16px;font-family: 'Lato', sans-serif;font-weight: 300;text-align: center;}

.sb_instagram_header {padding: 34px 0 34px; background: var(--button_color);text-align: center;-webkit-transition: background 0.3s ease;-moz-transition: background 0.3s ease;-o-transition: background 0.3s ease;transition: background 0.3s ease;}
.sb_instagram_header:hover {background: var(--button_hover_color);}
.sbi_header_link {display: inline-block;position: relative; padding-left: 46px;line-height: 26px; color: var(--theme_color);font-size: 24px;font-family: 'Lato', sans-serif;font-weight: 300;text-transform: uppercase;text-decoration: none;}
/* .sbi_header_link:before {position: absolute;left: 0;top: 0;width: 26px;height: 26px;background-position: -80px 0;content: "";} */


#sb_instagram #sbi_load {display: none !important;}
#sb_instagram img {display: block; box-shadow: 0 0 0 rgba(0, 0, 0, 0);height: 100% !important;max-width: 100% !important;width: 100% !important;-webkit-transition: opacity 0.3s ease;-moz-transition: opacity 0.3s ease;-o-transition: opacity 0.3s ease;transition: opacity 0.3s ease;}
.sbi_item:hover img {opacity: 0.85;}
.sbi_item {display: inline-block;float: left; width: 20%;}
.sbi_item a {display: block;}

/* Blog */
.single-post,
.blog {background: var(--secondary_bg_color);}
.single-post .container,
.blog .container {padding-top: 60px;}
.blog .blogPostWrap {padding-bottom: 50px;}
.blog .postItem {height: 470px; margin-bottom: 30px;border-bottom: 1px solid #e9e9e9; background: var(--theme_color);}

/* Single post */
.single-post .wrapper {width: 770px;}
.singlePostWrap h1, .singlePostWrap h2, .singlePostWrap h3, .singlePostWrap h4, .singlePostWrap h5 {position: relative; line-height: 66px;margin-bottom: 100px; color: var(--body_title_color);font-size: 56px;font-family: 'Lato', sans-serif;font-weight: 300;text-align: center;}
.singlePostWrap h1:before {position: absolute;left: 50%;bottom: -50px;width: 46px;height: 1px;margin-left: -23px; background: var(--button_color);content: "";}
.singlePostWrap h2 {line-height: 50px;margin-bottom: 22px;margin-top: 32px; font-size: 46px;text-align: left;}
.singlePostWrap h3 {line-height: 46px;margin-bottom: 22px;margin-top: 32px; font-size: 40px;text-align: left;}
.singlePostWrap h4 {line-height: 40px;margin-bottom: 22px;margin-top: 32px; font-size: 36px;text-align: left;}
.singlePostWrap h5 {line-height: 36px;margin-bottom: 22px;margin-top: 32px; font-size: 30px;text-align: left;}

.singlePostWrap h5 a, .singlePostWrap h5 a:visited,
.singlePostWrap h4 a, .singlePostWrap h4 a:visited,
.singlePostWrap h3 a, .singlePostWrap h3 a:visited,
.singlePostWrap h2 a, .singlePostWrap h2 a:visited {color: var(--button_color);font-size: 46px;font-family: 'Lato', sans-serif;font-weight: 300;text-decoration: none;}
.singlePostWrap h3 a, .singlePostWrap h3 a:visited {font-size: 40px;}
.singlePostWrap h4 a, .singlePostWrap h4 a:visited {font-size: 36px;}
.singlePostWrap h5 a, .singlePostWrap h5 a:visited {font-size: 30px;}

.singlePostWrap p {line-height: 33px;margin-bottom: 22px; color: var(--body_text_color);font-size: 20px;font-family: 'Lato', sans-serif;font-weight: 300;}
.singlePostWrap p a, .singlePostWrap p a:visited {color: var(--button_color);font-size: 20px;font-family: 'Lato', sans-serif;font-weight: 300;text-decoration: none;}

.singlePostWrap img.size-full {width: 100%;max-width: 100%;height: auto; margin-bottom: 22px;}
.singlePostWrap img.aligncenter {display: block;margin: 0 auto 22px;}
.singlePostWrap img.alignleft {display: block;float: left; margin: 0 22px 22px 0;}
.singlePostWrap img.alignright {display: block;float: right; margin: 0 0 22px 22px;}

.singlePostWrap ul, .singlePostWrap ol  {list-style: none;margin-bottom: 42px;margin-top: 42px; margin-left: 52px;}
.singlePostWrap ol {counter-reset: item;}
.singlePostWrap ul li, .singlePostWrap ol li {position: relative; line-height: 30px;margin-bottom: 20px; color: var(--body_text_color);font-size: 20px;font-family: 'Lato', sans-serif;font-weight: 300;}
.singlePostWrap ul li:before {position: absolute;left: -24px;top: 14px;width: 6px;height: 6px;background: var(--button_color);content: "";-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;}
.singlePostWrap ol li:before {position: absolute;left: -24px;top: 1px;content: counter(item) ". "; counter-increment: item;color: var(--button_color); font-size: 20px;font-family: 'Lato', sans-serif;font-weight: 400;}
.singlePostWrap p a, .singlePostWrap p a:visited, .singlePostWrap ul li a, .singlePostWrap ul li a:visited,
.singlePostWrap ol li a, .singlePostWrap ol li a:visited {display: inline-block;  color: var(--button_color);font-size: 20px;font-family: 'Lato', sans-serif;font-weight: 300;text-decoration: none;}

.singlePostWrap blockquote {padding: 10px 0 10px 30px;margin: 32px 0 32px 30px; border-left: 3px solid var(--button_color);}
.singlePostWrap blockquote p {margin-bottom: 0;line-height: 33px; color: var(--body_text_color);font-size: 20px;font-family: 'Lato', sans-serif;font-weight: 300;}
.singlePostWrap blockquote p a, .singlePostWrap blockquote p a:visited {color: var(--button_color);font-size: 20px;font-family: 'Lato', sans-serif;font-weight: 300;text-decoration: none;}

.singlePostTags {padding-top: 24px;margin-bottom: 58px; color: var(--body_text_color);font-size: 16px;font-family: 'Lato', sans-serif;font-weight: 300;}
.singlePostTags span {display: inline-block;margin-right: 10px; color: var(--body_text_color);font-size: 12px;font-family: 'Montserrat', sans-serif;text-transform: uppercase;}
.singlePostTags a, .singlePostTags a:visited {display: inline-block;color: var(--body_text_color);font-size: 16px;font-family: 'Lato', sans-serif;font-weight: 300;text-decoration: none;-webkit-transition: color 0.3s ease;-moz-transition: color 0.3s ease;-o-transition: color 0.3s ease;transition: color 0.3s ease;}
.singlePostTags a:hover {color: #333;}

.shareSinglePost {margin-bottom: 100px;text-align: center;}
.shareSinglePost a {display: inline-block;width: 44px;height: 44px;line-height: 44px;margin: 0 6px; border: 1px solid #c9c9c9;color: #c9c9c9;font-size: 18px; text-decoration: none;text-align: center;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;-webkit-transition: background 0.3s ease, color 0.3s ease;-moz-transition: background 0.3s ease, color 0.3s ease;-o-transition: background 0.3s ease, color 0.3s ease;transition: background 0.3s ease, color 0.3s ease;}
.shareSinglePost a:hover {background: var(--button_color);color: var(--secondary_bg_color);}

.relatedPosts {border-bottom: 1px solid #e5e5e5; background: var(--theme_color);}
.relatedPosts .blockTitle {padding-top: 0;}

/* Contact */
.ourContact .wrapper {width: 1170px; padding: 140px 0 80px;}
.contactGallery {float: left;width: 570px;}
.contactInfo {float: right;width: 500px;}
.contactInfo p {position: relative;padding-left: 56px;}
.contactInfo p i {position: absolute;left: 0;top: 0;}
.contactInfo p i.contactPhone {display: block;top: 1px; width: 27px;height: 27px;background-position: -110px 0;}
.contactInfo p i.contactEmail {display: block;top: 4px; width: 29px;height: 21px;background-position: -140px 0;}
.contactInfo p i.contactLocation {display: block;top: 1px; width: 22px;height: 31px;background-position: -170px 0;}

.locationMap {}
.location-map {width: 100%;height: 500px;}
.location-map .map {height: 500px;}
.contactGallery .bx-wrapper .bx-pager {bottom: 18px;}

/* Catalog */
.catalog {background: var(--secondary_bg_color);}
.contentWrap {position: relative;-webkit-transition:transform 0.33s cubic-bezier(0.33, 0, 0.2, 1) 0s;-moz-transition:transform 0.33s cubic-bezier(0.33, 0, 0.2, 1) 0s; -o-transition:transform 0.33s cubic-bezier(0.33, 0, 0.2, 1) 0s; transition:transform 0.33s cubic-bezier(0.33, 0, 0.2, 1) 0s;}
.contentWrap.showMiniCart {-webkit-transform:translate3d(-361px, 0px, 0px);-moz-transform:translate3d(-361px, 0px, 0px);-ms-transform:translate3d(-361px, 0px, 0px);-o-transform:translate3d(-361px, 0px, 0px);transform:translate3d(-361px, 0px, 0px);}
.contentWrap > .overlay {position: absolute;left: 0;top: 0;width: 100%;height: 100%;z-index: -1;background: rgba(255,255,255,0);-webkit-transition: all 0.3s ease;-moz-transition: all 0.3s ease;-o-transition: all 0.3s ease;transition: all 0.3s ease;}
.contentWrap.showMiniCart > .overlay {z-index: 2;background: rgba(255,255,255,0.4);}

.pagePanel {height: 72px; padding: 0 40px;margin-bottom: 40px; border-bottom: 1px solid #e5e5e5;background: var(--secondary_bg_color);}
.productFilter {float: left;margin-top: 26px;}
.productFilter li {display: block;float: left;margin-left: 52px;}
.productFilter li:first-child {margin-left: 0;}
.productFilter li a, .productFilter li a:visited {display: block;line-height: 22px;color: var(--body_text_color);font-size: 12px;font-family: 'Montserrat', sans-serif;text-transform: uppercase;text-decoration: none;-webkit-transition: color 0.3s ease;-moz-transition: color 0.3s ease;-o-transition: color 0.3s ease;transition: color 0.3s ease;}
.productFilter li a.active, .productFilter li a:hover {color: var(--button_color);}

/* Mini cart */
.miniCart {float: right;position: relative; padding-left: 26px;line-height: 22px;margin-top: 25px; cursor: pointer;}
.miniCart i {position: absolute;left: 0;top: -3px;width: 20px;height: 26px;background-position: -200px 0;}
.miniCart span {display: block;width: 22px;height: 22px;line-height: 21px;background: var(--theme_color);color: var(--body_text_color);font-size: 12px;font-family: 'Lato', sans-serif;font-weight: 400; text-align: center;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;}

.miniCartPopup {position: absolute;right: -361px;top: 0;width: 360px;height: 100%; border-left: 1px solid #e5e5e5;background: var(--secondary_bg_color);}
.miniCartPopupHead {position: relative; height: 72px;padding-left: 30px; border-bottom: 1px solid #e5e5e5;}
.closeCartPopup {display: block;position: absolute;top: 31px;right: 40px;width: 10px;height: 10px;background-position: -225px 0; cursor: pointer;text-indent: -999999px;overflow: hidden;}
.removeCartItem {display: block; width: 10px;height: 10px;background-position: -225px 0;text-indent: -999999px;overflow: hidden;}
.miniCartPopupHead h3 {line-height: 72px; color: var(--body_text_color);font-size: 12px;font-family: 'Montserrat', sans-serif;text-transform: uppercase;}

.miniCartItemWrap {padding: 0 40px 0 30px;}
.miniCartItem {position: relative; padding: 30px 18px 30px 104px;min-height: 88px;border-bottom: 1px solid #e5e5e5;}
.miniCartItemImg {position: absolute;display: block; left: 0;top: 30px;width: 88px;height: 88px;line-height: 88px;background: var(--theme_color);text-align: center;}
.miniCartItemImg img {display: inline-block;vertical-align: middle;}
.removeMiniCartItem {position: absolute;top: 36px;right: 0;width: 8px;height: 8px;background-position: -235px 0;cursor: pointer;}
.miniCartItem h3 {line-height: 16px;margin-bottom: 8px;}
.miniCartItem h3 a, .miniCartItem h3 a:visited {color: var(--body_title_color);font-size: 14px;font-family: 'Lato', sans-serif;font-weight: 400;text-decoration: none;-webkit-transition: color 0.3s ease;-moz-transition: color 0.3s ease;-o-transition: color 0.3s ease;transition: color 0.3s ease;}
.miniCartItem h3 a:hover {color: var(--button_color);}
.miniCartItem .price {color: var(--body_text_color);font-size: 14px;font-family: 'Lato', sans-serif;font-weight: 300;}
.miniCartItem .quantity span {display: block;float: left;width: 74px;line-height: 30px; color: var(--body_text_color);font-size: 14px;font-family: 'Lato', sans-serif;font-weight: 300;}
.miniCartItem .quantity input[type="text"] {border: 0;padding: 0;background: var(--theme_color); width: 30px;height: 30px;color: var(--body_text_color);font-size: 14px;font-family: 'Lato', sans-serif;font-weight: 300;text-align: center;}
.miniCartSubTotal {line-height: 30px;padding: 21px 0; color: var(--body_title_color);font-size: 16px;font-family: 'Lato', sans-serif;font-weight: 300;text-transform: uppercase;}
.miniCartSubTotal span {float: right;}

.btnViewCart, .btnViewCart:visited {display: block;line-height: 42px;margin-bottom: 20px; border: 2px solid var(--button_color);color: var(--button_color);font-size: 12px;font-family: 'Montserrat', sans-serif;text-transform: uppercase;text-decoration: none;text-align: center;-webkit-transition: background 0.3s ease, color 0.3s ease;-moz-transition: background 0.3s ease, color 0.3s ease;-o-transition: background 0.3s ease, color 0.3s ease;transition: background 0.3s ease, color 0.3s ease;}
.btnViewCart:hover {background: var(--button_color);color: var(--theme_color);}
.btnCheckout, .btnCheckout:visited {display: block;line-height: 42px;margin-bottom: 20px; border: 2px solid var(--button_color);background: var(--button_color);color: var(--theme_color);font-size: 12px;font-family: 'Montserrat', sans-serif;text-transform: uppercase;text-decoration: none;text-align: center;-webkit-transition: background 0.3s ease, color 0.3s ease;-moz-transition: background 0.3s ease, color 0.3s ease;-o-transition: background 0.3s ease, color 0.3s ease;transition: background 0.3s ease, color 0.3s ease;}
.btnCheckout:hover {background: #70d3bb;border-color: #70d3bb;}

/* Empry mini cart */
.miniCartEmpty {padding-top: 100px; text-align: center;}
.miniCartEmpty i {display: inline-block;width: 62px;height: 80px;margin-bottom: 20px; background-position: -245px 0;}
.miniCartEmpty p {color: var(--body_text_color);font-size: 18px;font-family: 'Lato', sans-serif;font-weight: 300;}

/* Events */
.events {background: var(--secondary_bg_color);}
.events .pagePanel {margin-bottom: 0;}
.pageTitle {float: left; line-height: 72px;color: var(--body_text_color);font-size: 26px;font-family: 'Lato', sans-serif;font-weight: 300;text-transform: uppercase;}
.categoryList {position: relative; float: right;margin-right: -40px;}
.categoryList span {display: block; position: relative;padding-right: 20px;line-height: 72px;padding: 0 60px 0 40px; color: var(--body_text_color);font-size: 12px;font-family: 'Lato', sans-serif;font-weight: 400;text-transform: uppercase;cursor: pointer;-webkit-transition: all 0.3s ease;-moz-transition: all 0.3s ease;-o-transition: all 0.3s ease;transition: all 0.3s ease;}
.categoryList span.clicked, .categoryList:hover span {background: #8a8a8a;color: var(--secondary_bg_color);}
.categoryList span i {position: absolute;right: 40px;top: 33px;width: 12px;height: 6px;background-position: -320px 0;}
.categoryList span.clicked i, .categoryList:hover span i {background-position: -320px -10px;}
.categoryList ul {display: none; position: absolute;top: 72px;left: 0;width: 100%;z-index: 2;}
.categoryList ul li {display: block;}
.categoryList ul li a, .categoryList ul li a:visited {display: block;line-height: 72px;padding-left: 40px;background: #8a8a8a;color: var(--secondary_bg_color);font-size: 12px;font-family: 'Lato', sans-serif;font-weight: 300;text-transform: uppercase;text-decoration: none;-webkit-transition: background 0.3s ease;-moz-transition: background 0.3s ease;-o-transition: background 0.3s ease;transition: background 0.3s ease;}
.categoryList ul li.current a, .categoryList ul li a:hover {background: #b1b1b1;}

.eventItem {position: relative;min-height: 341px;border-bottom: 1px solid #e5e5e5; padding-left: 552px;background: var(--theme_color);}
.eventItemImg {display: block;position: absolute;left: 0;top: 0;width: 502px; height: 100%;}
.eventItemImg img {display: block;width: 100%;max-width: 100%;height: 100%;object-fit: cover;}

.eventItemDesc {padding: 44px 40px 0 0;}
.eventItemTime {display: inline-block;line-height: 25px;padding: 0 6px;margin-bottom: 25px; background: var(--button_color);color: var(--theme_color);font-size: 12px;font-family: 'Montserrat', sans-serif;text-transform: uppercase;}
.eventItemDesc h3 {line-height: 26px;padding-right: 80px;margin-bottom: 16px;}
.eventItemDesc h3 a, .eventItemDesc h3 a:visited {color: var(--body_title_color);font-size: 24px;font-family: 'Lato', sans-serif;font-weight: 400;text-transform: uppercase;text-decoration: none;-webkit-transition: color 0.3s ease;-moz-transition: color 0.3s ease;-o-transition: color 0.3s ease;transition: color 0.3s ease;}
.eventItemDesc h3 a:hover {color: var(--button_color);}
.eventItemDesc p {line-height: 24px;padding-right: 80px; color: var(--body_text_color);font-size: 16px;font-family: 'Lato', sans-serif;font-weight: 300;}

.eventLearnMore, .eventLearnMore:visited {display: block;position: absolute;right: 40px;bottom: 20px;width: calc(100% - 592px);height: 40px; line-height: 40px;color: var(--button_color);font-size: 12px;font-family: 'Montserrat', sans-serif;text-transform: uppercase;text-decoration: none;}
.eventLearnMore i {position: absolute;right: 0;top: 0;width: 38px;height: 38px;border: 1px solid #63c8b0;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;-webkit-transition: background 0.3s ease;-moz-transition: background 0.3s ease;-o-transition: background 0.3s ease;transition: background 0.3s ease;}
.eventLearnMore:hover i {background: #63c8b0;}
.eventLearnMore i path {-webkit-transition: fill 0.3s ease;-moz-transition: fill 0.3s ease;-o-transition: fill 0.3s ease;transition: fill 0.3s ease;}
.eventLearnMore:hover i path {fill:var(--theme_color);}

.showMoreEvents, .showMoreEvents:visited {display: block;line-height: 72px;border-bottom: 1px solid #e5e5e5;color: var(--body_text_color);font-size: 12px;font-family: 'Montserrat', sans-serif;text-transform: uppercase;text-align: center;text-decoration: none;cursor: pointer; -webkit-transition: background 0.3s ease, color 0.3s ease, border 0.3s ease;-moz-transition: background 0.3s ease, color 0.3s ease, border 0.3s ease;-o-transition: background 0.3s ease, color 0.3s ease, border 0.3s ease;transition: background 0.3s ease, color 0.3s ease, border 0.3s ease;}
.showMoreEvents:hover {color: var(--theme_color);background: var(--button_color);border-color: var(--button_color);}

/* Subscribe box */
.subscribeBox {width: 100%;height: 560px;padding-top: 130px; background-repeat: no-repeat;background-size: cover;background-position: center center;text-align: center;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.iconEmail {display: inline-block;width: 36px;height: 26px;margin-bottom: 64px; background-position: -340px 0;}
.subscribeBox h3 {margin-bottom: 38px; color: var(--theme_color);font-size: 42px;font-family: 'Lato', sans-serif;font-weight: 300;text-transform: uppercase;}
.subscribeBox p {line-height: 32px;margin-bottom: 53px; color: var(--theme_color);font-size: 22px;font-family: 'Lato', sans-serif;font-weight: 300;}
.subscribeBox form {width: 510px;margin: 0 auto;}
.subscribeBox form input[type="text"] {float: left; width: 340px;height: 46px;padding: 0 22px; border: 2px solid var(--theme_color);background: rgba(0,0,0,0);color: var(--theme_color);font-size: 12px;font-family: 'Montserrat', sans-serif;-webkit-border-radius: 23px;-moz-border-radius: 23px;border-radius: 23px; -webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.subscribeBox form input[type="text"]::-moz-placeholder {opacity: 1;color: var(--theme_color);}
.subscribeBox form input[type="text"]:-ms-input-placeholder {color: var(--theme_color);}
.subscribeBox form input[type="text"]::-webkit-input-placeholder {color: var(--theme_color);}
.subscribeSubmit {float: right;width: 150px;height: 46px;border: 2px solid var(--button_color);background: var(--button_color);color: var(--theme_color);font-size: 12px;font-family: 'Montserrat', sans-serif;text-transform: uppercase;text-align: center;-webkit-border-radius: 23px;-moz-border-radius: 23px;border-radius: 23px;-webkit-transition: background 0.3s ease, border 0.3s ease;-moz-transition: background 0.3s ease, border 0.3s ease;-o-transition: background 0.3s ease, border 0.3s ease;transition: background 0.3s ease, border 0.3s ease; -webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.subscribeSubmit:hover {background: #70d3bb;border-color: #70d3bb;}

/* Single event */
.single-event .wrapper {width: 770px;}
.single-event .pagePanel {margin-bottom: 59px;}
.single-event .shareSinglePost {padding-top: 29px; margin-bottom: 60px;}
.backToBtn, .backToBtn:visited {display: block;position: relative; float: left;line-height: 12px;margin-top: 30px; padding-left: 18px;color: var(--body_text_color);font-size: 12px;font-family: 'Lato', sans-serif;font-weight: 400;text-transform: uppercase;text-decoration: none;-webkit-transition: color 0.3s ease;-moz-transition: color 0.3s ease;-o-transition: color 0.3s ease;transition: color 0.3s ease;}
.backToBtn i {display: block;position: absolute;left: 0;top: 1px;width: 6px;height: 11px;background-position: 0 -50px;}
.backToBtn:hover {color: var(--button_color);}

.nextEventBox {width: 100%;height: 560px;padding-top: 143px; background-repeat: no-repeat;background-size: cover;background-position: center center;text-align: center;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box; background-color: #4e4e4e; background-blend-mode: overlay;}
.nextEventBox h3 {line-height: 56px; margin-bottom: 50px; color: var(--theme_color);font-size: 42px;font-family: 'Lato', sans-serif;font-weight: 300;text-transform: uppercase;}
.nextEventBtn, .nextEventBtn:visited {display: inline-block;width: 150px;height: 44px;line-height: 40px; border: 2px solid var(--theme_color);color: var(--theme_color);font-size: 12px;font-family: 'Montserrat', sans-serif;text-transform: uppercase;text-decoration: none;-webkit-border-radius: 22px;-moz-border-radius: 22px;border-radius: 22px; -webkit-transition: background 0.3s ease, border 0.3s ease;-moz-transition: background 0.3s ease, border 0.3s ease;-o-transition: background 0.3s ease, border 0.3s ease;transition: background 0.3s ease, border 0.3s ease; -webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.nextEventBtn:hover {background: var(--button_color);border-color: var(--button_color);}

/* Cart */
.cart .pagePanel {margin-bottom: 0;}
.cartPage {padding-bottom: 100px;border-bottom: 1px solid #e5e5e5;}
.cartPage table {width: 100%;max-width: 100%;margin-bottom: 20px;  background-color: transparent; border-collapse: collapse; border-spacing: 0;}
.cartPage table th {padding: 15px 0; line-height: 18px;border-bottom: 1px solid #e5e5e5; color: var(--body_text_color);font-size: 14px;font-family: 'Lato', sans-serif;font-weight: 300; text-align: center; vertical-align: top;}
.cartPage table th:first-child {width: 50%;}
.cartPage table td {padding: 40px 0; line-height: 44px;border-bottom: 1px solid #e5e5e5; color: var(--body_title_color);font-size: 16px;font-family: 'Lato', sans-serif;font-weight: 400;  text-align: center; vertical-align: middle;}
.cartPage table td:first-child {padding-left: 40px;}
.cartProduct {position: relative;padding-left: 188px;min-height: 128px;line-height: 128px;text-align: left;}
.cartProductImg {display: block;position: absolute;left: 0;top: 0;width: 128px;height: 128px;}
.cartProductImg img {display: block;width: 128px;max-width: 128px;height: auto;-webkit-transition: opacity 0.3s ease;-moz-transition: opacity 0.3s ease;-o-transition: opacity 0.3s ease;transition: opacity 0.3s ease;}
.cartProductImg:hover img {opacity: 0.8;}
.cartProduct h4 {display: inline-block;vertical-align: middle;}
.cartProduct h4 a, .cartProduct h4 a:visited {color: var(--body_title_color);font-size: 16px;font-family: 'Lato', sans-serif;font-weight: 400;text-decoration: none;-webkit-transition: color 0.3s ease;-moz-transition: color 0.3s ease;-o-transition: color 0.3s ease;transition: color 0.3s ease;}
.cartProduct h4 a:hover {color: var(--button_color);}
.quantityBox input[type="number"] {width: 44px;height: 44px;border: 1px solid #e5e5e5;color: #333;font-size: 16px;font-family: 'Lato', sans-serif;font-weight: 400;text-align: center;-moz-appearance: textfield;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.quantityBox input[type="number"]::-webkit-inner-spin-button,
.quantityBox input[type="number"]::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }

.cartTotals {float: right;width: 380px;margin-right: 40px;}

.coupon {position: relative;margin-bottom: 20px;}
.coupon label {display: block; line-height: 54px;color: var(--body_title_color);font-size: 18px;font-family: 'Lato', sans-serif;font-weight: 300;text-transform: uppercase;}
.coupon input[type="text"] {width: 100%;height: 46px;border: 1px solid #e5e5e5;padding: 0 64px 0 18px;color: var(--body_text_color);font-size: 12px;font-family: 'Lato', sans-serif;font-weight: 400;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.coupon input[type="text"]::-moz-placeholder {opacity: 1;}
.coupon input[type="text"]:-ms-input-placeholder {color: var(--body_text_color);}
.coupon input[type="text"]::-webkit-input-placeholder {color: var(--body_text_color);}
.coupon .applyCoupon {position: absolute;bottom: 8px;right: 19px; width: 28px;height: 20px;padding: 0;border: 0;box-shadow: none;text-indent: -999999px;overflow: hidden; background-position: -10px -50px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.coupon .applyCoupon:hover {background-position: -40px -50px;}

.cartTotalsWrap h2 {display: block; line-height: 54px;color: var(--body_title_color);font-size: 18px;font-family: 'Lato', sans-serif;font-weight: 300;text-transform: uppercase;}
.cartTotalsWrap p {margin-bottom: 20px; color: var(--body_title_color);font-size: 18px;font-family: 'Lato', sans-serif;font-weight: 300;}
.cartTotalsWrap p span {float: right;}
.updateCartBtn {float: left; width: 180px;height: 46px;padding: 0;box-shadow: none;background: rgba(0,0,0,0); border: 2px solid var(--button_color);color: var(--button_color);font-size: 12px;font-family: 'Montserrat', sans-serif;text-transform: uppercase;text-align: center;-webkit-transition: color 0.3s ease, background 0.3s ease;-moz-transition: color 0.3s ease, background 0.3s ease;-o-transition: color 0.3s ease, background 0.3s ease;transition: color 0.3s ease, background 0.3s ease; -webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.updateCartBtn:hover {background: var(--button_color);color: var(--theme_color);}

.checkoutBtn {float: right;width: 180px;height: 46px;padding: 0;box-shadow: none;background: var(--button_color); border: 2px solid var(--button_color);color: var(--button_hover_color);font-size: 12px;font-family: 'Montserrat', sans-serif;text-transform: uppercase;text-align: center;-webkit-transition: background 0.3s ease, border 0.3s ease;-moz-transition: background 0.3s ease, border 0.3s ease;-o-transition: background 0.3s ease, border 0.3s ease;transition: background 0.3s ease, border 0.3s ease; -webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.checkoutBtn:hover {background: var(--button_hover_color);border-color: var(--button_hover_color);color: var(--button_color);}

.calculateShipping {float: right;width: 380px;margin-right: 40px;}
.calculateShipping label {display: block; line-height: 54px;color: var(--body_title_color);font-size: 18px;font-family: 'Lato', sans-serif;font-weight: 300;text-transform: uppercase;}
.calculateShipping .selectricWrapper {width: 100%;}
.calculateShipping p {width: 100%;float: none;margin-bottom: 20px;}
.calculateShipping p .selectric {width: 100%;height: 46px; padding: 0 18px; border: 1px solid #e5e5e5; -webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.calculateShipping p .selectric p {line-height: 44px;color: var(--body_text_color);font-size: 12px;font-family: 'Lato', sans-serif;font-weight: 400;}
.calculateShipping p .selectric .button {top: 19px;right: 16px; width: 14px;height: 8px;background-position: -380px 0px;}
.calculateShipping p.stateCountry {float: left;width: 180px;}
.calculateShipping p.postcodeZip {float: left;width: 180px;margin-left: 20px;}
.calculateShipping input[type="text"] {width: 100%;height: 46px;padding: 0 17px;border: 1px solid #e5e5e5;color: var(--body_text_color);font-size: 12px;font-family: 'Lato', sans-serif;font-weight: 400;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.calculateShipping input[type="text"]::-moz-placeholder {opacity: 1;color: var(--body_text_color);}
.calculateShipping input[type="text"]:-ms-input-placeholder {color: var(--body_text_color);}
.calculateShipping input[type="text"]::-webkit-input-placeholder {color: var(--body_text_color);}

.calculateShipping button {float: right; width: 180px;height: 46px;padding: 0;box-shadow: none;background: rgba(0,0,0,0); border: 2px solid var(--button_color);color: var(--button_color);font-size: 12px;font-family: 'Montserrat', sans-serif;text-transform: uppercase;text-align: center;-webkit-transition: color 0.3s ease, background 0.3s ease;-moz-transition: color 0.3s ease, background 0.3s ease;-o-transition: color 0.3s ease, background 0.3s ease;transition: color 0.3s ease, background 0.3s ease; -webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.calculateShipping button:hover {background: var(--button_color);color: var(--theme_color);}

/* Checkout page */
.checkoutPage {padding: 38px 40px 95px;border-bottom: 1px solid #e5e5e5;}
.checkoutPage .fcell {float: left;width: 33.3333%;padding-right: 26px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.checkoutPage .mcell {float: left;width: 33.3333%;padding-right: 14px;padding-left: 14px; -webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.checkoutPage .scell {float: left;width: 33.3333%;padding-left: 26px; -webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.checkoutPage h3 {margin-bottom: 12px; color: var(--body_title_color);font-size: 24px;font-family: 'Lato', sans-serif;font-weight: 300;}
.checkoutPage .scell h3 {margin-bottom: 29px;}

.checkoutPage .mcell p.form-row,
.checkoutPage .fcell p.form-row {margin-bottom: 5px;}
.checkoutPage .mcell p.form-row-first,
.checkoutPage .fcell p.form-row-first {float: left; width: 47%;}
.checkoutPage .mcell p.form-row-last,
.checkoutPage .fcell p.form-row-last {float: right; width: 47%;}

.checkoutPage .mcell p label,
.checkoutPage .fcell p label {display: block;line-height: 40px;color: var(--body_title_color);font-size: 14px;font-family: 'Lato', sans-serif;font-weight: 300;}
.checkoutPage .mcell p input[type="text"],
.checkoutPage .fcell p input[type="text"] {width: 100%;height: 46px;border: 1px solid #e5e5e5;padding: 0 18px;color: var(--body_text_color);font-size: 12px;font-family: 'Lato', sans-serif;font-weight: 400;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.checkoutPage .mcell p input[type="text"]::-moz-placeholder,
.checkoutPage .fcell p input[type="text"]::-moz-placeholder {opacity: 1;color: var(--body_text_color);}
.checkoutPage .mcell p input[type="text"]:-ms-input-placeholder,
.checkoutPage .fcell p input[type="text"]:-ms-input-placeholder {color: var(--body_text_color);}
.checkoutPage .mcell p input[type="text"]::-webkit-input-placeholder,
.checkoutPage .fcell p input[type="text"]::-webkit-input-placeholder {color: var(--body_text_color);}
.checkoutPage .mcell p input[type="text"]#billing_address_1_2,
.checkoutPage .fcell p input[type="text"]#billing_address_1 {margin-bottom: 15px;}

.checkboxBox {display: inline-block;position: relative;top: 2px; margin-left: 6px;}
.checkboxBox input[type="checkbox"] {display: none;}
.checkboxBox span {display: block; width: 16px;height: 16px;border: 1px solid #e5e5e5;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.checkboxBox input[type="checkbox"]:checked + span {background-position: -80px -50px}

.cartItemWrap {margin-bottom: 26px;}
.cartItem {position: relative;min-height: 112px;padding: 16px 0 30px 158px;border-bottom: 1px solid #e5e5e5;}
.cartItem h4 {line-height: 18px;margin-bottom: 14px;}
.cartItem h4 a, .cartItem h4 a:visited {color: var(--body_title_color);font-size: 14px;font-family: 'Lato', sans-serif;font-weight: 300;text-decoration: none;-webkit-transition: color 0.3s ease;-moz-transition: color 0.3s ease;-o-transition: color 0.3s ease;transition: color 0.3s ease;}
.cartItem h4 a:hover {color: var(--button_color);}
.cartItem p {margin-bottom: 15px; color: var(--body_text_color);font-size: 14px;font-family: 'Lato', sans-serif;font-weight: 300;text-decoration: none;}
.cartItemImg {position: absolute;left: 0;top: 0;}
.cartItemImg img{max-height: 128px;max-width: 128px; object-fit: cover}
.checkoutPage .cartTotalsWrap strong {font-weight: 400;}

.payment_methods {padding-top: 18px;padding-bottom: 20px;}
.payment_methods li {margin-bottom: 18px;}
.payment_methods li input[type="radio"] {display: none;}
.payment_methods li label {position: relative; display: block;line-height: 18px;padding-left: 38px;color: var(--body_title_color);font-size: 16px;font-family: 'Lato', sans-serif;font-weight: 300;}
.payment_methods li label:before {position: absolute;left: 0;top: 0;width: 16px;height: 16px;border: 1px solid #e5e5e5;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;content: "";}
.payment_methods li label:after {position: absolute;left: 6px;top: 6px;width: 6px;height: 6px;-webkit-transition: background 0.3s ease;-moz-transition: background 0.3s ease;-o-transition: background 0.3s ease;transition: background 0.3s ease; -webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;content: "";}
.payment_methods li input[type="radio"]:checked + label:after {background: var(--body_title_color);}

/* Single product */
.single-product {background: var(--secondary_bg_color);}
.single-product .pagePanel {margin-bottom: 0;}
.singleProductWrap {padding: 60px 0; background: var(--theme_color);}
.singleProductWrap .wrapper {width: 1220px;}

.productGallery {float: left;width: 680px;}
.galleryThumb {float: left;width: 120px;}
.galleryThumbItem {display: block;width: 100%;margin-bottom: 20px; border: 1px solid var(--secondary_bg_color);-webkit-transition: border 0.3s ease;-moz-transition: border 0.3s ease;-o-transition: border 0.3s ease;transition: border 0.3s ease; -webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.galleryThumbItem:last-child {margin-bottom: 0;}
.galleryThumbItem img {display: block;width: 100%;max-width: 100%;height: auto;}
.galleryThumbItem.active, .galleryThumbItem:hover {border-color: #dedede;}

.productGalleryWrap {float: right;position: relative; width: 540px;height: 540px;}
.productGalleryWrap img {position: absolute;left: 0;top: 0;width: 100%;max-width: 100%;height: auto;z-index: -1;opacity: 0;-webkit-transition: all 0.9s ease;-moz-transition: all 0.9s ease;-o-transition: all 0.9s ease;transition: all 0.9s ease;}
.productGalleryWrap img.current {opacity: 1;z-index: 1;}

.productDesc {float: right;width: 432px;}
.productDesc h1 {line-height: 30px;margin-bottom: 43px; color: var(--button_color);font-size: 24px;font-family: 'Lato', sans-serif;font-weight: 400;}
.productDesc .price {margin-bottom: 50px; color: var(--body_text_color);font-size: 36px;font-family: 'Lato', sans-serif;font-weight: 300;}
.productDesc .price span {position: relative;top: -15px;left: -2px; font-size: 14px;}
.productDesc p {line-height: 30px;margin-bottom: 20px; color: var(--body_text_color);font-size: 16px;font-family: 'Lato', sans-serif;font-weight: 300;}

.options {padding-top: 56px;margin-bottom: 50px;}
.options .selectricWrapper {width: 206px;float: left;}
.options .selectricWrapper + .selectricWrapper {margin-left: 20px;}
.options .selectric {width: 100%;height: 46px; padding: 0 18px; border: 1px solid #e5e5e5; -webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.options .selectric p {line-height: 44px;color: var(--body_text_color);font-size: 12px;font-family: 'Lato', sans-serif;font-weight: 400;}
.options .selectric .button {top: 19px;right: 16px; width: 14px;height: 8px;background-position: -380px 0px; }

.addToCart {width: 100%;height: 46px;margin-bottom: 36px; border: 2px solid var(--button_color);background: rgba(0,0,0,0); color: var(--button_color);font-size: 12px;font-family: 'Montserrat', sans-serif;text-transform: uppercase;text-align: center;-webkit-transition: all 0.3s ease;-moz-transition: all 0.3s ease;-o-transition: all 0.3s ease;transition: all 0.3s ease; -webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.addToCart:hover {background: var(--button_color);color: var(--theme_color);}

.shareSingleProduct {text-align: center;}
.shareSingleProduct a {display: inline-block;width: 44px;height: 44px;line-height: 44px;margin: 0; color: #c9c9c9;font-size: 18px; text-decoration: none;text-align: center;-webkit-border-radius: 100%;-moz-border-radius: 100%;border-radius: 100%;-webkit-transition: background 0.3s ease, color 0.3s ease;-moz-transition: background 0.3s ease, color 0.3s ease;-o-transition: background 0.3s ease, color 0.3s ease;transition: background 0.3s ease, color 0.3s ease;}
.shareSingleProduct a:hover {color: var(--body_text_color);}

.relatedProducts {padding-bottom: 20px;}
.relatedProducts .shopItem {width: 233px;height: 233px;}
.relatedProducts .shopItemTextWrap {height: 116px;margin-bottom: 20px;}
.relatedProducts .shopItem .shopItemTextWrap p {padding-top: 120px;}
.relatedProducts .shopItem:hover .shopItemTextWrap p {padding-top: 44px;}

/* Classes */
.classes {background: var(--secondary_bg_color);}
.classes .pagePanel {margin-bottom: 40px;}
.classesCallendar {padding: 0 40px 100px;}

.classesCallendar .fc-toolbar {height: 38px; margin-bottom: 20px;}
.classesCallendar .fc-toolbar h2 {line-height: 38px;color: var(--body_text_color);font-size: 18px;font-family: 'Lato', sans-serif;font-weight: 400;text-transform: uppercase;}
.classesCallendar .fc-toolbar .fc-button {width: 40px;height: 38px;line-height: 36px;border: 1px solid #e5e5e5;background: var(--theme_color);box-shadow: none; -webkit-transition: all 0.3s ease;-moz-transition: all 0.3s ease;-o-transition: all 0.3s ease;transition: all 0.3s ease; -webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing: border-box;}
.classesCallendar .fc-toolbar .fc-button:hover {background: var(--button_color);border-color: var(--button_color);}
.classesCallendar .fc-toolbar .fc-button .fc-icon {width: 6px;height: 11px;top: -1px;}
.classesCallendar .fc-toolbar .fc-button .fc-icon:after {display: none;}
.classesCallendar .fc-toolbar .fc-button .fc-icon.fc-icon-left-single-arrow {background-position: -100px -50px;}
.classesCallendar .fc-toolbar .fc-button .fc-icon.fc-icon-right-single-arrow {background-position: -122px -50px;}
.classesCallendar .fc-toolbar .fc-button:hover .fc-icon.fc-icon-left-single-arrow {background-position: -108px -50px}
.classesCallendar .fc-toolbar .fc-button:hover .fc-icon.fc-icon-right-single-arrow {background-position: -115px -50px}
.classesCallendar .fc-day-header {line-height: 52px; background: var(--theme_color);color: var(--body_text_color);font-size: 14px;font-family: 'Lato', sans-serif;font-weight: 300;}
.classesCallendar .fc-time-grid .fc-day.fc-widget-content,
.classesCallendar .fc-axis {background: var(--theme_color);}

.classesCallendar .fc-event {border-radius: 0;border: 0;border-left: 2px solid var(--button_color);color: var(--theme_color);font-size: 16px;font-family: 'Lato', sans-serif;font-weight: 300;-webkit-transition: all 0.3s ease;-moz-transition: all 0.3s ease;-o-transition: all 0.3s ease;transition: all 0.3s ease;}
.classesCallendar .fc-event.hide {opacity: 0;z-index: -2;}
.classesCallendar .fc-event.fc-event-yoga {background: #8ce4cf;border-color: var(--button_color);}
.classesCallendar .fc-event.fc-event-cardio-fitness {background: #71a8ee;border-color: #4183d7;}
.classesCallendar .fc-event.fc-event-aerobics {background: #f79393;border-color: #e26a6a;}
.classesCallendar .fc-event.fc-event-pilates {background: #fed579;border-color: #f9bf3b;}
.classesCallendar .fc-event.fc-event-spinning {background: #94709f;border-color: #674172;}

.classesCallendar .fc-event .fc-bg {opacity: 0;}
.classesCallendar .fc-event .fc-content {padding-top: 15px; padding-left: 18px;}
.classesCallendar .fc-event .fc-content div.fc-time {display: none;}

.classesCallendar td.fc-time {line-height: 70px;color: var(--body_text_color);font-size: 12px;font-family: 'Lato', sans-serif;font-weight: 400;text-align: center;}
.fc-time-grid-container {height: 851px!important;}
.fc-content-skeleton .fc-event-container {margin: 0!important;}

/* 404 */
.error404 {background: var(--secondary_bg_color);}
.page404Wrap {padding-top: 138px;padding-bottom: 140px; text-align: center;}
.page404Wrap img {margin-bottom: 64px;}
.page404Wrap p {margin-bottom: 47px; color: var(--body_title_color);font-size: 28px;font-family: 'Lato', sans-serif;font-weight: 300;}
.page404Wrap a.homePage, .page404Wrap a.homePage:visited {display: inline-block;width: 168px;height: 46px;line-height: 42px; border: 2px solid var(--button_color);color: var(--button_color);font-size: 12px;font-family: 'Montserrat', sans-serif;text-transform: uppercase;text-align: center;text-decoration: none;-webkit-border-radius: 23px;-moz-border-radius: 23px;border-radius: 23px; -webkit-transition: background 0.3s ease, color 0.3s ease;-moz-transition: background 0.3s ease, color 0.3s ease;-o-transition: background 0.3s ease, color 0.3s ease;transition: background 0.3s ease, color 0.3s ease;}
.page404Wrap a.homePage:hover {background: var(--button_color);color: var(--theme_color);}
@media screen and (-webkit-min-device-pixel-ratio:0) {
    .page404Wrap a.homePage {line-height: 46px;}
}

.menu-cart{
    position: relative;
}

.menu-cart__counter{
    position: absolute;
    top: 0;
    right: 0;
    transform: translate(75%, -70%);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color:#ffffff;
    color: #000000;
    box-shadow: 0 0 0 1px #000;
}

.is-sticky .menu-cart__counter{
    background-color: #000000;
    color: #ffffff;
}

.primary-btn{
    padding: 10px 45px;
    box-shadow: none;
    background: #5fc7ae;
    border: 2px solid #5fc7ae;
    color: #fff;
    font-size: 12px;
    font-family: 'Montserrat', sans-serif;
    text-transform: uppercase;
    text-align: center;
    -webkit-transition: background 0.3s ease, border 0.3s ease;
    -moz-transition: background 0.3s ease, border 0.3s ease;
    -o-transition: background 0.3s ease, border 0.3s ease;
    transition: background 0.3s ease, border 0.3s ease;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.text-danger{
    color: #e83e8c
}

.form-label{
    display: inline-block;
    line-height: 1.5;
    color: #515355;
    font-size: 16px;
    font-family: 'Lato', sans-serif;
    font-weight: 600;
    margin-bottom: 0.5rem; 
}

.form-control{
    border: 1px solid #e5e5e5;
    padding-left: 12px;
    padding-right: 12px;
    color: #7f7f7f;
    font-size: 14px;
    font-family: 'Lato', sans-serif;
    font-weight: 400;
    min-height: 46px;
    border-radius: 0;
    width: 100%;
    box-sizing: border-box;
}

select.form-control{
    background-color: #ffffff;
    padding-top: 12px;
    padding-bottom: 12px;
}

.form-control:focus{
    border-color: #5fc7ae;
}

textarea.form-control{
    padding-top: 10px;
    padding-bottom: 10px;
}

.form-group {
  margin-bottom: 1rem;
}


@media (min-width: 576px){
    .form-row{
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }
}

@media (min-width: 768px){
    .col-md-6 {
      -ms-flex: 0 0 50%;
      flex: 0 0 50%;
      max-width: 50%;
    }

    .col-md-4 {
        -ms-flex: 0 0 33.333333%;
        flex: 0 0 33.333333%;
        max-width: 33.333333%;
    }
}

[class|="col"]{
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    box-sizing: border-box;
}


.form__title{
    position: relative;
    font-size: 56px;
    line-height: 1;
    margin-bottom: 50px;
    color: var(--body_title_color);
    font-family: 'Lato', sans-serif;
    font-weight: 300;
}

@media (max-width: 575.98px){
    .form__title{
        font-size: 40px;
        margin-bottom: 30px;
    }
}

.testimonial,
.testimonial-conatiner,
.testimonial-card,
.testimonial-card__quote,
.testimonial-card__header,
.testimonial-card__header__avatar
{
    box-sizing: border-box;
}

.testimonial{
    padding: 80px 0; 
}

.testimonial-conatiner{
    padding: 0 15px;
    column-gap: 20px;
}

.testimonial-conatiner.children-1,
.testimonial-conatiner.children-2,
.testimonial-conatiner.children-3
{
    column-count: 1;
}

@media (min-width: 768px){
    .testimonial-conatiner.children-2,
    .testimonial-conatiner.children-3
    {
        column-count: 2;
    }
}

@media (min-width: 1024px){
    .testimonial-conatiner.children-3{
        column-count: 3;
    }
}

.testimonial-card{
    position: relative;
    width: 100%;
    max-width: 600px;
    padding: 30px 20px;
    break-inside: avoid;
    margin-left: auto;
    margin-right: auto;
    border-radius: 6px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.06);
    margin-bottom: 20px;
}

.testimonial-card__quote{
    position: absolute;
    right: 20px;
    user-select: none;
    pointer-events: none;
}

.testimonial-card__quote__icon{
    color: var(--button_color);
    font-size: 50px;
    opacity: 0.5;
}

@media (min-width: 576px){
    .testimonial-card__quote__icon{
        color: var(--button_color);
        font-size: 50px;
        opacity: 0.5;
    }
}


.testimonial-card__header{
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.testimonial-card__header__avatar{
    flex-shrink: 0;
    width: 55px;
    height: 55px;
    border: 1px solid #ccc;
    border-radius: 50%;
    overflow: hidden;
}

.testimonial-card__header__avatar__image{
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.testimonial-card__header__details{
    margin-left: 10px;
}

.testimonial-card__header__title{
    font-size: 18px;
    font-weight: 800;
    color: #000;
    margin-bottom: 8px;
}

.testimonial-card__header__sub-title{
    color: var(--body_title_color);
    font-size: 14px;
    font-family: 'Lato', sans-serif;
}

.testimonial-card__text{
    font-size: 15px;
    font-weight: 300;
    line-height: 1.5;
}

.payment-form{
    margin: 30px 0; 
}

.alert{
    position: relative;
    border-left: 10px solid currentColor;
    border-radius: 10px;
    margin-top: 10px;
    margin-bottom: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.12);
}

.alert-success{
    color: #4cca62;
}

.alert-danger{
    color: #fd6061;
}

.alert__close-btn{
    position: absolute;
    right: 0;
    top: 0;
    bottom: 0;
    border: 0;
    color: #b2b7be;
    border-left: 1px solid #e5e5e5;;
    background-color: transparent;
    outline: 0;
    padding: 5px 20px;
    font-size: 20px;
}

.alert__close-btn:hover,
.alert__close-btn:focus-visible
{
    color: #fd6061;
}

.alert-body{
    padding: 20px 60px 20px 15px;
}


.alert-body__icon{
    color: currentColor;
    font-size: 40px;
}

.alert-body__content{
    margin-top: 16px;
}

@media (min-width: 576px){
    .alert-body{
        display: flex;
        align-items: center;
    }
    .alert-body__content{
        margin-top: 0;
        margin-left: 16px;
    }
}

.alert-body__title{
    color: #434950;
    font-size: 2rem;
    font-weight: 400;
    font-family: 'Lato', sans-serif;
    line-height: 1;
    margin-bottom: 5px;
}

.alert-body__text{
    color: #b2b7be;
    font-size: 1rem;
    font-weight: 400;
    margin-bottom: 0;
}

.text-center{
    text-align: center;
}

.form-message {
    padding: .71rem 1rem;
    border-radius: .358rem;
    line-height: 1.5;
}

.form-message--success{
    color: #32a852;
    background: rgba(40,167,69,.12);
}

.form-message--danger{
    color: #EA5455;
    background: rgba(234,84,85,.12);
}

.hide{
    display: none;
}

.form-group .form-message{
    margin-top: 10px;
}

.my-5{
    margin: 80px 0
}

.details-container{
    max-width: 940px;
    padding: 0 15px;
    margin: 0 auto;
}

.details-page__header__gallery__item__image{
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.details-page__header__gallery{
    position: relative;
    grid-template-columns: repeat(5,1fr);
    grid-template-rows: repeat(4,6vw);
    grid-gap: 8px;
    overflow: hidden;
    border-radius: 6px;
}

@media (min-width: 768px){
    .details-page__header__gallery{
        display: grid;
    }
}

@media (max-width: 1399.98px){
    .details-page__header__gallery{
        grid-template-rows: repeat(4,8vw);
    }
}

.details-page__header__gallery__item{
    position: relative;
}

.details-page__header__gallery__item:nth-child(1){
    grid-column: 1/span 3;
    grid-row: 1/span 4;
}

.details-page__header__gallery__item:nth-child(2){
    grid-column: 4/span 1;
    grid-row: 4/span 1;
}

.details-page__header__gallery__item:nth-child(3){
    grid-column: 5/span 1;
    grid-row: 4/span 1;
}

.details-page__header__gallery__item:nth-child(4){
    grid-column: 4/span 2;
    grid-row: 1/span 3;
}

/* When 1 item */
.details-page__header__gallery--1 .details-page__header__gallery__item:nth-child(1){
    grid-column: 1/-1;
    grid-row: 1/-1;
}

/* When 2 item */
.details-page__header__gallery--2{
    grid-template-columns: repeat(2,1fr);
}

.details-page__header__gallery--2 .details-page__header__gallery__item:nth-child(1),
.details-page__header__gallery--2 .details-page__header__gallery__item:nth-child(2)
{
    grid-row: 1/span 4;
}

.details-page__header__gallery--2 .details-page__header__gallery__item:nth-child(1){
    grid-column: 1/span 1;
}

.details-page__header__gallery--2 .details-page__header__gallery__item:nth-child(2){
    grid-column: 2/span 1;
}

/* When 3 item */
.details-page__header__gallery--3 .details-page__header__gallery__item:nth-child(2){
    grid-column: 4/span 2;
    grid-row: 1/span 2;
}

.details-page__header__gallery--3 .details-page__header__gallery__item:nth-child(3){
    grid-column: 4/span 2;
    grid-row: 3/span 2;
}

.details-page__header__gallery__item__link{
    display: inline-block;
    width: 100%;
    height: 100%;
}

.details-page__header__gallery__item__caption{
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 10px 5px;
    text-align: center;
    color: #ffffff;
    background: linear-gradient(0deg,rgba(0,0,0,.7) 0,rgba(255,255,255,0) 100%);
}

.embed-responsive {
  position: relative;
  display: block;
  width: 100%;
  height: 100%;
  padding: 0;
  overflow: hidden;
}

@media (max-width: 767.98px){
    .embed-responsive{
        height: 300px;
    }
}

.embed-responsive > *{
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}

.details-page__header__gallery__btn{
    position: absolute;
    bottom: 10px;
    right: 10px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: fit-content;
    color: #222222;
    box-shadow: 0 4px 14px rgba(0,0,0,.15);
    background: #FFF;
    border: 0;
    border-radius: 6px;
    padding: 8px 12px;
    font-weight: 600;
    cursor: pointer;
}

.details-page__header__gallery__btn__icon{
    margin-right: 5px;
}

.fullpage-modal{
    background-color: #ffffff;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    overflow: auto;
    display: none;
}

.fullpage-modal.show{
    display: block;
}

.fullpage-modal__btn{
    position: absolute;
    top: 15px;
    right: 15px;
    line-height: 1;
    padding: 5px;
    color: #222222;
    background-color: transparent;
    border: 0;
    font-size: 20px;
}

.fullpage-modal__btn:hover{
    color: red;
}

.fullpage-modal__container{
    width: 100%;
    max-width: 1000px;
    margin-left: auto; 
    margin-right: auto;
    padding-left: 15px;
    padding-right: 15px;
    box-sizing: border-box;
}

.gallery__title{
    color: #222222;
    font-size: 28px;
    font-weight: 500;
}

.gallery__header{
    padding-top: 20px;
    padding-bottom: 20px;
}

.gallery__title__sm{
    font-size: 0.5em;
}

.gallery__item{
    margin-bottom: 30px;
}

.gallery__item__link{
    display: inline-block;
    width: 100%;
    height: 100%;
}

.gallery__image{
    width: 100%;
    height: 100%;
    max-height: 320px;
    object-fit: cover;
}

.row{
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
    box-sizing: border-box;
}

.overflow-hidden{
    overflow: hidden;
}

.details-page__header__title{
    color: #202224;
    font-size: 32px;
    font-weight: 600;
    margin-bottom: 15px;
}

.details-page__header__details{
    padding-top: 20px;
    padding-bottom: 20px;
}

.details-page__card{
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
    margin-bottom: 18px;
}

button.details-page__card__header{
    background-color: transparent;
    border: 0 !important;
    box-shadow: none !important;
    width: 100%;
    text-align: left;
}

.details-page__card__header,
.details-page__card__body
{
    padding: 25px;
}

.details-page__card__header + .details-page__card__body{
    padding-top: 10px;
}

.details-page__card__footer{
    border-top: 1px solid #ECECEC;
    padding-top: 25px;
}

.details-page__card__header__text{
    color: #ABAEB1;
    font-size: 13px;
    font-weight: 400;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.details-page__card__header__title{
    color: #202224;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 0;
}

.details-page__card__header__title__icon{
    display: inline-block;
    color: var(--button_color);
    margin-right: 5px;
}

.details-page__card__content{
    margin-bottom: 20px;
}

.details-page__card__content{
    font-size: 16px;
    line-height: 24px;
    box-sizing: border-box;
}

.details-page__card__content > *{
    margin-bottom: 15px;
}

.details-page__card__content blockquote{
    position: relative;
    display: block;
    color: #515355 !important;
    border-radius: 8px;
    font-size: 14px;
    line-height: 24px;
    padding: 15px;
    isolation: isolate;
}

.details-page__card__content blockquote::before{
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: var(--button_color);
    opacity: 0.32;
    border-radius: inherit;
    z-index: -1;
}

.details-page__card__content :is(h1, h2, h3, h4, h5, h6){
    color: #202224;
    font-weight: 600;
}

.details-page__card__content ul{
    list-style-type: disc;
    padding-left: 20px;
    color: #515355;
}

.details-page__card__content iframe{
    max-width: 100%;
    box-sizing: border-box;
}

.icon-list{
    padding-left: 0 !important;
    list-style-type: none !important;
}

.icon-list__item{
    color: #515355;
    display: flex;
    margin-bottom: 7px;
    line-height: 17px;
}

.icon-list__item__icon{
    color: var(--button_color);
    margin-right: 8px;
}

.icon-list__item__text{
    font-size: 14px;
}

.hide{
    display: none;
}

[data-toggle="collapse"]{
    position: relative;
}

[data-toggle="collapse"]::after{
    content: "";
    position: absolute;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%235fc7ae' class='bi bi-chevron-down' viewBox='0 0 16 16'%3E%3Cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    width: 16px;
    height: 16px;
    top: 50%;
    right: 20px;
    transform: translateY(-50%) rotate(0);
    transition: transform .3s ease-in-out;
    user-select: none;
    pointer-events: none;
}

[data-toggle="collapse"][data-expanded="true"]::after{
    transform: translateY(-50%) rotate(-180deg);
}

.user-details-list__item:not(:last-child){
    margin-bottom: 30px;
}

.user-details-list__item__header__avatar{
    position: relative;
    display: inline-block;
}

.user-details-list__item__header__avatar__image-wrapper{
    position: relative;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    overflow: hidden;
}

.user-details-list__item__header__avatar__image{
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.user-details-list__item__header__avatar__icon{
    position: absolute;
    right: 0;
    bottom: 0;
    filter: drop-shadow(0 0 10px rgba(0, 0, 0, 0.41));
}

.user-details-list__item__header__title{
    color: #202224;
    font-size: 18px;
    font-weight: 600;
}

@media (min-width: 500px){
    .user-details-list__item__header{
        display: flex;
        align-items: flex-end;
    }

    .user-details-list__item__header__details{
        margin-top: 0;
        margin-left: 15px;
        margin-bottom: 25px;
    }
}

@media (max-width: 499.98px){ 
    .user-details-list__item__header__details{
        margin-top: 15px;
    }
}

@media (max-width: 767.98px){
    .user-details-list__item__body{
        padding-top: 20px;
    }
}

@media (min-width: 768px){
    .user-details-list__item__body{
        padding-left: 100px;
    }

    .certificate-list{
        margin-top: -15px;
    }
}

.certificate-list__item{
    line-height: 16px;
    margin-bottom: 10px;
}

.certificate-list__item__icon{
    margin-right: 5px;
}

.certificate-list__item__text{
    color: #ff9b35;
    font-weight: 900;
    font-size: 12px;
}

.read-more__content{
    font-size: 16px;
    line-height: 24px;
}


@media (min-width: 992px){
    .details-page__row{
        display: flex;
        gap: 15px;
    }
    .details-page__header__aside{
        width: 100%;
        flex-basis: 300px;
        flex-shrink: 0;
    }
    .details-page__header__body{
        flex-grow: 1;
    }
}


.bold-text{
    color: #202224;
    font-size: 27px;
    font-weight: 900;
}

.d-block{
    display: block;
}

.line-height{
    line-height: 1.6;
}

.cusom-option{
    display: block;
    position: relative;
    isolation: isolate;
}

.cusom-option-wrapper .form-label{
    padding-left: 25px;
    padding-right: 25px;
}

.cusom-option__input{
    position: absolute;
    top: 40%;
    left: 18px;
}

.cusom-option:last-child .cusom-option__content{
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}

.cusom-option__content{
    position: relative;
    padding: 15px 25px;
    padding-left: 40px;
}

.cusom-option__content::before{
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: var(--button_color);
    opacity: 0;
    border-radius: inherit;
    z-index: -1;
    border-radius: inherit;
    transition: opacity .15s ease-in-out;
}


.cusom-option__input:focus-visible ~ .cusom-option__content::before,
.cusom-option__input:checked ~ .cusom-option__content::before,
.cusom-option:focus-within .cusom-option__content::before,
.cusom-option:hover .cusom-option__content::before
{
    opacity: 0.15;
}


@media (min-width: 400px){
    .cusom-option__content__header{
        display: flex;
    }
}

.cusom-option__content__header__left__title{
    color: #202224;
    font-size: 16px;
    font-weight: 400;
}

.cusom-option__content__header__right__title{
    color: #202224;
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 4px;
    white-space: nowrap;
}

.cusom-option__content__header__left__text{
    font-size: 14px;
    color: #515355;
    line-height: 140%;
}

.cusom-option__content__header__right__text{
    font-size: 12px;
}

.cusom-option__content__header__left{
    padding-right: 15px;
}


@media (min-width: 400px){
    .cusom-option__content__header__right{
        text-align: right;
        margin-left: auto;
    }
}

@media (max-width: 399.98px){
    .cusom-option__content__header__right{
        margin-top: 15px;
    }
}

@media (max-width: 991.98px){
    .cusom-option__content__header__right{
        flex-grow: 1;
    }
}

.cusom-option__content__body__text{
    color: #ABAEB1;
    font-size: 14px;
    line-height: 140%;
    padding-top: 10px;
    padding-bottom: 10px;
}

.cusom-option__content__body__footer__btn{
    font-size: 14px;
    padding: 10px 20px;
    border-radius: 3px;
    color: #7C8086;
    border: 1px solid #D9D9D9;
    background-color: transparent;
    width: 100%;
    margin: 5px 0;
}

.cusom-option__input:checked ~ .cusom-option__content .cusom-option__content__body__footer__btn,
.cusom-option__content__body__footer__btn:hover,
.cusom-option__content__body__footer__btn:focus-visible
{
    color: var(--button_color);
    border-color: var(--button_color);
}

.language-dropdown__menu{
    padding: 5px 0 !important;
}

.language-dropdown__menu__item{
    margin: 0 !important;
}

.language-dropdown__image{
    max-height: 15px;
}

.language-dropdown__menu__link{
    line-height: 1 !important;
    padding: 5px 10px !important;
}

.blur-parent{
    position: relative;
}
.blur-parent__content{
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.blur-parent > *:not(.blur-parent__content){
    filter: blur(3px);
}

.gallery{
    padding: 100px 0;
}

.gallery__container,
.gallery__single__container
{
    width: 100%;
    margin: 0 auto;
}

.gallery__container{
    max-width: 1140px;
}

.gallery__single__container{
    max-width: 900px;
    padding: 0 15px;
    box-sizing: border-box;
}

.gallery__album__grid{
    display: grid;
    grid-auto-rows: 400px
}

@media (min-width: 576px){
    .gallery__album__grid{
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 992px){
    .gallery__album__grid{
        grid-template-columns: repeat(3, 1fr);
    }
}

.gallery__single__grid{
    display: grid;
    grid-auto-rows: 450px;
    gap: 15px;
}

@media (min-width: 576px){
    .gallery__single__grid{
        grid-template-columns: repeat(2, 1fr);
    }
}

.gallery__album__grid__item,
.gallery__single__grid__item
{
    position: relative;
    overflow: hidden;
}

.gallery__album__grid__item::after,
.gallery__album__grid__item__figure__image,
.gallery__single__grid__item::after,
.gallery__single__grid__item__figure__image
{
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.gallery__album__grid__item::after,
.gallery__single__grid__item::after
{
    content: "";
    background: linear-gradient(transparent 40%, var(--button_color));
    opacity: 0;
    transition: opacity .3s linear;
}

.gallery__album__grid__item:is(:hover, :focus)::after,
.gallery__single__grid__item:is(:hover, :focus)::after
{
    opacity: 1;
}

.gallery__album__grid__item__figure,
.gallery__single__grid__item__figure
{
    position: relative;
    height: 100%;
}

.gallery__album__grid__item__figure__image,
.gallery__single__grid__item__figure__image
{
    object-fit: cover;
    transition: transform .3s ease;
}

.gallery__album__grid__item:is(:hover, :focus) .gallery__album__grid__item__figure__image,
.gallery__single__grid__item:is(:hover, :focus) .gallery__single__grid__item__figure__image
{
    -webkit-transform: scale(1.2);
    -moz-transform: scale(1.2);
    -ms-transform: scale(1.2);
    -o-transform: scale(1.2);
    transform: scale(1.2);
}

.gallery__album__grid__item__content{
    position: absolute;
    bottom: 10%;
    left: 0;
    right: 0;
    transform: translateY(0);
    opacity: 0;
    text-align: center;
    font-weight: 900;
    font-size: 18px;
    color: #ffffff;
    z-index: 1;
    text-shadow: 0 0 6px rgba(0, 0, 0, 0.2);
    transition: all .3s linear;
}

.gallery__album__grid__item:is(:hover, :focus) .gallery__album__grid__item__content{
    transform: translateY(-50%);
    opacity: 1;
}

/* .gallery__single__grid__item{
    display: block;
    height: 500px;
} */

.gallery__single__grid__item__figure{
    position: relative;
    height: 100%;
}
.gallery__single__grid__item__figure__image{
    position: absolute;
    width: 100%;
    height: 100%;
}

.gallery__single__grid__item__icon{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, 50%);
    opacity: 0;
    font-size: 40px;
    color: #ffffff;
    transition: all .3s linear;
}

.gallery__single__grid__item:is(:hover, :focus) .gallery__single__grid__item__icon{
    transform: translate(-50%, -50%);
    opacity: 1;
}

.details-page__header__btn-wrapper{
    padding-top: 8px;
    text-align: right
}

.details-page__header__btn{
    display: inline-block;
    color: #222222;
    box-shadow: 0 4px 14px rgba(0,0,0,.15);
    background: #FFF;
    border: 0;
    border-radius: 6px;
    padding: 8px 12px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
}

.fancybox-thumbs__list a::before{
    border-color: var(--button_color);
}
.fancybox-progress{
    background-color: var(--button_color);
}

</style>
