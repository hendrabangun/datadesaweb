<script type="text/javascript" src="<?= base_url()?>assets/js/script.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/validasi.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/localization/messages_id.js"></script>
<script type="text/javascript">
	$('document').ready(function()
	{
		$('#validasi').submit(function()
		{
			if ($('#validasi').valid())
				$('#modalBox').modal('hide');
		});
	});
</script>
<form action="<?=$form_action?>" method="post" target="_blank" id="validasi">
	<div class='modal-body'>
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-danger">
					<div class="box-body">
						<div class="form-group">
							<label class="control-label">Tahun Laporan</label>
							<select class="form-control input-sm jenis_link"  name="tahun">>
								<option value="">Pilih Tahun Laporan</option>
								<?php foreach ($tahun_laporan as $tahun): ?>
									<option value="<?= $tahun['tahun']?>"><?= $tahun['tahun']?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Pamong tertanda</label>
							<select class="form-control input-sm jenis_link required" name="pamong_ttd">
								<option value="">Pilih Staf Penandatangan</option>
								<?php foreach ($pamong AS $data): ?>
									<option value="<?= $data['nama']?>" data-jabatan="<?= trim($data['jabatan'])?>" <?php if (strpos(strtolower($data['jabatan']), 'sekretaris')!==false): ?> selected <?php endif; ?>><?= $data['nama']?> (<?= $data['jabatan']?>)</option>
								<?php endforeach; ?>
							</select>
							<input type="hidden" name="jabatan_ttd">
						</div>
						<div class="form-group">
							<label class="control-label">Pamong mengetahui</label>
							<select class="form-control input-sm jenis_link required"  name="pamong_ketahui">
								<option value="">Pilih Staf Mengetahui</option>
								<?php foreach ($pamong AS $data): ?>
									<option value="<?= $data['nama']?>" data-jabatan="<?= trim($data['jabatan'])?>" <?php if (strpos(strtolower($data['jabatan']),'kepala')!==false and strpos(strtolower($data['jabatan']),'dusun')===false): ?>selected<?php endif; ?>><?= $data['nama']?> (<?= $data['jabatan']?>)</option>
								<?php endforeach;?>
							</select>
							<input type="hidden" name="jabatan_ketahui">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-social btn-flat btn-danger btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
			<button type="submit" class="btn btn-social btn-flat btn-info btn-sm" id="btn-ok" >
				<?php if (strpos($form_action, '/cetak') !== false): ?>
					<i class='fa fa-print'></i> Cetak
				<?php else: ?>
					<i class='fa fa-download'></i> Unduh
				<?php endif; ?>
			</button>
		</div>
	</div>
</form>
