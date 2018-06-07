<section>
    <div class="container-fluid">
        <div class="row bg-white">
            <div class="col-md-3 col-sm-3 sidemenu-left acc-menu">
                <div class="menu-account">
                    <div class="avatar-account">
                        <div class="photo-account">
                            <img src="<?php echo $img_link; ?>" alt="">
                        </div>
                        <h3><?php echo @$userdata['namefront']; ?></h3>
                    </div>
                    <ul>
                        <li class="acc_notif">
                        	<a href="<?php echo site_url('notification'); ?>" onclick="setActiveMenu('notification')">
                            <span class="ic_menu"><i ></i></span> Notifikasi<!--span>10</span--></a>
                        </li>
                        <li class="acc_transaction">
                        	<a href="<?php echo site_url('transaction'); ?>" onclick="setActiveMenu('transaction')">
                        	<span class="ic_menu"><i ></i></span> Transaksi</a>
                        </li>
                        <li class="acc_npl">
                        	<a href="<?php echo site_url('npl_dashboard'); ?>" onclick="setActiveMenu('npl_dashboard')">
                        	<span class="ic_menu"><i ></i></span> Manajemen NPL</a>
                        </li>
                        <li class="acc_setting">
                        	<a href="<?php echo site_url('dashboard'); ?>" onclick="setActiveMenu('dashboard')">
                        	<span class="ic_menu"><i ></i></span> Pengaturan</a>
                        </li>
                        <li class="acc_favorite active">
                        	<a href="<?php echo site_url('favorite'); ?>" onclick="setActiveMenu('favorite')">
                        	<span class="ic_menu"><i ></i></span> Favorit</a>
                        </li>
                        <li class="acc_price">
                        	<a href="<?php echo site_url('basic-price'); ?>" onclick="setActiveMenu('basic-price')">
                        	<span class="ic_menu"><i ></i></span> Harga Dasar</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 am-right">
                <div class="main-management clearfix">
                    <h2>Favorit</h2>
                    <div class="whislist product-mob clearfix">
                        <div class="row">
                            <?php 
                            if(count($data)) {
                                foreach($data as $key => $value) {
                            ?>
                            <div class="col-md-4">
                                <div class="list-product box-recommend">
                                    <a href="<?php echo site_url('detail-lelang/'.$value->AuctionItemId); ?>" target="_top" />
                                        <div class="thumbnail-favorite">
                                            <div class="thumbnail-custom-favorite">
                                                <img src="<?php echo $value->ImagePath; ?>" />
                                            </div>
                                            <div class="overlay-grade-favorite">
                                                Grade <span><?php echo $value->TotalEvaluationResult ?></span>
                                            </div>
                                            <p class="overlay-lot-favorite">LOT <?php echo $value->Lot; ?></p>
                                        </div>
                                        <div class="boxright-mobile">
                                            <h2><?php echo $value->merk.' '.$value->seri.' '.$value->silinder.' '.$value->grade.' '.$value->model.' '.$value->transmisi ?></h2>
                                            <span><?php echo $value->tahun ?></span>
                                            <span class="price">Rp <?php echo $value->dataPrice; ?></span>
                                            <p><span>Jadwal</span> <span class="fa fa-calendar"></span><span><?php echo $value->datetime; ?></span></p>
                                            <p><span>Lokasi</span> <span class="fa fa-map-marker"></span><span><?php echo $value->Company; ?></span></p>
                                        </div>
                                    </a>
                                    <div class="action-wishlist-favorite">
                                        <button class='btn btn-green' onclick='set_compare_product(<?php echo $jsonCompare[$key]; ?>, "<?php echo site_url('list-compare'); ?>")'>
                                            <i class="fa fa-files-o"></i> Bandingkan
                                        </button>
                                        <a href="javascript:void(0)" class="delete-favorite" onclick="deleteFav(<?php echo $value->AuctionItemId; ?>, <?php echo $userdata['UserId']; ?>)">Hapus Favorit</a>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                }
                            }
                            else {
                            ?>
                            <div class="table-responsive table-container table-transaction content-empty">
                                <div class="product-empty">
                                    <img src="<?php echo base_url('assetsfront/images/icon/ic-transaction-empty.png'); ?>" alt="" title="">
                                </div>
                                <p>Oops.... <span>Data Favorite Tidak Ada.</span></p>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-grey related-product">
   <div class="container">
      <div class="row">
         <a href="javascript:void(0)" class="open-compare" id="addcompare" style="display:none">Add Compare <i class="fa fa-plus"></i></a>
      </div>
   </div>
</section>

<section class="compare">
   <div class="container-fluid">
      <div class="row">
         <div class="compare-content">
            <p><i class="fa fa-exclamation"></i> Pilih produk yang akan di bandingkan, minimal 2 produk untuk di compare</p>
            <div class="col-md-12" id="loadContent">
               <!-- Load Content Compare Product -->
            </div>
            <a href="javascript:;" class="close-compare">Tutup <i class="fa fa-times"></i></a>
         </div>
      </div>
   </div>
</section>

<script>
    //show compare element
    let linked = '<?php echo site_url('list-compare'); ?>';
    setCompare(linked);

    $(".open-compare").click(function() {
        $(".compare").show(500) && $(".open-compare").hide();
    });
    $(".close-compare").click(function() {
        $(".compare").hide(500) && $(".open-compare").show();
    });

    function deleteFav(aucid, id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo linkservice('stock')."favorite/Delete"; ?>',
            data: 'auctionid='+aucid+'&userid='+id,
            success: function(data) {
                var prevEle = ele.children[0];
                $(prevEle).replaceWith('<img src="<?php echo base_url('assetsfront/images/icon/ic_favorite.png'); ?>" class="empty-fav-icon" />');
                bootoast.toast({
                    message: 'Unit sudah dihapus dari daftar favorit kamu',
                    type: 'warning',
                    position: 'top-center',
                    timeout: 3
                });
            },
            error: function(e) {
                bootoast.toast({
                    message: e,
                    type: 'warning',
                    position: 'top-center',
                    timeout: 3
                });
            }
        });
    }
</script>
