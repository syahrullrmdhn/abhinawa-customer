<div class="container-fluid">
    <h2>Add New Customer</h2>
    <form action="<?= base_url('customer/store_customer'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="group_id" value="<?= $group_id; ?>">

        <!-- Customer Name Field -->
        <div class="mb-3">
            <label for="customer" class="form-label">Customer Name</label>
            <input type="text" class="form-control" name="customer" required>
        </div>

        <!-- Supplier Selection with kdsupplier -->
        <div class="mb-3">
            <label for="kdsupplier" class="form-label">Supplier</label>
            <select class="form-control" name="kdsupplier" required>
                <?php foreach ($suppliers as $supplier): ?>
                    <option value="<?= $supplier->kdsupplier; ?>"><?= $supplier->nama_supplier; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- CID Supplier Field -->
        <div class="mb-3">
            <label for="cid_supp" class="form-label">CID Supplier</label>
            <input type="text" class="form-control" name="cid_supp" required>
        </div>

        <!-- Service Type Selection -->
        <div class="mb-3">
            <label for="service_type_id" class="form-label">Service Type</label>
            <select class="form-control" name="service_type_id" required>
                <?php foreach ($service_types as $service_type): ?>
                    <option value="<?= $service_type->id; ?>"><?= $service_type->service_name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- File Upload for No SO -->
        <div class="mb-3">
            <label for="no_so" class="form-label">No SO (PDF)</label>
            <input type="file" class="form-control" name="no_so" accept="application/pdf" required>
        </div>

        <!-- File Upload for SDN -->
        <div class="mb-3">
            <label for="no_sdn" class="form-label">SDN (PDF)</label>
            <input type="file" class="form-control" name="no_sdn" accept="application/pdf" required>
        </div>

        <!-- File Upload for Topology -->
        <div class="mb-3">
            <label for="topology" class="form-label">Topology (PDF)</label>
            <input type="file" class="form-control" name="topology" accept="application/pdf">
        </div>

        <!-- Form Submit and Cancel Buttons -->
        <button type="submit" class="btn btn-primary">Add Customer</button>
        <a href="<?= base_url('customer/group_details/' . $group_id); ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
