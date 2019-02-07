
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_hp extends CI_Model {

	public function ambilhp(){
			$ambilhp = $this->db->join('kategori', 'kategori.kode_kategori = hp.kode_kategori')->get('hp')->result();

			return $ambilhp;
	}


	public function ambilkategori(){

			$ambilkategori = $this->db->get('kategori')->result();

			return $ambilkategori;
	}

	public function tambah($nama_file){

	if($nama_file == ""){

			$tambah = array(
				'kode_hp' => $this->input->post('kode_hp'),
				'nama_hp' => $this->input->post('nama_hp'),
				'kode_kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok'), );

	}else{

		$tambah = array(
				'kode_hp' => $this->input->post('kode_hp'),
				'nama_hp' => $this->input->post('nama_hp'),
				'kode_kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				'cover' => $nama_file,
				'stok' => $this->input->post('stok'), );

	}
	return $this->db->insert('hp', $tambah);
	}

public function tampil_ubah_hp($kode_hp){
		return $this->db->join('kategori', 'kategori.kode_kategori = hp.kode_kategori')->where('kode_hp',$kode_hp)->get('hp')->row();

	}



public function update(){
			$ubah = array(
				'kode_hp' => $this->input->post('kode_hp'),
				'nama_hp' => $this->input->post('nama_hp'),
				'kode_kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok'), );

			return $this->db->where('kode_hp',$this->input->post('kode_hp'))->update('hp', $ubah);

}


public function update_ft($nama_file){
				$ubah = array(
					'kode_hp' => $this->input->post('kode_hp'),
					'nama_hp' => $this->input->post('nama_hp'),
				'kode_kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				'cover' => $nama_file,
				'stok' => $this->input->post('stok'), );

		return $this->db->where('kode_hp',$this->input->post('kode_hp'))->update('hp', $ubah);





}


public function hapus($kode_hp ){
	return $this->db->where('kode_hp',$kode_hp)->delete('hp');
}




public function ambilhpcart($kode_hp){
	return $this->db->where('kode_hp',$kode_hp )->get('hp')->row();

}

}

/* End of file M_hp.php */
/* Location: ./application/models/M_hp.php */

?>
