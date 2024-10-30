<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h2>Data Pemenang Lelang</h2>
            
            <?php foreach ($grouped_posts as $nama_barang => $bids) { ?>
                <h4 class="mt-4"><?= htmlspecialchars($nama_barang); ?></h4> <!-- Display the item name -->
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-<?= strtolower(str_replace(' ', '-', $nama_barang)); ?>" class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Nama Pelaku Bid</th>
                                        <th>No Telepon</th>
                                        <th>Jumlah Bid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($bids as $bid) { ?>
                                        <tr>
                                            <td><?= htmlspecialchars($bid['nama_lengkap']); ?></td>
                                            <td><?= htmlspecialchars($bid['telp']); ?></td>
                                            <td><?= number_format($bid['bid_amount'], 2); ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br> <!-- Add space between tables -->
            <?php } ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Initialize DataTables for each item table
        <?php foreach ($grouped_posts as $nama_barang => $bids) { ?>
            $('#datatable-<?= strtolower(str_replace(' ', '-', $nama_barang)); ?>').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'print'
                ],
                order: [[2, 'asc']], // Sort by the "Jumlah Bid" column (index 2) in ascending order
                columnDefs: [
                    { orderDataType: 'dom-text', targets: 2 } // Use custom sorting for number formatting
                ],
                language: {
                    search: "Search:",
                    lengthMenu: "Display _MENU_ records per page",
                    info: "Showing page _PAGE_ of _PAGES_",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    }
                }
            });
        <?php } ?>
    });
</script>
