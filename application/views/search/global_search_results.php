<div class="container-fluid">
    <?php if (!empty($user)): ?>
        <h2>Search Results for "<?= $user; ?>"</h2>
    <?php endif; ?>

    <?php if (empty($user)): ?>
        <!-- Message when no search has been conducted -->
        <div class="alert alert-info mt-3" role="alert">
            Your search results will appear here.
        </div>
    <?php elseif (!empty($results)): ?>
        <!-- Display results if available -->
        <table class="table table-striped table-bordered table-hover mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Group Name</th>
                    <th>Customer</th>
                    <th>CID Supplier</th>
                    <th>Supplier Name</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $result): ?>
                    <tr>
                        <td><?= html_escape($result->group_name); ?></td>
                        <td><?= html_escape($result->customer); ?></td>
                        <td><?= html_escape($result->cidsupplier); ?></td>
                        <td><?= html_escape($result->nama_supplier); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <!-- Message when no results are found for the search -->
        <div class="alert alert-warning mt-3" role="alert">
            No results found for "<?= $user; ?>".
        </div>
    <?php endif; ?>
</div>
