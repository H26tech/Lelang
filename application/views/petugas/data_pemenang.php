<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h2>Data Pemenang Lelang</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Nama Pelaku Bid</th>
                        <th>No Telepon</th>
                        <th>Jumlah Bid</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post) { ?>
                        <tr>
                            <td><?= $post['nama_barang']; ?></td>
                            <td><?= $post['nama_lengkap']; ?></td>
                            <td><?= $post['telp']; ?></td>
                            <td><?= number_format($post['bid_amount'], 2); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>