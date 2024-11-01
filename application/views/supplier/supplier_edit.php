<div class="container-fluid">
  <h2>Edit Supplier</h2>

  <form action="<?= base_url('supplier/update/' . $supplier->id); ?>" method="post">
    <div class="mb-3">
      <label for="kdsupplier" class="form-label">Supplier Code</label>
      <input type="number" class="form-control" name="kdsupplier" value="<?= $supplier->kdsupplier; ?>" required>
    </div>
    <div class="mb-3">
      <label for="nama_supplier" class="form-label">Supplier Name</label>
      <input type="text" class="form-control" name="nama_supplier" value="<?= $supplier->nama_supplier; ?>" required>
    </div>
    <div class="mb-3">
      <label for="cidsupplier" class="form-label">Contact ID</label>
      <input type="text" class="form-control" name="cidsupplier" value="<?= $supplier->cidsupplier; ?>" required>
    </div>
    <div class="mb-3">
      <label for="start_service" class="form-label">Start Service</label>
      <input type="date" class="form-control" name="start_service" value="<?= $supplier->start_service; ?>" required>
    </div>
    <div class="mb-3">
      <label for="end_service" class="form-label">End Service</label>
      <input type="date" class="form-control" name="end_service" value="<?= $supplier->end_service; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update Supplier</button>
    <a href="<?= base_url('supplier'); ?>" class="btn btn-secondary">Cancel</a>
  </form>
</div>
