package com.example.parkflow;

import android.content.Intent;
import android.os.Bundle;

import androidx.appcompat.app.AppCompatActivity;

import com.google.android.material.bottomnavigation.BottomNavigationView;

public class HomeActivity extends AppCompatActivity {

    BottomNavigationView nav;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        nav = findViewById(R.id.bottom_navigation);

        nav.setOnItemSelectedListener(item -> {
            Intent profileIntent = new Intent(this, HomeActivity.class);

            if(item.getItemId() == R.id.menu_home){
                return true;
            } else if (item.getItemId() == R.id.menu_vehicle) {
                profileIntent = new Intent(this,  VehicleActivity.class);
                startActivity(profileIntent);
                return true;
            } else {
                return false;
            }
        });
        nav.setSelectedItemId(R.id.menu_home);

    }
}
