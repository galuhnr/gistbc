package com.example.tbcapp.network;

import com.example.tbcapp.model.ModelData;
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

    @GET("data2016")
    Call<List<ModelData>> getData2016();

    @GET("data2017")
    Call<List<ModelData>> getData2017();

    @GET("data2018")
    Call<List<ModelData>> getData2018();

    @GET("data2019")
    Call<List<ModelData>> getData2019();

}
