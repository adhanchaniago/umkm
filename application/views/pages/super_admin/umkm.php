<div class="row">
    <!-- Primary table start -->
    <div class="col-12 mt-5 mb-5">
        <p id="notification" data-message="<?php echo $notification; ?>"></p>
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?php echo $title; ?></h4>
                <div class="data-tables datatable-primary">
                    <table id="dataTable2" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>No</th>
                                <th>Nama UMKM</th>
                                <th>Pemilik</th>
                                <th>Email</th>
                                <th>Jenis Usaha</th>
                                <th>Bentuk Usaha</th>
                                <th>Status Usaha</th>
                                <th>Alamat</th>
                                <th>Tgl Daftar</th>
                                <th>Visi</th>
                                <th>Misi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($data_umkm)): ?>
                            <?php $no=1; foreach ($data_umkm as $umkm): ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $umkm->name ?></td>
                                <td><?php echo $umkm->nama_depan.' '.$umkm->nama_belakang; ?></td>
                                <td><?php echo $umkm->email; ?></td>
                                <td><?php echo $umkm->bussines_type; ?></td>
                                <td><?php echo $umkm->business_form; ?></td>
                                <td>
                                    <?php if ($umkm->status == 'approved'): ?>
                                        <button class="btn btn-sm btn-success"><i class="fa fa-check-circle-o"></i>aproved</button>
                                    <?php else: ?>
                                        <button class="btn btn-sm btn-warning"><i class="fa fa-spinner"></i>pending</button>
                                    <?php endif ?>
                                </td>
                                <td><?php echo $umkm->address; ?></td>
                                <td><?php echo $umkm->created_at; ?></td>
                                <td><?php echo $umkm->vision; ?></td>
                                <td><?php echo $umkm->mision; ?></td>
                                <td>
                                    <?php 
                                    $isDisabled = $umkm->status == "approved" ? 'disabled' : false;
                                    $action = $umkm->status == "approved" ? 'Sudah Disetujui' : 'setujui';
                                     ?>
                                    <?php echo anchor('superadmin/umkm/'.$umkm->umkm_id.'/approved', "$action", ['class' => "btn btn-sm btn-success $isDisabled", 'onclick'=>"return confirm('anda yakin menyetujui umkm $umkm->name');"]); ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8">
                                        <h5 class="text-info mb-5 mt-5">Belum Ada Umkm Yang di Daftarkan</h5>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Primary table end -->
</div>