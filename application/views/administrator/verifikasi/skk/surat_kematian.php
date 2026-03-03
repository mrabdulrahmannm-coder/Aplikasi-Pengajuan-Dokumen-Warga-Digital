<div class="main-content container-fluid">
	<div class="page-title">
		<h4>Verifikasi Surat Keterangan Kematian</h4>
	</div>
	<section class="section">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive overflow-auto">
							<table id="verifikasi" class="table table-striped table-bordered text-center"
								style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Jenis Surat</th>
										<th>Nomor Surat</th>
										<th>Status</th>
										<th>Preview Data</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $n = 1;
									foreach ($datas as $data) { ?>
										<tr>
											<td><?= $n ?></td>
											<td>
												<?= $data->jenis_surat ?>
											</td>
											<td><?= $data->nomor_surat ?></td>
											<td>
												<?php
												if ($data->status == 'Menunggu Verifikasi') {
													echo '<span class="badge bg-warning">Menunggu Verifikasi</span>';
												} else if ($data->status == 'Diterima') {
													echo '<span class="badge bg-success">Diterima</span>';
												} else if ($data->status == 'Ditolak') {
													echo '<span class="badge bg-danger">Ditolak</span>';
												}
												?>
											</td>
											<td>
												<a href="<?= base_url('preview-skk/' . $data->id) ?>"><span
														class="badge bg-info">Preview Data</span></a>
											</td>
											<td>

												<?php if ($this->session->userdata('role_id') == 2) { ?>
`
													<?php if ($data->status == 'Menunggu Verifikasi') { ?>

														<button class="btn btn-info btn-sm mb-1" data-toggle="modal"
															data-target="#tambahKomentar<?= $data->id ?>">
															Komentar
														</button>

														<div class="btn-group">
															<form action="<?= base_url('update-status-skk') ?>" method="post">
																<input type="hidden" name="id" value="<?= $data->id ?>">
																<input type="hidden" name="id_warga" value="<?= $data->id_warga ?>">
																<input type="hidden" name="status" value="Diterima">
																<button class="btn btn-success btn-sm" type="submit">
																	Terima
																</button>
															</form>

															<form action="<?= base_url('update-status-skk') ?>" method="post">
																<input type="hidden" name="id" value="<?= $data->id ?>">
																<input type="hidden" name="id_warga" value="<?= $data->id_warga ?>">
																<input type="hidden" name="status" value="Ditolak">
																<button class="btn btn-danger btn-sm" type="submit">
																	Tolak
																</button>
															</form>
														</div>

													<?php } else if ($data->status == 'Ditolak') { ?>

															<button class="btn btn-info btn-sm" data-toggle="modal"
																data-target="#tambahKomentar<?= $data->id ?>">
																Lihat Komentar
															</button>

													<?php } else if ($data->status == 'Diterima') { ?>

																<a href="<?= base_url('cetak-surat-kematian/' . $data->id) ?>"
																	target="_blank" class="btn btn-primary btn-sm">
																	<i class="bi bi-printer"></i> Cetak
																</a>

													<?php } ?>

												<?php } ?>

											</td>

										</tr>
										<!-- MODAL KOMENTAR -->
										<div class="modal fade" id="tambahKomentar<?= $data->id ?>" tabindex="-1">
											<div class="modal-dialog">
												<div class="modal-content">

													<form action="<?= base_url('komentar-skk/' . $data->id) ?>"
														method="post">

														<div class="modal-header">
															<h5 class="modal-title">Komentar Petugas</h5>
															<button type="button" class="close"
																data-dismiss="modal">&times;</button>
														</div>

														<div class="modal-body">
															<div class="form-group">
																<label>Komentar</label>
																<textarea name="komentar" class="form-control" rows="4"
																	required><?= $data->komentar ?? '' ?></textarea>
															</div>
														</div>

														<div class="modal-footer">
															<button type="submit" class="btn btn-primary btn-sm">
																Simpan Komentar
															</button>
															<button type="button" class="btn btn-secondary btn-sm"
																data-dismiss="modal">
																Batal
															</button>
														</div>

													</form>

												</div>
											</div>
										</div>

										<?php $n++;
									} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>

	</section>
</div>