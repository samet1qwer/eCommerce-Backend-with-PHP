<?php
session_start();
include "headerSite.php" ?>
<div class="col-md-2 machart">
    <div class="popcart">
        <table class="table table-condensed popcart-inner">
            <tbody>
                <tr>
                    <td>
                        <a href="product.htm"><img src="images\dummy-1.png" alt="" class="img-responsive"></a>
                    </td>
                    <td><a href="product.htm">Casio Exilim Zoom</a><br><span>Color: green</span>
                    </td>
                    <td>1X</td>
                    <td>$138.80</td>
                    <td><a href=""><i class="fa fa-times-circle fa-2x"></i></a></td>
                </tr>

            </tbody>
        </table>
        <span class="sub-tot">Sub-Total : <span>$277.60</span> | <span>Vat (17.5%)</span> :
            $36.00 </span>
        <br>
        <div class="btn-popcart">
            <a href="checkout.htm" class="btn btn-default btn-red btn-sm">Checkout</a>
            <a href="cart.htm" class="btn btn-default btn-red btn-sm">More</a>
        </div>
        <div class="popcart-tot">
            <p>
                Total<br>
                <span>$313.60</span>
            </p>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!--end main-nav -->

<div class="container">
    <?php

if (isset($_SESSION['kullanicimail'])) {  ?>
    <ul class="small-menu">
        <!--small-nav -->
        <li><a href="myaccount.php" class="myacc">hesabım</a></li>
        <li><a href="sepetim.php" class="myshop">alışveriş sepeti</a></li>
        <li><a href="logout.php" class="mycheck">güvenli çıkış</a></li>
    </ul>
    <?php
} else {
  
}
?>
    <!--small-nav -->
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="bigtitle">alışveriş sepetim</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="title-bg">
        <div class="title">sepetim</div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered chart">
            <thead>
                <tr>
                    <th>sil</th>
                    <th>görsel</th>
                    <th>ürün adı</th>
                    <th>Model</th>
                    <th>ürün No.</th>
                    <th>adet</th>
                    <th>ürün fiyatı</th>
                    <th>fiyat</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>
                        <form><input type="checkbox"></form>
                    </td>
                    <td><img src="images\demo-img.jpg" width="100" alt=""></td>
                    <td>Some Camera</td>
                    <td>PR - 2</td>
                    <td>225883</td>
                    <td>
                        <form><input type="text" class="form-control quantity"></form>
                    </td>
                    <td>$94.00</td>
                    <td>$94.00</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-6">
            <!-- <form class="form-horizontal coupon" role="form">
                <div class="form-group">
                    <label for="coupon" class="col-sm-3 control-label">e-mail</label>
                    <div class="col-sm-7">
                        <input type="email" class="form-control" id="coupon" placeholder="Email">
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-default btn-red btn-sm">ekle</button>
                    </div>
                </div>
            </form> -->
            <form class="form-horizontal coupon" role="form">
                <div class="form-group">
                    <label for="coupon2" class="col-sm-3 control-label">kupon kodu</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="coupon2" placeholder="kupon giriniz...">
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-default btn-red btn-sm">ekle</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3 col-md-offset-3">
            <div class="subtotal-wrap">

                <div class="total">Toplam tutar : <span class="bigprice">$255.00</span></div>
                <a href="" class="btn btn-default btn-red btn-sm">çıkış</a>
                <a href="" class="btn btn-default btn-red btn-sm">güncelle</a>
                <div class="clearfix"></div>
                <a href="" class="btn btn-default btn-yellow">alışverişe dön</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="spacer"></div>
</div>

<?php include "footerSite.php" ?>