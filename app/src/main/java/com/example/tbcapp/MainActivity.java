package com.example.tbcapp;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Spinner;
import android.widget.Toast;

import com.example.tbcapp.adapter.RSAdapter;
import com.example.tbcapp.info.InfoActivity;
import com.example.tbcapp.mapbox.MapActivity;
import com.example.tbcapp.model.ModelData;
import com.example.tbcapp.model.ModelRS;
import com.example.tbcapp.network.ApiEndpoint;
import com.example.tbcapp.network.ApiService;
import com.example.tbcapp.presenter.AlamatPresenter;
import com.example.tbcapp.presenter.MainView;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity implements MainView {

    RecyclerView rvAlamat;
    RSAdapter rsAdapter;
    AlamatPresenter alamatPresenter;
    Spinner spinner;
    String TAG = "MainActivity";
    List<ModelRS> dataFilter = new ArrayList<>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        spinner = findViewById(R.id.spinnerKecamatan);
        initSpinner();
        spinner.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> adapterView, View view, int i, long l) {
                getSelected(i);
            }

            @Override
            public void onNothingSelected(AdapterView<?> adapterView) {
                getSelected(31);
            }
        });

        rvAlamat = findViewById(R.id.rvAlamat);
        rvAlamat.setLayoutManager(new LinearLayoutManager(this));

        alamatPresenter = new AlamatPresenter(this);
        alamatPresenter.getData();

    }

    @Override
    public void onGetResult(List<ModelRS> alamatList) {
        dataFilter = alamatList;
        rsAdapter = new RSAdapter(this, alamatList);
        rsAdapter.notifyDataSetChanged();
        rvAlamat.setAdapter(rsAdapter);
    }

    @Override
    public void onErrorLoading(String message) {
        Toast.makeText(this, message, Toast.LENGTH_SHORT).show();
    }

    //filter berdasarkan pilihan spinner
    public void getSelected(int id_spinner){
        List<ModelRS> dataNew = new ArrayList<>();
        if(id_spinner == 31){
            dataNew = dataFilter;
        }else{
            for(int i=0;i<dataFilter.size();i++){
                if(id_spinner == dataFilter.get(i).getKecamatans().getId_kecamatan()){
                    dataNew.add(dataFilter.get(i));
                }
            }
        }
        rsAdapter = new RSAdapter(this, dataNew);
        rsAdapter.notifyDataSetChanged();
        rvAlamat.setAdapter(rsAdapter);
    }

    public void infoTBC(View view) {
        Intent intent = new Intent(MainActivity.this, InfoActivity.class);
        startActivity(intent);
    }

    public void infoMap(View view) {
        Intent intent = new Intent(MainActivity.this, MapActivity.class);
        startActivity(intent);
    }

    //mengambil menu spinner dari model data->kecamatan
    private void initSpinner(){
        ApiEndpoint apiEndpoint = ApiService.getRetrofit().create(ApiEndpoint.class);
        Call<List<ModelData>> call = apiEndpoint.getData2016();
        call.enqueue(new Callback<List<ModelData>>() {
            @Override
            public void onResponse(Call<List<ModelData>> call, Response<List<ModelData>> response) {
                if(response.isSuccessful() && response.body() != null){
                        List<ModelData> dataKec = response.body();
                        List<String> listSpinner = new ArrayList<String>();
                        for(int i=0; i< dataKec.size(); i++){
                            listSpinner.add(dataKec.get(i).getKecamatans().getId_kecamatan(),dataKec.get(i).getKecamatans().getNama_kecamatan());
                        }
                        listSpinner.add(31,"Semua Data");
                        ArrayAdapter<String> adapter = new ArrayAdapter<String>(MainActivity.this, android.R.layout.simple_spinner_dropdown_item, listSpinner);
                        spinner.setAdapter(adapter);
                }else {
                    Log.e(TAG, "tidak ada data");
                }
            }

            @Override
            public void onFailure(Call<List<ModelData>> call, Throwable t) {
                Log.e(TAG,"gagal menampilkan spinner"+t);
            }
        });
    }
}