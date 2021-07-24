package com.example.tbcapp.model;

public class Kecamatan {

    //model untuk objek kecamatan di api data
    private int id_kecamatan;
    private String nama_kecamatan;

    public Kecamatan(int id_kecamatan, String nama_kecamatan) {
        this.id_kecamatan = id_kecamatan;
        this.nama_kecamatan = nama_kecamatan;
    }

    public Kecamatan(String nama_kecamatan) {
        this.nama_kecamatan = nama_kecamatan;
    }

    public String getNama_kecamatan() {
        return nama_kecamatan;
    }

    public int getId_kecamatan() {
        return id_kecamatan;
    }
}
