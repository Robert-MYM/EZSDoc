	<body>
		<header data-am-widget="header" class="am-header am-header-default header header-1">
			<h1 class="am-header-title"> <div style="color: #333;">订单</div></h1>
		</header>
		<ul class="order-style">
			<li id="all" ><a href="<?php echo site_url('Orders/getOrder/-1')?>">全部</a></li>
			<li id="all-0"><a href="<?php echo site_url('Orders/getOrder/0')?>">待发货</a></li>
			<li id="all-1"><a href="<?php echo site_url('Orders/getOrder/1')?>">已发货</a></li>
			<li id="all-2"><a href="<?php echo site_url('Orders/getOrder/2')?>">已完成</a></li>
		</ul>
		<?php foreach($orders as $index => $order):?>
			<div class="c-comment">
				<span class="c-comment-num">订单编号：<?php echo $order['orderid'];?></span>
				&nbsp;&nbsp;
				<span class="c-comment-num">收货人：<?php echo $order['username'];?></span>
			</div>
			<div class="c-comment">
				<div class="c-com-address">收货地址：<?php echo $order['address'];?></div>
			</div>
			<div class="c-comment-list" style="border: 0;">
				<a class="o-con" href="">
					<div class="o-con-img"><img src="<?php echo base_url($order['image']);?>"></div>
					<div class="o-con-txt">
						<p><span><?php echo $order['name'];?></span>
						<p class="price">￥<?php echo $order['price'];?></p>
						<p>合计：<span>￥<?php echo $order['num']*$order['price'];?></span></p>
					</div>
					<span style="color: #ff8800; float:right">
					<?php switch ($order['condition']) {
						case 0:
						echo "待发货";break;
						case 1:
						echo "已发货,待确认";break;
						case 2:
						echo "已完成";break;
					}?>
				</span>
					<div class="o-con-much-1"> <h4>x<?php echo $order['num'];?></h4></div>

				</a>
				<div class="c-com-money">日期：<?php echo $order['date'];?>&nbsp;&nbsp;实付金额：<span>￥ <?php echo $order['num']*$order['price'];?></span></div>
			</div>
				<?php switch ($order['condition']){
					case 0:?>
					<div class="c-com-btn">
						<a href="<?php echo site_url('Orders/dispatch/').$order['orderid'].'/'.$state;?>">发货</a>
					</div>
					<?php break;case 1:?>
					<?php break;case 2:?>
					<?php break;}?>
			<div class="clear"></div>
		<?php endforeach;?>

		<script type="text/javascript">
			var tag = "<?php echo $state;?>";
			switch(tag){
				case '-1': $('#all').addClass('current');break;
				case '0': $('#all-0').addClass('current');break;
				case '1': $('#all-1').addClass('current');break;
				case '2': $('#all-2').addClass('current');break;
			};
		</script>
