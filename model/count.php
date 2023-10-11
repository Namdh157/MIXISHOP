<?php
function countChar() {
$counts = pdo_query("SELECT category.name_category, count(products.id_category) count from products JOIN category ON products.id_category = category.id GROUP BY products.id_category");
return $counts;
}
?>