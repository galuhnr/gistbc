package com.example.tbcapp.model;

import com.google.gson.annotations.SerializedName;

public class ModelRS {
    private String nama_rs;
    private String alamat;
    private String no_tlp;

    @SerializedName("kecamatans")
    private Kecamatan kecamatans;

    public ModelRS(String nama_rs, String alamat, String no_tlp, Kecamatan kecamatans) {
        this.nama_rs = nama_rs;
        this.alamat = alamat;
        this.no_tlp = no_tlp;
        this.kecamatans = kecamatans;
    }

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

    public Kecamatan getKecamatans() {
        return kecamatans;
    }
}
