 <div class="h50"></div>
		<div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default footer "  id="">
		      <ul class="am-navbar-nav am-cf am-avg-sm-4">
		          <li >
		            <a href="<?php echo site_url('Goods');?>" class="">
		                <span class=""><img id="shopping" src="<?php echo base_url('image/all.png');?>"/></span>
		                <span class="am-navbar-label">商品</span>
		            </a>
		          </li>
		          <li >
		            <a href="<?php echo site_url('Orders/getOrder');?>" class="">
		                <span class=""><img id="order" src="<?php echo base_url('image/Category.png');?>"/></span>
		                <span class="am-navbar-label">订单</span>
		            </a>
		          </li>
		   
		      </ul>
		</div>
		<script type="text/javascript">
			var tag = "<?php echo $tag;?>";
			switch(tag){
				case "shopping": $('#shopping').attr("src","<?php echo base_url('image/all-2.png');?>");break;
				case "order": $('#order').attr("src","<?php echo base_url('image/Category-2.png');?>");break;
			}
		</script>
	</body>
</html>
