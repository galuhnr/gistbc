package com.example.tbcapp.presenter;

import android.util.Log;

import com.example.tbcapp.R;
import com.example.tbcapp.model.ModelData;
import com.example.tbcapp.network.ApiEndpoint;
import com.example.tbcapp.network.ApiService;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class DataPresenter {

    private DataView view;
    String TAG = "InfoData";

    public DataPresenter(DataView view){
        this.view = view;
    }

    public void getData(int item) {
        Call<List<ModelData>> retrofit = null;
        ApiEndpoint apiEndpoint = ApiService.getRetrofit().create(ApiEndpoint.class);
        if(item== R.id.thn_2016){
            Call<List<ModelData>> call = apiEndpoint.getData2016();
            retrofit = call;
        }else if(item==R.id.thn_2017){
            Call<List<ModelData>> call2 = apiEndpoint.getData2017();
            retrofit = call2;
        }else if(item==R.id.thn_2018){
            Call<List<ModelData>> call3 = apiEndpoint.getData2018();
            retrofit = call3;
        }else if(item==R.id.thn_2019){
            Call<List<ModelData>> call4 = apiEndpoint.getData2019();
            retrofit = call4;
        }else{
            Log.e(TAG,"gagal mengambil data");
        }
        retrofit.enqueue(new Callback<List<ModelData>>() {
            @Override
            public void onResponse(Call<List<ModelData>> call, Response<List<ModelData>> response) {
                if(response.isSuccessful() && response.body() != null){
                    view.onGetResult(response.body());
                }
            }

            @Override
            public void onFailure(Call<List<ModelData>> call, Throwable t) {
                view.onErrorLoading(t.getLocalizedMessage());
                Log.e(TAG,"gagal"+t);
            }
        });
    }
}
