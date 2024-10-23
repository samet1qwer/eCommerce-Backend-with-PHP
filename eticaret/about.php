<?php
include "page/headerAbout.php";
include ('netting/baglan.php');
include "nedmin/production/fonksiyon.php";


?>
<div class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php" class="active">anasayfa</a>
                            <div class="curve"></div>
                        </li>

                        <?php

$menu_get=$db->prepare('SELECT * FROM menu WHERE menu_durum= :menu_durum order by menu_sira asc limit 5 ');
$menu_get->execute([
    'menu_durum'=>1
]);

while ($getir_menu=$menu_get->fetch(pdo::FETCH_ASSOC)) {
    

?>
                        <li><a href="<?php if (!empty($getir_menu['menu_url'])) {
                                           echo $getir_menu['menu_url'];
                                            }else{
                                                echo "sayfa-".seourl($getir_menu['menu_ad']);
                                            } ?>">
                                <?php echo $getir_menu['menu_ad']; ?>
                            </a>
                        </li>
                        <?php
}
                                    ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 machart">
                <button id="popcart" class="btn btn-default btn-chart btn-sm">
                    <span class="mychart">Cart</span>|<span class="allprice">$0.00</span>
                </button>
                <div class="popcart">
                    <table class="table table-condensed popcart-inner">
                        <tbody>
                            <tr>
                                <td>
                                    <a href="product.htm"><img src="images\dummy-1.png" alt=""
                                            class="img-responsive" /></a>
                                </td>
                                <td>
                                    <a href="product.htm">Casio Exilim Zoom</a><br /><span>Color: green</span>
                                </td>
                                <td>1X</td>
                                <td>$138.80</td>
                                <td>
                                    <a href=""><i class="fa fa-times-circle fa-2x"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="product.htm"><img src="images\dummy-1.png" alt=""
                                            class="img-responsive" /></a>
                                </td>
                                <td>
                                    <a href="product.htm">Casio Exilim Zoom</a><br /><span>Color: green</span>
                                </td>
                                <td>1X</td>
                                <td>$138.80</td>
                                <td>
                                    <a href=""><i class="fa fa-times-circle fa-2x"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="product.htm"><img src="images\dummy-1.png" alt=""
                                            class="img-responsive" /></a>
                                </td>
                                <td>
                                    <a href="product.htm">Casio Exilim Zoom</a><br /><span>Color: green</span>
                                </td>
                                <td>1X</td>
                                <td>$138.80</td>
                                <td>
                                    <a href=""><i class="fa fa-times-circle fa-2x"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <span class="sub-tot">Sub-Total : <span>$277.60</span> |
                        <span>Vat (17.5%)</span> : $36.00
                    </span>
                    <br />
                    <div class="btn-popcart">
                        <a href="checkout.htm" class="btn btn-default btn-red btn-sm">Checkout</a>
                        <a href="cart.htm" class="btn btn-default btn-red btn-sm">More</a>
                    </div>
                    <div class="popcart-tot">
                        <p>
                            Total<br />
                            <span>$313.60</span>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--end main-nav -->



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                    <div class="row">
                        <div class="col-md-4">

                            <div class="bigtitle">About</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <!--Main content-->
            <!-- <div class="title-bg">
                <div class="title"><?php  ; ?></div>
            </div> -->
            <div class="page-content">
                <h3>tanıtım videosu</h3>
                <iframe width="640" height="360"
                    src="https://www.youtube.com/embed/<?php echo $hakkımızda_cek['hakkimizda_video']; ?>"
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>


            </div>
            <div class="page-content">
                <div class="title-bg">
                    <div class="title">hakkımızda içerik</div>
                </div>
                <p>
                    <?php 
                    echo $hakkımızda_cek['hakkimizda_icerik'];
                    ?>
                </p>

            </div>
            <div class="page-content">
                <div class="title-bg">
                    <div class="title">hakkımızda misyon</div>
                </div>

                <p style="color: black;">
                    <?php 
                    echo $hakkımızda_cek['hakkimizda_misyon'];
                    ?>
                </p>

            </div>
            <div class="page-content">
                <div class="title-bg">
                    <div class="title">hakkımızda vizyon</div>
                </div>

                <p style="color: black;">
                    <?php 
                    echo $hakkımızda_cek['hakkimizda_vizyon'];
                    ?>
                </p>

            </div>
        </div>
        <div class="col-md-3">
            <!--sidebar-->
            <div class="title-bg">
                <div class="title">Categories</div>
            </div>

            <div class="categorybox">
                <ul>
                    <li><a href="category.htm">Women Accessories</a></li>
                    <li><a href="category.htm">Men Shoes</a></li>
                    <li><a href="category.htm">Gift Specials</a></li>
                    <li>
                        <a href="category.htm">Electronics</a>
                        <ul>
                            <li><a href="#">iPhone 4S</a></li>
                            <li><a href="#">Samsung Galaxy</a></li>
                            <li><a href="#">MacBook Pro 17"</a></li>
                        </ul>
                    </li>
                    <li><a href="category.htm">On sale</a></li>
                    <li><a href="category.htm">Summer Specials</a></li>
                    <li><a href="category.htm">Electronics</a></li>
                    <li class="lastone"><a href="category.htm">Unique Stuff</a></li>
                </ul>
            </div>

            <div class="ads">
                <a href="product.htm"><img src="images\ads.png" class="img-responsive" alt="" /></a>
            </div>

            <div class="title-bg">
                <div class="title">Best Seller</div>
            </div>
            <div class="best-seller">
                <ul>
                    <li class="clearfix">
                        <a href="#"><img src="images\demo-img.jpg" alt="" class="img-responsive mini" /></a>
                        <div class="mini-meta">
                            <a href="#" class="smalltitle2">Panasonic M3</a>
                            <p class="smallprice2">Price : $122</p>
                        </div>
                    </li>
                    <li class="clearfix">
                        <a href="#"><img src="images\demo-img.jpg" alt="" class="img-responsive mini" /></a>
                        <div class="mini-meta">
                            <a href="#" class="smalltitle2">Panasonic M3</a>
                            <p class="smallprice2">Price : $122</p>
                        </div>
                    </li>
                    <li class="clearfix">
                        <a href="#"><img src="images\demo-img.jpg" alt="" class="img-responsive mini" /></a>
                        <div class="mini-meta">
                            <a href="#" class="smalltitle2">Panasonic M3</a>
                            <p class="smallprice2">Price : $122</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!--sidebar-->
    </div>
    <div class="spacer"></div>
</div>

<?php
// include "page/aboutFooter.php";
include "footerSite.php";
?>