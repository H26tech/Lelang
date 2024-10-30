<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h2>Data Pemenang Lelang</h2>
            
            <?php foreach ($grouped_posts as $nama_barang => $bids) { ?>
                <h3><?= htmlspecialchars($nama_barang); ?></h3> <!-- Display the item name -->
                <table border="1">
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
                <br> <!-- Add space between tables -->
            <?php } ?>
        </div>
    </div>
</div>
