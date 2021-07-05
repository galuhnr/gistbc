package com.example.tbcapp.network;

import com.example.tbcapp.model.ModelInfo;
import com.example.tbcapp.model.ModelRS;

import java.util.List;

import retrofit2.Call;
import retrofit2.http.GET;

public interface ApiEndpoint {
    @GET("datars")
    Call<List<ModelRS>> getAlamatList();

    @GET("infotbc")
    Call<List<ModelInfo>> getInfoList();

}
