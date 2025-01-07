package com.example.parkflow;

import android.content.Intent;
import android.os.Bundle;

import androidx.appcompat.app.AppCompatActivity;

import com.google.android.material.bottomnavigation.BottomNavigationView;

public class VehicleActivity extends AppCompatActivity {

    BottomNavigationView nav;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.vehicle_activity);

        nav = findViewById(R.id.bottom_navigation);

        nav.setOnItemSelectedListener(item -> {
            Intent profileIntent = new Intent(this, HomeActivity.class);

            if(item.getItemId() == R.id.menu_home){
                return false;
            } else if (item.getItemId() == R.id.menu_vehicle) {
                return true;
            } else {
                return false;
            }
        });
        nav.setSelectedItemId(R.id.menu_vehicle);

    }
}
