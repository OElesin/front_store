{include file="includes/header.tpl"}
{include file="includes/navbar.tpl"}
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Promotions</h2>
						<div class="panel-group category-products"><!--category-productsr-->
							<div class="panel panel-default" style="position:fixed">
								<script type="text/javascript" src="http://konga.postaffiliatepro.com/scripts/banner.php?k_id=hertz&k_bid=d6297a65"></script>
							</div>
							<div class="panel panel-default">
								<script type="text/javascript" src="http://konga.postaffiliatepro.com/scripts/banner.php?k_id=hertz&k_bid=562ad577"></script>
							</div>
							<br>
							<div class="panel panel-default">
								<script type="text/javascript" src="http://konga.postaffiliatepro.com/scripts/banner.php?k_id=hertz&k_bid=fd04a75e"></script>
							</div>
						</div><!--/category-products-->
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						{foreach from=$products item=product}
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{$product.ImageURL}" alt="" />
											<h2>&#8358; {$product.Price}</h2>
											<p>{$product.Product_name}</p>
											<a target="_blank" href="{$product.ProductURL}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>BUY NOW</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>&#8358; {$product.Price}</h2>
												<p>{$product.Product_name}</p>
												<a href="products?id={$product.Product_id}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>BUY NOW</a>
											</div>
										</div>
								</div>

							</div>
						</div>
						{/foreach}
					</div><!--features_items-->
				</div>
			</div>
		</div>
		<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-content">
				<ul class="list-inline item-details">
					<li><a href="http://themifycloud.com">ThemifyCloud</a></li>
					<li><a href="http://themescloud.org">ThemesCloud</a></li>
				</ul>
			</div>
		</div>
	</section>

{include file="includes/footer.tpl"}