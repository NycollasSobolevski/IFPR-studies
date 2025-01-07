package com.example.parkflow;

import com.example.parkflow.Model.User;

import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

public class LoginActivity extends AppCompatActivity {

    protected SQLiteDatabase db;
    protected TextView errorTv;
    protected Button loginBtn, subscribeBtn;
    protected EditText identification, password;

    @Override
    protected void onCreate(Bundle savedInstaceState){
        super.onCreate(savedInstaceState);
        setContentView(R.layout.activity_login);
        startDb();
        errorTv = findViewById(R.id.errorTv);
        loginBtn = findViewById(R.id.loginBtn);
        subscribeBtn = findViewById(R.id.subscribeBtn);
        identification = findViewById(R.id.identificationTb);
        password = findViewById(R.id.passwordTb);

        loginBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                login();
            }
        });
        subscribeBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                subscribe();
            }
        });



        //! area de teste
        identification.setText("1");
        password.setText("1");
        login();
        // fim da area de teste

    }


    protected void login(){
        String identString = identification.getText().toString();
        String pass = password.getText().toString();

        // Log.d("IdentString debug", identString);
        // Log.d("password debug", pass);

        if(identString.isEmpty() || pass.isEmpty()){
            errorTv.setText("Usuário ou senha inválidos");
            return;
        }

        String qrr = "SELECT * FROM "+ User.TABLE_NAME + " WHERE "+ User.COLUMN_EMAIL + " = ? AND " + User.COLUMN_HASH + " = ?" ;
        Cursor cursor = db.rawQuery(qrr, new String[]{identString, pass});

        boolean isValid = cursor.getCount() > 0;

        if(isValid) {
            cursor.moveToFirst();
            int id = cursor.getInt(cursor.getColumnIndexOrThrow("id"));

            Log.d("User ID", String.valueOf(id));
            qrr = "INSERT INTO [logged] (id_user) VALUES (?)";
            db.execSQL(qrr, new String[]{String.valueOf(id)});

            db.close();
            cursor.close();
            Intent intent = new Intent(LoginActivity.this, HomeActivity.class);
            startActivity(intent);
            finish();
            return;
        }

        cursor = db.rawQuery("SELECT * FROM User", null);
        while (cursor.moveToNext()){
            Log.d("Usuario", cursor.getString(cursor.getColumnIndexOrThrow("email")));
            Log.d("Senha", cursor.getString(cursor.getColumnIndexOrThrow("hash")));
        }

        errorTv.setText("Usuário ou senha inválidos");
        db.close();
        cursor.close();
    }
    protected void subscribe(){
        Intent intent = new Intent(LoginActivity.this, SubscribeActivity.class);
        startActivity(intent);
        finish();
    }
    protected void startDb(){
        db = openOrCreateDatabase("Parkflow", MODE_PRIVATE, null);
    }

}
