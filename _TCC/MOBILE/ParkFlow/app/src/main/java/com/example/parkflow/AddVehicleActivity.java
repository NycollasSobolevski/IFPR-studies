package com.example.parkflow;

import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import androidx.activity.EdgeToEdge;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.graphics.Insets;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowInsetsCompat;

import com.google.android.material.floatingactionbutton.FloatingActionButton;

public class AddVehicleActivity extends AppCompatActivity {
    SQLiteDatabase db;
    Button saveBtn;
    FloatingActionButton returnBtn;
    EditText modelEt, brandEt, plateEt, yearEt, colorEt;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        EdgeToEdge.enable(this);
        setContentView(R.layout.activity_add_vehicle);
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.vehicleSubmitBtn), (v, insets) -> {
            Insets systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars());
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom);
            return insets;
        });

        returnBtn = findViewById(R.id.vehicleReturnBtn);
        saveBtn = findViewById(R.id.vehicleSubmitBtn);
        modelEt = findViewById(R.id.vehicleNameTb);
        brandEt = findViewById(R.id.vehicleBrandTb);
        plateEt = findViewById(R.id.vehiclePlateTb);
        yearEt = findViewById(R.id.vehicleYearTb);
        colorEt = findViewById(R.id.vehicleColorTb);

        returnBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                returnToList();
            }
        });
        saveBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                submit();
            }
        });

    }


    public void submit(){
        try {
            String model = modelEt.getText().toString();
            String brand = brandEt.getText().toString();
            String plate = plateEt.getText().toString();
            String year = yearEt.getText().toString();
            String color = colorEt.getText().toString();

            if( model.isEmpty() || brand.isEmpty() || plate.isEmpty() || year.isEmpty() || color.isEmpty()){
                return;
            }

            db = openOrCreateDatabase("Parkflow", MODE_PRIVATE, null);
            String querry = "SELECT * FROM [logged]";
            Cursor cursor = db.rawQuery(querry, null);
            cursor.moveToFirst();

            int userId = cursor.getInt(cursor.getColumnIndexOrThrow("id_user"));
            querry = "INSERT INTO [vehicle] (model, brand, plate, year, color, id_user) values (?, ?, ?, ?, ?, ?)";
            db.execSQL(querry, new String[]{model, brand, plate, year, color, String.valueOf(userId)});
            db.close();
            cursor.close();
            Intent intent = new Intent(AddVehicleActivity.this, VehicleActivity.class);
            startActivity(intent);
            finish();


        } catch (Exception e) {
            e.printStackTrace();
        }
    }
    public void returnToList (){
        Intent intent = new Intent(AddVehicleActivity.this, VehicleActivity.class);
        startActivity(intent);
        finish();
    }

}
