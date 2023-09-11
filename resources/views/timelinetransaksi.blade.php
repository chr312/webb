<style>
* {
	margin: 0;
	padding: 0;
}

body {
	background-color: #1d2123;
	font-family: "Inter", sans-serif;
}

ul {
	list-style: none;
	margin: 0 !important;
}

a {
	text-decoration: none !important;
	display: inline-block;
}

img {
	max-width: 100%;
}

button:focus {
	outline: none;
}

h1,
h2,
h3,
h4,
h5,
h6 {
	color: ;
	margin: 0;
}
p {
	font-size: 14px;
	line-height: 26px;
	margin: 0;
}
.container {
	width: 100%;
	max-width: 1140px;
	padding: 0 15px;
	box-sizing: border-box;
	margin: 0 auto;
}
.timelines h2 {
	text-align: center;
	color: #fff;
	font-weight: 600;
	margin-bottom: 40px;
	font-size: 32px;
}
.d-flex-2 {
	display: flex;
	align-items: center;
}
.timeline-area {
	padding: 80px 0;
}
.all-timelines {
	position: relative;
}
.timelines h2 {
	text-align: center;
	color: #fff;
	font-weight: 600;
	margin-bottom: 40px;
}
.all-timelines::before {
	content: "";
	position: absolute;
	left: 0;
	right: 0;
	margin: auto;
	height: 100%;
	width: 2px;
	background: #efa22f;
	top: 20px;
}
.single-timeline {
	margin-bottom: 22px;
}
.timeline-blank {
	width: 50%;
}
.timeline-text {
	width: 50%;
	padding-left: 30px;
	-webkit-box-sizing: border-box;
	box-sizing: border-box;
	position: relative;
}
.timeline-text h6 {
	color: #141415;
	font-weight: 900;
	display: inline-block;
	font-size: 1rem;
}
.timeline-text span {
	
	display: block;
	width: 100%;
}
.single-timeline:nth-child(even) .timeline-text span {
	text-align: right;
}
.t-square {
	content: "";
	position: absolute;
	width: 12px;
	height: 12px;
	left: -6px;
	background: #efa22f;
}

.single-timeline:nth-child(even) {
	-webkit-box-orient: horizontal;
	-webkit-box-direction: reverse;
	-ms-flex-direction: row-reverse;
	flex-direction: row-reverse;
}
.single-timeline:nth-child(even) .t-square {
	right: -6px;
	left: unset;
}
.single-timeline:nth-child(even) .timeline-text {
	padding-left: 0;
	padding-right: 30px;
	text-align: right;
}

@media all and (max-width: 991px) {
}
@media all and (max-width: 768px) {
	.all-timelines::before {
		right: unset;
		top: 0;
	}
	.single-timeline:nth-child(2n) .timeline-text {
		padding-left: 30px;
		padding-right: 0;
		text-align: left;
	}
	.single-timeline:nth-child(2n) .t-square {
		left: -6px;
		right: unset;
	}
	.timeline-blank {
		display: none;
	}
	.timeline-text {
		width: 100%;
	}
	.single-timeline:nth-child(even) .timeline-text span {
		text-align: left !important;
	}
}
@media all and (max-width: 575px) {
}
@media all and (max-width: 360px) {
	.all-timelines::before {
		top: 32px;
	}
}

