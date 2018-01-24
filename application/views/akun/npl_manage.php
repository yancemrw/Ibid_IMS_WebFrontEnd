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
                        	<a href="<?php echo site_url('notification'); ?>">
                            <span class="ic_menu"><i ></i></span> Notifikasi <span>10</span></a>
                        </li>
                        <li class="acc_transaction">
                        	<a href="<?php echo site_url('transaction'); ?>">
                        	<span class="ic_menu"><i ></i></span> Transaksi</a>
                        </li>
                        <li class="acc_npl active">
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
                        <li class="acc_price">
                        	<a href="<?php echo site_url('basic_price'); ?>">
                        	<span class="ic_menu"><i ></i></span> Harga Dasar</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 am-right">
                <div class="main-management">
                    <h2>NPL Management</h2>
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
                                    <th>No NPL</th>
                                    <th>Objk Lelang</th>
                                    <th>Jenis NPL</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php for($i=0; $i < 7; $i++) { ?>
                                <tr>
                                    <td><?php $i; ?></td>
                                    <td>#001</td>
                                    <td>Mobile</td>
                                    <td>Unlimited</td>
                                    <td>Jakarta, 26/09/2017</td>
                                    <td class="status">Sudah Digunakan</td>
                                    <td><a href="" class="action-npl"><img src="<?php echo base_url('assetsfront/images/icon/ic_action_npl.png'); ?>" alt=""></a></td>
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