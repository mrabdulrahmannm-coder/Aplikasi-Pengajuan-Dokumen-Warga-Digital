<div class="main-content container-fluid">
	<div class="page-title">
		<h4>History Surat Keterangan Kematian</h4>
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

														<form action="<?= base_url('update-surat-kematian') ?>"
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

																<!-- DATA ALMARHUM -->
																<h6 class="text-primary font-weight-bold mb-2">Data Almarhum
																	/
																	Almarhumah</h6>
																<div class="row">

																	<div class="col-md-6 form-group">
																		<label>Nama Alm/h :</label>
																		<input type="text" name="nama_alm"
																			class="form-control"
																			value="<?= $data->nama_alm ?>" required>
																	</div>

																	<div class="col-md-6 form-group">
																		<label>Hubungan dengan Alm/h :</label>
																		<input type="text" name="hubungan"
																			class="form-control"
																			value="<?= $data->hubungan ?>" required>
																	</div>

																	<div class="col-md-4 form-group">
																		<label>NIK :</label>
																		<input type="number" name="nik_a"
																			class="form-control" value="<?= $data->nik_a ?>"
																			required>
																	</div>

																	<div class="col-md-4 form-group">
																		<label>Jenis Kelamin :</label>
																		<select name="jekel_a" class="form-control"
																			required>
																			<option value="">-- Pilih --</option>
																			<option value="Laki-laki"
																				<?= ($data->jekel_a == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
																			<option value="Perempuan"
																				<?= ($data->jekel_a == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
																		</select>
																	</div>

																	<div class="col-md-4 form-group">
																		<label>Status Perkawinan :</label>
																		<select name="status_perkawinan_a"
																			class="form-control" required>
																			<option value="">-- Pilih --</option>
																			<option value="Belum Kawin"
																				<?= ($data->status_perkawinan_a == 'Belum Kawin') ? 'selected' : '' ?>>Belum Kawin
																			</option>
																			<option value="Kawin"
																				<?= ($data->status_perkawinan_a == 'Kawin') ? 'selected' : '' ?>>Kawin</option>
																			<option value="Cerai Hidup"
																				<?= ($data->status_perkawinan_a == 'Cerai Hidup') ? 'selected' : '' ?>>Cerai Hidup
																			</option>
																			<option value="Cerai Mati"
																				<?= ($data->status_perkawinan_a == 'Cerai Mati') ? 'selected' : '' ?>>Cerai Mati
																			</option>
																		</select>
																	</div>

																	<div class="col-md-6 form-group">
																		<label>Tempat Lahir :</label>
																		<input type="text" name="tempat_lahir_a"
																			class="form-control"
																			value="<?= $data->tempat_lahir_a ?>" required>
																	</div>

																	<div class="col-md-6 form-group">
																		<label>Tanggal Lahir :</label>
																		<input type="date" name="tanggal_lahir_a"
																			class="form-control"
																			value="<?= $data->tanggal_lahir_a ?>" required>
																	</div>

																	<div class="col-md-6 form-group">
																		<label>Bin / Binti :</label>
																		<input type="text" name="bin" class="form-control"
																			value="<?= $data->bin ?>" required>
																	</div>

																	<div class="col-md-6 form-group">
																		<label>Pekerjaan :</label>
																		<input type="text" name="pekerjaan_a"
																			class="form-control"
																			value="<?= $data->pekerjaan_a ?>" required>
																	</div>

																	<div class="col-md-6 form-group">
																		<label>Kewarganegaraan :</label>
																		<select name="kewarganegaraan_a"
																			class="form-control" required>
																			<option value="WNI"
																				<?= ($data->kewarganegaraan_a == 'WNI') ? 'selected' : '' ?>>WNI</option>
																			<option value="WNA"
																				<?= ($data->kewarganegaraan_a == 'WNA') ? 'selected' : '' ?>>WNA</option>
																		</select>
																	</div>

																	<div class="col-md-12 form-group">
																		<label>Alamat :</label>
																		<textarea name="alamat_a" class="form-control"
																			rows="2"
																			required><?= $data->alamat_a ?></textarea>
																	</div>
																</div>

																<hr>

																<!-- DATA MENINGGAL -->
																<h6 class="text-primary font-weight-bold mb-2">Data Kematian
																</h6>
																<div class="row">

																	<div class="col-md-3 form-group">
																		<label>Hari :</label>
																		<input type="text" name="hari" class="form-control"
																			value="<?= $data->hari ?>" required>
																	</div>

																	<div class="col-md-3 form-group">
																		<label>Jam :</label>
																		<input type="time" name="jam_meninggal"
																			class="form-control"
																			value="<?= $data->jam_meninggal ?>" required>
																	</div>

																	<div class="col-md-3 form-group">
																		<label>Tanggal Meninggal :</label>
																		<input type="date" name="tanggal_meninggal"
																			class="form-control"
																			value="<?= $data->tanggal_meninggal ?>"
																			required>
																	</div>

																	<div class="col-md-3 form-group">
																		<label>Sebab Meninggal :</label>
																		<input type="text" name="sebab_meninggal"
																			class="form-control"
																			value="<?= $data->sebab_meninggal ?>" required>
																	</div>

																	<div class="col-md-6 form-group">
																		<label>Tempat Meninggal :</label>
																		<input type="text" name="tempat_meninggal"
																			class="form-control"
																			value="<?= $data->tempat_meninggal ?>" required>
																	</div>

																	<div class="col-md-6 form-group">
																		<label>Tempat Pemakaman :</label>
																		<input type="text" name="tempat_pemakaman"
																			class="form-control"
																			value="<?= $data->tempat_pemakaman ?>" required>
																	</div>
																</div>

																<hr>

																<!-- UPLOAD & KEPERLUAN -->
																<h6 class="text-primary font-weight-bold mb-2">Dokumen &
																	Keperluan</h6>
																<div class="row">

																	<div class="col-md-6 form-group">
																		<label>Upload Foto KTP :</label>
																		<input type="file" name="file_ktp"
																			class="form-control">
																	</div>

																	<div class="col-md-6 form-group">
																		<label>Upload Foto Kartu Keluarga :</label>
																		<input type="file" name="file_kk"
																			class="form-control">
																	</div>

																	<div class="col-md-12 form-group">
																		<label>Tujuan Permohonan Surat :</label>
																		<textarea name="keperluan" class="form-control"
																			rows="2"
																			required><?= $data->keperluan ?></textarea>
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

													<a href="<?= base_url('cetak-surat-kematian/' . $data->id . '?nomor=' . $data->nomor_surat) ?>"
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