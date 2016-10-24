<style type="text/css">
@-webkit-keyframes bugfix { 
	from {padding:0;} 
	to {padding:0;} 
}

.iconicmenu {
    position: relative;
    height: 45px;
    overflow: hidden;
    }

.iconicmenu, .iconicmenu * {
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    }

.iconicmenu input[type="checkbox"] { /* checkbox used to toggle menu state */
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    }

.iconicmenu > label { /* Main label icon to toggle menu state */
    z-index: 1000;
    display: block;
    position: absolute;
    width: 40px;
    height: 40px;
    float: left;
    top: 0;
    left: 0;
    background: #FF66CC;
    text-indent: -1000000px;
    border: 6px solid red; /* border color */
    border-width: 6px 0;
    cursor: pointer;
    -moz-transition: all 0.3s ease-in;
    -webkit-transition: all 0.3s ease-in;
    transition: all 0.3s ease-in; /* transition for flipping label */
    }

.iconicmenu > label::after { /* inner stripes inside label */
    content: "";
    display: block;
    position: absolute;
    width: 100%;
    height: 18%;
    top: 19%;
    left: 0;
    border: 6px solid blue; /* border color */
    border-width: 6px 0;
    -moz-transition: all 0.3s ease-in;
    -webkit-transition: all 0.3s ease-in;
    transition: all 0.3s ease-in; /* transition for flipping label */
    }

.iconicmenu ul { /* UL menu inside container */
    margin: 0;
    padding: 0;
    position: absolute;
    margin-left: 40px;
    background: #eee;
    left: -100%; /* hide menu intially */
    height: 40px; /* height of menu */
    font: bold 14px Verdana;
    text-align: center;
    list-style: none;
    opacity: 0;
    -moz-border-radius: 0 5px 5px 0;
    -webkit-border-radius: 0 5px 5px 0;
    border-radius: 0 5px 5px 0;
    -moz-perspective: 10000px;
    perspective: 10000px;
    -moz-transition: all 0.5s ease-in;
    -webkit-transition: all 0.5s ease-in;
    transition: all 0.5s ease-in; /* transition for animating UL in and out */
    }

.iconicmenu li {
    display: inline;
    margin: 0;
    padding: 0;
    }

.iconicmenu ul label { /* label button inside UL to close menu */
    cursor: pointer;
    position: relative;
    height: 100%;
    text-align: center;
    }

.iconicmenu ul label::after { /* label button x */
    content: "x";
    display: inline-block;
    line-height: 14px;
    color: white;
    -moz-border-radius: 50px;
    -webkit-border-radius: 50px;
    border-radius: 50px;
    width: 20px;
    height: 20px;
    background: black;
    font-size: 18px;
    margin: 5px;
    margin-top: 10px;
    -moz-transition: all 0.3s ease-in;
    -webkit-transition: all 0.3s ease-in;
    transition: all 0.3s ease-in;
    }

.iconicmenu input[type="checkbox"]:checked ~ label, .iconicmenu ul label:hover::after {
    -moz-transform: rotatey(180deg);
    -ms-transform: rotatey(180deg);
    -webkit-transform: rotatey(180deg);
    transform: rotatey(180deg); /* flip labels vertically onMouseover */
    }

.iconicmenu > label:hover, .iconicmenu > label:hover::after, .iconicmenu input[type="checkbox"]:checked ~ label, .iconicmenu input[type="checkbox"]:checked ~ label::after {
    border-color: darkred; /* highlight color of main menu label onMouseover */
    }

.iconicmenu input[type="checkbox"]:checked ~ ul {
    left: 8px; /* Animate menu into view */
    opacity: 1;
    -moz-box-shadow: 1px 1px 5px gray;
    -webkit-box-shadow: 1px 1px 5px gray;
    box-shadow: 1px 1px 5px gray;
    }

.iconicmenu li a {
    display: block;
    float: left;
    text-align: center;
    text-decoration: none;
    color: black;
    margin: 0;
    padding: 10px;
    padding-right: 15px;
    height: 100%;
    }

.iconicmenu li a:hover {
    background: black;
    color: white;
    }

/* ----------------------------- CSS Media Queries ----------------------------- */

/*
These rules control which portions of the menu gets shown when the screen size is below a certain width.
By default 2 stages are defined depending on browser screen width.
*/

@media screen and (max-width: 580px) { /* Hide toggle icon when menu is already open (increases usable menu space by 40px) */
    .iconicmenu input[type="checkbox"]:checked ~ label {
        display: none;
        }
    .iconicmenu input[type="checkbox"]:checked ~ ul {
        margin-left: 0;
        }
    }
 
@media screen and (max-width: 560px) { /* Convert horizontal menu to vertical drop down instead (friendly across all screen sizes) */
    .iconicmenu {
        overflow: visible;
        }
    .iconicmenu ul {
        height: auto;
        }
    .iconicmenu ul li {
        min-width: 200px;;
        display: block;
        }
    .iconicmenu ul li a {
        float: none;;
        text-align: left;
        }
    }
</style>


<div class="iconicmenu">
			<input type="checkbox" id="togglebox" />
			<ul>
				<li><a href="index.php">Home</a></li>
				<?php if(isset($_SESSION['client_email'])) { ?><li><a href="post_msg.php">Post Message</a></li> <?php } ?>
    			<li><a href="logout.php">Logout</a></li>
	
				<li><label for="togglebox"></label></li>
			</ul>
			<label class="toggler" for="togglebox">Menu</label>
		</div>