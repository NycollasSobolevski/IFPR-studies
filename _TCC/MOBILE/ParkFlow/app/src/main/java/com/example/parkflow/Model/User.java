package com.example.parkflow.Model;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class User extends SQLiteOpenHelper {
    private static final String DATABASE_NAME = "Parkflow.db";
    // Versão do banco de dados
    private static final int DATABASE_VERSION = 1;

    // Nome da tabela e colunas
    public static final String TABLE_NAME = "user";
    public static final String COLUMN_ID = "id";
    public static final String COLUMN_NAME = "name";
    public static final String COLUMN_DOCUMENT = "document";
    public static final String COLUMN_EMAIL = "email";
    public static final String COLUMN_HASH = "hash";
    public static final String COLUMN_PHONE = "phone";

    public User(Context context) {
        super(context, DATABASE_NAME, null, DATABASE_VERSION);
    }

    private static final String CREATE_TABLE =
            "CREATE TABLE IF NOT EXISTS " + TABLE_NAME + " (" +
                    COLUMN_ID + " INTEGER PRIMARY KEY AUTOINCREMENT, " +
                    COLUMN_NAME + " VARCHAR(550) NOT NULL, " +
                    COLUMN_DOCUMENT + " VARCHAR(75) NOT NULL, " +
                    COLUMN_EMAIL + " VARCHAR(255), " +
                    COLUMN_HASH + " VARCHAR(255), " +
                    COLUMN_PHONE + " VARCHAR(25)" +
                    ")";


    @Override
    public void onCreate(SQLiteDatabase db) {
        // Criação da tabela [user]
        db.execSQL(CREATE_TABLE);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        // Atualização do banco de dados: remover tabela antiga (se necessário)
        db.execSQL("DROP TABLE IF EXISTS " + TABLE_NAME);
        onCreate(db);
    }
}
