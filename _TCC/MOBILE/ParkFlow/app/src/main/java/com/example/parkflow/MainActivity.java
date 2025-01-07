package com.example.parkflow;

import android.content.Intent;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;

import androidx.activity.EdgeToEdge;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.graphics.Insets;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowInsetsCompat;

public class MainActivity extends AppCompatActivity {

    private SQLiteDatabase db;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        EdgeToEdge.enable(this);
        setContentView(R.layout.activity_main);
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main), (v, insets) -> {
            Insets systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars());
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom);
            return insets;
        });

        createDb();

        Intent intent = new Intent(MainActivity.this, LoginActivity.class);
        startActivity(intent);
        finish();

    }




    private void createDb(){
        try{
            db = openOrCreateDatabase("Parkflow", MODE_PRIVATE, null);

            db.execSQL("PRAGMA foreign_keys = ON;");

            db.execSQL("CREATE TABLE IF NOT EXISTS [user](" +
                    "[id] INTEGER PRIMARY KEY AUTOINCREMENT," +
                    "[name] VARCHAR(550) NOT NULL," +
                    "[document] VARCHAR(75) NOT NULL," +
                    "[email] VARCHAR(255)," +
                    "[hash] VARCHAR(255)," +
                    "[phone] VARCHAR(25)" +
                    ")"
            );

            db.execSQL("CREATE TABLE IF NOT EXISTS [vehicle](" +
                    "[id] INTEGER PRIMARY KEY AUTOINCREMENT," +
                    "[plate] VARCHAR(10) NOT NULL," +
                    "[brand] VARCHAR(255) NOT NULL," +
                    "[model] VARCHAR(550) NOT NULL," +
                    "[year] INTEGER," +
                    "[color] VARCHAR(100)," +
                    "[id_user] INTEGER," +
                    "FOREIGN KEY ([id_user]) REFERENCES [user]([id])" +
                    ")"
            );

            db.close();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

}