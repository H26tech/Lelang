<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <h2>Data Pemenang Lelang</h2>
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search..." fdprocessedid="osv459">
                    <span class="fa fa-search"></span>
                </div>
            </form>

            <div class="card mt-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-pemenang" class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Pemenang</th>
                                    <th>No Telepon</th>
                                    <th>Jumlah Bid Tertinggi</th>
                                    <th>Total Peserta Bid</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($winners as $winner) { ?>
                                    <tr>
                                        <td><?= htmlspecialchars($winner['nama_barang']); ?></td>
                                        <td><?= htmlspecialchars($winner['winner_name']); ?></td>
                                        <td><?= htmlspecialchars($winner['winner_phone']); ?></td>
                                        <!-- Format Jumlah Bid Tertinggi ke Rupiah -->
                                        <td><?= 'Rp ' . number_format($winner['highest_bid'], 0, ',', '.'); ?></td>
                                        <td><?= htmlspecialchars($winner['total_bidders']); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#datatable-pemenang').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons: ['copy', 'excel', 'pdf', 'print'],
            order: [
                [3, 'desc']
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
    });
</script>