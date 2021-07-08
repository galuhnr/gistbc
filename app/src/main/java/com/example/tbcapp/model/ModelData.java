package com.example.tbcapp.model;

import com.google.gson.annotations.SerializedName;

public class ModelData {
    private Integer jml_faskes;
    private Integer jml_kasus;
    private Integer jml_rumahts;
    private Integer jml_kp;

    @SerializedName("kecamatans")
    private Kecamatan kecamatans;

    public ModelData(Integer jml_faskes, Integer jml_kasus, Integer jml_rumahts, Integer jml_kp, Kecamatan kecamatans) {
        this.jml_faskes = jml_faskes;
        this.jml_kasus = jml_kasus;
        this.jml_rumahts = jml_rumahts;
        this.jml_kp = jml_kp;
        this.kecamatans = kecamatans;
    }

    public Integer getJml_faskes() {
        return jml_faskes;
    }

    public Integer getJml_kasus() {
        return jml_kasus;
    }

    public Integer getJml_rumahts() {
        return jml_rumahts;
    }

    public Integer getJml_kp() {
        return jml_kp;
    }

    public Kecamatan getKecamatans() {
        return kecamatans;
    }

}
