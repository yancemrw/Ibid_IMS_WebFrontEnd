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
                            <span class="ic_menu"><i ></i></span> Notifikasi<!--span>10</span--></a>
                        </li>
                        <li class="acc_transaction">
                        	<a href="<?php echo site_url('transaction'); ?>">
                        	<span class="ic_menu"><i ></i></span> Transaksi</a>
                        </li>
                        <li class="acc_npl active">
                        	<a href="<?php echo site_url('npl_dashboard'); ?>">
                        	<span class="ic_menu"><i ></i></span> Manajemen NPL</a>
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
                        	<a href="<?php echo site_url('basic-price'); ?>">
                        	<span class="ic_menu"><i ></i></span> Harga Dasar</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 am-right">
                <div class="main-management">
                    <h2>Manajemen NPL</h2>
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
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control select-custom">
                                        <option>Jenis lelang</option>
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
									<th>NPLNumber</th>
									<th>Obj Lelang</th>
									<th>Jenis NPL</th>
									<th>Tanggal</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($listNpl as $row){ ?>
								<tr>
									<td><?php echo $row->NPLId; ?></td>
									<td><?php echo $row->NPLNumber; ?></td>
									<td><?php echo @$detailItem[$row->ItemId]['ItemName']; ?></td>
									<td><?php echo $row->NPLType; ?></td>
									<td><?php if ($row->ScheduleId > 0){
											echo @$schedule[$row->ScheduleId]['CompanyName'];
											echo '<br>';
											echo date('d F Y',strtotime(@$schedule[$row->ScheduleId]['date'])).', '.@$schedule[$row->ScheduleId]['waktu'];
										}
										// echo $row->ScheduleId; 
									?></td>
									<td><?php echo $row->IsUsed; ?></td>
									<td><?php echo $row->NPLId; ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<?php // print_r(@$listNpl); ?>
                    </div>
					<!-- div class="table-responsive table-container table-transaction content-empty">
						<div class="product-empty">
                            <img src="<?php echo base_url('assetsfront/images/icon/ic-transaction-empty.png'); ?>" alt="" title="">
                        </div>
                        <p>Oops.... <span>Data Belum Tersedia.</span></p>
                    </div -->
                </div>
            </div>
        </div>
    </div>
</section>