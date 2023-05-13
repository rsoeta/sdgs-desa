<!-- Modal -->
<div class="modal fade" id="modalTambahAkun" tabindex="-1" role="dialog" aria-labelledby="modalTambahAkunLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahAkunLabel">Form. Tambah Akun</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('akun/simpandata', ['class' => 'formsimpan']); ?>
            <input type="hidden" name="aksi" id="aksi" value="<?= $aksi; ?>">
            <div class="modal-body">
                <div class="form-group row mb-1">
                    <label for="" class="col-4 col-sm-2">Jenis Akun</label>
                    <div class="col-8 col-sm-10">
                        <input type="text" name="jenis_akun" id="jenis_akun" class="form-control form-control-sm" required>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="" class="col-4 col-sm-2">Kategori</label>
                    <div class="col-8 col-sm-10">
                        <select name="" id="" class="form-control form-control-sm" required>
                            <option value="">-Pilih-</option>
                            <?php foreach ($kategori as $row) { ?>
                                <option value="<?= $row['id_kat']; ?>"><?= $row['nm_kat']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="" class="col-4 col-sm-2">Status</label>
                    <div class="col-8 col-sm-10">
                        <select type="text" name="status_akun" id="status_akun" class="form-control form-control-sm" required>
                            <option value="">-Pilih-</option>
                            <option value="0">Non-Aktif</option>
                            <option value="1">Aktif</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block tombolSave">Save</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.formsimpan').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function(e) {
                    $('.tombolSave').prop('disabled', true);
                    $('.tombolSave').html('<i class="fa fa-spin fa-spinner"></i>')
                },
                success: function(response) {
                    let aksi = $('#aksi').val();

                    if (response.sukses) {
                        if (aksi == 0) {

                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 5000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'success',
                                title: response.sukses,
                            });
                            window.location.reload();

                        } else {
                            $('#modalTambahAkun').modal('hide');
                            tampilAkun();
                        }
                    }
                },
                error: function(xhr, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        })
    });
</script>