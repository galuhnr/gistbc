package com.example.tbcapp.model;

public class ModelInfo {
    private Integer id_info;
    private String nama_info;
    private String isi_info;

    public ModelInfo(Integer id_info, String nama_info, String isi_info){
        this.id_info = id_info;
        this.nama_info = nama_info;
        this.isi_info = isi_info;
    }

    public Integer getId_info() {
        return id_info;
    }

    public String getNama_info() {
        return nama_info;
    }

    public String getIsi_info() {
        return isi_info;
    }
}
