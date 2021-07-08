package com.example.tbcapp.presenter;

import com.example.tbcapp.model.ModelData;

import java.util.List;

public interface DataView {
    void onGetResult(List<ModelData> dataList);
    void onErrorLoading(String message);
}
