<div class="main-content container-fluid">
	<div class="page-title">
		<h4>History Surat Pengantar Akte Kelahiran</h4>
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

														<form action="<?= base_url('update-surat-kelahiran') ?>"
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
																<input type="hidden" name="id" value="<?= $data->id ?>">

																<div class="alert alert-info mb-3">
																	Silakan perbaiki data sesuai komentar petugas.
																</div>

																<div class="form-group">
																	<label>Nomor Surat :</label>
																	<input type="text" class="form-control"
																		value="<?= $data->nomor_surat ?>" readonly>
																</div>

																<!-- DATA ORANG TUA -->
																<h6 class="text-primary">Data Orang Tua</h6>
																<div class="row">
																	<div class="col-md-6 mb-3">
																		<label>Nama Ayah :</label>
																		<input type="text" name="ayah" class="form-control"
																			value="<?= $data->ayah ?>" required>
																	</div>
																	<div class="col-md-6 mb-3">
																		<label>Nama Ibu :</label>
																		<input type="text" name="ibu" class="form-control"
																			value="<?= $data->ibu ?>" required>
																	</div>
																	<div class="col-md-6 mb-3">
																		<label>Nomor Kartu Keluarga :</label>
																		<input type="number" name="no_kk"
																			class="form-control" value="<?= $data->no_kk ?>"
																			required>
																	</div>
																</div>

																<!-- DATA BAYI -->
																<h6 class="text-primary mt-3">Data Bayi</h6>
																<div class="row">
																	<div class="col-md-6 mb-3">
																		<label>Nama Bayi :</label>
																		<input type="text" name="nama_bayi"
																			class="form-control"
																			value="<?= $data->nama_bayi ?>" required>
																	</div>
																	<div class="col-md-6 mb-3">
																		<label>Jenis Kelamin :</label>
																		<select name="jekel_b" class="form-control"
																			required>
																			<option value="">-- Pilih --</option>
																			<option value="Laki-laki"
																				<?= ($data->jekel_b == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
																			<option value="Perempuan"
																				<?= ($data->jekel_b == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
																		</select>
																	</div>

																	<div class="col-md-6 mb-3">
																		<label>Tempat Lahir :</label>
																		<input type="text" name="tempat_lahir_b"
																			class="form-control"
																			value="<?= $data->tempat_lahir_b ?>" required>
																	</div>
																	<div class="col-md-6 mb-3">
																		<label>Tanggal Lahir :</label>
																		<input type="date" name="tanggal_lahir_b"
																			class="form-control"
																			value="<?= $data->tanggal_lahir_b ?>" required>
																	</div>

																	<div class="col-md-4 mb-3">
																		<label>Anak Ke :</label>
																		<input type="number" name="anak_ke"
																			class="form-control"
																			value="<?= $data->anak_ke ?>" required>
																	</div>
																	<div class="col-md-4 mb-3">
																		<label>Agama :</label>
																		<select name="agama_b" class="form-control"
																			required>
																			<option value="">-- Pilih --</option>
																			<?php foreach (['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'] as $a) { ?>
																				<option value="<?= $a ?>"
																					<?= ($data->agama_b == $a) ? 'selected' : '' ?>><?= $a ?></option>
																			<?php } ?>
																		</select>
																	</div>
																	<div class="col-md-4 mb-3">
																		<label>Kewarganegaraan :</label>
																		<select name="kewarganegaraan_b"
																			class="form-control" required>
																			<option value="">-- Pilih --</option>
																			<option value="WNI"
																				<?= ($data->kewarganegaraan_b == 'WNI') ? 'selected' : '' ?>>WNI</option>
																			<option value="WNA"
																				<?= ($data->kewarganegaraan_b == 'WNA') ? 'selected' : '' ?>>WNA</option>
																		</select>
																	</div>
																</div>

																<!-- ALAMAT & KEPERLUAN -->
																<h6 class="text-primary mt-3">Alamat & Keperluan</h6>
																<div class="row">
																	<div class="col-md-6 mb-3">
																		<label>Alamat :</label>
																		<textarea name="alamat_b" class="form-control"
																			rows="3"
																			required><?= $data->alamat_b ?></textarea>
																	</div>
																	<div class="col-md-6 mb-3">
																		<label>Tujuan Permohonan Surat :</label>
																		<textarea name="keperluan" class="form-control"
																			rows="3"
																			required><?= $data->keperluan ?></textarea>
																	</div>
																</div>

																<!-- UPLOAD -->
																<h6 class="text-primary mt-3">Upload Dokumen</h6>
																<div class="row">
																	<div class="col-md-6 mb-3">
																		<label>Foto KTP :</label>
																		<input type="file" name="foto_ktp"
																			class="form-control">
																	</div>
																	<div class="col-md-6 mb-3">
																		<label>Foto Kartu Keluarga :</label>
																		<input type="file" name="foto_kk"
																			class="form-control">
																	</div>
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

													<a href="<?= base_url('cetak-surat-kelahiran/' . $data->id . '?nomor=' . $data->nomor_surat) ?>"
														class="btn btn-primary btn-sm" target="_blank">
														<i class="bi bi-printer-fill"></i> Cetak
													</a>

												<?php } else if ($data->status == 'Ditolak') { ?>

														<!-- TOMBOL EDIT -->
														<button class="btn btn-warning btn-sm" data-toggle="modal"
															data-target="#edit<?= $data->id ?>">
															<i class="bi bi-pencil-square"></i> Edit
														</button>

														<!-- TOMBOL KOMENTAR (HANYA JIKA ADA KOMENTAR) -->
													<?php if (!empty($data->komentar)) { ?>
															<button class="btn btn-info btn-sm" data-toggle="modal"
																data-target="#komentar<?= $data->id ?>">
																Komentar
															</button>
													<?php } ?>

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