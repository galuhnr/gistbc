package com.example.tbcapp.info;

import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.example.tbcapp.R;
import com.example.tbcapp.adapter.DataAdapter;
import com.example.tbcapp.model.ModelData;
import com.example.tbcapp.presenter.DataPresenter;
import com.example.tbcapp.presenter.DataView;

import java.util.List;

public class FragmentData extends Fragment implements DataView {

    RecyclerView rvData;
    DataAdapter dataAdapter;
    DataPresenter dataPresenter;
    int item;
    private final String TAG = "InfoData";

    public FragmentData(int item) {
        this.item =item;
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_data, container, false);
        rvData = view.findViewById(R.id.rvData);
        rvData.setLayoutManager(new LinearLayoutManager(getContext()));

        //ambil data dari api
        dataPresenter = new DataPresenter(this);
        if(item==R.id.thn_2016){
            dataPresenter.getData(R.id.thn_2016);
        }else if(item==R.id.thn_2017){
            dataPresenter.getData(R.id.thn_2017);
        }else if(item==R.id.thn_2018){
            dataPresenter.getData(R.id.thn_2018);
        }else if(item==R.id.thn_2019){
            dataPresenter.getData(R.id.thn_2019);
        }else {
            Log.d(TAG, "unsuccess");
        }

        return view;
    }

    @Override
    public void onGetResult(List<ModelData> dataList) {
        dataAdapter = new DataAdapter(dataList);
        dataAdapter.notifyDataSetChanged();
        rvData.setAdapter(dataAdapter);
    }

    @Override
    public void onErrorLoading(String message) {
        Log.e(TAG,message);
    }
}