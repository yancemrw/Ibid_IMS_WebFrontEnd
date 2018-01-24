<section>
    <div class="container-fluid">
        <div class="row position-repative">
            <div class="col-md-3 col-sm-3 sidemenu-left acc-menu">
                <div class="menu-account">
                    <div class="avatar-account">
                        <div class="photo-account">
                            <img src="<?php echo $img_link; ?>" alt="" title="avatar">
                        </div>
                        <h3><?php echo @$userdata['namefront']; ?></h3>
                    </div>
                    <ul>
                        <li class="acc_notif">
                        	<a href="<?php echo site_url('notification'); ?>">
                            <span class="ic_menu"><i ></i></span> Notifikasi <span>10</span></a>
                        </li>
                        <li class="acc_transaction">
                        	<a href="<?php echo site_url('transaction'); ?>">
                        	<span class="ic_menu"><i ></i></span> Transaksi</a>
                        </li>
                        <li class="acc_npl">
                        	<a href="<?php echo site_url('npl_dashboard'); ?>">
                        	<span class="ic_menu"><i ></i></span> NPL Management</a>
                        </li>
                        <li class="acc_setting">
                        	<a href="<?php echo site_url('dashboard'); ?>">
                        	<span class="ic_menu"><i ></i></span> Pengaturan</a>
                        </li>
                        <li class="acc_favorite">
                        	<a href="<?php echo site_url('favorite'); ?>">
                        	<span class="ic_menu"><i ></i></span> Favorit</a>
                        </li>
                        <li class="acc_price active">
                        	<a href="<?php echo site_url('basic_price'); ?>">
                        	<span class="ic_menu"><i ></i></span> Harga Dasar</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 main-right">
                <div class="main-management">
                    <h2>Harga Dasar</h2>
                    <div class="filter-table">
                        <form class="form-inline">
                            <div class="form-group">
                                <input type="text" name="" class="form-control input-custom" placeholder="Search">
                                <i class="fa fa-search"></i>
                            </div>
                            <div class="filter-right">
                                <div class="form-group">
                                    <select class="form-control select-custom">
                                        <option>Filter by jadwal</option>
                                        <option>jakarta timur</option>
                                        <option>jakarta timur</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control select-custom">
                                        <option>Jenis lelang</option>
                                        <option>Hybrid</option>
                                        <option>Hybrid</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Show</label>
                                    <select class="form-control select-custom">
                                        <option>10</option>
                                        <option>15</option>
                                        <option>20</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive table-container">
                        <table class="table table-striped table-custom">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Polisi / Serial Number</th>
                                    <th>Nama Barang</th>
                                    <th>Jenis</th>
                                    <th>Jadwal</th>
                                    <th>Harga Dasar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php for($i = 1; $i <= 6; $i++) { ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>B1158PHD</td>
                                    <td>DAIHATSU LUXIO 1.5 X MINIBUS AT 2014</td>
                                    <td>Mobil</td>
                                    <td>Jakarta Barat, 28/12/2017</td>
                                    <td>Rp. 339,000,000</td>
                                    <td><a href="" class="edit-price"><i class="fa fa-pencil"></i></a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 text-center">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link arrow-page" href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">20</a></li>
                            <li class="page-item"><a class="page-link arrow-page" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>