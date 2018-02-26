<?php
	if (!isset($_SESSION['basket']))
		$_SESSION['basket'] = array();
?>
<div id="cart">
		<h2> Basket </h2>
		<table class="bask">
			<thead>
				<tr>
					<td class="label"> ID </td>

					<td class="label"> Name </td>
					<td class="label"> Price </td>
					<td class="label"> Count </td>
				</tr>
			</thead>

			<tbody>
				<?php
					$basket = $_SESSION['basket'];
					$sum = 0;
					foreach ($basket as $key => $value) {
						?>
				<tr>
				<td class="id"> <?php echo $key; ?> </td>
				<td class="name"> <?php echo $value['name']; ?> </td>
				<td class="price"> <?php echo $value['price']; $sum += $value['price']; ?></td>
				<td class="count"> <?php echo $value['count']; ?> </td>
				</tr>
			<?php } ?>
			</tbody>

			<tfoot>
				<tr>
					<td colspan="5"></td>
					<td class="right"><?php echo "$".$sum ?>
					</td>
				</tr>
			</tfoot>
		</table>

				<div class="cartvalid">
					<?php
						if (isset($_SESSION['user_id'])) {
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
