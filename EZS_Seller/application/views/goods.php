
	<body>
	 <header data-am-widget="header" class="am-header am-header-default header">
		<div data-am-widget="header" class="am-header am-header-default header" style="margin-top: 0px;">
		    <div class="am-header-title" style="color: #333;">所有商品</div>
		</div>
	  <div class="am-header-right am-header-nav">
         <a href="<?php echo site_url('Goods/add');?>" class=""> 
           <i class="am-header-icon am-icon-plus"></i>
         </a>
      </div>
      </header>
	    <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2 am-avg-md-3 am-avg-lg-4 am-gallery-default product">
	    <?php foreach($goods as $item):?>
		    <li>
		        <div class="am-gallery-item">
		            <a href="#" class="">
		            	<img src="<?php echo base_url($item['image']);?>"  alt=""/>
		            	<h3 class="am-gallery-title"><?php echo $item['name']; echo $item['state']?"已下架":"";?></h3>
		            	<div class="am-gallery-desc">
		              	<em>¥ <?php echo $item['price'];?></em>
							<?php if($item['state']):?>
								<a href="<?php echo site_url('Goods/recoverGoods/').$item['id'];?>"><i class="am-icon-plus"></i></a>
							<?php else:?>
								<a href="<?php echo site_url('Goods/deleteGoods/').$item['id'];?>"><i class="am-icon-trash"></i></a>
							<?php endif;?>
		              	</div>
		            </a>
		        </div>
		    </li>
		<?php endforeach;?>
		</ul>		