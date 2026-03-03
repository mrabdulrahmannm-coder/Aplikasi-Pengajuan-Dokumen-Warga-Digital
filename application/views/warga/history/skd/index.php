<div class="main-content container-fluid">
	<div class="page-title">
		<h4>History Surat Keterangan Domisili</h4>
	</div>
	<a href="<?= base_url('histori-surat') ?>" class="btn btn-warning btn-sm mb-2"><i
			class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
	<section class="section">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive overflow-auto">
							<table id="histori" class="table table-striped table-bordered text-center"
								style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Jenis Surat</th>
										<th>Nomor Surat</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $n = 1;
									foreach ($datas as $data) { ?>
										<tr>
											<div class="modal fade" id="edit<?= $data->id ?>" tabindex="-1"
												aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">

														<form action="<?= base_url('update-surat-domisili') ?>"
															method="post" enctype="multipart/form-data">

															<div class="modal-header bg-warning">
																<strong class="modal-title text-dark">
																	EDIT DOKUMEN PERMOHONAN
																</strong>
																<button type="button" class="close" data-dismiss="modal">
																	<span>&times;</span>
																</button>
															</div>

															<div class="modal-body">

																<div class="alert alert-info">
																	Silahkan perbaiki data sesuai komentar petugas.
																</div>

																<input type="hidden" name="id" value="<?= $data->id ?>">

																<div class="form-group">
																	<label>Nomor Surat :</label>
																	<input type="text" class="form-control"
																		value="<?= $data->nomor_surat ?>" readonly>
																</div>

																<div class="form-group">
																	<label>Tujuan Permohonan Surat :</label>
																	<input type="text" name="keperluan" class="form-control"
																		value="<?= isset($data->keperluan) ? $data->keperluan : '' ?>"
																		required>
																	<small class="text-muted">
																		Isi jumlah orang yang menjadi tanggungan
																	</small>
																</div>

																<!-- FOTO KTP -->
																<div class="form-group">
																	<label>Upload Foto KTP :</label>
																	<input type="file" name="file_ktp" class="form-control"
																		accept="image/*">
																	<small class="text-muted">
																		Upload foto KTP yang jelas (JPG / PNG)
																	</small>
																</div>

																<div class="form-group">
																	<label>Upload Foto Kartu Keluarga :</label>
																	<input type="file" name="file_kk" class="form-control"
																		accept="image/*">
																	<small class="text-muted">
																		Upload foto KK yang jelas (JPG / PNG)
																	</small>
																</div>

															</div>

															<div class="modal-footer">
																<button type="submit" class="btn btn-success btn-sm">
																	<i class="bi bi-save"></i> Simpan & Ajukan Ulang
																</button>
																<button type="button" class="btn btn-secondary"
																	data-dismiss="modal">Batal</button>
															</div>

														</form>

													</div>
												</div>
											</div>

											<td><?= $n ?></td>
											<td><?= $data->jenis_surat ?></td>
											<td><?= $data->nomor_surat ?></td>
											<td>
												<?php
												if ($data->status == 'Menunggu Verifikasi') {
													echo '<span class="badge bg-warning">Menunggu Verifikasi Petugas</span>';
												} else if ($data->status == 'Diterima') {
													echo '<span class="badge bg-success">Diterima</span>';
												} else if ($data->status == 'Ditolak') {
													echo '<span class="badge bg-danger">Ditolak</span>';
												}
												?>
											</td>
											<td>
												<?php if ($data->status == 'Diterima') { ?>

													<a href="<?= base_url('cetak-surat-domisili/' . $data->id . '?nomor=' . $data->nomor_surat) ?>"
														class="btn btn-primary btn-sm" target="_blank">
														<i class="bi bi-printer-fill"></i> Cetak
													</a>

												<?php } else if ($data->status == 'Ditolak') { ?>

														<!-- TOMBOL EDIT (BARU) -->
														<button class="btn btn-warning btn-sm" data-toggle="modal"
															data-target="#edit<?= $data->id ?>">
															<i class="bi bi-pencil-square"></i> Edit
														</button>

														<!-- TOMBOL KOMENTAR (TETAP ADA) -->
														<button class="btn btn-info btn-sm" data-toggle="modal"
															data-target="#komentar<?= $data->id ?>">
															Komentar
														</button>

												<?php } else if ($data->komentar !== "") { ?>

															<button class="btn btn-info btn-sm" data-toggle="modal"
																data-target="#komentar<?= $data->id ?>">
																Komentar
															</button>

												<?php } else { ?>

															<small class="text-center text-danger font-bold">No Action</small>

												<?php } ?>
											</td>


											<div class="modal fade" id="komentar<?= $data->id ?>" tabindex="-1"
												aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header bg-info">
															<strong class="modal-title text-dark" id="exampleModalLabel">
																KOMENTAR PETUGAS</strong>
															<button type="button" class="close" data-dismiss="modal"
																aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="row">
																<div class="col-lg-12">
																	<div class="form-group">
																		<label for="">Komentar :</label>
																		<textarea name="komentar" class="form-control"
																			cols="30" rows="10"
																			readonly><?= $data->komentar ?></textarea>
																	</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
														</div>
													</div>
												</div>
											</div>

										</tr>

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