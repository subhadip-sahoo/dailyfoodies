<style>
@charset "utf-8";
/* CSS Document */

*{ margin:0; padding:0;}
/*body{ font-family:Arial, Helvetica, sans-serif;}*/
/*img{ border:0;}*/

/*********************/
/*h1{ font-family:Arial, Helvetica, sans-serif;
	font-size:18px;
	font-weight:bold;
	color:#000;
	}
h2{ font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
	font-weight:normal;
	color:#000;
	}
p{ font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	font-weight:normal;
	color:#000;
	}

************body****************
.wrapper{
	width:100%;
	float:left;
	}
.main_body{
	width:415px;
	margin:0 auto;
	}*/
.popup_main{
	width:405px;
	float:left;
	}
.popup_body{
	width:400px;
	float:left;
	background:url(images/popup_bg.jpg) repeat;
	border:1px solid #cecece;
	}
.pup_head_bg{
	background:#91c448;
	float:left;
	margin-top:16px;
	
	height:35px;
	width:400px;
	line-height:35px;
	margin-bottom:30px;
	position:relative;
	}
.pup_head_bg h2{
	padding-left:16px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	font-weight:bold;
	text-shadow:1px 0 1px #76a20e;
	color:#fff;
	
	}
.pup_head_bg:before{
	content:"";
	background:url(images/popup_header_side_bg.png) no-repeat;
	position:absolute;
	width:7px;
	height:47px;
	margin-left:-7px;
	top:-6px;
	}
.pup_user{
	width:306px;
	height:42px;
	float:left;
	border:1px solid #c3c3c3;
	background:url(images/popup_cheak_bg_user.jpg) no-repeat;
	margin-left:44px;
	margin-right:40px;
	border-radius:5px;
	margin-bottom:23px;
	}
.pup_pass{
	width:306px;
	height:42px;
	float:left;
	border:1px solid #c3c3c3;
	background: url(images/popup_cheak_bg_pass.jpg) no-repeat;
	margin-left:44px;
	margin-right:40px;
	border-radius:5px;
	margin-bottom:23px;
	}
.popup_txtfld{
	float:left;
	background:url(images/popup_txt_fld_bg.jpg) repeat-x;
	border:none;
	height:42px;
	margin-left:30px;
	width:270px;
	color:#7e7e7e;
	}
.pop_btn_bg_div{
	background:#ececec;
	padding:3px;
	border-radius:3px;
	margin-left:40px;
	float:left;
	margin-top:17px;
	margin-bottom:18px;
	}
.pop_btn{
	width:163px;
	height:40px;
	background:#91c448;
	color:#fff;
	font-family:Arial, Helvetica, sans-serif;
	font-size:13px;
	border:1px solid #678e0b;
	text-align:center;
	line-height:40px;
	border-radius:3px;
	cursor:pointer;
	text-shadow:1px 0 1px #709a0d;
	}
.test{
	float:left;
	margin-left:45px;
	position:relative;
	}
.pup_ck_on{
	background:url(images/pup_ck_on.png) no-repeat;
	width:24px;
	height:22px;
	position:relative;
	
	}
.pup_cheak_box{
	height:22px;
	width:24px;
	position:absolute;
	opacity:0;
	cursor:pointer;
	z-index:100px;
	margin:0;
	padding:0;
	left:0;
	cursor:pointer;
	top:0;
	z-index:100;
	}
input.pup_cheak_box:checked + .pup_ck_off  img {
	opacity:0;}
	
.pup_ck_off img{
	 -webkit-transition: opacity 1s ease;
 -moz-transition: opacity 1s ease;
 -o-transition: opacity 1s ease;
 -ms-transition: opacity 1s ease;
 transition: opacity 1s ease;
	 }
	 
.pup_re p{
	font-family:Arial, Helvetica, sans-serif;
	font-size:13px;
	color:#484848;
	font-weight:normal;
	padding-left:10px;
	padding-right:15px;
	border-right:1px dashed #666;
	float:left;
	}
.pup_re a{
	color:#0088de;
	font-family:Arial, Helvetica, sans-serif;
	font-size:13px;
	padding-left:15px;
	float:left;
	}
</style>
<div class="popupContactClose"></div>
<div class="popup_main">
    <div class="popup_body">
        <div class="pup_head_bg"><h2>PLEASE LOGIN</h2></div>
        <form>
            <div class="pup_user">
            <p><input name="" type="text" placeholder="Username" class="popup_txtfld"></p>
            </div>
            <div class="pup_pass">
            <p><input name="" type="text" placeholder="Password" class="popup_txtfld"></p>
            </div>
            <div class="test">
            <div class="pup_ck_on">
                <input name="" type="checkbox" value="" class="pup_cheak_box">
                <div class="pup_ck_off" ><img src="<?php echo get_template_directory_uri();?>/images/pup_ck_off.png"></div>          
            </div>
            </div>
                <div class="pup_re"><p>Remember me</p><a href="#">Forgot password</a></div>
            <div class="pop_btn_bg_div">
                <input name="" type="button" value="LOGIN" class="pop_btn">
            </div>
        </form>
    </div>
</div>