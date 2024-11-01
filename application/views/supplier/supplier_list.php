<div class="container-fluid">
  <h2>Supplier List</h2>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= $this->session->flashdata('success'); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <a href="<?= base_url('supplier/create'); ?>" class="btn btn-primary mb-3">Add New Supplier</a>

                    <table class="table table-hover align-middle text-center">
                        <thead class="bg-primary text-white">
      <tr>
        <th>Supplier Code</th>
        <th>Name</th>
        <th>Contact ID</th>
        <th>Start Service</th>
        <th>End Service</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($suppliers as $supplier): ?>
        <tr>
          <td><?= $supplier->kdsupplier; ?></td>
          <td><?= $supplier->nama_supplier; ?></td>
          <td><?= $supplier->cidsupplier; ?></td>
          <td><?= $supplier->start_service; ?></td>
          <td><?= $supplier->end_service; ?></td>
          <td>
            <a href="<?= base_url('supplier/edit/' . $supplier->kdsupplier); ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="<?= base_url('supplier/delete/' . $supplier->kdsupplier); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this supplier?');">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
