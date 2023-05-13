<!-- Modal -->
<div class="modal fade" id="modalview" tabindex="-1" aria-labelledby="modalviewLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalviewLabel"><?= $modTtl; ?></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('user/updatedata', ['class' => 'formupdate']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row mb-1" style="display: none;">
                    <label class="col-4 col-sm-4 col-form-label" for="id">ID</label>
                    <div class="col-8 col-sm-8">
                        <input type="text" name="id" id="id" class="form-control form-control-sm" value="<?= $id; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label class="col-4 col-sm-4 col-form-label" for="nik">No. KTP</label>
                    <div class="col-8 col-sm-8">
                        <input type="text" name="nik" id="nik" class="form-control form-control-sm" value="<?= $nik; ?>">
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label class="col-4 col-sm-4 col-form-label" for="firstname">Nama Depan</label>
                    <div class="col-8 col-sm-8">
                        <input type="text" name="firstname" id="firstname" class="form-control form-control-sm" value="<?= $firstname; ?>">
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label class="col-4 col-sm-4 col-form-label" for="lastname">Nama Belakang</label>
                    <div class="col-8 col-sm-8">
                        <input type="text" name="lastname" id="lastname" class="form-control form-control-sm" value="<?= $lastname; ?>">
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label class="col-4 col-sm-4 col-form-label" for="email">Email</label>
                    <div class="col-8 col-sm-8">
                        <input type="email" name="email" id="email" class="form-control form-control-sm" value="<?= $email; ?>">
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="role" class="col-4 col-sm-4">Role</label>
                    <div class="col-8 col-sm-8">
                        <select type="number" name="role" id="role" class="form-control form-control-sm" required>
                            <?php foreach ($roles as $row) : ?>
                                <option <?php if ($row['id_role'] == $role) echo 'selected="selected"'; ?> value="<?= $row['id_role']; ?>"><?= $row['nm_role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label class="col-4 col-sm-4 col-form-label" for="status">Status</label>
                    <div class="col-8 col-sm-8">
                        <select name="status" id="status" class="form-control form-control-sm">
                            <option value="0" <?php if ($status == 0) echo "selected"; ?>>Non-Aktif</option>
                            <option value="1" <?php if ($status == 1) echo "selected"; ?>>Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block tombolSave">Update</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.formupdate').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $('.tombolSave').prop('disable', 'disabled');
                        $('.tombolSave').html('<i class="fa fa-spin fa-spinner"></i>')
                    },
                    complete: function() {
                        $('.tombolsave').removeAttr('disable');
                        $('.tombolsave').html('Update');
                    },
                    success: function(response) {
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
                    },
                    error: function(xhr, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
                return false;
            });
        });
    </script>

</div>