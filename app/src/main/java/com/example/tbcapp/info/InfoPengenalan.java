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

public class InfoPengenalan extends AppCompatActivity {

    String TAG = "InfoPengenalan";
    Toolbar toolbar;
    public TextView isi_pengenalan;
    public TextView isi_penularan;
    public TextView isi_kelrentan;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.info_pengenalan);

        //Set icon to toolbar
        toolbar = findViewById(R.id.toolbar);
        toolbar.setNavigationIcon(R.drawable.ic_arrow);
        toolbar.setNavigationOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });

        isi_pengenalan = findViewById(R.id.isi_pengenalan);
        isi_penularan = findViewById(R.id.isi_penularan);
        isi_kelrentan = findViewById(R.id.isi_kelrentan);
        getData();
    }

//    public void kembaliInfo(View view) {
//        Intent intent = new Intent(InfoPengenalan.this , InfoActivity.class);
//        startActivity(intent);
//    }

    public void getData() {
        ApiEndpoint apiEndpoint = ApiService.getRetrofit().create(ApiEndpoint.class);
        Call<List<ModelInfo>> call = apiEndpoint.getInfoList();
        call.enqueue(new Callback<List<ModelInfo>>() {
            @Override
            public void onResponse(Call<List<ModelInfo>> call, Response<List<ModelInfo>> response) {
                isi_pengenalan.setText(response.body().get(0).getIsi_info());
                isi_penularan.setText(response.body().get(1).getIsi_info());
                isi_kelrentan.setText(response.body().get(2).getIsi_info());
            }

            @Override
            public void onFailure(Call<List<ModelInfo>> call, Throwable t) {
                Log.e(TAG,"gagal"+t);
            }
        });
    }

}