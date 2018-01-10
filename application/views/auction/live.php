<section class="choose-schedule-auction">
	<div class="container">
		<div class="row header-live-auction">
			<div class="col-md-6 col-sm-6">
				<h2>Live Auction</h2>
				<p>Pilih Jadwal Lelang Yang Ingin Anda Ikuti Maksimal 4</p>
			</div>
			<div class="col-md-6  col-sm-6 text-right">
				<select class="form-control select-custom">
					<option>MOBIL</option>
					<option>MOTOR</option>
					<option>GADGET</option>
					<option>HVE</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 clearfix">
				<form class="form-inline form-auction">
					<div class="form-group">
						<input type="checkbox" name="object-lelang" id="obj-1" class="input-hidden" checked />
						<label for="obj-1">
							<span class="kota"> Jakarta <span>Motor</span></span>
							<p>Pool IBID Jl. Bintaro Mulia I / 3 (Jl. RC Veteran) Bintaro Pesanggrahan, Jakarta Selatan
								<span>25 Oktober 2017</span>
							</p>
						</label>
					</div>
					<div class="form-group">
						<input type="checkbox" name="object-lelang" id="obj-2" class="input-hidden" checked />
						<label for="obj-2">
							<span class="kota"> Jakarta <span>Motor</span></span>
							<p>Pool IBID Jl. Bintaro Mulia I / 3 (Jl. RC Veteran) Bintaro Pesanggrahan, Jakarta Selatan
								<span>25 Oktober 2017</span>
							</p>
						</label>
					</div>
					<div class="form-group">
						<input type="checkbox" name="object-lelang" id="obj-3" class="input-hidden" checked />
						<label for="obj-3">
							<span class="kota"> Jakarta <span>Motor</span></span>
							<p>Pool IBID Jl. Bintaro Mulia I / 3 (Jl. RC Veteran) Bintaro Pesanggrahan, Jakarta Selatan
								<span>25 Oktober 2017</span>
							</p>
						</label>
					</div>
                        <div class="form-group">
                           <input type="checkbox" name="object-lelang" id="obj-4" class="input-hidden" checked />
                           <label for="obj-4" class="mr-0">
                              <span class="kota"> Jakarta <span>Motor</span></span>
                              <p>Pool IBID Jl. Bintaro Mulia I / 3 (Jl. RC Veteran) Bintaro Pesanggrahan, Jakarta Selatan
                                 <span>25 Oktober 2017</span>
                              </p>
                           </label>
                        </div>
                        <div class="form-group">
                           <input type="checkbox" name="object-lelang" id="obj-5" class="input-hidden" />
                           <label for="obj-5">
                              <span class="kota"> Jakarta <span>Motor</span></span>
                              <p>Pool IBID Jl. Bintaro Mulia I / 3 (Jl. RC Veteran) Bintaro Pesanggrahan, Jakarta Selatan
                                 <span>25 Oktober 2017</span>
                              </p>
                           </label>
                        </div>
                        <div class="form-group">
                           <input type="checkbox" name="object-lelang" id="obj-6" class="input-hidden" />
                           <label for="obj-6">
                              <span class="kota"> Jakarta <span>Motor</span></span>
                              <p>Pool IBID Jl. Bintaro Mulia I / 3 (Jl. RC Veteran) Bintaro Pesanggrahan, Jakarta Selatan
                                 <span>25 Oktober 2017</span>
                              </p>
                           </label>
                        </div>
                        <div class="form-group">
                           <input type="checkbox" name="object-lelang" id="obj-7" class="input-hidden" />
                           <label for="obj-7">
                              <span class="kota"> Jakarta <span>Motor</span></span>
                              <p>Pool IBID Jl. Bintaro Mulia I / 3 (Jl. RC Veteran) Bintaro Pesanggrahan, Jakarta Selatan
                                 <span>25 Oktober 2017</span>
                              </p>
                           </label>
                        </div>
                        <div class="form-group">
                           <input type="checkbox" name="object-lelang" id="obj-8" class="input-hidden" />
                           <label for="obj-8" class="mr-0">
                              <span class="kota"> Jakarta <span>Motor</span></span>
                              <p>Pool IBID Jl. Bintaro Mulia I / 3 (Jl. RC Veteran) Bintaro Pesanggrahan, Jakarta Selatan
                                 <span>25 Oktober 2017</span>
                              </p>
                           </label>
                        </div>
                        <div class="form-group">
                           <input type="checkbox" name="object-lelang" id="obj-9" class="input-hidden" />
                           <label for="obj-9">
                              <span class="kota"> Jakarta <span>Motor</span></span>
                              <p>Pool IBID Jl. Bintaro Mulia I / 3 (Jl. RC Veteran) Bintaro Pesanggrahan, Jakarta Selatan
                                 <span>25 Oktober 2017</span>
                              </p>
                           </label>
                        </div>
                        <div class="form-group">
                           <input type="checkbox" name="object-lelang" id="obj-10" class="input-hidden" />
                           <label for="obj-10">
                              <span class="kota"> Jakarta <span>Motor</span></span>
                              <p>Pool IBID Jl. Bintaro Mulia I / 3 (Jl. RC Veteran) Bintaro Pesanggrahan, Jakarta Selatan
                                 <span>25 Oktober 2017</span>
                              </p>
                           </label>
                        </div>
				</form>
			</div>
			<div class="col-md-12 text-center more-button">
				<button class="btn btn-green" onclick="location.href='live-auction.html'" type="button">Selanjutnya</button>
			</div>
		</div>
	</div>
</section>

<script>
function preload(opacity) {
	if(opacity <= 0) {
		showContentAuction();
	}
	else {
		document.getElementById('preloaderAuction').style.opacity = opacity;
		window.setTimeout(function() { preload(opacity - 10) }, 6500);
	}
}

function showContentAuction() {
	document.getElementById('preloaderAuction').style.display = 'none';
	document.getElementById('content').style.visibility = 'visible';
}

document.addEventListener("DOMContentLoaded", function() {
	document.getElementById('preloaderAuction').style.display = 'block';
	preload(1);
});
$(document).ready(function() {
	$("nav").sticky({
		topSpacing: 0
	});

	$(".select-custom").select2({
		minimumResultsForSearch: -1
	});
});
</script>