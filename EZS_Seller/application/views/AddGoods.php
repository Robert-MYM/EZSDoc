
<body>
    <header data-am-widget="header" class="am-header am-header-default header">
      <div class="am-header-left am-header-nav">
         <a href=<?php echo site_url('Goods');?> class=""> 
           <i class="am-header-icon am-icon-angle-left"></i>
         </a>
      </div>
      <h1 class="am-header-title"> <a id="title" href="#title-link" class="" style="color: #333;">添加商品</a></h1>
  </header>
    <div class="am-g myapp-login"> 
        <div class="myapp-login-logo-block">
        <div class="am-u-sm-12 login-am-center" style="display: block; text-align:center">
            <form class="am-form" method="POST" action="<?php echo site_url('Goods/addGoods');?>">
                <fieldset>
                   <div class="am-form-group">
                        <input type="tel" class="" id="goodsid" placeholder="商品ID" name="goodsid" value="">
                    </div>
                    <?php echo form_error('goodsid'); ?>
                    <div class="am-form-group">
                        <input type="text" class="" id="price" placeholder="价格" name="price" value="">
                    </div>
                    <?php echo form_error('price'); ?>
                    <div class="am-form-group">
                        <input type="text" class="" id="name" placeholder="名称" name="name" value="">
                    </div>
                    <?php echo form_error('name'); ?>
                    <p><button type="submit" class="am-btn am-btn-default">确认</button></p>
                      <?php if(!empty($msg)):?>
                        <div class="alert alert-danger alert-dismissible" role="alert" id="alert" style="color: #FF0000"><?php echo $msg;?>
                        </div>
                    <?php endif;?> 
                </fieldset>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    var index = "<?php echo isset($index)?$index:1;?>";

    if(index == ""){
        $('#phone').attr('value','<?php echo isset($address)?$address->realphone:"";?>');
        $('#name').attr('value','<?php echo isset($address)?$address->name:"";?>');
        $('#address').attr('value','<?php echo isset($address)?$address->address:"";?>');
    };

    if(index == "1"){
        $('#title').text('添加收货地址');
    }

    $(".am-form-group").click(function(){
        $("div#alert").hide();
    });
</script>
</body>
</html>