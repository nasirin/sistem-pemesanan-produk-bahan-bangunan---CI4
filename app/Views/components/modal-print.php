<div class="modal fade" id="cetakSO">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">LAPORAN PENGIRIMAN PER PERIODE</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/laporan/kirim" method="get" target="_blank">
                    <?= csrf_field(); ?>
                    <div class="row justify-content-between">
                        <!-- line 1 -->
                        <div class="col-lg-5">
                            <div class="form-group row">
                                <input type="date" name="start" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group row">
                                <input type="date" name="start" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <select name="" id="" class="form-control select2">
                            <option value="">--- Pilih ---</option>
                            <option value="">Terkirim</option>
                            <option value="">Terproses</option>
                            <option value="">Batal</option>
                        </select>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Print</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cetakPembayaran">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">LAPORAN PEMBAYARAN PER PERIODE</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/laporan/bayar" method="get" target="_blank">
                    <?= csrf_field(); ?>
                    <div class="row justify-content-between">
                        <!-- line 1 -->
                        <div class="col-lg-5">
                            <div class="form-group row">
                                <input type="date" name="start" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group row">
                                <input type="date" name="start" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <select name="" id="" class="form-control select2">
                            <option value="">--- Pilih ---</option>
                            <option value="">Terkirim</option>
                            <option value="">Terproses</option>
                            <option value="">Batal</option>
                        </select>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Print</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>