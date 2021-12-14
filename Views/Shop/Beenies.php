<?php
include_once 'functions.php';


$chercher = 'Beanie';
$selection = $pdo->prepare("SELECT * FROM products WHERE name like '%$chercher%'");
$selection->execute();
$products = $selection->fetchAll(PDO::FETCH_ASSOC);


$total_products = $pdo->query("SELECT * FROM products WHERE name like '%$chercher%'")->rowCount();
?>

<?=template_header('Products')?>

<div class="products content-wrapper">
    <h1>Products</h1>
    <p><?=$total_products?> Products</p>
    <div class="products-wrapper">
        <?php foreach ($products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <span class="price">
                &dollar;<?=$product['price']?>
                <?php if ($product['rrp'] > 0): ?>
                <span class="rrp">&dollar;<?=$product['rrp']?></span>
                <?php endif; ?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
	<?=template_footer()?>