</style>
<div class="modal-body2">  
    @if ($data->status_id == 1)
        <div class="all-timelines">
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Terima</h6> 
						<label style="color: #4875b4">Pesanan Diterima di KlikIndogrosir</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
    @elseif ($data->status_id == 2)
        <div class="all-timelines">
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Terima</h6> 
						<label style="color: #808080">Pesanan Diterima di KlikIndogrosir</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Picking</h6> 
						<label style="color: #4875b4">Sedang Dikemas</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
    @elseif ($data->status_id == 3)
        <div class="all-timelines">
                <div class="all-timelines">
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Terima</h6> 
						<label>Pesanan Diterima di KlikIndogrosir</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Picking</h6> 
						<label>Sedang Dikemas</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
                <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Picking OK</h6> 
                            <label>Pengemasan Selesai</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
    @elseif ($data->status_id == 4)
        <div class="all-timelines">
                <div class="all-timelines">
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Terima</h6> 
						<label>Pesanan Diterima di KlikIndogrosir</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Picking</h6> 
						<label>Sedang Dikemas</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
                <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Picking OK</h6> 
                            <label>Pengemasan Selesai</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
                <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Konfirmasi</h6> 
                            <label>Menunggu Konfirmasi Pembayaran</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
    @elseif ($data->status_id == 5)
		<h6>No invoice: <b>{{ $data->invoice_id }}</b> &nbsp;</h6>
		<h6 class="mb-2">Tanggal Transaksi: <b>{{ $data->tgl_transaksi }}</b></h6>
		<div class="card border-primary">
        <div class="all-timelines">
                <div class="all-timelines">
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank color: #808080"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6 style="color: #808080">Terima</h6> 
						<label style="color: #808080">Pesanan Diterima di KlikIndogrosir</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6 style="color: #808080">Picking</h6> 
						<label style="color: #808080">Sedang Dikemas</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
                <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6 style="color: #808080">Picking OK</h6> 
                            <label style="color: #808080">Pengemasan Selesai</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
                <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6 style="color: #808080">Konfirmasi</h6> 
                            <label style="color: #808080">Menunggu Konfirmasi Pembayaran</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Konfirmasi OK</h6> 
						<label style="opacity: 92%">Pembayaran DIterima</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
		</div>
    @elseif ($data->status_id == 6)
        <div class="all-timelines">
                <div class="all-timelines">
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Terima</h6> 
						<label>Pesanan Diterima di KlikIndogrosir</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Picking</h6> 
						<label>Sedang Dikemas</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
                <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Picking OK</h6> 
                            <label>Pengemasan Selesai</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
                <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Konfirmasi</h6> 
                            <label>Menunggu Konfirmasi Pembayaran</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Konfirmasi OK</h6> 
						<label>Pembayaran DIterima</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
            <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Siap Kirim</h6> 
                            <label>Pesanan Siap Dikirim</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
    @elseif ($data->status_id == 7)
        <div class="all-timelines">
                <div class="all-timelines">
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Terima</h6> 
						<label>Pesanan Diterima di KlikIndogrosir</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Picking</h6> 
						<label>Sedang Dikemas</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
                <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Picking OK</h6> 
                            <label>Pengemasan Selesai</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
                <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Konfirmasi</h6> 
                            <label>Menunggu Konfirmasi Pembayaran</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Konfirmasi OK</h6> 
						<label>Pembayaran DIterima</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
            <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Siap Kirim</h6> 
                            <label>Pesanan Siap Dikirim</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
            <!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Dikirim</h6> 
						<label>Pesanan Dikirim</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
    @elseif ($data->status_id == 8)
        <div class="all-timelines">
                <div class="all-timelines">
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Terima</h6> 
						<label>Pesanan Diterima di KlikIndogrosir</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Picking</h6> 
						<label>Sedang Dikemas</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
                <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Picking OK</h6> 
                            <label>Pengemasan Selesai</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
                <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Konfirmasi</h6> 
                            <label>Menunggu Konfirmasi Pembayaran</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Konfirmasi OK</h6> 
						<label>Pembayaran DIterima</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
            <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Siap Kirim</h6> 
                            <label>Pesanan Siap Dikirim</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
            <!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Dikirim</h6> 
						<label>Pesanan Dikirim</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
            <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Selesai</h6> 
                            <label>Pesananan Diterima oleh Customer</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
    @elseif ($data->status_id == 9)
        <div class="all-timelines">
                <div class="all-timelines">
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Terima</h6> 
						<label>Pesanan Diterima di KlikIndogrosir</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Picking</h6> 
						<label>Sedang Dikemas</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
                <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Picking OK</h6> 
                            <label>Pengemasan Selesai</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
                <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Konfirmasi</h6> 
                            <label>Menunggu Konfirmasi Pembayaran</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Konfirmasi OK</h6> 
						<label>Pembayaran DIterima</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
            <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Siap Kirim</h6> 
                            <label>Pesanan Siap Dikirim</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
            <!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Dikirim</h6> 
						<label>Pesanan Dikirim</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
            <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Selesai</h6> 
                            <label>Pesananan Diterima oleh Customer</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
            <!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Batal</h6> 
						<label>Pesanan Dibatalkan</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
    @elseif ($data->status_id == 10)
        <div class="all-timelines">
                <div class="all-timelines">
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Terima</h6> 
						<label>Pesanan Diterima di KlikIndogrosir</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Picking</h6> 
						<label>Sedang Dikemas</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
                <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Picking OK</h6> 
                            <label>Pengemasan Selesai</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
                <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Konfirmasi</h6> 
                            <label>Menunggu Konfirmasi Pembayaran</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Konfirmasi OK</h6> 
						<label>Pembayaran DIterima</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
            <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Siap Kirim</h6> 
                            <label>Pesanan Siap Dikirim</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
            <!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Dikirim</h6> 
						<label>Pesanan Dikirim</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
            <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Selesai</h6> 
                            <label>Pesananan Diterima oleh Customer</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
            <!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Batal</h6> 
						<label>Pesanan Dibatalkan</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
            <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Proses Refund</h6> 
                            <label>Dalam Proses Pengembalian Dana</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
    @elseif ($data->status_id == 11)
        <div class="all-timelines">
                <div class="all-timelines">
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Terima</h6> 
						<label>Pesanan Diterima di KlikIndogrosir</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Picking</h6> 
						<label>Sedang Dikemas</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
                <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Picking OK</h6> 
                            <label>Pengemasan Selesai</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
                <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Konfirmasi</h6> 
                            <label>Menunggu Konfirmasi Pembayaran</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
			<!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Konfirmasi OK</h6> 
						<label>Pembayaran DIterima</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
            <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Siap Kirim</h6> 
                            <label>Pesanan Siap Dikirim</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
            <!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Dikirim</h6> 
						<label>Pesanan Dikirim</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
            <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Selesai</h6> 
                            <label>Pesananan Diterima oleh Customer</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
            <!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Batal</h6> 
						<label>Pesanan Dibatalkan</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
            <!--SINGLE TIMELINE-->
                <div class="single-timeline d-flex-2">
                    <div class="timeline-blank"></div>
                    <div class="timeline-text d-flex-2">
                        <span>
                            <h6>Proses Refund</h6> 
                            <label>Dalam Proses Pengembalian Dana</label> 
                        </span>
                        <div class="t-square"></div>
                    </div>
                </div>
            <!--SINGLE TIMELINE-->
			<div class="single-timeline d-flex-2">
				<div class="timeline-blank"></div>
				<div class="timeline-text d-flex-2">
					<span>
						<h6>Refund Selesai</h6> 
						<label>Pengembalian Dana Selesai</label> 
					</span>
					<div class="t-square"></div>
				</div>
			</div>
    @endif
</div>

