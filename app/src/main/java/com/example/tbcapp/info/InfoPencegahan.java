package com.example.tbcapp.info;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import com.example.tbcapp.R;
import com.example.tbcapp.model.ModelInfo;
import com.example.tbcapp.network.ApiEndpoint;
import com.example.tbcapp.network.ApiService;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class InfoPencegahan extends AppCompatActivity {
    String TAG = "InfoPencegahan";
    public TextView isi_info;
    Toolbar toolbar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.info_pencegahan);

        //Set icon to toolbar
        toolbar = findViewById(R.id.toolbar);
        toolbar.setNavigationIcon(R.drawable.ic_arrow);
        toolbar.setNavigationOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });

        isi_info = findViewById(R.id.isi_info);
        getData();
    }

    public void getData() {
        ApiEndpoint apiEndpoint = ApiService.getRetrofit().create(ApiEndpoint.class);
        Call<List<ModelInfo>> call = apiEndpoint.getInfoList();
        call.enqueue(new Callback<List<ModelInfo>>() {
            @Override
            public void onResponse(Call<List<ModelInfo>> call, Response<List<ModelInfo>> response) {
                isi_info.setText(response.body().get(5).getIsi_info());
            }

            @Override
            public void onFailure(Call<List<ModelInfo>> call, Throwable t) {
                Log.e(TAG,"gagal"+t);
            }
        });
    }

}