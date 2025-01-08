package com.example.parkflow.adapter;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.TextView;

import com.example.parkflow.Model.Vehicle;
import com.example.parkflow.R;

import java.util.LinkedList;

public class VehicleAdapter extends BaseAdapter {

    private Context context;
    private LinkedList<Vehicle>  vehicles;
    private SQLiteDatabase db;

    public VehicleAdapter(Context ctx, LinkedList<Vehicle> vehicles, SQLiteDatabase db){
        this.context = ctx;
        this.vehicles = vehicles;
        this.db = db;
    }

    @Override
    public Object getItem(int position){
        return vehicles.get(position);
    }

    @Override
    public int getCount(){
        return vehicles.size();
    }

    @Override
    public long getItemId(int position){
        return vehicles.get(position).getId();
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent){
        if(convertView == null){
            convertView = LayoutInflater.from(context).inflate(R.layout.vehicles_item_list, parent, false);
        }

        Vehicle v = vehicles.get(position);
        TextView tvName  = convertView.findViewById(R.id.tv_vehicle_name);
        TextView tvColor = convertView.findViewById(R.id.tv_vehicle_color);
        Button btnDelete = convertView.findViewById(R.id.btn_delete_vehicle);

        tvName.setText(v.getBrand() + " - " + v.getModel());
        tvColor.setText(v.getColor());

        btnDelete.setOnClickListener(action -> {
            deleteVehicle(v.getId());
            vehicles.remove(position);
            notifyDataSetChanged();
        });

        return convertView;
    }

    private void deleteVehicle(int id) {
        db.execSQL("DELETE FROM [vehicle] WHERE id = ?", new String[]{String.valueOf(id)});
    }



}
