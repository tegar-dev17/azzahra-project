<?php include '../pages/headeradmin.php' ?>
<?php include '../koneksi.php' ?>
<!-- Form Input Data -->
<form method="post" action="crud.php">
    <input type="hidden" name="nik" value="<?php echo isset($edit_row) ? $edit_row['nik'] : ''; ?>">
    <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo isset($edit_row) ? $edit_row['nama'] : ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="day">Hari:</label>
        <select class="form-control" id="day" name="day" required>
            <option value="Senin" <?php echo isset($edit_row) && $edit_row['day'] == 'Senin' ? 'selected' : ''; ?>>Senin</option>
            <option value="Selasa" <?php echo isset($edit_row) && $edit_row['day'] == 'Selasa' ? 'selected' : ''; ?>>Selasa</option>
            <option value="Rabu" <?php echo isset($edit_row) && $edit_row['day'] == 'Rabu' ? 'selected' : ''; ?>>Rabu</option>
            <option value="Kamis" <?php echo isset($edit_row) && $edit_row['day'] == 'Kamis' ? 'selected' : ''; ?>>Kamis</option>
            <option value="Jumat" <?php echo isset($edit_row) && $edit_row['day'] == 'Jumat' ? 'selected' : ''; ?>>Jumat</option>
            <option value="Sabtu" <?php echo isset($edit_row) && $edit_row['day'] == 'Sabtu' ? 'selected' : ''; ?>>Sabtu</option>
            <option value="Minggu" <?php echo isset($edit_row) && $edit_row['day'] == 'Minggu' ? 'selected' : ''; ?>>Minggu</option>
        </select>
    </div>
    <div class="form-group">
        <label for="start_time">Waktu Mulai:</label>
        <input type="time" class="form-control" id="start_time" name="start_time" value="<?php echo isset($edit_row) ? $edit_row['start_time'] : ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="end_time">Waktu Selesai:</label>
        <input type="time" class="form-control" id="end_time" name="end_time" value="<?php echo isset($edit_row) ? $edit_row['end_time'] : ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="status">Status:</label>
        <input type="text" class="form-control" id="status" name="status" value="<?php echo isset($edit_row) ? $edit_row['status'] : ''; ?>" required>
    </div>
    <button type="submit" name="<?php echo isset($edit_row) ? 'update' : 'create'; ?>" class="btn btn-primary">
        <?php echo isset($edit_row) ? 'Update' : 'Create'; ?>
    </button>
</form>