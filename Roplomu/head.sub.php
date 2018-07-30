<?php
include(G5_PATH.'/head.sub.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.ROPLOMU_URL.'/default.css">', 0);
add_stylesheet('<link rel="stylesheet" href="http://doge.dothome.co.kr/js/font-awesome/css/font-awesome.min.css">', 0);
add_stylesheet('<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Black+Han+Sans|Coda+Caption:800|Gaegu|Jua|Lobster|Markazi+Text|Nanum+Gothic|Do+Hyeon|Nanum+Myeongjo|Oswald|Pacifico|Poor+Story|Quicksand|Raleway|Shadows+Into+Light|Slabo+27px|Song+Myung|Source+Sans+Pro|Titillium+Web" rel="stylesheet">', 0);
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('body').addClass("roplo");
		$('body').addClass("skin-pure");
	});
</script>
<style type="text/css">
	/*
	 * 정말 기본적인 row-wrapper 레이아웃
	 * 오버라이딩 되면 안 되는?
	 */
	:root{
		/* 오직 레이아웃 폭과 높이 */
		--skin-width: 1000px;

		--header-height: 100px;
		--header-height-mobile: 45px;
	}	
	/* 데스크탑 레이아웃 */
	/* #header-row, #footer-row, #middle-row. row는 세로로 쌓아지는 레이아웃입니다.*/
	.roplo .row{}
	.roplo .row#header-row {}
	.roplo .row#footer-row { height: 600px;}
	.roplo .row#middle-row {}
	/* row 의 필수 자식 header.wrapper, footer.wrapper, middle.wrapper. wrapper는 예쁜 폭. */
	.roplo .row > .wrapper { box-sizing: border-box; width: 100%; padding: 0 calc( (100% - var(--skin-width) ) /2 ); }
	.roplo .row > header.wrapper { height: var(--header-height) }
	.roplo .row > footer.wrapper { height: 100%; }
	.roplo .row > #middle.wrapper  { min-height:100%; }
	.roplo .row > .wrapper > .inner { width:100%; height:100%; }


	/*모바일 레이아웃*/
	@media (max-width: 639px) {
		body.roplo, html { height:100%; width:100%;}
		body.roplo{ display: flex; flex-direction: column}
		/* #header-row, #footer-row, #middle-row. 헤더는 화면에 고정시키고, 푸터생략합니다.*/
		.roplo .row#header-row {}
		.roplo .row#middle-row { overflow-x:hidden; overflow-y:hidden; flex:1; }
		.roplo .row#footer-row { display: none}
		/* row 의 필수 자식 header.wrapper, footer.wrapper, middle.wrapper. wrapper는 예쁜 폭. */
		.roplo .row > header.wrapper { height: var(--header-height-mobile);}
		
	}

	/* 
	 * 홈피를 홈피답게 하는 메뉴와 aside 입니다.
	 * 너무 추상화 한 것 같긴 함 
	 * 어차피 스킨에서는 이거 있다고 가정하고 쓸텐데
	 */
	:root{
		--aside-width: 250px;
	}	
	/* 데스크탑 레이아웃 */ 
	/* row에 wrapper를 추가하려면, 이렇게 하세요 */
	.roplo .row > nav.wrapper > ul.masonry > li{display: inline;}
	.roplo .row > nav.wrapper > ul.masonry-reverse > li{display: inherit;}
	/* aside는 특별한 칼럼 레이아웃입니다. 더 이상의 하드코딩은 없습니다 */
	.roplo #middle { display: flex; flex-direction: row; }
	.roplo #middle aside#aside-push{ height:100%; width: var(--aside-width); flex:none; }
	.roplo #middle aside#aside-over{ height:100%; width: var(--aside-width); flex:none; }
	.roplo #middle section{ height:100%; width:auto; flex:1; overflow: hidden;}
	
	/*모바일 레이아웃*/
	/* aside는 모바일에서 열고 닫습니다. */
	.roplo #aside-over-open {display: none;}
	.roplo #nav-masonry-open {display: none;}
	@media (max-width: 639px) {
		/* row에 wrapper를 추가하려면, 이렇게 하세요 */
		.roplo .row > nav > ul.masonry > li{display:inherit;}
		.roplo .row > nav > ul.masonry-reverse > li{display: inline;}
		/* aside는 특별한 칼럼 레이아웃입니다. 더 이상의 하드코딩은 없습니다 */
		.roplo #middle { flex-direction: column; height:100%; }
		.roplo #middle aside#aside-push{ height: auto; width: 100% }
		.roplo #middle aside#aside-over{ position:fixed; top:0; left:0; height:100%; width:var(--aside-width); z-index: 1;}
		.roplo #middle aside#aside-over #aside-over-close { position:absolute; top:0; left:var(--aside-width); width: calc(100vw - var(--aside-width)); height:100%;}
		.roplo #middle section{ width:100%; height:100%; overflow-x:hidden; overflow-y:scroll; flex:1;}
		/* aside는 모바일에서 열고 닫습니다. */
		.roplo #aside-over-open {display: inline;}
		.roplo #nav-masonry-open {display: inline;}
	}

	/*
	 * 스킨 시작 
	 * 스킨 적용하는 방법 : body에 skin-{스킨명} class 추가한다.
	 * 지금은 임시로 tail.sub.php에서 추가해주고 있음.;
	 *
	 */
	/*Skin:Debug*/
	.skin-debug .row#header-row{ background: rgba(255,0,0,0.1);}
	.skin-debug .row#middle-row{ background: rgba(0,255,0,0.1);}
	.skin-debug .row#footer-row{ background: rgba(0,0,255,0.1);}
	.skin-debug header{ background: rgba(255,0,0,0.5);  }
	.skin-debug #middle{ background: rgba(0,255,0,0.5);  }
	.skin-debug footer{ background: rgba(0,0,255,0.5);  }
	.skin-debug #middle aside#aside-push { background: rgba(0,100,100,0.5); }
	.skin-debug #middle aside#aside-over { background: rgba(225,0,225,0.9); }
	.skin-debug #middle section { background: rgba(100,0,100,0.5); }
	.skin-debug nav{ background: rgba(255, 255, 0, 0.5); }

	/* Skin:SimpleNWhite */
	:root{
		--padding-side: 10px;
		--color-main:rgb( 200, 200, 210, 1);
		--color-sub:rgba( 250, 255, 255, 1);
		--color-base:rgba( 230, 230, 255, 1);
		--color-point: rgba( 100, 0, 2, 1);

		--color-basic:rgba( 200, 200, 200, 1);
		--color-shadow:rgba( 100, 100, 100, 0.5);

		--header-font:'Do Hyeon', sans-serif;

		--font-size-header: 5em;
		--font-size-header-mobile: 20px;

		--header-height: auto;
	}
	body.skin-pure { background: var(--color-sub) }

	/* row 의 필수 자식 header.wrapper, footer.wrapper, middle.wrapper.  */
	.skin-pure .row > header { font-size: var(--font-size-header); font-family: var(--header-font); color:var(--color-main);}
	/* row에 wrapper를 추가하려면, 이렇게 하세요 */
	.skin-pure ul.masonry { align-items: center; background: var(--color-main); font-family: 'Quicksand', sans-serif; padding: 0.4em; }
	.skin-pure ul.masonry > li { vertical-align: middle; }
	.skin-pure ul.masonry-reverse { display:flex; flex-direction: column;}
	.skin-pure ul.masonry-reverse > li { display:flex; height: 3em; align-items: center; border-bottom: 1px solid var(--color-basic); padding: 10px;} 	
	/* aside는 특별한 칼럼 레이아웃입니다. 더 이상의 하드코딩은 없습니다 */
	.skin-pure #middle aside#aside-over { background: var(--color-base); }
	.skin-pure #middle aside#aside-over #aside-over-close { background: rgba(0, 0, 0, 0.5); }
	.skin-pure #footer-row { background: var(--color-base) }
	@media (min-width: 639px){
		/* #header-row, #footer-row, #middle-row.*/
		.skin-pure .row#header-row { margin-bottom: var(--padding-side) 0}
		.skin-pure .row#middle-row  { margin: var(--padding-side) 0}
		.skin-pure .row#footer-row{ margin-top: var(--padding-side) 0}
		.skin-pure .row > *:not(footer) { margin: 0 var(--padding-side); }
		/* aside는 특별한 칼럼 레이아웃입니다. 더 이상의 하드코딩은 없습니다 */
		.skin-pure section { margin-left: 20px; }
		/* row에 wrapper를 추가하려면, 이렇게 하세요 */
		.skin-pure ul.masonry { border-radius: 0.5em;}
		.skin-pure ul.masonry > li { height:2em;vertical-align: middle;  margin: 0.4em 1em;}
		.skin-pure ul.masonry-reverse {  }
		.skin-pure ul.masonry-reverse > li { height: 3em; align-items: center; border-bottom: 1px solid var(--color-basic);}
	}
	@media (max-width: 639px) {
		.skin-pure ul.masonry { border-radius: 0em; }
		.skin-pure ul.masonry > li { height: 45px; margin: 0; padding: 10px;}
		.skin-pure ul.masonry-reverse { padding: 0; border-radius: 0em;}
		.skin-pure ul.masonry-reverse > li { height: 45px; vertical-align: middle;  margin: 0; }

		.skin-pure #header-row header {font-size: var(--font-size-header-mobile); padding: calc( ( var(--header-height-mobile) - var(--font-size-header-mobile) )/2 - 2px); border-bottom: 2px solid var(--color-basic);}

		.skin-pure #aside-over-open { display: inline; width:1em; height:1em; font-size:1em; font-family: FontAwesome;}
		.skin-pure #nav-masonry-open { display: inline; width:1em; height:1em; font-size:1em; font-family: FontAwesome;}
	}
</style>