package com.example.tbcapp.model;

public class ModelRS {
    private String nama_rs;
    private String alamat;
    private String no_tlp;

    public ModelRS(String nama_rs, String alamat, String no_tlp){
        this.nama_rs = nama_rs;
        this.alamat = alamat;
        this.no_tlp = no_tlp;
    }

    public String getNama_rs() {
        return nama_rs;
    }

    public String getAlamat() {
        return alamat;
    }

    public String getNo_tlp() {
        return no_tlp;
    }

}
