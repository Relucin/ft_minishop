<div id="cart">
		<h2> Basket </h2>
		<table class="bask">
			<thead>
				<tr>
					<td class="label"> Name </td>
					<td class="label"> Price </td>
					<td class="label"> Count </td>
				</tr>
			</thead>

			<tbody>
				<?php
				//	foreach ($basket as $key => $value) {
						// $product = ; get product id ?

						?>
				<td class="name"> <?php //echo "$product['name']"; ?> </td>
				<td class="price"> <?php //echo "$product['price']"; ?></td>
				<td class="count"> <?php //echo "$product['count']"; ?> </td>

			<?php// } ?>
			</tbody>

			<tfoot>
				<tr>
					<td colspan="5"></td>
					<td class="right"><?php echo isset($_SESSION['basketPrice']) ? $_SESSION['basketPrice'] : '0.00'; ?>
						$
					</td>
				</tr>
			</tfoot>
		</table>

				<div class="cartvalid">
					<?php
						if (isset($_SESSION['pseudo'])) {
							echo "<form method=\"post\" action=\"controller/orders.php\" />
							<input type=\"hidden\" name=\"from\" value=\"basket\" />
							<input type=\"hidden\" name=\"success\" value=\"member\" />

							<button class='validbtn' type='submit' name='validate'> Validate Basket </button>
							</form>";
							//<a href='#' class='button'>Valider la commande</a>";
						} else {
							echo "<button class='notloggedbtn' type='submit' name='login'><a href='login.php' class=''>Log in to validade</a></button>";
						}
					?></div>

</div>