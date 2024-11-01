<div class="container-fluid">
    <h2>Search Results</h2>

    <?php if (empty($results)): ?>
        <p>No results found.</p>
    <?php else: ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Group Name</th>
                    <th>Customer</th>
                    <th>Supplier CID</th>
                    <th>Supplier Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $result): ?>
                    <tr>
                        <td><?= $result->group_name; ?></td>
                        <td><?= $result->customer; ?></td>
                        <td><?= $result->cidsupplier; ?></td>
                        <td><?= $result->nama_supplier; ?></td>
                        <td>
                            <?php if (!empty($result->group_id)): ?>
                                <!-- Button menuju group_details jika ada group_id -->
                                <a href="<?= base_url('group_details/' . $result->group_id); ?>" class="btn btn-info btn-sm">Group Detail</a>
                            <?php endif; ?>

                            <?php if (!empty($result->kdsupplier)): ?>
                                <!-- Button menuju supplier list jika ada kdsupplier -->
                                <a href="<?= base_url('supplier/view_suppliers'); ?>" class="btn btn-info btn-sm">Supplier List</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
