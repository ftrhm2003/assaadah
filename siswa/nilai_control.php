<?php

$id_user = $_SESSION['id_users'];
$sql_pendaftar = "SELECT * FROM pendaftar where users_id = '$id_user'";
$result_pendaftar = mysqli_query($koneksi, $sql_pendaftar);

if(mysqli_num_rows($result_pendaftar)){

    $data_pendaftar = mysqli_fetch_array($result_pendaftar);
    $id_pendaftar = $data_pendaftar['id'];

    $sql_nilai = "SELECT * FROM nilai where pendaftar_id = '$id_pendaftar'";
    $result_nilai = mysqli_query($koneksi, $sql_nilai);

    if(mysqli_num_rows($result_nilai)) {
        $data_nilai = mysqli_fetch_array($result_nilai);
        $status = $data_nilai['status'];

    } else  {
        // jika belum ada data nilai/ status maka kosong
    }


    // simpan data nilai
    if(isset($_POST['btn_simpan']) && $_POST['btn_simpan'] == 'simpan_nilai') {

        $ns1 = $_POST['ns1'];
        $ns2 = $_POST['ns2'];
        $ns3 = $_POST['ns3'];
        $ns4 = $_POST['ns4'];
        $ns5 = $_POST['ns5'];

        if(isset($_POST['id_nilai'])) {
            // update
            $id_nilai = $_POST['id_nilai'];

            $sql_update_nilai = "UPDATE nilai set nilai_semester1='$ns1', nilai_semester2='$ns2', nilai_semester3='$ns3', nilai_semester4='$ns4', nilai_semester5='$ns5' where id='$id_nilai'";
            $query_update_nilai = mysqli_query($koneksi, $sql_update_nilai);

            if($query_update_nilai){
                // berhasil

                $_SESSION['pesan_sukses'] = "Edit score success!";

                header('location:dashboard.php');
                
            } else {
                echo "error ". mysqli_error($koneksi);
                die;
            }

        } else {
            // insert
            $sql_insert_nilai = "INSERT INTO nilai (nilai_semester5, nilai_semester2, nilai_semester3, nilai_semester4, nilai_semester5 status, pendaftar_id) values ('$ns1', '$ns2', '$ns3', '$ns4', '$ns5', 0, '$id_pendaftar')";
    
            $query_insert_nilai = mysqli_query($koneksi, $sql_insert_nilai);

            if($query_insert_nilai){
                // berhasil
                header('location:nilai.php');
                
            } else {
                echo "error ". mysqli_error($koneksi);
                die;
            }

        }
    
        
    
    }

}

?>