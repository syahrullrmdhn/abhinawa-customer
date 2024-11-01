<div class="container-fluid">
    <div class="card">
        <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
        
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Dashboard</h5>
            <!-- Personalized Welcome Message -->
            <p class="mb-0">
                Hi, <strong><?= $this->session->userdata('username'); ?></strong>! Welcome to Abhinawa Customer Database System.
            </p>
        </div>
    </div>
</div>
