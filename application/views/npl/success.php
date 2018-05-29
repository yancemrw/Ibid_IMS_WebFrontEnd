<section class="section section-success">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="box-success verification-success">
                    <h2>Pembayaran <br>via Loket</h2>
                    <p>Terima kasih</p>
                    <span>Silahkan datang ke Loket IBID dan tunjukan barcode ini untuk melakukan pembayaran NPL</span>
                    <img src="http:<?php echo $_SESSION['userdata']['thisBarcodeTransaction']; ?>" alt="<?php echo $_SESSION['userdata']['thisBarcodeTransaction']; ?>" title="barcode">
                    <button class="btn btn-green" onclick="location.href='<?php echo site_url('beli-npl'); ?>'">OK</button>
                    <p class="resend">Tidak menerima email ? <a href="javascript:void(0);">Kirim ulang</a></p>
                </div>         
            </div>
        </div>
    </div>
</section>