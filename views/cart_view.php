<?php include 'views/overall/header_view.php';?>
<?php include 'views/overall/nav_view.php';?>

<div class="row-fluid marketing">
    <h1>Your Cart</h1>
    <br>
    <?php if ($cart_product_count == 0) : ?>
        <p>There are no products in your cart.</p>
    <?php else: ?>
    	<table class="table table-striped table-hover" >
    		<thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
    		<?php foreach ($cart_items as $product_id => $cart_item) : ?>
                <tr>
                    <td><?php echo $cart_item['name']; ?></td>
                    <td>
                        <span data-price="<?php echo $cart_item['unit_price']; ?>" class="price"><?php echo sprintf('€ %.2f', $cart_item['unit_price']); ?></span>
                    </td>
                    <td>
                    	<?php echo $cart_item['quantity'] .' Kg'; ?>
                    </td>
                    <td>
                        <span data-price="<?php echo $cart_item['line_price']; ?>" class="price"><?php echo sprintf('€ %.2f', $cart_item['line_price']); ?></span>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
        		<tr>
                    <td colspan="3"><b>Subtotal</b></td>
                    <td>
                        <span data-price="<?php echo $cart_subtotal; ?>" class="price"><?php echo sprintf('€ %.2f', $cart_subtotal); ?></span>
                    </td>
                </tr>
            </tfoot>
    	</table>
    <?endif; ?>

    <p><a href="<?php echo $base_url . 'catalog';?>" class="btn btn-primary">Continue shopping</a></p>
    <!-- if cart has items, display the checkout link -->
    <?php if ($cart_product_count > 0) : ?>
        <p><a href="<?php echo $base_url . 'checkout';?>" class="btn btn-success">Proceed to Checkout</a></p>
    <?php endif; ?>
</div>

<?php include 'views/overall/footer_view.php';?>