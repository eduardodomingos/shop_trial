<?php include 'views/overall/header_view.php';?>
<?php include 'views/overall/nav_view.php';?>

<h1>Checkout</h1>
<table class="table table-striped table-hover">
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
                        <?php echo $cart_item['quantity'] .'Kg'; ?>
                    </td>
                    <td>
                        <span data-price="<?php echo $cart_item['line_price']; ?>" class="price"><?php echo sprintf('€ $%.2f', $cart_item['line_price']); ?></span>
                    </td>
                </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"><b>Subtotal</b></td>
            <td >
                <span data-price="<?php echo $subtotal; ?>" class="price"><?php echo sprintf('€ %.2f', $subtotal); ?></span>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="right">Tax</td>
            <td>
                <span data-price="<?php echo $tax; ?>" class="price"><?php echo sprintf('€ %.2f', $tax); ?></span>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="right">Shipping</td>
            <td>
                <span data-price="<?php echo $shipping_cost; ?>" class="price"><?php echo sprintf('€ %.2f', $shipping_cost); ?></span>
            </td>
        </tr>
            <tr>
            <td colspan="3" class="right"><b>Total</b></td>
            <td>
                 <span data-price="<?php echo $total; ?>" class="price"><?php echo sprintf('€ %.2f', $total); ?></span>
            </td>
        </tr>
    </tfoot>
</table>


<p><a href="<?php echo '?action=place_order'; ?>" class="btn btn-primary">Place Order</a></p>

<?php include 'views/overall/footer_view.php';?>





