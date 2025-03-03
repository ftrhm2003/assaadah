<?php
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

// Buat file Excel baru
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Judul di Excel
$year = date('Y'); // Ambil tahun saat ini
$sheet->setCellValue('A1', "DATA DIRI PENDAFTAR MTS ASSAADAH $year");
$sheet->mergeCells('A1:AE1');
$sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
$sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

// Header tabel
$headers = [
    'ID', 'NISN', 'Nama', 'Tempat Lahir', 'Tanggal Lahir', 'Jenis Kelamin', 'Agama', 'Alamat', 'Email', 'Telepon',
    'No KK', 'NIK', 'Anak Ke', 'Jumlah Saudara', 'Hobi', 'Cita-Cita', 'Pra Sekolah', 'Imunisasi', 'Sekolah Asal',
    'Nama Ayah', 'NIK Ayah', 'Pendidikan Ayah', 'No HP Ayah', 'Pekerjaan Ayah', 'Penghasilan Ayah',
    'Nama Ibu', 'NIK Ibu', 'Pendidikan Ibu', 'No HP Ibu', 'Pekerjaan Ibu', 'Penghasilan Ibu',
    'Nama Wali', 'NIK Wali', 'Pendidikan Wali', 'Pekerjaan Wali', 'Penghasilan Wali', 'Hubungan Wali', 'No HP Wali',
    'Rekening KJP', 'Rekening PIP', 'Status'
];

$columnIndex = 'A';
foreach ($headers as $header) {
    $sheet->setCellValue($columnIndex . '2', $header);
    $sheet->getStyle($columnIndex . '2')->getFont()->setBold(true);
    $columnIndex++;
}

// Koneksi database
$koneksi = new mysqli("localhost", "root", "", "pendaftaran");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Query untuk mengambil data
$query = "SELECT 
            p.id, p.nisn, p.nama, p.tmpt_lahir, p.tgl_lahir, p.jenis_kelamin, p.agama, p.alamat, p.email, p.telepon, 
            pi.nokk, pi.nik, pi.anakke, pi.jmlsaudara, pi.hobi, pi.citacita, pi.prasekolah, pi.imunisasi, pi.sekolahasal, 
            pi.nama_ayah, pi.nik_ayah, pi.pendidikan_ayah, pi.nohp_ayah, pi.pekerjaan_ayah, pi.penghasilan_ayah, 
            pi.nama_ibu, pi.nik_ibu, pi.pendidikan_ibu, pi.nohp_ibu, pi.pekerjaan_ibu, pi.penghasilan_ibu, 
            pi.nama_wali, pi.nik_wali, pi.pendidikan_wali, pi.pekerjaan_wali, pi.penghasilan_wali, pi.hubungan_wali, pi.nohp_wali, 
            pi.rek_kjp, pi.rek_pip, pi.status 
          FROM pendaftar p
          JOIN pendaftarinside pi ON p.id = pi.pendaftar_inside_id
          ORDER BY p.nama ASC";

$result = $koneksi->query($query);

if ($result->num_rows > 0) {
    $rowIndex = 3;
    while ($row = $result->fetch_assoc()) {
        $colIndex = 1;
        foreach ($row as $key => $value) {
            // Ubah status jika kolomnya 'status'
            if ($key == 'status') {
                $value = ($value == 0) ? 'New' : 'Checked';
            }
            $sheet->setCellValue(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($colIndex) . $rowIndex, $value);
            $colIndex++;
        }        
        $rowIndex++;
    }
}


// Set autofit pada kolom (DIPERBAIKI)
$lastColumn = Coordinate::stringFromColumnIndex(count($headers));
for ($col = 1; $col <= count($headers); $col++) {
    $columnLetter = Coordinate::stringFromColumnIndex($col);
    $sheet->getColumnDimension($columnLetter)->setAutoSize(true);
}

// Simpan file Excel
$writer = new Xlsx($spreadsheet);
$file_name = 'Data_Pendaftar.xlsx';
$writer->save($file_name);

// Download file Excel
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=\"" . $file_name . "\"");
header("Cache-Control: max-age=0");
readfile($file_name);
exit;
?>
