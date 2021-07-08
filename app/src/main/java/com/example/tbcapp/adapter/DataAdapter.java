package com.example.tbcapp.adapter;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.example.tbcapp.R;
import com.example.tbcapp.model.ModelData;

import java.util.List;

public class DataAdapter extends RecyclerView.Adapter<DataAdapter.ViewHolder>{

    private List<ModelData> dataList;

    public DataAdapter(List<ModelData> dataList){
        this.dataList = dataList;
    }

    @NonNull
    @Override
    public DataAdapter.ViewHolder onCreateViewHolder (@NonNull ViewGroup parent, int viewType){
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.list_item_data, parent, false);
        return new DataAdapter.ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull DataAdapter.ViewHolder holder, int position){

        holder.nama_kecamatan.setText(dataList.get(position).getKecamatans().getNama_kecamatan());
        holder.jml_faskes.setText(String.valueOf(dataList.get(position).getJml_faskes()));
        holder.jml_kasus.setText(String.valueOf(dataList.get(position).getJml_kasus()));
        holder.jml_rumahts.setText(String.valueOf(dataList.get(position).getJml_rumahts()));
        holder.jml_kp.setText(String.valueOf(dataList.get(position).getJml_kp()));

    }

    @Override
    public int getItemCount(){
        return dataList.size();
    }

    public static class ViewHolder extends RecyclerView.ViewHolder{

        public TextView nama_kecamatan;
        public TextView jml_faskes;
        public TextView jml_kasus;
        public TextView jml_rumahts;
        public TextView jml_kp;

        public ViewHolder(@NonNull View itemView){
            super(itemView);

            nama_kecamatan = itemView.findViewById(R.id.nama_kecamatan);
            jml_faskes = itemView.findViewById(R.id.jml_faskes);
            jml_kasus = itemView.findViewById(R.id.jml_kasus);
            jml_rumahts = itemView.findViewById(R.id.jml_rumahts);
            jml_kp = itemView.findViewById(R.id.jml_kp);
        }
    }
}
