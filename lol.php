<div class="container">
    <h1 style="text-align: left">Mon panier</h1>
    <?php
        if ($basket) {
            ?>
            <table class="basket">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Nom</td>
                    <td></td>
                    <td class="right">Prix</td>
                    <td class="right">Quantité</td>
                    <td class="right">Total TTC</td>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($basket as $k => $v) {
                        $movies = product_get_byid($k);
                        ?>
                        <tr>
                            <td><a href="movie.php?id=<?php echo $k; ?>"><?php echo $k; ?></a></td>
                            <td><a href="movie.php?id=<?php echo $k; ?>"><img
                                        src="http://image.tmdb.org/t/p/w185/<?php echo $movies['picture']; ?>"
                                        alt=""></a>
                            </td>
                            <td class="title"><a
                                    href="movie.php?id=<?php echo $k; ?>"><?php echo $movies['name']; ?></a>
                            </td>
                            <td class="right"><?php echo number_format($movies['price'], 2); ?> €</td>
                            <td class="right"><?php echo $v ?></td>
                            <td class="right"><?php echo number_format($movies['price'] * $v, 2); ?> €</td>
                        </tr>
                        <?php
                    }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5"></td>
                    <td class="right"><?php echo isset($_SESSION['basketPrice']) ? $_SESSION['basketPrice'] : '0.00'; ?>
                        €
                    </td>
                </tr>
                </tfoot>
            </table>
            <div class="row">
                <div class="col-l-6">
                    <a href='basket.php?remove=1' class='button' style="background-color:red">Supprimer le panier</a>
                </div>
                <div class="col-l-6">
                    <?php
                        if ($_SESSION['pseudo']) {
                            echo "<form method=\"post\" action=\"controller/orders.php\" />
                            <input type=\"hidden\" name=\"from\" value=\"basket\" />
                            <input type=\"hidden\" name=\"success\" value=\"member\" />
                            <input type=\"submit\" class='button' value='Valider la commande'/></form>";
                            //<a href='#' class='button'>Valider la commande</a>";
                        } else {
                            echo "<a href='login.php' class='button'>Connectes-toi pour valider ta commande</a>";
                        }
                    ?></div>
            </div>
            <?php
        } else {
            echo "<h4>Ton panier est vide</h4>";
        }
    ?>
</div>
</div>
