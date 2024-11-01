<div class="container-fluid">
    <h2>Global Search</h2>
    <form method="get" action="<?= base_url('search'); ?>" class="mb-4">
        <div class="input-group">
            <input type="text" name="user" value="<?= isset($user) ? $user : ''; ?>" class="form-control" placeholder="Search by CID Supplier, Customer Name, Group Name, etc.">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>
</div>
