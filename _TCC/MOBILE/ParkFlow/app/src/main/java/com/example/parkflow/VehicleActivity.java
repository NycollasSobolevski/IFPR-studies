package com.example.parkflow;

import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;

import androidx.appcompat.app.AppCompatActivity;

import com.example.parkflow.Model.Vehicle;
import com.example.parkflow.adapter.VehicleAdapter;
import com.google.android.material.bottomnavigation.BottomNavigationView;
import com.google.android.material.floatingactionbutton.FloatingActionButton;

import java.util.ArrayList;
import java.util.LinkedList;

public class VehicleActivity extends AppCompatActivity {

    private SQLiteDatabase db;
    private int userId;
    private BottomNavigationView nav;
    private FloatingActionButton addBtn ;
    ListView carsList;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.vehicle_activity);

        carsList = findViewById(R.id.vehicleList);
        addBtn = findViewById(R.id.vehicleAddBtn);

        addBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                toggleAdd();
            }
        });

        configureNav();
        createDb();
        getLogedUser();
        LinkedList<Vehicle> data = loadData();
        renderData(data);

    }
    private void configureNav(){
        nav = findViewById(R.id.bottom_navigation);
        nav.setOnItemSelectedListener(item -> {
            Intent profileIntent;

            if(item.getItemId() == R.id.menu_home){
                profileIntent = new Intent(this,  HomeActivity.class);
                startActivity(profileIntent);
                finish();
                return true;
            } else if (item.getItemId() == R.id.menu_vehicle) {
                return true;
            } else {
                return false;
            }
        });
        nav.setSelectedItemId(R.id.menu_vehicle);

    }

    private void toggleAdd() {
        Intent intent = new Intent(VehicleActivity.this, AddVehicleActivity.class);
        startActivity(intent);
        finish();
    }
    private void getLogedUser(){
        try {
            String qrr = "SELECT * FROM [logged]";
            Cursor crs = db.rawQuery(qrr, null);
            crs.moveToFirst();
            userId = crs.getInt(crs.getColumnIndexOrThrow("id_user"));
            crs.close();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
    private LinkedList<Vehicle> loadData(){
        LinkedList<Vehicle> vehicles = new LinkedList<>();
        try {
            String querry = "SELECT * FROM vehicle where id_user = ?";
            Cursor crs = db.rawQuery(querry, new String[]{String.valueOf(userId)});
            while(crs.moveToNext()) {
                vehicles.add( new Vehicle(
                        crs.getInt(crs.getColumnIndexOrThrow("id")),
                        crs.getString(crs.getColumnIndexOrThrow("brand")),
                        crs.getString(crs.getColumnIndexOrThrow("model")),
                        crs.getString(crs.getColumnIndexOrThrow("color")),
                        crs.getString(crs.getColumnIndexOrThrow("plate")),
                        crs.getInt(crs.getColumnIndexOrThrow("year")),
                        crs.getInt(crs.getColumnIndexOrThrow("id_user"))
                    )
                );
            }
            crs.close();

        } catch (Exception e) {
            e.printStackTrace();
        }
        return vehicles;
    }
    private void renderData(LinkedList<Vehicle> data){
        VehicleAdapter adapter = new VehicleAdapter(this, data, db);
        carsList.setAdapter(adapter);
    }
    private void createDb(){
        db = openOrCreateDatabase("Parkflow", MODE_PRIVATE, null);
    }
}
