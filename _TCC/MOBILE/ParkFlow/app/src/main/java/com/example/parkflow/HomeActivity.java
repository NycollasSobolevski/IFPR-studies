package com.example.parkflow;

import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import androidx.appcompat.app.AppCompatActivity;

import com.example.parkflow.Model.User;
import com.google.android.material.bottomnavigation.BottomNavigationView;

public class HomeActivity extends AppCompatActivity {

    protected int userId;
    BottomNavigationView nav;
    SQLiteDatabase db;
    private EditText name, doc, email, password, phone;
    private Button submitBtn, deleteBtn;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);
        createDb();
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

        name = findViewById(R.id.profileNameEt);
        doc = findViewById(R.id.profileDocumentEt);
        email = findViewById(R.id.profileEmailEt);
        password = findViewById(R.id.profilePassEt);
        phone = findViewById(R.id.profilePhoneEt);
        submitBtn = findViewById(R.id.profileSubmit);
        deleteBtn = findViewById(R.id.profileDeleteBtn);

        submitBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                submit();
            }
        });
        deleteBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                deleteUser();
            }
        });
        loadData();
    }

    private void loadData(){
        String querry = "SELECT * FROM [logged]";
        Cursor cursor = db.rawQuery(querry, null);
        if(cursor.getCount() <= 0)
            redirectToLogin();

        cursor.moveToFirst();

        int loggedId = cursor.getInt(cursor.getColumnIndexOrThrow("id_user"));
        userId = loggedId;
        querry = "SELECT * FROM [User] WHERE id = ?";
        cursor = db.rawQuery(querry, new String[]{String.valueOf(loggedId)});
        cursor.moveToFirst();

        name.setText(cursor.getString(cursor.getColumnIndexOrThrow(User.COLUMN_NAME)));
        doc.setText(cursor.getString(cursor.getColumnIndexOrThrow(User.COLUMN_DOCUMENT)));
        phone.setText(cursor.getString(cursor.getColumnIndexOrThrow(User.COLUMN_PHONE)));
        email.setText(cursor.getString(cursor.getColumnIndexOrThrow(User.COLUMN_EMAIL)));
    }

    private void redirectToLogin(){
        Intent intent = new Intent( HomeActivity.this, LoginActivity.class);
        startActivity(intent);
        finish();
    }
    private void createDb(){
        db = openOrCreateDatabase("Parkflow", MODE_PRIVATE, null);
    }
    private void submit() {
        String nameValue = name.getText().toString();
        String emailValue = email.getText().toString();
        String phoneValue = phone.getText().toString();
        String docValue = doc.getText().toString();
        String passValue = password.getText().toString();

        String querry;
        if(passValue.isEmpty()){
            querry = "UPDATE [User] " +
                    "SET " +
                    "name = ?, " +
                    "document = ?, " +
                    "email = ?," +
                    "phone = ? " +
                    "WHERE id = ?";
            db.execSQL(querry, new String[]{nameValue, docValue, phoneValue, emailValue, String.valueOf(userId)});
            db.close();
            return;
        }
        querry = "UPDATE [User] " +
                "SET " +
                "name = ?, " +
                "document = ?, " +
                "email = ?," +
                "phone = ?," +
                "hash = ? " +
                "WHERE id = ?";

        db.execSQL(querry, new String[]{nameValue, docValue, phoneValue, emailValue, passValue, String.valueOf(userId)});
        db.close();
    }


    private void deleteUser () {
        try {
            String querry = "DELETE FROM User WHERE id = ?";
            db.execSQL(querry, new String[]{String.valueOf(userId)});
            Intent intent = new Intent(HomeActivity.this, MainActivity.class);
            startActivity(intent);
            finish();
            db.close();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

}
