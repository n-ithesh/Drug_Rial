<?php
include '../config.php';
$admin = new Admin();

$cid = $_GET['catid'];
$q = $_GET['q'];

$st = $admin->ret("SELECT * FROM `medicine` where `m_title` LIKE '$q' OR `m_description` LIKE '$q'  OR `m_title` LIKE '$q%' OR `m_description` LIKE '$q%' AND `cat_id`='$cid'");
$c = $st->rowCount();
if ($c == 0) {
    ?>
    <p>Not found</p>

    <?php
}
while ($ro = $st->fetch(PDO::FETCH_ASSOC)) {
    ?>

    <div class="single_product_item">
        <img src="../employee/controller/<?php echo $ro['m_image']; ?>" alt="#" class="img-fluid mt-3"
            style="width: 350px;height: 300px;overflow: hidden;object-fit: cover;">
        <h3> <a href="single-medicine.php?m_id=<?php echo $ro['m_id']; ?>"><?php echo $ro['m_title']; ?></a> </h3>
        <p>MRP ₹
            <?php echo $ro['m_mrp']; ?>
        </p>
    </div>

<?php }
?>
