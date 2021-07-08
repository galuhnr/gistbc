package com.example.tbcapp.info;

import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import com.example.tbcapp.R;

public class InfoData extends AppCompatActivity{

    Toolbar toolbar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_data);

        //Set icon to toolbar
        toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayShowTitleEnabled(false);
        toolbar.setNavigationIcon(R.drawable.ic_arrow);
        toolbar.setNavigationOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });

    }


    //menu pilihan tahun
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_tahun,menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle item selection
        switch (item.getItemId()) {
            case R.id.thn_2016:
                getSupportFragmentManager().beginTransaction().replace(R.id.fragment_data, new FragmentData(R.id.thn_2016)).commit();
                return true;
            case R.id.thn_2017:
                getSupportFragmentManager().beginTransaction().replace(R.id.fragment_data, new FragmentData(R.id.thn_2017)).commit();
                return true;
            case R.id.thn_2018:
                getSupportFragmentManager().beginTransaction().replace(R.id.fragment_data, new FragmentData(R.id.thn_2018)).commit();
                return true;
            case R.id.thn_2019:
                getSupportFragmentManager().beginTransaction().replace(R.id.fragment_data, new FragmentData(R.id.thn_2019)).commit();
                return true;
            case android.R.id.home:
                finish();
                return true;
            default:
                return super.onOptionsItemSelected(item);
        }
    }

}
