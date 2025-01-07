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

import com.google.android.material.bottomnavigation.BottomNavigationView;
import com.google.android.material.floatingactionbutton.FloatingActionButton;

import java.util.ArrayList;
import java.util.LinkedList;

public class VehicleActivity extends AppCompatActivity {

    private SQLiteDatabase db;
    private int userId;
    private BottomNavigationView nav;
    private FloatingActionButton addBtn;
    ListView carsList;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.vehicle_activity);

        nav = findViewById(R.id.bottom_navigation);
        carsList = findViewById(R.id.vehicleList);
        addBtn = findViewById(R.id.vehicleAddBtn);

        nav.setOnItemSelectedListener(item -> {
            Intent profileIntent;

            if(item.getItemId() == R.id.menu_home){
                profileIntent = new Intent(this,  VehicleActivity.class);
                startActivity(profileIntent);
                finish();
                return true;
            } else if (item.getItemId() == R.id.menu_vehicle) {
                return true;
            } else {
                return false;
            }
        });
        addBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                toggleAdd();
            }
        });
        nav.setSelectedItemId(R.id.menu_vehicle);

        createDb();
        getLogedUser();
        LinkedList<String> data = loadData();
        renderData(data);

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

    private LinkedList<String> loadData(){
        LinkedList vehicles = new LinkedList<String>();
        try {
            String querry = "SELECT * FROM vehicle where id_user = ?";
            Cursor crs = db.rawQuery(querry, new String[]{String.valueOf(userId)});

            if(crs.moveToNext()) {
                do{
                    String content = crs.getString(crs.getColumnIndexOrThrow("brand")) + " " +
                            crs.getString(crs.getColumnIndexOrThrow("model")) + " - " +
                            crs.getString(crs.getColumnIndexOrThrow("color")) ;
                    vehicles.add(content);
                } while (crs.moveToNext());
            }


        } catch (Exception e) {
            e.printStackTrace();
        }
        return vehicles;
    }
    private void renderData(LinkedList<String> data){
        for (String item : data) {
            Log.d("------- debug on render",item);
        }
        ArrayAdapter<String> adapter = new ArrayAdapter<>(
                this,
                android.R.layout.simple_list_item_1,
                data
        );
        carsList.setAdapter(adapter);

    }
    private void createDb(){
        db = openOrCreateDatabase("Parkflow", MODE_PRIVATE, null);
    }
}
