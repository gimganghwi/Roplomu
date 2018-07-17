<?php 
include('./_common.php');
include('../head.sub.php');
?>


<style type="text/css">

	@import url('https://fonts.googleapis.com/css?family=Raleway');
	@import url('https://fonts.googleapis.com/css?family=Quicksand');
	:root{
		--skin-width: 1000px;
		--aside-width: 250px;

		--header-height: 100px;
		--header-height-mobile: 50px;
	}	

	/* Skin:Debug*/
	.skin-debug .wrapper#header-wrapper{ background: rgba(255,0,0,0.1);}
	.skin-debug .wrapper#middle-wrapper{ background: rgba(0,255,0,0.1);}
	.skin-debug .wrapper#footer-wrapper{ background: rgba(0,0,255,0.1);}
	.skin-debug header{ background: rgba(255,0,0,0.5);  }
	.skin-debug #middle{ background: rgba(0,255,0,0.5);  }
	.skin-debug footer{ background: rgba(0,0,255,0.5);  }
	.skin-debug #middle aside#aside-push { background: rgba(0,100,100,0.5); }
	.skin-debug #middle aside#aside-over { background: rgba(225,0,225,0.9); }
	.skin-debug #middle section { background: rgba(100,0,100,0.5); }
	.skin-debug nav{ background: rgba(255, 255, 0, 0.5); }

	/*데스크탑 레이아웃*/
	.wrapper{ width: 100%; padding: 0 calc( (100% - var(--skin-width) ) /2 ) }
	.wrapper#header-wrapper {}
	.wrapper#middle-wrapper {}
	.wrapper#footer-wrapper { height: 600px }
	header { height: 100px }
	footer { height: 100%; }
	nav > ul.masonry > li{display: inline;}
	nav > ul.masonry-reverse > li{display: inherit;}

	#middle { display: flex; flex-direction: row; }
	#middle aside#aside-push{ height:100%; width: var(--aside-width); flex:none; }
	#middle aside#aside-over{ height:100%; width: var(--aside-width); flex:none; }
	#middle section{ height:100%; width:auto; flex:1; overflow: hidden;}

	#aside-over-open {display: none;}
	#nav-masonry-open {display: none;}

	/*모바일 레이아웃*/
	@media (max-width: 500px) {
		body, html { height:100%; }
		body{ display: flex; flex-direction: column}
		.wrapper#header-wrapper { }
		.wrapper#middle-wrapper { overflow-x:hidden; overflow-y:hidden; flex:1; }
		.wrapper#footer-wrapper { display: none}
		header{height: var(--header-height-mobile); }
		nav > ul.masonry > li{display:inherit;}
		nav > ul.masonry-reverse > li{display: inline;}

		#middle { flex-direction: column; height:100%; }
		#middle aside#aside-push{ height: auto; width: 100% }
		#middle aside#aside-over{ position:fixed; top:0; left:0; height:100%; width:var(--aside-width);}
		#middle aside#aside-over #aside-over-close { position:absolute; top:0; left:var(--aside-width); width: 100%; height:100%;}
		#middle section{ width:100%; height:100%; overflow-x:hidden; overflow-y:scroll; flex:1;}

		#aside-over-open {display: inline;}
		#nav-masonry-open {display: inline;}
	}

	/* Skin:SimpleNWhite */
	:root{
		--padding-side: 10px;
		--color-main:rgba( 230, 230, 255, 1);
		--color-sub:rgba( 250, 255, 255, 1);
		--color-base:rgba( 230, 230, 255, 1);
		--color-point: rgba( 100, 0, 2, 1);

		--color-basic:rgba( 200, 200, 200, 1);
		--color-shadow:rgba( 100, 100, 100, 0.5);
		--font-size-header: 5em;
	}
	body{ background: var(--color-sub) }
	.wrapper:not(#footer-wrapper){ margin: var(--padding-side) 0}
	.wrapper > *:not(footer) { margin: 0 var(--padding-side); }
	section { margin-left: 20px; }

	ul.masonry { padding: 0.4em; align-items: center; background: var(--color-main); border-radius: 0.5em;font-family: 'Quicksand', sans-serif;}
	ul.masonry > li { height:2em;vertical-align: middle;  margin: 0.4em 1em;}
	ul.masonry-reverse { display:flex; flex-direction: column;}
	ul.masonry-reverse > li { display:flex; height: 3em; align-items: center; border-bottom: 1px solid var(--color-basic);}	

	header { font-size: var(--font-size-header); font-family: 'Raleway', sans-serif; color:var(--color-main);}

	#middle aside#aside-over { background: var(--color-sub); }
	#middle aside#aside-over #aside-over-close { background: rgba(0, 0, 0, 0.5); }

	#footer-wrapper { background: var(--color-base) }
	@media (max-width: 500px) {
		.wrapper:not(#footer-wrapper){ margin: var(--padding-side) 0}
		.wrapper > *:not(footer) { margin: 0 0 }
		section { margin: 0; padding : 0 10px }

		ul.masonry { padding: 0; border-radius: 0em; }
		ul.masonry > li { height: 45px; vertical-align: middle;  margin: 0; padding: 10px; border-bottom: 1px solid var(--color-sub);}
		ul.masonry-reverse { padding: 0; border-radius: 0em;}
		ul.masonry-reverse > li { height: 45px; vertical-align: middle;  margin: 0; padding: 10px;}

		header {font-size: 35px; padding-left: calc( var(--header-height-mobile) - 35px );}

		#aside-over-open { width:1em; height:1em; font-size:1em; font-family: FontAwesome;}
		#nav-masonry-open { width:1em; height:1em; font-size:1em; font-family: FontAwesome;}
	}
</style>

<div id="header-wrapper" class="wrapper">
	<header>
		<div id="aside-over-open" class="fas fa-bars"></div>
		<div id="nav-masonry-open" class="fas fa-ellipsis-v"></div>
		Roplomu
	</header>
	<nav>
		<ul class="masonry">
			<li>Menu1</li>
			<li>Menu2</li>
			<li>Menu3islong</li>
			<li>Menu4islonglong</li>
			<li>M5st</li>
			<li>Menu6</li>
		</ul>
	</nav>
</div>
<div id="middle-wrapper" class="wrapper">
	<div id="middle">
		<!-- <aside id="aside-push"></aside> -->
		<aside id="aside-over">
			<nav>
				<ul class="masonry-reverse">
					<li>Menu1</li>
					<li>Menu2</li>
					<li>Menu3</li>
					<li>Menu4</li>
					<li>Menu5</li>
					<li>Menu6</li>
				</ul>
			</nav>
			<div id="aside-over-close"></div>
		</aside>
		<section> 
			<?php include('./longtext.txt'); ?>
		</section>
	</div>
</div>
<div id="footer-wrapper" class="wrapper">
<footer> 푸처</footer>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$("#aside-over-close").click(function(){
			$("#aside-over").hide();
		});
		$("#aside-over-open").click(function(){
			$("#aside-over").show();
		});
		$("#nav-masonry-open").click(function(){
			$("nav > .masonry").toggle();
		});

		if ( $( document ).width() < 400 ) {
			$("#aside-over").hide();
			$("nav > .masonry").hide();
		}
	});
</script>


<?php
include('../tail.sub.php');
?>