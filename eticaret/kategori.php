<?php
include "netting/baglan.php";


$kategori=$db->prepare("SELECT * FROM kategori");
$kategori->execute();
?>


<div class="col-md-3">
    <!--sidebar-->
    <div class="title-bg">
        <div class="title">kategoriler</div>
    </div>

    <div class="categorybox">
        <ul>

            <?php
          while($kategori_get=$kategori->fetch(PDO::FETCH_ASSOC)){
?>

            <li>
                <a
                    href="<?php echo "kategoriler-".seourl($kategori_get['kategori_ad']) ?>"><?php echo $kategori_get['kategori_ad']; ?></a>
            </li>
            <?php
          }
          ?>

            <!-- <li><a href="category.htm">Women Accessories</a></li>
            <li><a href="category.htm">Men Shoes</a></li>
            <li><a href="category.htm">Gift Specials</a></li>
            <li><a href="category.htm">Electronics</a>
                <ul>
                    <li><a href="#">iPhone 4S</a></li>
                    <li><a href="#">Samsung Galaxy</a></li>
                    <li><a href="#">MacBook Pro 17"</a></li>
                </ul>
            </li>
            <li><a href="category.htm">On sale</a></li>
            <li><a href="category.htm">Summer Specials</a></li>
            <li><a href="category.htm">Electronics</a></li>
            <li class="lastone"><a href="category.htm">Unique Stuff</a></li> -->
        </ul>
    </div>

    <div class="ads">
        <a href="product.htm"><img src="images\ads.png" class="img-responsive" alt=""></a>
    </div>

</div>