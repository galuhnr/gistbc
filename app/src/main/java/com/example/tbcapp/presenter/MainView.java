package com.example.tbcapp.presenter;

import com.example.tbcapp.model.ModelRS;
import java.util.List;

public interface MainView {
    void onGetResult(List<ModelRS> alamatList);
    void onErrorLoading(String message);
}
