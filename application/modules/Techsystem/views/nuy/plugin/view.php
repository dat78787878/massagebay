<div id="Breadcrumb" class="Block Breadcrumb ui-widget-content ui-corner-top ui-corner-bottom">
    <ul>
        <li class="home"><a href="<?php echo base_url(''); ?>Techsystem"><i class="icon-home" style="font-size:14px;"></i> <?php echo alang("HOME") ?></a></li>
        <li class="SecondLast"><a href="Techsystem/plugins">Plugin</a></li>
    </ul>
</div>

<div id="cph_Main_ContentPane " class="plugins">
  <div class="row">
  		<div class="col-xs-12 col-md-6 col-md-push-3 login_form">
  			<p class="notify">Để sử dụng tính năng này, vui lòng liên hệ Tech5s hoặc đăng nhập theo tài khoản dưới đây</p>
  			<?php $message = $this->session->flashdata('messageNotify'); ?>
  			<?php $typeNotify = $this->session->flashdata('typeNotify'); ?>
  			<?php if(!isNull($message)): ?>
  				<p class="notify <?php echo $typeNotify ?>"><?php echo $message ?></p>
  			<?php endif; ?>
			<form action="Techsystem/loginPlugin" method="POST">
			   <p> <label>Tên đăng nhập hoặc Email<span>*</span></label> <input type="text" name="username"> </p>
			   <p> <label>Mật Khẩu <span>*</span></label> <input type="password" name="password"> </p>
			   <div class="login_submit"><label for="remember"><button type="submit">Đăng Nhập</button> </div>
			</form>
  		</div>
  </div>
</div>
</div>

<style type="text/css">

.plugins .login_form p.notify{
	    background: #00923fc2;
    padding: 5px;
    color: #fff;
}
.plugins .login_form p.error{
    background: #920d00c2;
}
.plugins .login_form .login_submit{
	text-align: center;
}
.plugins .login_form button{
    background: #00923f;
    border: 0;
    color: #ffffff;
    display: inline-block;
    font-size: 12px;
    font-weight: 700;
    height: 34px;
    line-height: 26px;
    padding: 5px 20px;
    text-transform: uppercase;
    cursor: pointer;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    margin-left: 0;
    border-radius: 20px;
}
.plugins .login_form form{
    border: 1px solid #ededed;
    padding: 23px 20px 29px;
    border-radius: 5px;
}
.plugins .login_form label{
    font-size: 16px;
    font-weight: 400;
    cursor: pointer;
    line-height: 12px;
    margin-bottom: 12px;
}
.plugins .login_form input{
	border: 1px solid #ededed;
    height: 40px;
    max-width: 100%;
    padding: 0 20px;
    background: none;
    width: 100%;

}



  .plugins .item{
background: #fff;
position: relative;
    padding: 0;
  }
  .plugins .item h3{
    color: #00923f;
    font-size: 16px;
    padding: 10px 5px;
    margin: 0;
    background: #f1f1f1;
  }
  .plugins .item p{
    margin:0;
  }
  .plugins .item .content{
    padding: 0px 5px;
  }
  .plugins .item .btndeactive,
  .plugins .item .btnactive{
    display: block;
    background: #00923f;
    text-align: center;
    text-transform: uppercase;
    color: #fff;
  }
    .plugins .item .btndeactive{
      background: #ccc;
    }
    .plugins .function{
      display: flex;
    }
    .plugins .function a{
        flex-grow: 1;
    flex-basis: 0;
    }
    .plugins .function .btnactive.view{
      background: #be7317;
    }
    .nav-plugins li {
    display: inline-block;
    text-transform: uppercase;
    background: #ccc;
    color: #fff;
}
.nav-plugins li.active {
    display: inline-block;
    text-transform: uppercase;
    background: #00923f;
    color: #fff;
}
.nav-plugins li a {
    color: #fff;
    padding: 5px 10px;
    display: inline-block;
}
.plugins .item .delete{
        position: absolute;
    z-index: 999;
    top: 0;
    right: 0;
    background: red;
    color: #fff;
    padding: 5px;
    cursor: pointer;
}
</style>
