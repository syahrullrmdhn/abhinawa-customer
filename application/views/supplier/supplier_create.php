<div class="container-fluid">
  <h2>Add New Supplier</h2>

  <form action="<?= base_url('supplier/store'); ?>" method="post">
    <div class="mb-3">
      <label for="kdsupplier" class="form-label">Supplier Code</label>
      <input type="number" class="form-control" name="kdsupplier" required>
    </div>
    <div class="mb-3">
      <label for="nama_supplier" class="form-label">Supplier Name</label>
      <input type="text" class="form-control" name="nama_supplier" required>
    </div>
    <div class="mb-3">
      <label for="cidsupplier" class="form-label">CID Supplier</label>
      <input type="text" class="form-control" name="cidsupplier" required>
    </div>
    <div class="mb-3">
      <label for="start_service" class="form-label">Start Service</label>
      <input type="date" class="form-control" name="start_service" required>
    </div>
    <div class="mb-3">
      <label for="end_service" class="form-label">End Service</label>
      <input type="date" class="form-control" name="end_service">
    </div>
    <button type="submit" class="btn btn-primary">Add Supplier</button>
    <a href="<?= base_url('supplier'); ?>" class="btn btn-secondary">Cancel</a>
  </form>
</div>
