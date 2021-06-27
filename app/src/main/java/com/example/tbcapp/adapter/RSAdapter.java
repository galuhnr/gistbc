package com.example.tbcapp.adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.example.tbcapp.R;
import com.example.tbcapp.model.ModelRS;

import java.util.List;

public class RSAdapter extends RecyclerView.Adapter<RSAdapter.ViewHolder> {
    private Context context;
    private List<ModelRS> alamatList;

    public RSAdapter(Context context, List<ModelRS> alamatList){
        this.context = context;
        this.alamatList = alamatList;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder (@NonNull ViewGroup parent, int viewType){
        View view = LayoutInflater.from(context).inflate(R.layout.list_item_alamat, parent, false);
        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position){

        holder.nama_rs.setText(alamatList.get(position).getNama_rs());
        holder.alamat.setText(alamatList.get(position).getAlamat());
        holder.no_tlp.setText(alamatList.get(position).getNo_tlp());
    }

    @Override
    public int getItemCount(){
        return alamatList.size();
    }

    public static class ViewHolder extends RecyclerView.ViewHolder{

        public TextView nama_rs;
        public TextView alamat;
        public TextView no_tlp;

        public ViewHolder(@NonNull View itemView){
            super(itemView);

            nama_rs = itemView.findViewById(R.id.nama_rs);
            alamat = itemView.findViewById(R.id.alamat);
            no_tlp = itemView.findViewById(R.id.no_tlp);
        }
    }
}

