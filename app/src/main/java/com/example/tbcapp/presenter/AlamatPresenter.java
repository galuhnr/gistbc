package com.example.tbcapp.presenter;

import android.util.Log;

import com.example.tbcapp.model.ModelRS;
import com.example.tbcapp.network.ApiEndpoint;
import com.example.tbcapp.network.ApiService;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class AlamatPresenter {
    private MainView view;

    String TAG = "MainActivity";
    public AlamatPresenter(MainView view){
        this.view = view;
    }

    public void getData() {

        ApiEndpoint apiEndpoint = ApiService.getRetrofit().create(ApiEndpoint.class);
        Call<List<ModelRS>> call = apiEndpoint.getAlamatList();
        call.enqueue(new Callback<List<ModelRS>>() {
            @Override
            public void onResponse(Call<List<ModelRS>> call, Response<List<ModelRS>> response) {
                if(response.isSuccessful() && response.body() != null){
                    view.onGetResult(response.body());
                }
            }

            @Override
            public void onFailure(Call<List<ModelRS>> call, Throwable t) {
                view.onErrorLoading(t.getLocalizedMessage());
                Log.e(TAG,"gagal"+t);
            }
        });
    }
}
