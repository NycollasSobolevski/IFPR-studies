package com.example.parkflow;

import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import androidx.activity.EdgeToEdge;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.graphics.Insets;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowInsetsCompat;

public class SubscribeActivity extends AppCompatActivity {

    private SQLiteDatabase db;
    private EditText nameEt, emailEt, phoneEt, docEt, passEt;
    private Button submitBtn, returnbtn;
    private TextView errorTv;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_subscribe);
        createDb();

        nameEt = findViewById(R.id.nameEt);
        emailEt = findViewById(R.id.emailEt);
        phoneEt = findViewById(R.id.phoneEt);
        docEt = findViewById(R.id.documentEt);
        passEt = findViewById(R.id.passEt);
        submitBtn = findViewById(R.id.subscribeSubmitbtn);
        errorTv = findViewById(R.id.subscribeErrorTx);
        returnbtn = findViewById(R.id.subscribeReturnBtn);

        returnbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Return();
            }
        });

        submitBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                subscribe();
            }
        });

    }

    public void subscribe () {
        String name = nameEt.getText().toString();
        String email= emailEt.getText().toString();
        String phone = phoneEt.getText().toString();
        String doc = docEt.getText().toString();
        String pass = passEt.getText().toString();

        if(name.isEmpty() || email.isEmpty() || phone.isEmpty() || doc.isEmpty() || pass.isEmpty()){
            errorTv.setText("Todos os campos devem ser preenchidos!");
            return;
        }

        try {
            String query = "INSERT INTO [User] (name, email, phone, document, hash) VALUES (?, ?, ?, ?, ?)";
            db.execSQL(query, new Object[]{name, email, phone, doc, pass});
            errorTv.setText("Usuário cadastrado com sucesso!");
        } catch (Exception e) {
            errorTv.setText("Erro ao cadastrar usuário: " + e.getMessage());
            return;
        }
        db.close();
        Intent intent = new Intent( SubscribeActivity.this, LoginActivity.class );
        startActivity(intent);
        finish();
    }

    private void Return(){
        Intent intent = new Intent( SubscribeActivity.this, LoginActivity.class );
        startActivity(intent);
        finish();
    }

    public void createDb(){
        db = openOrCreateDatabase("Parkflow", MODE_PRIVATE, null);
    }

}
