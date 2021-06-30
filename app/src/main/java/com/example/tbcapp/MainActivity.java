package com.example.tbcapp;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;
import android.util.Log;
import android.widget.Toast;

import com.example.tbcapp.adapter.RSAdapter;
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
}