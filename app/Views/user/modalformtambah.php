<!-- Modal -->
<div class="modal fade" id="modalTambahUser" tabindex="-1" role="dialog" aria-labelledby="modalTambahUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahUserLabel">Form. Tambah Akun</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('user/simpandata', ['class' => 'formsimpan']); ?>
            <input type="hidden" name="aksi" id="aksi" value="<?= $aksi; ?>">
            <div class="modal-body">
                <div class="form-group row mb-1">
                    <label for="firstname" class="col-4 col-sm-4">Nama Depan</label>
                    <div class="col-8 col-sm-8">
                        <input type="text" name="firstname" id="firstname" class="form-control form-control-sm" required>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="lastname" class="col-4 col-sm-4">Nama Belakang</label>
                    <div class="col-8 col-sm-8">
                        <input type="text" name="lastname" id="lastname" class="form-control form-control-sm" required>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="nik" class="col-4 col-sm-4">No. KTP</label>
                    <div class="col-8 col-sm-8">
                        <input type="text" name="nik" id="nik" class="form-control form-control-sm" required>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="desa_id" class="col-4 col-sm-4">Desa</label>
                    <div class="col-8 col-sm-8">
                        <select name="desa_id" id="desa_id" class="form-control form-control-sm" required>
                            <?php foreach ($desKels as $row) { ?>
                                <option value="<?= $row['KodeDesa']; ?>"><?= $row['NamaDesa']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="email" class="col-4 col-sm-4">Email</label>
                    <div class="col-8 col-sm-8">
                        <input type="email" name="email" id="email" class="form-control form-control-sm" required>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="password" class="col-4 col-sm-4">Password</label>
                    <div class="col-8 col-sm-8">
                        <input type="password" name="password" id="password" class="form-control form-control-sm" required>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="role" class="col-4 col-sm-4">Role</label>
                    <div class="col-8 col-sm-8">
                        <select type="text" name="role" id="role" class="form-control form-control-sm" required>
                            <option value="">-pilih-</option>
                            <?php foreach ($roles as $row) { ?>
                                <option value="<?= $row['id_role']; ?>"><?= $row['nm_role']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="status" class="col-4 col-sm-4">Status</label>
                    <div class="col-8 col-sm-8">
                        <select type="text" name="status" id="status" class="form-control form-control-sm" required>
                            <option value="">Non-Aktif</option>
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
                            $('#modalTambahUser').modal('hide');
                            // tampilUser();
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