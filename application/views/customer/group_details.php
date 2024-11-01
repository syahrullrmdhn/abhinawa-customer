<div class="container-fluid">
    <h2 class="mb-4 text-center">Customers in Group</h2>
    <a href="<?= base_url('customer/add_customer/' . $group_id); ?>" class="btn btn-success mb-3">Add New Customer</a>

    <?php if (!empty($customers)): ?>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Customer</th>
                                <th>Supplier</th>
                                <th>CID Supplier</th>
                                <th>Service Type</th>
                                <th>No SO</th>
                                <th>SDN</th>
                            </tr>
                        </thead>
                        <tbody class="bg-light">
                            <?php foreach ($customers as $customer): ?>
                                <tr>
                                    <td><?= $customer->customer; ?></td>
                                    <td><?= $customer->nama_supplier; ?></td>
                                    <td><?= $customer->cid_supp; ?></td>
                                    <td><?= $customer->service_type_name; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#fileModal" onclick="loadFile('<?= base_url('uploads/' . $customer->no_so); ?>', 'Sales Order (SO)')">
                                            View SO
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#fileModal" onclick="loadFile('<?= base_url('uploads/' . $customer->no_sdn); ?>', 'Service Delivery Note (SDN)')">
                                            View SDN
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php else: ?>
        <p class="text-muted">No customers found in this group.</p>
    <?php endif; ?>
</div>

<!-- Modal for Viewing Files -->
<div class="modal fade" id="fileModal" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileModalLabel">Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe id="fileViewer" src="" width="100%" height="500px" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to Load File into Modal -->
<script>
    function loadFile(fileUrl, title) {
        document.getElementById('fileViewer').src = fileUrl;
        document.getElementById('fileModalLabel').textContent = title;
    }

    // Clear iframe source on modal close for performance
    document.getElementById('fileModal').addEventListener('hidden.bs.modal', function () {
        document.getElementById('fileViewer').src = '';
    });
</script>
