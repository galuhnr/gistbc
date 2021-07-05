package com.example.tbcapp.info;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import com.example.tbcapp.R;

public class InfoActivity extends AppCompatActivity {

    Toolbar toolbar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_info);
        //Set icon to toolbar
        toolbar = findViewById(R.id.toolbar);
        toolbar.setNavigationIcon(R.drawable.ic_arrow);
        toolbar.setNavigationOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });
    }

    public void infoPengenalan(View view) {
        Intent intent = new Intent(InfoActivity.this , InfoPengenalan.class);
        startActivity(intent);
    }

    public void infoGejala(View view) {
        Intent intent = new Intent(InfoActivity.this , InfoGejala.class);
        startActivity(intent);
    }

    public void infoPengobatan(View view) {
        Intent intent = new Intent(InfoActivity.this , InfoPengobatan.class);
        startActivity(intent);
    }

    public void infoPencegahan(View view) {
        Intent intent = new Intent(InfoActivity.this , InfoPencegahan.class);
        startActivity(intent);
    }
}