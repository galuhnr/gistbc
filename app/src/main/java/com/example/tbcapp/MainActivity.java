package com.example.tbcapp;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Toast;

import com.example.tbcapp.adapter.RSAdapter;
import com.example.tbcapp.info.InfoActivity;
import com.example.tbcapp.mapbox.MapActivity;
import com.example.tbcapp.model.ModelRS;
import com.example.tbcapp.presenter.AlamatPresenter;
import com.example.tbcapp.presenter.MainView;

import java.util.List;

public class MainActivity extends AppCompatActivity implements MainView {

    RecyclerView rvAlamat;
    RSAdapter rsAdapter;
    List<ModelRS> modelRS;
    AlamatPresenter alamatPresenter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        rvAlamat = findViewById(R.id.rvAlamat);
        rvAlamat.setLayoutManager(new LinearLayoutManager(this));

        alamatPresenter = new AlamatPresenter(this);
        alamatPresenter.getData();

    }

    @Override
    public void onGetResult(List<ModelRS> alamatList) {
        rsAdapter = new RSAdapter(this, alamatList);
        rsAdapter.notifyDataSetChanged();
        rvAlamat.setAdapter(rsAdapter);
        modelRS = alamatList;
    }

    @Override
    public void onErrorLoading(String message) {
        Toast.makeText(this, message, Toast.LENGTH_SHORT).show();
    }

    public void infoTBC(View view) {
        Intent intent = new Intent(MainActivity.this, InfoActivity.class);
        startActivity(intent);
    }

    public void infoMap(View view) {
        Intent intent = new Intent(MainActivity.this, MapActivity.class);
        startActivity(intent);
    }
}