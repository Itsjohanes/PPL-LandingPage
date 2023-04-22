<!-- Begin Page Content -->



<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?php if ($this->session->flashdata('category_success')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
    <?php } ?>
    <?php if ($this->session->flashdata('category_error')) { ?>
        <div class="alert alert-danger"> <?= $this->session->flashdata('category_error') ?> </div>
    <?php } ?>
    <div class="row no-gutters">

        <br>
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add Anggota</h6>
                </div>
                <?php echo form_open_multipart('Admin/tambahAnggota'); ?>
                <div class="form-row">
                    <div class="col">
                        <select class="form-control" required id="exampleFormControlSelect1" id="role" name="role">
                            <option selected>Role</option>
                            <option value="1">PPLSP</option>
                            <option value="2">P3K</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram" required>
                    </div>
                    <div class="col">
                        <input type="file" required class="btn  form-control-file" id="exampleFormControlFile1" name="foto" />
                    </div>
                    <div class="col">
                        <Button class="btn btn-success">Submit</Button>
                    </div>
                </div>
                </form>
            </div>
        </div>





        <div class="container-fluid">

            <!-- Page Heading -->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Anggota</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">instagram</th>
                                    <th scope="col">Aksi</th>


                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($anggota as $j) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $j['nama']; ?></td>
                                        <td><?= $j['keterangan']; ?></td>
                                        <td><a href="<?= base_url(); ?>assets/gambar/<?= $j['foto']; ?>" <i class="fas fa-images"></i></a> </td>
                                        <td><?= $j['instagram']; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>Admin/deleteAnggota/<?= $j['id_anggota']; ?>" class="btn btn-danger" onclick="return confirm('Data akan dihapus secara permanen');"><i class="fas fa-trash-alt"></i></a>
                                        </td>

                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>














</div>
</div>

<!-- End of Main Content -->
<!-- Page level plugins -->